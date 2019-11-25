<?php
class SiteModel extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function get_books($limit = null){
        if($limit == null) {
            return $this->db->where(array('is_approved' => 1, 'is_deleted' => 0, 'is_purchased' => 0))->order_by('uploaded_datetime', 'DESC')->get('books')->result();
        } else {
            return $this->db->where(array('is_approved' => 1, 'is_deleted' => 0, 'is_purchased' => 0))->order_by('uploaded_datetime', 'DESC')->limit($limit)->get('books')->result();
        }
    }

    public function get_newly_added_books(){
        return $this->db->where(array('is_approved' => 1, 'is_deleted' => 0, 'is_purchased' => 0))->order_by('uploaded_datetime', 'DESC')->limit(4)->get('books')->result();
    }

    public function get_pdfs() {
        return $this->db->where(array('is_approved' => 1, 'is_deleted' => 0))->get('pdfs')->result();
    }

    public function get_ppts() {
        return $this->db->where(array('is_approved' => 1, 'is_deleted' => 0))->get('ppts')->result();
    }

    public function get_book_info($book_id) {
        return $this->db->where(array('book_id' => $book_id))->get('books')->row();
    }

    public function get_seller_info($book_id) {
        $user_id = $this->db->where('book_id', $book_id)->get('books')->row()->uploaded_by_user_id;
        $seller_info = $this->db->where('user_id', $user_id)->get('users')->row();
        return $seller_info;
    }
}

?>