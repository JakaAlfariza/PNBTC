<?php
class Mdashboard extends CI_Model{
        public function getEventCounts()
        {
            $query = $this->db->select('id_event, COUNT(*) as count')->from('event')->group_by('id_event')->get();
            return $query->result();
        }

        public function getUserCounts()
        {
            $query = $this->db->select('role, COUNT(*) as count')->from('user')->where('role', 'user')->get();
            return $query->result();
        }

        public function getPanitiaCounts()
        {
            $query = $this->db->select('role, COUNT(*) as count')->from('user')->where('role', 'admin')->get();
            return $query->result();
        }
    }
?>