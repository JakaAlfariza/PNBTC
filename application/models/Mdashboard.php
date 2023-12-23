<?php
class Mdashboard extends CI_Model {
    public function getEventCounts()
    {
        $query = $this->db->select('COUNT(*) as count')->from('event')->get();
        return $query->row()->count;
    }

    public function getUserCounts()
    {
        $query = $this->db->select('COUNT(*) as count')->from('user')->where('role', 'user')->get();
        return $query->row()->count;
    }

    public function getPanitiaCounts()
    {
        $query = $this->db->select('COUNT(*) as count')->from('user')->where('role', 'admin')->get();
        return $query->row()->count;
    }
}
?>
