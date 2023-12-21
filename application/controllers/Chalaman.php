<?php
	class Chalaman extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mkarosel');
		}

        function index()
		{
			if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
			}
			$data['karosel'] = $this->mkarosel->getCarouselImages();
			$this->load->view('index', $data);
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

		function lupaPass()
		{
			$this->load->view('lupa_pass');
		}

		function proseslogin()
		{
			if ($this->session->userdata('role')!=null) {
				
				redirect('chalaman/index');
			}
			$this->load->model('mlogin');
			$this->mlogin->proseslogin();	
		}

		function prosesReset(){
			$this->load->model('mlupapass');
			$this->mlupapass->resetPass();
			$this->mlupapass->updatePass();
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}
		
	}
?>