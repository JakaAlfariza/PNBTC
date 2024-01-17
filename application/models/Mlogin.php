<?php
class Mlogin extends CI_Model
{
    function proseslogin()
    {
        // Inisialisai hasil input
        $username = $this->input->post('username', true);
        $password = $this->input->post('password');

        // Memilih user sesuai username dan password
        $sql = "SELECT * FROM user WHERE username = ?";
        $query = $this->db->query($sql, array($username));

        // Cek apakah ada data di database
        if ($query->num_rows() > 0) {
            $data = $query->row();

            // Cek apakah password sesuai
            if (password_verify($password, $data->password)) {
                $array = array(
                    'id' => $data->id,
                    'username' => $data->username,
                    'email' => $data->email,
                    'nama' => $data->nama,
                    'role' => $data->role
                );

                $this->session->set_userdata($array);
				$this->session->set_userdata('logged_in', TRUE);

                // Redirect berdasarkan role
                if ($data->role == 'admin') {
                    redirect('cdashboard/tampildata', 'refresh');
                } elseif ($data->role == 'user') {
                    redirect('chalaman/index', 'refresh');
                } else {
                    // jika ada role lain
                }
            } else {
                $this->session->set_flashdata('pesan', 'Login gagal...');
                echo "<script>alert('Password Salah');</script>";
                redirect('chalaman/login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Login gagal...');
            echo "<script>alert('Username tidak terdaftar');</script>";
            redirect('chalaman/login', 'refresh');
        }
    }
}
?>