<?php
	class Cdaftar extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mdaftar');
			$this->load->library('form_validation');
		}	

		public function simpandaftar()
		{
			$this->mdaftar->simpandaftar();
			
		}

		function tampilakun(){
			$tampilakun['hasil']=$this->mdaftar->tampilakun();
			$data['konten']=$this->load->view('/admin/daftar_admin','',TRUE);
			$data['table']=$this->load->view('/admin/daftar_table',$tampilakun,TRUE);
			$this->load->view('/admin/vadmin',$data);
		
		}
	
		function hapusakun($id)
		{
			$this->mdaftar->hapusakun($id);	
		}
		
	}
?>