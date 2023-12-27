<?php
	class Cevent extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('mdataevent');
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
		}	

		function tampilevent(){
			$tampildata['hasil']=$this->mdataevent->tampildata();
			$data['konten']=$this->load->view('event','',TRUE);
			$data['table']=$this->load->view('event_table',$tampildata,TRUE);
			$this->load->view('vadmin',$data);
		
		}
		function updateEvent($id_event) {
			$this->mdataevent->updateEvent($id_event);
			
		}
		function simpandata(){
			$this->mdataevent->simpandata();
		}

		function hapusdata($id_event)
		{
			$this->mdataevent->hapusdata($id_event);	
		}

		function getEvent($id_event) {
			$this->mdataevent->getEvent($id_event);
		
		}
	}
?>