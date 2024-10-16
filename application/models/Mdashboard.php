<?php
class Mdashboard extends CI_Model {
    public function getSoalCounts()
    {
        $query = $this->db->select('COUNT(*) as count')->from('bank_soal')->get();
        return $query->row()->count;
    }

    public function getUserCounts()
    {
        $query = $this->db->select('COUNT(*) as count')->from('user')->where('role', 'user')->get();
        return $query->row()->count;
    }

    public function getAdminCounts()
    {
        $query = $this->db->select('COUNT(*) as count')->from('user')->where('role', 'admin')->get();
        return $query->row()->count;
    }
}
?>
