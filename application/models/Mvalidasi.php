<?php
class Mvalidasi extends CI_Model
{
    // Jika user tidak berhak akses
    public function validasi()
    {
        $this->load->library('session');

        if (!$this->session->userdata('logged_in'))
        {
            echo "<script>alert('You can't access this page or your has session ended..!');</script>";
            redirect('chalaman/login', 'refresh');
        }
    }

    // User perlu login untuk akses
    public function validasiEvent()
    {
        $this->load->library('session');

        if (!$this->session->userdata('logged_in'))
        {
            echo "<script>alert('Harap Login Terlebih Dahulu');</script>";
            redirect('chalaman/login', 'refresh');
        }
    }
}
?>