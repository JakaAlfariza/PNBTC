<?php
	class Cdashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('mdashboard');
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
		}

		public function tampilevent()
    	{
        $data['eventCount'] = $this->mdashboard->getEventCounts();
		$data['konten']=$this->load->view('dashboard',$data,TRUE);
        $this->load->view('vadmin', $data);
    	}	

		public function tampiluser()
    	{
        $data['userCount'] = $this->mdashboard->getUserCounts();
		$data['konten']=$this->load->view('dashboard',$data,TRUE);
        $this->load->view('vadmin', $data);
    	}
		
		public function tampilpanitia()
    	{
        $data['panitiaCount'] = $this->mdashboard->getPanitiaCounts();
		$data['konten']=$this->load->view('dashboard',$data,TRUE);
        $this->load->view('vadmin', $data);
    	}
	}
?>