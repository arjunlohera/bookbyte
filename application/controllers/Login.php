<?php
class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if(!$this->Auth->is_guest()) {
            $this->Auth->redirect_dashboard();
        }
		$this->layout->header('LOGIN',false);
	    $this->load->view('login');
		$this->layout->footer('LOGIN',false);
    }

    public function forget_password(){
        if(!$this->Auth->is_guest()) {
            $this->Auth->redirect_dashboard();
        }
        $this->layout->header('LOGIN',false);
	    $this->load->view('forget_password');
		$this->layout->footer('LOGIN',false);
    }

    public function register(){
        if(!$this->Auth->is_guest()) {
            $this->Auth->redirect_dashboard();
        }
        $this->layout->header('REGISTER', false);
	    $this->load->view('register');
		$this->layout->footer('REGISTER', false);
    }

    public function login_action(){
        $this->output->set_content_type('application/json');
		if($this->Auth->validate('login')) {
			$state = $this->Auth->login(
				$this->input->post('role_type'), 
				$this->input->post('username'),  
				$this->input->post('password'));
			if($state['status'] && $state['is_user']){

				if($this->input->post('remember')) {
					$this->Auth->set_rememberme();
				}
				echo json_encode(array('status' => true, 'url' => site_url( $this->Auth->redirect_dashboard(false))));
			} else if(!$state['status'] && $state['is_user']){
				echo json_encode(array('status' => false,'errors' => array("Your account has not been approved!")));
			} else {
				echo json_encode(array('status' => false, 'errors' => array("Username and Password do not match!")));
			}
			
		} else { //Validation Failed
			echo json_encode(array('status' => false , 'errors' => $this->Auth->errors));
		}
	}
	
	public function logout($site=0) {
		$this->Auth->logout();
		if($site == 1) {
			redirect('site');
		} else {
			redirect('login');
		}
	}

	public function handle_registration() {
		$this->output->set_content_type('application/json');
		if($this->Auth->validate('registration')) {
			$data = array(
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'dob' => $this->input->post('dob'),
				'username' => $this->input->post('username'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'password' => $this->Auth->encrypt_password($this->input->post('password')),
				'registration_date' => date('Y-m-d H:i:s'),
				'registered_ip_address' => $this->input->ip_address(),
			);
			$this->db->insert('users', $data);
			if($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'url' => site_url( $this->Auth->redirect_dashboard(false))));
			} else {
				echo json_encode(array('status' => false, 'errors' => array("Failed to Register your Account! Try again after some time!")));
			}
		} else { //Validation Failed
			echo json_encode(array('status' => false , 'errors' => $this->Auth->errors));
		}
	}

	/********Check field already exists or not********/
	public function check_is_unique() {	
		$this->output->set_content_type('application/json');
		$this->form_validation->set_data($this->input->get());
		$this->form_validation->set_rules('field', 'Field', 'required|trim');
		$this->form_validation->set_rules('field_value', 'Field Value', 'required|trim');
		$this->form_validation->set_rules('table_name', 'Table Name', 'required|trim');

		if ($this->form_validation->run() == true) {
			$table_name = $this->input->get('table_name');
			$field = $this->input->get('field');
			$field_value = $this->input->get('field_value');
			$tables = array('users', 'administrators');
			$is_unique = true;
			foreach ($tables as $table) {
				$record = $this->db->where(array($field => $field_value))->get($table);
				if($record->num_rows() > 0) {
					$is_unique = false;
				}
			}
			if($is_unique) {
				$this->output->set_output(json_encode(array('status' => true,'msg' => str_replace('_', ' ', ucfirst($field)).' is valid.')));
			} else {
				$this->output->set_output(json_encode(array('status' => false,'msg' => str_replace('_', ' ', ucfirst($field)).' already exists.')));
			}
		} else {
			$this->output->set_output(json_encode(array('status' => false,'msg' => 'Not valid request')));
		}
	}
}
?>