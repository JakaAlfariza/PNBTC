<?php

class MlupaPass extends CI_Model
{
    function resetPass() 
    {
        // Inisialisai hasil input
        $email = $this->input->post('email', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // Memilih user sesuai email dan username
        $sql = "SELECT * FROM user WHERE email = ? AND username = ?";
        $query = $this->db->query($sql, array($email, $username));

        // Cek apakah ada data di database
        if ($query->num_rows() > 0) {
            $user_data = $query->row();

            // Proses Update
            if ($new_password === $confirm_password) {
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->update('user', array('password' => $hashed_new_password), array('id' => $user_data->id));

                echo "<script>alert('Password berhasil diubah');</script>";
                redirect('chalaman/login', 'refresh');
            }
        } else {
            echo "<script>alert('Username/Email tidak ada');</script>";
            redirect('chalaman/lupaPass', 'refresh');
        }
    }
}
?>
