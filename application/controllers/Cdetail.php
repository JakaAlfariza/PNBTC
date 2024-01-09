<?php
class Cdetail extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasi();
        $this->load->model('mdataevent');
    }
     function detailEvent($id_event) {
        $data['event'] = $this->mdataevent->getEvent($id_event);
        $this->load->view('detailed_event_view', $data);
    }
}

?>