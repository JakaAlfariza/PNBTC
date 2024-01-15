<?php
	class Ckarosel extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('mkarosel');
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
			$this->load->library('form_validation');
			
		}	

		function tampilkarosel()
		{
			$tampildata['hasil']=$this->mkarosel->tampildata();
			$data['konten']=$this->load->view('/admin/karosel','',TRUE);
			$data['table']=$this->load->view('/admin/karosel_table',$tampildata,TRUE);
			$this->load->view('/admin/vadmin',$data);
		
		}

		function simpandata(){
			$this->form_validation->set_rules('nama_karosel','Nama karosel','required|trim',['required'=>'Nama karosel harus diisi harus diisi!']);
			$this->form_validation->set_rules('nama_sponsor','Nama sponsor','required|trim',['required'=>'Nama sponsor harus diisi!']);
			if($this->form_validation->run()==false){
				$tampildata['hasil']=$this->mkarosel->tampildata();
				$data['konten']=$this->load->view('/admin/karosel','',TRUE);
				$data['table']=$this->load->view('/admin/karosel_table',$tampildata,TRUE);
				$this->load->view('/admin/vadmin',$data);
			} else{
				$this->mkarosel->simpandata();
			}
			
		}

		function hapusdata($id_karosel)
		{
			$this->mkarosel->hapusdata($id_karosel);	
		}

		function updatekarosel($id_karosel) 
		{
			$this->mkarosel->updatekarosel($id_karosel);
			
		}

		function getkarosel($id_karosel) 
		{
			$this->mkarosel->getkarosel($id_karosel);
		
		}

	}
?>