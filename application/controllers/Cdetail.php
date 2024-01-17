<?php
class Cdetail extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiEvent();
        $this->load->model('mdataevent');
        if ($this->session->userdata('role')=='admin') {
             redirect('cdashboard/tampildata');
        }
    }

    public function detailEvent($id_event) {
        $data['event'] = $this->mdataevent->getEventSurat($id_event); 
        $this->load->view('detailed_event_view', $data);
    }
}
?>