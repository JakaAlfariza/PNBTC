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
        $id_user = $this->session->userdata('id_user'); 
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
        ['required'=>'Input Email!','valid_email'=>'Email Not Valid!']);
        $this->form_validation->set_rules('nama', 'Name', 'required',
        ['required'=>'Input Name!']);
        $this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required',
        ['required'=>'Input Date of Birth!']);
        $this->form_validation->set_rules('gender', 'Gender', 'required',
        ['required'=>'Choose Gender!']);
        $this->form_validation->set_rules('tipe_card', 'Card Type', 'required',
        ['required'=>'Choose Card Type!']);
        $this->form_validation->set_rules('id_card', 'ID Card', 'required',
        ['required'=>'Input ID Card Number!']);
        $this->form_validation->set_rules('status', 'Status', 'required',
        ['required'=>'Choose Status!']);

        // Check if validation passes
        if ($this->form_validation->run() === FALSE) {
            $this->tampilakun();
        } else {
            $this->Mprofile->simpanprofile($id_user);
        }
    }


    public function tampilakun()
    {
        $active_tab = $this->input->get('tab');

        $tampilakun['user'] = $this->Mprofile->tampilakun();
        $tampilakun['active_tab'] = $active_tab;

        $this->load->view('/admin/profile', $tampilakun);
    }


    function hapusakun()
    {
        $id_user = $this->session->userdata('id_user');
        $this->Mprofile->hapusakun();
    }

    public function uploadfoto()
    {
        $id_user = $this->session->userdata('id_user');
        $this->Mprofile->uploadfoto();
    }

    public function updatepassword() {
        $this->form_validation->set_rules('current_password','Current Password','required|trim|min_length[5]',
        ['min_length'=>'Password Min 5 Character','required'=>'Input Your Current Password!']);
         $this->form_validation->set_rules('new_password','New Password','required|trim|min_length[5]',
        ['min_length'=>'Password Min 5 Character','required'=>'Input Your New Password!']);
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|trim|min_length[5]|matches[password]',
        ['min_length'=>'Password Min 5 Character','required'=>'Input Your Confirm Password!','matches' => 'Passwords do not match!']);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('cprofile/tampilakun#password');
        } else {
            $this->Mprofile->simpanpassword($id_user,$new_password);
        }
    }
}
?>
