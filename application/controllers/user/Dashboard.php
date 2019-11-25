<?php
class Dashboard extends CI_Controller {
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
        $data['total_pdfs'] = $this->UserModel->get_total_pdfs();
        $data['total_ppts'] = $this->UserModel->get_total_ppts();
        $data['total_books'] = $this->UserModel->get_total_books();
        $data['purchased_books'] = $this->UserModel->get_purchased_books();
        $data['books'] = $this->UserModel->get_books($this->Auth->get_user_id());
        $this->layout->header('USER-DASHBOARD', true);
	    $this->load->view('user/dashboard', $data);
		$this->layout->footer('USER-DASHBOARD', true);
    }
}
?>