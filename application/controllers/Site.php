<?php
class Site extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('SiteModel');
        $this->load->helper('download');
    }
    public function index() {
        $data['books'] = $this->SiteModel->get_books(5);
        $data['newly_added_books'] = $this->SiteModel->get_newly_added_books();
        $this->layout->site_header('SITE-HOME',true);
	    $this->load->view('site/home', $data);
		$this->layout->site_footer('SITE-HOME',true);
    }

    public function shop(){
        $data['books'] = $this->SiteModel->get_books();
        $this->layout->site_header('SITE-HOME',true);
	    $this->load->view('site/shop', $data);
		$this->layout->site_footer('SITE-HOME',true);
    }

    public function pdf(){
        $data['pdfs'] = $this->SiteModel->get_pdfs();
        $this->layout->site_header('SITE-HOME',true);
	    $this->load->view('site/pdfs_view', $data);
		$this->layout->site_footer('SITE-HOME',true);
    }

    public function ppt(){
        $data['ppts'] = $this->SiteModel->get_ppts();
        $this->layout->site_header('SITE-HOME',true);
	    $this->load->view('site/ppts_view', $data);
		$this->layout->site_footer('SITE-HOME',true);
    }

    public function privacy_policy(){
        $this->layout->site_header('SITE-HOME',true);
	    $this->load->view('site/privacy_policy');
		$this->layout->site_footer('SITE-HOME',true);
    }

    public function terms(){
        $this->layout->site_header('SITE-HOME',true);
	    $this->load->view('site/terms_condition');
		$this->layout->site_footer('SITE-HOME',true);
    }

    public function contact_admin() {
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('status' => true)));
    }

    public function buy($book_id = ""){
        if($book_id != "") {
            $data['book_info']  = $this->SiteModel->get_book_info($book_id);
            $data['seller']     = $this->SiteModel->get_seller_info($book_id);
            $this->layout->site_header('SITE-HOME',true);
	        $this->load->view('site/buy_book', $data);
		    $this->layout->site_footer('SITE-HOME',true);
        }
    }

    public function download_pdf($doc_id = "") {
        if($doc_id != "") {
            $path = $this->db->where('pdf_id', $doc_id)->get('pdfs')->row()->full_path;
            // echo $path;
            if(file_exists($path)) {
                force_download($path, NULL);
            } else {
                echo "Failed to download file.";
            }
            
        }
    }

    public function download_ppt($doc_id = "") {
        if($doc_id != "") {
            $path = $this->db->where('ppt_id', $doc_id)->get('ppts')->row()->full_path;
            // echo $path;
            if(file_exists($path)) {
                force_download($path, NULL);
            } else {
                echo "Failed to download file.";
            }
            
        }
    }

    public function get_suggested_books() {
        $books = $this->db->select('book_title')->get('books')->result();
        echo json_encode($books);
    }

    public function search_books(){
        $term = $this->input->post('term');
        if($term !== ""){
            $this->db->where("(book_title LIKE '%{$term}%')");
        }
        $books = $this->db->get('books');
        // echo json_encode(array);
    }

    public function is_authorized() {
        $this->output->set_content_type('application/json');
        if($this->Auth->is_guest()) {
            //NEED REGISTRATION
            $this->output->set_output(json_encode(array('status' => false)));
        } else {
            $this->output->set_output(json_encode(array('status' => true)));
        }
    }

    
}
?>