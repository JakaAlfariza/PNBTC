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

		function tampil(){
			$tampildata['hasil']=$this->mdataevent->tampildata();
			$data['konten']=$this->load->view('event','',TRUE);
			$data['table']=$this->load->view('event_table',$tampildata,TRUE);
			$this->load->view('vadmin',$data);
		
		}

		function simpandata(){
			$this->mdataevent->simpandata();
		}

		function hapusdata($id_event)
		{
			$this->mdataevent->hapusdata($id_event);	
		}
	}
?>