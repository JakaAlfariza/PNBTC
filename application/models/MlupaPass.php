<?php

class MlupaPass extends CI_Model
{
    function resetPass($email, $username) {
        $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
        $query = $this->db->query($sql, array($username, $email));
    
        if ($query->num_rows() > 0) {
            $data = $query->row();
    
            // Store user data in session for later use
            $this->session->set_userdata('reset_user_id', $data->id);
    
            return true;
        } else {
            $this->session->set_flashdata('pesan', 'Password recovery failed...');
            echo "<script>alert('Username or email not found');</script>";
            return false;
        }
    }

    function updatePass() {
        // Handle the form submission to update the password
        // Validate the form data to ensure a valid new password

        $user_id = $this->session->userdata('reset_user_id');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // Example validation:
        if ($new_password != $confirm_password) {
            echo "<script>alert('Passwords do not match');</script>";
            redirect('chalaman/recover', 'refresh');
        }

        // Hash and update the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->where('id', $user_id);
        $this->db->update('user', array('password' => $hashed_password));

        // Clear the stored user data from the session
        $this->session->unset_userdata('reset_user_id');

        $this->session->set_flashdata('pesan', 'Password updated successfully.');
        redirect('chalaman/login', 'refresh');
    }
}


?>
