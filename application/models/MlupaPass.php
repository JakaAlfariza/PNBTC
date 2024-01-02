<?php

class MlupaPass extends CI_Model
{
    function resetPass() 
    {
        $email = $this->input->post('email', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        $sql = "SELECT * FROM user WHERE email = ? AND username = ?";
        $query = $this->db->query($sql, array($email, $username));

        if ($query->num_rows() > 0) {
            $user_data = $query->row();

            // Check if new password and confirm password match
            if ($new_password === $confirm_password) {
                // Update the user's password in the database
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->update('user', array('password' => $hashed_new_password), array('id' => $user_data->id));

                // You can set a flash message or show a success message
                $this->session->set_flashdata('pesan', 'Password reset successful.');
                redirect('chalaman/login', 'refresh');
            } else {
                // Passwords do not match
                $this->session->set_flashdata('pesan', 'New password and confirm password do not match.');
                redirect('chalaman/lupaPass', 'refresh');
            }
        } else {
            // User with the given email and username not found
            $this->session->set_flashdata('pesan', 'Email and username do not match our records.');
            redirect('chalaman/lupaPass', 'refresh');
        }
    }
}
?>
