<?php
class Cprofile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mprofile'); 
    }

    function simpanprofile()
{
    // Get the user ID from the session
    $id = $this->session->userdata('id');
    
    $this->Mprofile->simpanprofile($id);

    // Update session data with the new user details
    $new_user_data = array(
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        // Update other user details as needed
    );

    $this->session->set_userdata($new_user_data);
}


    function tampilakun()
    {
        $tampilakun['user'] = $this->Mprofile->tampilakun();
        $this->load->view('/admin/profile', $tampilakun);
    }

    function hapusakun($id)
    {
        $this->Mprofile->hapusakun($id);
    }
}
?>
