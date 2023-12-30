<?php
class Cdashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasi();
        $this->load->model('mdashboard');
        if ($this->session->userdata('role') != 'admin') {
            redirect('chalaman/index');
        }
    }

    public function tampildata()
    {
        $data['eventCount'] = $this->mdashboard->getEventCounts();
        $data['userCount'] = $this->mdashboard->getUserCounts();
        $data['panitiaCount'] = $this->mdashboard->getPanitiaCounts();
        $data['konten'] = $this->load->view('/admin/dashboard', $data, TRUE);
        $this->load->view('/admin/vadmin', $data);
    }
}
?>
