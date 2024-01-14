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
        $this->Mprofile->simpanprofile();
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
