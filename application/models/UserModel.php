<?php
class UserModel extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function get_profile_info(){
        return $this->db->where('user_id', $this->Auth->get_user_id())->get('users')->row();
    }

    public function save_pdf_info($pdf) {
        if(!$pdf) return false;
        $data = array(
            'file_name' => $pdf['file_name'],
            'file_type' => $pdf['file_type'],
            'file_path' => $pdf['file_path'],
            'full_path' => $pdf['full_path'],
            'raw_name' => $pdf['raw_name'],
            'orig_name' => $pdf['orig_name'],
            'client_name' => $pdf['client_name'],
            'file_ext' => $pdf['file_ext'],
            'file_size' => $pdf['file_size'],
            'upload_by_user_id' => $this->Auth->get_user_id(),
            'upload_datetime' => date('Y-m-d H:i:s')
        ); 
        $this->db->insert('pdfs', $data);
        return ($this->db->affected_rows() > 0)? true:false;
    }

    public function save_ppt_info($ppt) {
        if(!$ppt) return false;
        $data = array(
            'file_name' => $ppt['file_name'],
            'file_type' => $ppt['file_type'],
            'file_path' => $ppt['file_path'],
            'full_path' => $ppt['full_path'],
            'raw_name' => $ppt['raw_name'],
            'orig_name' => $ppt['orig_name'],
            'client_name' => $ppt['client_name'],
            'file_ext' => $ppt['file_ext'],
            'file_size' => $ppt['file_size'],
            'upload_by_user_id' => $this->Auth->get_user_id(),
            'upload_datetime' => date('Y-m-d H:i:s')
        ); 
        $this->db->insert('ppts', $data);
        return ($this->db->affected_rows() > 0)? true:false;
    }

    public function get_books($user_id) {
        return $this->db->where(array('uploaded_by_user_id' => $user_id, 'is_approved' => 1, 'is_deleted' => 0))->order_by('uploaded_datetime', 'DESC')->get('books')->result();
    }

    public function get_pdfs($user_id) {
        return $this->db->where(array('upload_by_user_id' => $user_id, 'is_approved' => 1))->order_by('upload_datetime', 'DESC')->get('pdfs')->result();
    }

    public function get_ppts($user_id) {
        return $this->db->where(array('upload_by_user_id' => $user_id, 'is_approved' => 1))->order_by('upload_datetime', 'DESC')->get('ppts')->result();
    }

    public function get_total_pdfs() {
        return $this->db->where(array('upload_by_user_id' => $this->Auth->get_user_id()))->get('pdfs')->num_rows();
    }

    public function get_total_ppts() {
        return $this->db->where(array('upload_by_user_id' => $this->Auth->get_user_id()))->get('ppts')->num_rows();
    }

    public function get_total_books() {
        return $this->db->where(array('uploaded_by_user_id' => $this->Auth->get_user_id()))->get('books')->num_rows();
    }

    public function get_purchased_books() {
        return $this->db->where(array('uploaded_by_user_id' => $this->Auth->get_user_id(), 'is_purchased' => 1))->get('books')->num_rows();
    }

}

?>