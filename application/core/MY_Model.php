<?php
 
class MY_Model extends CI_Model {
	public $errors = array();

	// public function rules(){
	// 	return array();
	// }

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
}
