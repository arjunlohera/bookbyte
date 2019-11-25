<?php
class Cdn extends CI_Model
{

    public function __construct() { 
        parent::__construct();
    }

    public function default_profile_picture($gender = false) {
        if($gender) {
            if($gender == 'male') {
                $thumb = 'default_male_user.png';
            } else if($gender == 'female') {
                $thumb = 'default_female_user.png';
            }
        } else {
            $thumb = 'default_user.png';
        }

    $default_thumb = base_url()."/assets/img/default/thumb/".$thumb;
    return $default_thumb;
    }

    //Get Profile picture url 
    public function get_profile_picture_url($admin_id, $filename, $gender = false ){
        if( ($filename == false) || ($filename == "") ) {
            // Read file name from the database
            // If Database is empty then render file from defaults
            return $this->default_profile_picture($user_type, $gender);
            }  else{ 
               $url = base_url()."assets/img/$admin_id/thumb/$filename";
               return $url;
            } 
    }

//     /* Handle the profile picture upload request from any user type */
// 	public function upload_profile_picture($data){
//         //Capture Post Request
//         $company_id = $this->Auth->get_company_id();
//         $user_type  = isset($data['ut'])  ? $data['ut']  
//                       : $this->Error->diesec('UTN_NEXIST');
//         $user_id    = isset($data['uid']) ? $data['uid'] 
//                       : $this->Error->diesec("UID_NEXIST");
//         if($user_type == "COMPANY"){
//             $uploading_type = $data['uploading_type'];  
//         }              
                    
//         $this->load->library('image_lib');
//         //Request DocRouter to process the upload path     
//         $upload_path = $this->Docrouter
//                        ->profile_picture_route(
//                        $company_id,
//                        $user_type,
//                        $user_id);  

//          //Configure uploads 
//          $config['upload_path']          = $upload_path;
//          $config['allowed_types']        = 'jpg|png';
//        /*  $config['max_size']             = 10000;
//          $config['max_width']            = 768;
//          $config['max_height']           = 1024;*/
         
//         // $config['max_size']             = 10000;
       
//          $config['file_ext_tolower']     = true;
//          $config['encrypt_name']         = true;
//          $this->load->library('upload', $config);
 
//          $Uploaded = $this->upload->do_upload('image');
 
//          //Upload File
//          // Codeiniger handle the extension and mime type validation
//          if ( ! $Uploaded) {

//          $error = array('error' => $this->upload->display_errors());

//          return array( 'uploaded' => false , 'errors' => $error);

//          } else {

//                  $fileData =  $this->upload->data();
//                  $configer =  array(
//                   'image_library'   => 'gd2',
//                   'source_image'    =>  $fileData['full_path'],
//                   'maintain_ratio'  =>  TRUE,
//                   'width'           =>  768,
//                   'height'          =>  1024,
//                 );
//                 $this->image_lib->clear();
//                 $this->image_lib->initialize($configer);
//                 $this->image_lib->resize();

//                 $data = array('file_name' =>
//                                $this->get_profile_picture_url(
//                                $this->Auth->get_company_id(), 
//                                $user_type,
//                                $user_id,
//                                $fileData['file_name']
//                                ));
//         $file_path = $upload_path.$fileData['file_name'];
//         $header_thumb_image = explode('.',$fileData['file_name']);

//         $header_thumb_image1 = $header_thumb_image[0].'_header_thumb'.'.'.end($header_thumb_image);

//         $data['header_thumb_image'] = $this->get_profile_picture_url(
//                                         $this->Auth->get_company_id(),
//                                         $this->Auth->get_user_type(),
//                                         $this->Auth->get_user_id(),
//                                         $header_thumb_image1);

//         $data['primary_logo'] = $this->get_profile_picture_url(
//                                         $this->Auth->get_company_id(),
//                                         $this->Auth->get_user_type(),
//                                         $this->Auth->get_user_id(),
//                                         $fileData['file_name']);
        
//         if($user_type == $this->Auth->get_user_type()){ 
//             $this->session->unset_userdata('header_thumb');
//             $this->session->set_userdata('header_thumb',$this->get_profile_picture_url(
//                                     $this->Auth->get_company_id(),
//                                     $this->Auth->get_user_type(),
//                                     $this->Auth->get_user_id(),
//                                     $header_thumb_image1));
//         }    


//         $this->compress_image($file_path,$file_path,100); 
//         $str = explode('.',$file_path);
//         $ext = end($str);
//         unset($str[count($str) -1]);
//         $str[count($str) -1] .= '_header_thumb';
//         $str[] = $ext;
//         $str = implode('.', $str);        
//         $make_thumb = $this->make_thumb($file_path,$str,75,75);   
//         if(isset($uploading_type) || !empty($uploading_type)){
//             if($uploading_type == 'profile_picture'){
//             //Save File in the Database 
//                 $this->db
//                  ->where($this->Auth->get_identity_column_name($user_type),$user_id)
//                  ->update($this->Auth->get_table_name($user_type),array( 'thumb' => $fileData['file_name'],'header_thumb_image' => $header_thumb_image1));
//             }
//             else{
//                 //Save File in the Database 
//                 $this->db
//                  ->where($this->Auth->get_identity_column_name($user_type),$user_id)
//                  ->update($this->Auth->get_table_name($user_type),array('primary_logo' => $fileData['file_name']));
//             }
//         }
//         else{
//             $this->db
//                  ->where($this->Auth->get_identity_column_name($user_type),$user_id)
//                  ->update($this->Auth->get_table_name($user_type),array( 'thumb' => $fileData['file_name'],'header_thumb_image' => $header_thumb_image1));
//         }
        

//          return array( 'uploaded' => true , 'data' => $data); 
//          }
// 	}

//     private function make_thumb($src, $dest, $desired_width, $desired_height = null) {
        
//             /* read the source image */
//             $source_image = imagecreatefromjpeg($src);
//             $width = imagesx($source_image);
//             $height = imagesy($source_image);
            
//             $desired_height = $desired_height;
            
//             if (!$desired_height) {
//                 /* find the "desired height" of this thumbnail, relative to the desired width  */
//                $desired_height = floor($height * ($desired_width / $width));
//             }
            
            
//             /* create a new, "virtual" image */
//             $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
            
//             /* copy source image at a resized size */
//             imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
            
//             /* create the physical thumbnail image to its destination */
//             imagejpeg($virtual_image, $dest);
//     }

//     private function compress_image($source_url, $destination_url, $quality) {

//         $info = getimagesize($source_url);
       
//             if ($info['mime'] == 'image/jpeg')
//                     $image = imagecreatefromjpeg($source_url);

//             elseif ($info['mime'] == 'image/gif')
//                     $image = imagecreatefromgif($source_url);

//         elseif ($info['mime'] == 'image/png')
//                     $image = imagecreatefrompng($source_url);

//             imagejpeg($image, $destination_url, $quality);
//         return $destination_url;
//     }

// 	/* Render Image File */
// 	public function profile_picture($decrypted_string,$self = false) {
//     // clean the output buffer - there can be data thrown by the other scripts during exec
//     ob_clean();
//     $file_path = $this->dec_picture_name($decrypted_string, false);
//     if(empty($file_path) || !file_exists($file_path)) {
//         header('location: ' . $this->default_profile_picture('default'));
//         return false;
//     }
    
//     header("Content-Type: image/png");
//     $file_contents = file_get_contents($file_path);
//     echo $file_contents;

// 	}
    
    
//     //Bind file name with the base url
//     public function generate_profile_picture_url($file_name) {
//     return base_url() .'Api/profile_picture/?id='. $file_name;
//     }

//     /* Encrypted Profile Picture */
//     public function enc_picture_name($company_id,$user_type,
//                                      $user_id,
//                                      $filename = false) {
 
//     // File Path Having encrypted company id will be matched by 
//     // the render function with the active company id 
//     // This will restrict cross company profile picture render request  
//     $file_name = $this->Enc->encrypt( 
//                              $company_id
//                              .'|'.$user_type.'|'.$user_id 
//                              .'|'.$filename);
    
//     return $this->Enc->String2Hex(base64_encode($file_name));
//     }


//     /* Decrypt the profile picture name parts form client request data */
//     public function dec_picture_name($encrypted_string, $throw_four_zero_four = true) {

//         //Convert Back to hex from string -> base64
//         $encrypted_string = base64_decode($this->Enc->Hex2String($encrypted_string));
//         $pic_parts = explode('|',$this->Enc->decrypt($encrypted_string));
//         if(count($pic_parts) == 4) {

//             //Match Requested Client belongs to the logged in company
//             /*if($pic_parts[0] != $this->Auth->get_company_id()) {  
// 				if(!$throw_four_zero_four) {
//                     return '';
//                 }
//             $this->Error->fourzerofour();
//             }*/

//             //Get directory file is uploaded to 
//             $file_path = $this->Docrouter
//                                 ->profile_picture_route(
//                                 $pic_parts[0], 
//                                 $pic_parts[1],
//                                 $pic_parts[2]);     

//              $file_path = $file_path . $pic_parts[3];

//              if(file_exists($file_path)) { 
//              return $file_path; 
//              } else { 
// 				 if(!$throw_four_zero_four) {
//                     return '';
//                 }
//              //File May be Deleted, of client hold the old link 
//              //$this->Errorlib->fourzerofour();
//              } 

//          } else { 
//                 if(!$throw_four_zero_four) {
//                     return '';
//                 }
//           //  $this->Errorlib->fourzerofour(); 
//         }
//     }
}

?>
