<?php
	class Cadmin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('mdataevent');
		}
		
		function vadmin()
		{
			$this->load->view('Vadmin');	
		}	

		function tampil(){
			$data['hasil'] = $this->mdataevent->tampildata();
			$this->load->view('vadmin',$data);
		
		}

		function simpandata(){
			$this->mdataevent->simpandata();
		}

		function hapusdata($id_event)
		{
			$this->mdataevent->hapusdata($id_event);	
		}
		
		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}
	}
?>