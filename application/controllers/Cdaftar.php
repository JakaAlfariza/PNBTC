<?php
	class Cdaftar extends CI_Controller
	{
		function simpandaftar()
		{
			$this->load->model('mdaftar');
			$this->mdaftar->simpandaftar();
		}
		
		
	}
?>