<?php
	class Ckategori extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('mkategori');
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
		}	

		function tampilkategori()
		{
			$tampilkategori['hasil']=$this->mkategori->tampilkategori();
			$data['konten']=$this->load->view('/admin/kategori','',TRUE);
			$data['table']=$this->load->view('/admin/kategori_table',$tampilkategori,TRUE);
			$this->load->view('/admin/vadmin',$data);
		}

		function simpankategori(){
			$this->mkategori->simpankategori();
		}

		function hapuskategori($id_kategori)
		{
			$this->mkategori->hapuskategori($id_kategori);	
		}

	}
?>