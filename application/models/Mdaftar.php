<?php
class Mdaftar extends CI_Model
{
    function simpandaftar()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Cek email atau username apakah sudah ada
        $email_exists = $this->isEmailExists($email);
        $username_exists = $this->isUsernameExists($username);

        if ($email_exists || $username_exists) {
            if ($email_exists) {
                $data['email_error'] = 'Email sudah terdaftar.';
            }
            if ($username_exists) {
                $data['username_error'] = 'Username sudah terdaftar.';
            }
        } else {
            // Data di input
            $data_to_insert = array(
                'username' => $username,
                'email' => $email,
                'password' => $password
            );

            $this->db->insert('user', $data_to_insert);
            echo "<script>alert('Data berhasil disimpan');</script>";
            redirect('chalaman/login', 'refresh');
        }

        // Load the view with the data
        $this->load->view('daftar', $data);
    }

    // Function Cek email apakah sudah ada
    private function isEmailExists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        return $query->num_rows() > 0;
    }

    // Function Cek username apakah sudah ada
    private function isUsernameExists($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');

        return $query->num_rows() > 0;
    }
}
?>
