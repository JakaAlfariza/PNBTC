<?php
	class Chalaman extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mkarosel');
			$this->load->model('mdataevent');
			$this->load->model('memail');
		}

        function index()
		{
			if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
			}
			$data['karosel'] = $this->mkarosel->getCarouselImages();
			$data['events'] = $this->mdataevent->get_events();
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
			$this->load->view('/auth/daftar');	
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

			$this->load->view('/auth/login');	
		}

		function proseslogin()
		{
			if ($this->session->userdata('role')!=null) {
				
				redirect('chalaman/index');
			}
			$this->load->model('mlogin');
			$this->mlogin->proseslogin();	
		}

		function lupaPass()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}
			$this->load->view('/auth/lupa_pass');
		}

		function resetPass(){
			if ($this->session->userdata('role')!=null) {
				
				redirect('chalaman/index');
			}
			$this->load->model('mlupaPass');
			$this->mlupaPass->resetPass();	
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}

		function test(){
			$test = $this->db->query("SELECT * FROM user")->result();
			foreach ($test as $data) {
				$this->memail->send($data->email);
			}
		}
		
	}
?>