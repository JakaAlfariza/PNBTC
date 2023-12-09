<?php
	class Chalaman extends CI_Controller
	{
        function index()
		{
			$this->load->view('index');	
		}

		function login()
		{
			$this->load->view('login');	
		}
		
		function daftar()
		{
			$this->load->view('daftar');	
		}

		function proseslogin()
		{
			$this->load->model('mlogin');
			$this->mlogin->proseslogin();	
		}
	}
?>