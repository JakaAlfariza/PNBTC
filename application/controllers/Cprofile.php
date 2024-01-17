<?php
class Cprofile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mprofile'); 
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasi();
    }

    function simpanprofile()
    {
    $id = $this->session->userdata('id'); 
    $this->Mprofile->simpanprofile($id);

    $new_user_data = array(
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
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
