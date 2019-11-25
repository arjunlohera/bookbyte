<?php
class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if($this->Auth->is_guest()) {
			redirect('login');
        }

        if($this->Auth->get_user_type() != 'USER') {
            show_error('You are not authorized to view that page.', 401);
        }
        $this->load->model('UserModel');
    }

    public function index() {
        $data['user'] = $this->UserModel->get_profile_info();
        $this->layout->header('USER-PROFILE', true);
        $this->load->view('user/profile', $data);
        $this->layout->footer('USER-PROFILE', true);
    }

    public function update_profile_info(){
        $key = $this->input->post('id'); //element id
        $value = $this->input->post('value'); // user entered data
        $data = array(
            $key => $value
        );
        $this->db->where('user_id', $this->Auth->get_user_id())->update('users', $data);
        echo ($this->db->affected_rows() > 0)? $value:"failed to update";
    }
    
}
?>