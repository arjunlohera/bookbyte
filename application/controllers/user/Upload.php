<?php
class Upload extends CI_Controller {
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
        $this->layout->header('USER-UPLOAD', true);
	    $this->load->view('user/upload');
		$this->layout->footer('USER-UPLOAD', true);
    }

    public function pdf() {
        $this->layout->header('USER-UPLOAD', true);
	    $this->load->view('user/upload_pdf');
		$this->layout->footer('USER-UPLOAD', true);
    }

    public function ppt() {
        $this->layout->header('USER-UPLOAD', true);
	    $this->load->view('user/upload_ppt');
		$this->layout->footer('USER-UPLOAD', true);
    }

    public function handle_upload() {
        $this->output->set_content_type('application/json');
		if($this->Auth->validate('upload_book')) {
            $data = array(
                'book_title'            => $this->input->post('book_title'),
                'author'                => empty($this->input->post('author'))? NULL:$this->input->post('author'),
                'publisher'             => empty($this->input->post('publisher'))? NULL:$this->input->post('publisher'),
                'description'           => empty($this->input->post('book_description'))? NULL:$this->input->post('book_description'),
                'original_price'        => $this->input->post('original_price'),
                'selling_price'         => $this->input->post('selling_price'),
                'uploaded_by_user_id'   => $this->Auth->get_user_id(),
                'uploaded_datetime'     => date('Y-m-d H:i:s'),
                'uploaded_ip_address'   => $this->input->ip_address()
            );
            $this->db->insert('books', $data);
			if($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'errors' => array("Failed to Upload your Book! Try again after some time!")));
			}
        } else { //Validation Failed
			echo json_encode(array('status' => false , 'errors' => $this->Auth->errors));
		}
    }

    public function handle_pdf_upload() {
        $config['upload_path']          = './uploads/pdf';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['file_name']            = $this->input->post('pdf_title');
        $this->load->library('upload', $config);
        // $file = $this->input->post('pdf_file');
        if ($this->upload->do_upload('pdf_file')) {
            $response = $this->UserModel->save_pdf_info($this->upload->data());
            if($response) {
                echo json_encode(array('status' => true, 'msg' => "File Uploaded!"));
            } else {
                echo json_encode(array('status' => false, 'error' => "Failed to save pdf info"));
            }
        } else {
             echo json_encode(array('status' => false, 'error' => $this->upload->display_errors()));
        }
    }

    public function handle_ppt_upload() {
        $config['upload_path']          = './uploads/ppt';
        $config['allowed_types']        = 'ppt|pptx';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['file_name']            = $this->input->post('ppt_title');
        $this->load->library('upload', $config);
        // $file = $this->input->post('pdf_file');
        if ($this->upload->do_upload('ppt_file')) {
            $response = $this->UserModel->save_ppt_info($this->upload->data());
            if($response) {
                echo json_encode(array('status' => true, 'msg' => "File Uploaded!"));
            } else {
                echo json_encode(array('status' => false, 'error' => "Failed to save pdf info"));
            }
        } else {
             echo json_encode(array('status' => false, 'error' => $this->upload->display_errors()));
        }
    }
}
?>