<?php
class Mimport extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    // Method untuk memasukkan data dalam batch
    public function insert_batch($data){
        if (empty($data)) {
            return 0;
        }

        // Melakukan insert batch ke tabel 'user'
        $this->db->insert_batch('user', $data);
        
        // Mengembalikan jumlah baris yang terpengaruh
        return $this->db->affected_rows();
    }

    // Method untuk memeriksa apakah email sudah ada
    public function is_email_duplicate($email){
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->num_rows() > 0;
    }
}

?>