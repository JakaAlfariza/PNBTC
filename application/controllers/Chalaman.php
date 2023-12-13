<?php
	class Chalaman extends CI_Controller
	{
        function index()
		{
			$this->load->view('index');	
		}

		function daftar()
		{
			$this->load->view('daftar');	
		}

		function login()
		{
			$this->load->view('login');	
		}

		function proseslogin()
		{
			$this->load->model('mlogin');
			$this->mlogin->proseslogin();	
		}

		public function logout()
		{
    		$this->session->sess_destroy();
    		redirect('chalaman/login', 'refresh');
		}
	}
?>