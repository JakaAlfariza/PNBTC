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

        // Use base_url to generate the correct URL
        redirect(base_url('cprofile/tampilakun'), 'refresh');
    }


    function tampilakun()
    {
        $data['user'] = $this->Mprofile->tampilakun();
        $this->load->view('/admin/profile', $data);
    }

    function hapusakun($id)
    {
        $this->Mprofile->hapusakun($id);
    }
}
?>
