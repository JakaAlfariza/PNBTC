<?php
class Motp extends CI_Model {

    public function storeOtp($email, $otp) {
        $data = array(
            'email' => $email,
            'otp' => $otp,
            'otp_expiry' => date('Y-m-d H:i:s', strtotime('+5 minutes'))
        );
        $this->db->replace('otp_table', $data);
    }

    public function verifyOtp($email, $otp) {
        $this->db->where('email', $email);
        $this->db->where('otp', $otp);
        $this->db->where('otp_expiry >=', date('Y-m-d H:i:s'));
        $query = $this->db->get('otp_table');
        
        if ($query->num_rows() > 0) {
            // Delete the OTP after successful verification
            $this->deleteOtp($email);
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($email, $new_password) {
        $data = array(
            'password' => password_hash($new_password, PASSWORD_BCRYPT)
        );
        $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }

    public function isEmailRegistered($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->num_rows() > 0;
    }

    public function deleteOtp($email) {
        $this->db->where('email', $email);
        return $this->db->delete('otp_table');
    }
}
?>
