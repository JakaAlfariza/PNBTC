<?php
	class Cprofile extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mprofile');
		}	

		function simpanprofile()
		{
			$this->load->model('mprofile');
			$this->mprofile->simpanprofile();
		}

		function tampilakun(){
			$tampilakun['hasil']=$this->mprofile->tampilakun();
			$this->load->view('/admin/profile',$tampilakun);
		
		}
	
		function hapusakun($id)
		{
			$this->mprofile->hapusakun($id);	
		}
		
	}
?>