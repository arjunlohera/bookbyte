<?php

Class Enc extends CI_Model
{
	/* Nerver Change this Keys = Otherwise all the encrypted data in the database is garbage for next 100 years*/
	/* Encryption Key*/
	public $key = "";

  function __construct(){

  $this->load->library("encryption");
  $this->encryption->initialize(
        array(
                'cipher' => 'aes-256',
                'mode' => 'ctr'
        )
  );
  }

	public function encrypt($data) {
    if(trim($data) == "") { 
        //  echo json_encode(array('success' => false , 'msg' => $this->Errorlib->code("EC_Failed"))); 
         die();
    }
    $this->load->library('encryption');
    $encrypted_string =  $this->encryption->encrypt($data); // Potentially encrypted string
    return $encrypted_string;
	}

 	public function decrypt($data) {
      $data = trim($data, "\x0"); // Remove BOM
      $decrypted_string = $this->encryption->decrypt($data);
      return  $decrypted_string;
  }

}

?>
