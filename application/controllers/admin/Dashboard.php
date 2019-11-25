<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if($this->Auth->is_guest()) {
			redirect('login');
        }
        if($this->Auth->get_user_type() != 'ADMINISTRATOR') {
            show_error('You are not authorized to view that page.', 401);
        }
        $this->load->model('AdminModel');
    }

    public function index() {
        $data['total_users'] = $this->AdminModel->get_total_users();
        $data['pending_approvals'] = $this->AdminModel->get_pending_approvals();
        $data['pending_book_approvals'] = $this->AdminModel->get_pending_book_approvals();
        $data['total_books'] = $this->AdminModel->get_total_books();
        $data['users'] = $this->AdminModel->get_all_users();
        $this->layout->header('ADMIN-DASHBOARD', true);
	    $this->load->view('admin/dashboard', $data);
		$this->layout->footer('ADMIN-DASHBOARD', true);
    }

    public function all_count(){
        $data = array();
        $data[0] = $this->AdminModel->get_total_pdfs_count();
        $data[1] =  $this->AdminModel->get_total_ppts_count();
        $data[2] = $this->AdminModel->get_total_books_count();
        echo json_encode(array('data' => $data));
    }
}
?>