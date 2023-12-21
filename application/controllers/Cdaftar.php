<?php
	class Cdaftar extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('mdaftar');
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
		}	

		function simpandaftar()
		{
			$this->load->model('mdaftar');
			$this->mdaftar->simpandaftar();
		}

		function tampilakun(){
			$tampilakun['hasil']=$this->mdaftar->tampilakun();
			$data['konten']=$this->load->view('daftar_admin','',TRUE);
			$data['table']=$this->load->view('daftar_table',$tampilakun,TRUE);
			$this->load->view('vadmin',$data);
		
		}
	
		function hapusakun($id)
		{
			$this->mdaftar->hapusakun($id);	
		}
	}
?>