<?php
class Mlogin extends CI_Model
{
    function proseslogin()
    {
        // Inisialisai hasil input
        $email = $this->input->post('email', true);
        $password = $this->input->post('password');

        // Memilih user sesuai email dan password
        $sql = "SELECT * FROM user WHERE email = ?";
        $query = $this->db->query($sql, array($email));

        // Cek apakah ada data di database
        if ($query->num_rows() > 0) {
            $data = $query->row();

            // Cek apakah password sesuai
            if (password_verify($password, $data->password)) {
                $array = array(
                    'id_user' => $data->id_user,
                    'tipe_card' => $data->tipe_card,
                    'id_card' => $data->id_card,
                    'email' => $data->email,
                    'nama' => $data->nama,
                    'tgl_lahir' => $data->tgl_lahir,
                    'foto' => $data->foto,
                    'gender' => $data->gender,
                    'status' => $data->status,
                    'role' => $data->role,
                    'credits' => $data->credits,
                );

                $this->session->set_userdata($array);
				$this->session->set_userdata('logged_in', TRUE);

                // Redirect berdasarkan role
                if ($data->role == 'admin') {
                    redirect('cdashboard/tampildata', 'refresh');
                } else{
                    redirect('cuser/dashboardUser', 'refresh');
                }
            } else {
                $this->session->set_flashdata('error', 'Wrong Password!');
                redirect('chalaman/login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Email is not registered!');
            redirect('chalaman/login', 'refresh');
        }
    }
}
?>