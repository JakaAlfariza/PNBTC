<?php
class Mpractice extends CI_Model {

    public function get_first_section_by_bank($id_bank) {
        $this->db->where('id_bank', $id_bank);
        $this->db->order_by('part_section', 'ASC');
        $query = $this->db->get('section');
        return $query->row();
    }

    public function get_random_practice_bank_by_type() {
        $this->db->where('tipe_bank', 'test');
        $this->db->order_by('id_bank', 'RANDOM');
        $this->db->limit(1);
        $query = $this->db->get('bank_soal');
        return $query->row();
    }

    public function get_random_practice_bank() {
        $this->db->where('tipe_bank', 'practice');
        $this->db->order_by('id_bank', 'RANDOM');
        $this->db->limit(1);
        $query = $this->db->get('bank_soal');
        return $query->row();
    }

    public function get_section($id_section) {
        $this->db->where('id_section', $id_section);
        $query = $this->db->get('section');
        return $query->row();
    }

    public function get_next_section($current_id_section) {
        // Fetch the current section to get the id_bank
        $current_section = $this->get_section($current_id_section);
        if (!$current_section) {
            return null;
        }

        $id_bank = $current_section->id_bank;

        // Fetch the next section within the same bank
        $this->db->where('id_section >', $current_id_section);
        $this->db->where('id_bank', $id_bank);
        $this->db->order_by('id_section', 'ASC');
        $query = $this->db->get('section');
        return $query->row();
    }

    public function get_questions_by_section($id_section) {
        $this->db->where('id_section', $id_section);
        $query = $this->db->get('soal'); // Replace 'soal' with your actual questions table name
        return $query->result();
    }

    public function get_total_questions_until_section($current_section_id) {
        $this->db->select('COUNT(*) as total');
        $this->db->from('soal');
        $this->db->join('section', 'soal.id_section = section.id_section');
        $this->db->where('section.id_section <=', $current_section_id);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function get_user_credits($id_user) {
        $this->db->select('credits');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user'); // Assuming user credits are stored in the 'users' table
        $result = $query->row();
        return $result ? $result->credits : 0;
    }

    public function deduct_user_credit($id_user) {
        $this->db->set('credits', 'credits - 1', FALSE);
        $this->db->where('id_user', $id_user);
        $this->db->update('user'); // Assuming user credits are stored in the 'users' table
    }

    public function get_listening_score($correct_count) {
        $this->db->select('nilai_listening');
        $this->db->from('toeic_score');
        $this->db->where('benar', $correct_count);
        $query = $this->db->get();
        return $query->row()->nilai_listening ?? 0;
    }

    public function get_reading_score($correct_count) {
        $this->db->select('nilai_reading');
        $this->db->from('toeic_score');
        $this->db->where('benar', $correct_count);
        $query = $this->db->get();
        return $query->row()->nilai_reading ?? 0;
    }

    public function insert_results($data) {
        return $this->db->insert('hasil_ujian', $data);
    }

    public function get_test_result_by_id($id_hasil) {
        $this->db->where('id_hasil', $id_hasil);
        $query = $this->db->get('hasil_ujian');
        return $query->row();
    }

    public function get_results_by_user($id_user) {
        // Ensure the ID is an integer to prevent SQL injection
        $id_user = (int)$id_user;

        // Select the test results for the specified user
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('hasil_ujian');

        // Return the result as an array of objects
        return $query->result();
    }

    public function get_all_results() {
        $this->db->select('hasil_ujian.*, user.nama AS nama');
        $this->db->from('hasil_ujian');
        $this->db->join('user', 'hasil_ujian.id_user = user.id_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_result($id_hasil) {
        $this->db->where('id_hasil', $id_hasil);
        return $this->db->delete('hasil_ujian');
    }
}
?>
