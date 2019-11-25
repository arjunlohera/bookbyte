<?php
class Settings extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if($this->Auth->is_guest()) {
			redirect('login');
        }
        if($this->Auth->get_user_type() != 'ADMINISTRATOR') {
            show_error('You are not authorized to view that page.', 401);
        }
    }

    public function index() {
        $this->layout->header('ADMIN-SETTINGS', true);
	    $this->load->view('admin/site_settings');
		$this->layout->footer('ADMIN-SETTINGS', true);
    }

    public function update_aboutus(){
        $aboutus = $this->input->post('aboutus');
        
    }
}
?>