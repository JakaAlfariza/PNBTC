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

		function lupaPass()
		{
			$this->load->view('/auth/lupa_pass');
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
		
			$email = $this->input->post('email', true);
			$username = $this->input->post('username', true);
		
			// Call the resetPass method in the model
			if($this->mlupapass->resetPass($email, $username)) {
				// If the reset is successful, load the view to enter a new password
				$this->load->view('/auth/login','refresh');
			} else {
				// If the reset fails, redirect to the password recovery page
				redirect('chalaman/lupapass', 'refresh');
			}
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}
		
	}
?>