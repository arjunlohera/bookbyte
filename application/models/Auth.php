<?php
class Auth extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public $errors = array();

    public function validate($type){
      $this->load->library('form_validation');
      $rules = $this->rules()[$type];
      foreach($rules as $rule) {
        $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
      }
      if($this->form_validation->run() == false) {
        $this->errors = $this->form_validation->error_array();
        return false;
      }
      return true;
    }

    public function rules(){
      return array(
        'login' => array(
            array('role_type', 'Role', 'required|trim'),
            array('username', 'Username', 'trim|alpha_numeric'),
            array('password', 'Password', 'min_length[6]|max_length[20]|required|trim')
        ),
        'registration' => array(
          array('fname', 'First Name', 'required|trim'),
          array('lname', 'Last Name', 'trim'),
          array('email', 'Email', 'required|trim'),
          array('dob', 'Date of Birth', 'required|trim'),
          array('username', 'Username', 'required|trim'),
          array('gender', 'Gender', 'required|trim'),
          array('phone', 'Phone', 'required|trim'),
          array('password', 'Password', 'required|trim'),
          array('repeat_password', 'Repeat Password', 'required|trim')
        ),
        'upload_book' => array(
          array('book_title', 'Book Title', 'required|trim'),
          array('author', 'Author', 'trim'),
          array('publisher', 'Publisher', 'trim'),
          array('original_price', 'Original Price', 'required|trim'),
          array('selling_price', 'Selling Price', 'required|trim')
        )
      );
    } 

       /*
   Redirect User to their dashboard page 
   pass param false to retrive the dashboard page path 
   */
   public function redirect_dashboard($rdr = true) {
 
    switch ($this->get_user_type()) {
      case 'ADMINISTRATOR':
        if($rdr) { redirect('admin/Dashboard'); } else { return 'admin/Dashboard'; }
        break;
      case 'USER':
        if($rdr) {  redirect('user/Dashboard'); } else { return 'user/Dashboard'; }
        break;
      default:
        return false;
    }
 }

    public function login($usertype, $username, $password, $verified = false) {
      // Process Login Request
        switch($usertype) {
          case 'ADMINISTRATOR':
            return $this->login_administrator($username, $password, $verified);
            break;
          case 'USER':
            return $this->login_user($username, $password, $verified);
            break;
          default:
            return false;
        }
    }

    public function login_administrator($username, $password, $verified = false) {
      $recordAdmin = $this->db->from('administrators')->where(array('username' => $username ))->get()->row();
      if($recordAdmin){
        if($this->decrypt_password($recordAdmin->password) == $password || $verified) {
             if($recordAdmin->status == 1){
                // update last login date
                $this->db->where('admin_id', $recordAdmin->admin_id)
                    ->update('administrators', array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip_address' => $this->input->ip_address()));
                // end update last login date

                $login_data = array(
                  'id'         =>  $recordAdmin->admin_id,
                  'user_name'  => $recordAdmin->username,
                  'user_type'  => 'ADMINISTRATOR',
                  'user_email' => $recordAdmin->email,
                  'nick_name'  => $recordAdmin->first_name,
                  'full_name'  => $recordAdmin->first_name . ' ' . $recordAdmin->last_name,
                  'last_login_date' => $recordAdmin->last_login_date,
                  'last_login_ip_address' => $recordAdmin->last_login_ip_address,
                  
                  //Set thumbnails  
                  'thumb'      => ( $recordAdmin->thumb == NULL )  
                                  ? $this->Cdn->default_profile_picture()
                                  : $this->Cdn->get_profile_picture_url($recordAdmin->admin_id, $recordAdmin->thumb),
                  'header_thumb' =>  ( $recordAdmin->header_thumb == "" )  
                                  ? $this->Cdn->default_profile_picture()
                                  : $this->Cdn->get_profile_picture_url($recordAdmin->admin_id, $recordAdmin->header_thumb), 
                  'should_update_password' =>  $recordAdmin->should_update_password            
                );

                $this->set_login_info($login_data);
                return array('status' => true,'is_user' => true );
             } else{
                return array('status' => false,'is_user' => true,'email' => $recordAdmin->email);
             }
        } else{
            return array('status' => false , 'is_user' => false);
        }
    }
      return array('status' => false , 'is_user' => false); 
   }

  public function set_login_info($userdata) {
    $this->session->set_userdata('user_id',    $userdata['id']);
    $this->session->set_userdata('user_name',  $userdata['user_name']);
    $this->session->set_userdata('user_type',  $userdata['user_type']);
    $this->session->set_userdata('user_email', $userdata['user_email']);
    $this->session->set_userdata('nick_name',  $userdata['nick_name']);
    $this->session->set_userdata('full_name',  (!empty($userdata['full_name'])) ? $userdata['full_name'] : '');
    $this->session->set_userdata('thumb',      $userdata['thumb']);
    $this->session->set_userdata('header_thumb',      $userdata['header_thumb']);
    $this->session->set_userdata('last_login_date', (!empty($userdata['last_login_date'])? $userdata['last_login_date'] : null ));
    $this->session->set_userdata('last_login_ip_address', (!empty($userdata['last_login_ip_address'])? $userdata['last_login_ip_address'] : null ));
    if(!empty($userdata['should_update_password'])){
      $this->session->set_userdata('should_update_password', $userdata['should_update_password']);
    }
  }

  public function encrypt_password($password) {
    $this->load->library('encryption');
    return $this->encryption->encrypt($password);
 }

 public function decrypt_password($encrypted_password){
    $this->load->library('encryption');
    return $this->encryption->decrypt($encrypted_password);
 }

 public function logout() {
  $this->session->sess_destroy();
 }

 public function login_user($username, $password, $verified = false) {
  $record = $this->db->from('users')->where(array('username' => $username ))->get()->row();
  if($record){
    if($this->decrypt_password($record->password) == $password || $verified) {
         if($record->status == 1){
            // update last login date
            $this->db->where('user_id', $record->user_id)
                ->update('users', array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip_address' => $this->input->ip_address()));
            // end update last login date

            $login_data = array(
              'id'         =>  $record->user_id,
              'user_name'  => $record->username,
              'user_type'  => 'USER',
              'user_email' => $record->email,
              'nick_name'  => $record->first_name,
              'full_name'  => $record->first_name . ' ' . $record->last_name,
              'last_login_date' => $record->last_login_date,
              'last_login_ip_address' => $record->last_login_ip_address,
              
              //Set thumbnails  
              'thumb'      => ( $record->thumb == "" )  
                              ? $this->Cdn->default_profile_picture()
                              : $this->Cdn->get_profile_picture_url($record->admin_id, $record->thumb),
              'header_thumb' =>  ( $record->header_thumb == "" )  
                              ? $this->Cdn->default_profile_picture()
                              : $this->Cdn->get_profile_picture_url($record->admin_id, $record->header_thumb), 
              'should_update_password' =>  $record->should_update_password            
            );

            $this->set_login_info($login_data);
            return array('status' => true,'is_user' => true );
         } else{
            return array('status' => false,'is_user' => true,'email' => $record->email);
         }
    } else{
        return array('status' => false , 'is_user' => false);
    }
}
  return array('status' => false , 'is_user' => false); 
}

/**
  * Access related functions
  */
public function is_guest() {
  if(!$this->get_user_id()) {
    return true;
  }
    return false;
}

// Return the user type from session
public function get_user_type() {
  return $this->session->userdata('user_type');
} 

// Return the user id from session
public function get_user_id() { 
  return $this->session->userdata('user_id');
}

public function should_update_password() { 
  return $this->session->userdata('should_update_password');
} 

  // Return the thumbnails of logged in user
  public function get_thumb() { 
    return $this->session->userdata('thumb'); 
 } 

  // Return the thumbnails of logged in user
 public function get_header_thumb() { 
    return $this->session->userdata('header_thumb'); 
 } 

    // Return the user email session
    public function get_user_email() { 
      return $this->session->userdata('user_email');
   } 
   
   // Return the first name
   public function get_nick_name() { 
      return $this->session->userdata('nick_name');
   } 
   
   // Return the full name
   public function get_full_name() { 
      return $this->session->userdata('full_name');
   }  

    // Return the username from session
    public function get_user_name() { 
      return $this->session->userdata('user_name');
   } 

   public function get_last_login_date() {
    return $this->session->userdata('last_login_date');
}

public function get_last_login_ip_address() {
    return $this->session->userdata('last_login_ip_address');
}


}
?>