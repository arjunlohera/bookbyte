<?php
class AdminModel extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function get_all_users(){
        return $this->db->get('users')->result();
    }

    public function get_all_books(){
        return $this->db->get('books')->result();
    }

    public function get_all_pdfs(){
        $sql = "SELECT *,(SELECT CONCAT(first_name,' ',last_name) FROM users WHERE users.user_id = pdfs.upload_by_user_id) as author FROM pdfs";
        return $this->db->query($sql)->result();
    }

    public function get_all_ppts() {
        $sql = "SELECT *,(SELECT CONCAT(first_name,' ',last_name) FROM users WHERE users.user_id = ppts.upload_by_user_id) as author FROM ppts";
        return $this->db->query($sql)->result();
    }

    public function get_total_users() {
        return $this->db->get('users')->num_rows();
    }

    public function get_pending_approvals() {
        return $this->db->where('status', 0)->get('users')->num_rows();
    }

    public function get_pending_book_approvals() {
        return $this->db->where('is_approved', 0)->get('books')->num_rows();
    }

    public function get_total_books() {
        return $this->db->get('books')->num_rows();
    }

    public function get_total_pdfs_count() {
        return $this->db->get('pdfs')->num_rows();
    }

    public function get_total_ppts_count() {
        return $this->db->get('ppts')->num_rows();
    }

    public function get_total_books_count() {
        return $this->db->get('books')->num_rows();
    }
    
}

?>