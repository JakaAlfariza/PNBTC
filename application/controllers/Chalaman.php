<?php
	class Chalaman extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

        function index()
		{
			if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
			}
			$this->load->view('index');	
		}

		function daftar()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}
			$this->load->view('daftar');	
		}

		function login()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}

			$this->load->view('login');	
		}

		function proseslogin()
		{
			if ($this->session->userdata('role')!=null) {
				
				redirect('chalaman/index');
			}
			$this->load->model('mlogin');
			$this->mlogin->proseslogin();	
		}

		
	}
?>