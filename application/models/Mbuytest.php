<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbuytest extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_payment($data) {
        $this->db->insert('test_credits', $data);
    }

    public function get_test_credits_by_user($id_user) {
        $this->db->select('*');
        $this->db->from('test_credits'); // Your table name
        $this->db->where('id_user', $id_user); // Filter by user ID
        $query = $this->db->get();
        return $query->result(); // Return the result
    }

    public function get_current_credits($id_user) {
        $this->db->select('credits');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->credits;
        } else {
            return 0; // Return 0 or appropriate default value
        }
    }

    public function get_all_credits() {
        $this->db->select('test_credits.*, user.nama');
        $this->db->from('test_credits');
        $this->db->join('user', 'test_credits.id_user = user.id_user');
        $query = $this->db->get();
        return $query->result();
    }


    public function accept_credit($id) {
        $this->db->trans_start();
        $this->db->set('status', 'Success');
        $this->db->where('id_bayar', $id);
        $this->db->update('test_credits');

        // Assuming you also need to add credits to the user
        $this->db->set('credits', 'credits + ' . $this->db->escape_str($this->get_credit_amount($id)), FALSE);
        $this->db->where('id_user', $this->get_user_id_by_credit($id));
        $this->db->update('user');
        
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function decline_credit($id) {
        $data = array(
            'status' => 'Decline'
        );
        $this->db->where('id_bayar', $id);
        return $this->db->update('test_credits', $data);
    }

    private function get_credit_amount($id) {
        $this->db->select('jmlh_beli');
        $this->db->from('test_credits');
        $this->db->where('id_bayar', $id);
        $query = $this->db->get();
        return $query->row()->jmlh_beli;
    }

    private function get_user_id_by_credit($id) {
        $this->db->select('id_user');
        $this->db->from('test_credits');
        $this->db->where('id_bayar', $id);
        $query = $this->db->get();
        return $query->row()->id_user;
    }

}
?>
