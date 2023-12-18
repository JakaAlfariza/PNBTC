<?php
	class Cadmin extends CI_Controller
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
		
		function vadmin()
		{
			$this->load->view('Vadmin');	
		}	
		
		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}
	}
?>