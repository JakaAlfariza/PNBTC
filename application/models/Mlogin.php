<?php
	class Mlogin extends CI_Model
{
    function proseslogin()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password');

        $sql = "SELECT * FROM user WHERE username = ?";
        $query = $this->db->query($sql, array($username));

        if ($query->num_rows() > 0) {
            $data = $query->row();

            if (password_verify($password, $data->password)) {
                $array = array(
                    'id' => $data->id,
                    'username' => $data->username,
                    'email' => $data->email,
                    'role' => $data->role // assuming role is a field in your user table
                );

                $this->session->set_userdata($array);
				$this->session->set_userdata('logged_in', TRUE);

                // Redirect based on user role
                if ($data->role == 'admin') {
                    redirect('cdashboard/tampildata', 'refresh');
                } elseif ($data->role == 'user') {
                    redirect('chalaman/index', 'refresh');
                } else {
                    // Handle other roles or scenarios
                    // You can redirect to a default page or show an error message
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