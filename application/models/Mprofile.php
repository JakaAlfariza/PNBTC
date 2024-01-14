<?php
class Mprofile extends CI_Model
{
    function simpanprofile($id)
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $username = $this->input->post('username');
    
        // Check if the new email already exists in the database
        $existing_email_check = $this->db->get_where('user', array('email' => $email, 'id !=' => $id));
        $existing_email_count = $existing_email_check->num_rows();
    
        // Check if the new username already exists in the database
        $existing_username_check = $this->db->get_where('user', array('username' => $username, 'id !=' => $id));
        $existing_username_count = $existing_username_check->num_rows();
    
        if ($existing_email_count > 0) {
            // Email already exists, handle the error
            echo "<script>alert('Email already exists');</script>";
            redirect('cprofile/tampilakun', 'refresh');
        } elseif ($existing_username_count > 0) {
            // Username already exists, handle the error
            echo "<script>alert('Username already exists');</script>";
            redirect('cprofile/tampilakun', 'refresh');
        } else {
            // Prepare data to update based on what is provided in the form
            $data_to_update = array();
    
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
    
            // Update only if there is data to update
            if (!empty($data_to_update)) {
                // Use the user's ID to update the specific user record
                $this->db->where('id', $id);
                $this->db->update('user', $data_to_update);
    
                echo "<script>alert('Data berhasil disimpan');</script>";
                redirect('cprofile/tampilakun', 'refresh');
            } else {
                echo "<script>alert('Tidak ada data yang diubah');</script>";
                redirect('cprofile/tampilakun', 'refresh');
            }
        }
    }
    




    function tampilakun()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    function hapusakun($id)
    {
    
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
?>
