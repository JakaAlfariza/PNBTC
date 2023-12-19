<?php

class MlupaPass extends CI_Model
{
    function resetPass()
{
    $username = $this->input->post('username', true);
    $email = $this->input->post('email', true);

    $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
    $query = $this->db->query($sql, array($username, $email));

    if ($query->num_rows() > 0) {
        $data = $query->row();

        // Display a form to allow the user to enter a new password
        // Make sure to validate the form submission to ensure a valid new password

        echo '<form method="post" action="'.base_url('chalaman/updatepassword').'">';
        echo '<input type="hidden" name="user_id" value="'.$data->id.'">';
        echo '<input type="password" name="new_password" placeholder="Enter new password" required>';
        echo '<input type="password" name="confirm_password" placeholder="Confirm new password" required>';
        echo '<button type="submit">Change Password</button>';
        echo '</form>';
    } else {
        $this->session->set_flashdata('pesan', 'Password recovery failed...');
        echo "<script>alert('Username or email not found');</script>";
        redirect('chalaman/lupapass', 'refresh');
    }
}

function updatePass()
{
    // Handle the form submission to update the password
    // Validate the form data to ensure a valid new password

    $user_id = $this->input->post('user_id');
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

    $this->session->set_flashdata('pesan', 'Password updated successfully.');
    redirect('chalaman/login', 'refresh');
}

    

}

?>
