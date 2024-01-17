<?php
class Mprofile extends CI_Model
{
    function simpanprofile($id)
    {
        // Inisialisai hasil input
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $username = $this->input->post('username');
    
        // Check email apakah sudah ada di database
        $existing_email_check = $this->db->get_where('user', array('email' => $email, 'id !=' => $id));
        $existing_email_count = $existing_email_check->num_rows();
    
        // Check username apakah sudah ada di database
        $existing_username_check = $this->db->get_where('user', array('username' => $username, 'id !=' => $id));
        $existing_username_count = $existing_username_check->num_rows();

        $existing_data = $this->db->get_where('user', array('id' => $id))->row();
        
        // Cek apakah ada perubahan
        if ($existing_data->nama == $nama &&
            $existing_data->email == $email &&
            empty($password) &&
            $existing_data->username == $username
        ) {
            // Jika tidak ada perubahan
            echo "<script>alert('Tidak ada perubahan yang dibuat');</script>";
            redirect('cprofile/tampilakun', 'refresh');
        }

        // Cek email & username jika telah ada di database
        if ($existing_email_count > 0) {
            echo "<script>alert('Email telah terdaftar');</script>";
            redirect('cprofile/tampilakun', 'refresh');
        } elseif ($existing_username_count > 0) {
            echo "<script>alert('Username telah terdaftar');</script>";
            redirect('cprofile/tampilakun', 'refresh');
        } else {
            $data_to_update = array();

            // Jika kosong gunakan data yang sama
            if (!empty($nama)) {
                $data_to_update['nama'] = $nama;
            }
    
            if (!empty($email)) {
                $data_to_update['email'] = $email;
            }
    
            if (!empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $data_to_update['password'] = $hashed_password;
            }
    
            if (!empty($username)) {
                $data_to_update['username'] = $username;
            }
    
            // Proses Update
            if (!empty($data_to_update)) {
                $this->db->where('id', $id);
                $this->db->update('user', $data_to_update);

                echo "<script>alert('Perubahan berhasil disimpan, harap login kembali');</script>";
                $this->session->sess_destroy();
                redirect('chalaman/login', 'refresh');
            } else {
                echo "<script>alert('Tidak ada data yang diubah');</script>";
                redirect('cprofile/tampilakun', 'refresh');
            }
        }
    }

    // Mengambil value dari database
    function tampilakun()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    // Proses hapus akuun
    function hapusakun($id)
    {
    
        $this->db->where('id', $id);
        $this->db->delete('user');

        echo "<script>alert('Akun berhasil dihapus');</script>";
        $this->session->sess_destroy();
        redirect('chalaman/login', 'refresh');
    }
}
?>
