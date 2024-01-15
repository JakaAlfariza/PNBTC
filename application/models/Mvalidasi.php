<?php
class Mvalidasi extends CI_Model
{
    public function validasi()
    {
        // Load the session library if it's not autoloaded
        $this->load->library('session');

        // Check if the user is not logged in
        if (!$this->session->userdata('logged_in'))
        {
            // You may customize the message and redirect URL
            echo "<script>alert('Anda tidak dapat mengakses halaman ini..!');</script>";
            redirect('chalaman/login', 'refresh');
        }
    }
    public function validasiEvent()
    {
        // Load the session library if it's not autoloaded
        $this->load->library('session');

        // Check if the user is not logged in
        if (!$this->session->userdata('logged_in'))
        {
            // You may customize the message and redirect URL
            echo "<script>alert('Harap Login Terlebih Dahulu');</script>";
            redirect('chalaman/login', 'refresh');
        }
    }
}
?>