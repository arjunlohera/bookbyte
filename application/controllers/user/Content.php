<?php
class Content extends CI_Controller {
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

    public function books() {
        $data['books'] = $this->UserModel->get_books($this->Auth->get_user_id());
        $this->layout->header('USER-BOOK', true);
	    $this->load->view('user/books', $data);
		$this->layout->footer('USER-BOOK', true);
    }

    public function pdfs() {
        $data['pdfs'] = $this->UserModel->get_pdfs($this->Auth->get_user_id());
        $this->layout->header('USER-BOOK', true);
	    $this->load->view('user/pdfs', $data);
		$this->layout->footer('USER-BOOK', true);
    }

    public function ppts() {
        $data['ppts'] = $this->UserModel->get_ppts($this->Auth->get_user_id());
        $this->layout->header('USER-BOOK', true);
	    $this->load->view('user/ppts', $data);
		$this->layout->footer('USER-BOOK', true);
    }

    public function hide_pdf() {
        $pdf_id = $this->input->post('pdf_id');
        $data = array(
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('pdf_id' => $pdf_id))->update('pdfs', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'PDF Hidden Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Hide PDF'));
        }
    }

    public function unhide_pdf() {
        $pdf_id = $this->input->post('pdf_id');
        $data = array(
            'is_deleted' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('pdf_id' => $pdf_id))->update('pdfs', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'PDF Unhidden Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Unhide PDF'));
        }
    }

    public function hide_ppt() {
        $ppt_id = $this->input->post('ppt_id');
        $data = array(
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('ppt_id' => $ppt_id))->update('ppts', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'ppt Hidden Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Hide ppt'));
        }
    }

    public function unhide_ppt() {
        $ppt_id = $this->input->post('ppt_id');
        $data = array(
            'is_deleted' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('ppt_id' => $ppt_id))->update('ppts', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'ppt Unhidden Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Unhide ppt'));
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

    public function mark_as_purchased() {
        $book_id = $this->input->post('book_id');
        $data = array(
            'is_purchased' => 1,
            'purchased_datetime' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where(array('book_id' => $book_id))->update('books', $data);
        if($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => true, 'msg' => 'Marked Successfully'));
        } else {
            echo json_encode(array('status' => false, 'error' => 'Failed to Mark Book purchased'));
        }
    }

    public function all_count(){
        $data = array();
        $data[0] = $this->UserModel->get_total_pdfs();
        $data[1] =  $this->UserModel->get_total_ppts();
        $data[2] = $this->UserModel->get_total_books();
        echo json_encode(array('data' => $data));
    }
}
?>