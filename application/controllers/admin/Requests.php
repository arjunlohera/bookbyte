<?php
class Requests extends CI_Controller {
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

    public function accounts() {
        $users = $this->AdminModel->get_all_users();
        $data['users'] = $users;
        $this->layout->header('ADMIN-REQUEST', true);
	    $this->load->view('admin/account_requests', $data);
		$this->layout->footer('ADMIN-REQUEST', true);
    }

    public function approve_account() {
        $user_id = $this->input->post('user_id');
        $data = array(
            'status' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('user_id' => $user_id))->update('users', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Account Approved Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Approve Account'));
        }
    }

    public function disable_account() {
        $user_id = $this->input->post('user_id');
        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('user_id' => $user_id))->update('users', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Account Disabled'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Disable Account'));
        }
    }

    public function books() {
        $books = $this->AdminModel->get_all_books();
        $data['books'] = $books;
        $this->layout->header('ADMIN-REQUEST', true);
	    $this->load->view('admin/book_requests', $data);
		$this->layout->footer('ADMIN-REQUEST', true);
    }

    public function approve_book() {
        $book_id = $this->input->post('book_id');
        $data = array(
            'is_approved' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('book_id' => $book_id))->update('books', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Book Approved Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Approve Book'));
        }
    }

    public function disable_book() {
        $book_id = $this->input->post('book_id');
        $data = array(
            'is_approved' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('book_id' => $book_id))->update('books', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Book Disabled'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Disable Book'));
        }
    }

    public function delete_book() {
        $book_id = $this->input->post('book_id');
        $data = array(
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('book_id' => $book_id))->update('books', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Book Deleted Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Delete Book'));
        }
    }

    public function recover_book() {
        $book_id = $this->input->post('book_id');
        $data = array(
            'is_deleted' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('book_id' => $book_id))->update('books', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Book Recovered Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Recover Book'));
        }
    }

    public function pdf() {
        $pdfs = $this->AdminModel->get_all_pdfs();
        $data['pdfs'] = $pdfs;
        $this->layout->header('ADMIN-REQUEST', true);
	    $this->load->view('admin/pdf_requests', $data);
		$this->layout->footer('ADMIN-REQUEST', true);
    }

    public function approve_pdf() {
        $pdf_id = $this->input->post('pdf_id');
        $data = array(
            'is_approved' => 1
        );
        $this->db->where(array('pdf_id' => $pdf_id))->update('pdfs', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Pdf Approved Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Approve pdf'));
        }
    }

    public function disable_pdf() {
        $pdf_id = $this->input->post('pdf_id');
        $data = array(
            'is_approved' => 0
        );
        $this->db->where(array('pdf_id' => $pdf_id))->update('pdfs', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Pdf Disabled'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Disable pdf'));
        }
    }

    public function delete_pdf() {
        $pdf_id = $this->input->post('pdf_id');
        $data = array(
            'is_deleted' => 1
        );
        $this->db->where(array('pdf_id' => $pdf_id))->update('pdfs', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Pdf Deleted Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Delete pdf'));
        }
    }

    public function recover_pdf() {
        $pdf_id = $this->input->post('pdf_id');
        $data = array(
            'is_deleted' => 0
        );
        $this->db->where(array('pdf_id' => $pdf_id))->update('pdfs', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Pdf Recovered Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Recover pdf'));
        }
    }

    public function ppt() {
        $ppts = $this->AdminModel->get_all_ppts();
        $data['ppts'] = $ppts;
        $this->layout->header('ADMIN-REQUEST', true);
	    $this->load->view('admin/ppt_requests', $data);
		$this->layout->footer('ADMIN-REQUEST', true);
    }

    public function approve_ppt() {
        $ppt_id = $this->input->post('ppt_id');
        $data = array(
            'is_approved' => 1
        );
        $this->db->where(array('ppt_id' => $ppt_id))->update('ppts', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'ppt Approved Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Approve ppt'));
        }
    }

    public function disable_ppt() {
        $ppt_id = $this->input->post('ppt_id');
        $data = array(
            'is_approved' => 0
        );
        $this->db->where(array('ppt_id' => $ppt_id))->update('ppts', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'ppt Disabled'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Disable ppt'));
        }
    }

    public function delete_ppt() {
        $ppt_id = $this->input->post('ppt_id');
        $data = array(
            'is_deleted' => 1
        );
        $this->db->where(array('ppt_id' => $ppt_id))->update('ppts', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'ppt Deleted Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Delete ppt'));
        }
    }

    public function recover_ppt() {
        $ppt_id = $this->input->post('ppt_id');
        $data = array(
            'is_deleted' => 0
        );
        $this->db->where(array('ppt_id' => $ppt_id))->update('ppts', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'ppt Recovered Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Recover ppt'));
        }
    }
}
?>