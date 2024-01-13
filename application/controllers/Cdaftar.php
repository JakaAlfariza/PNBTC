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
			$this->form_validation->set_rules('nama','Nama','required|trim',['required'=>'nama harus diisi!']);
			$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]',
			['required'=>'Username harus diisi!','is_unique'=>'username sudah ada!']);
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]'
			,['required'=>'Email harus diisi!','valid_email'=>'Email tidak Valid!','is_unique'=>'Email sudah ada!']);
			$this->form_validation->set_rules('password','Password','required|trim|min_length[5]',
			['min_length'=>'Password minimal 5 kata','required'=>'Password harus diisi!']);
			$this->form_validation->set_rules('role','role','required|trim',['required'=>'role harus diisi!']);

			if($this->form_validation->run()==false){
				if ($this->session->userdata('role') === 'admin'){
					$tampilakun['hasil']=$this->mdaftar->tampilakun();
					$data['konten']=$this->load->view('/admin/daftar_admin','',TRUE);
					$data['table']=$this->load->view('/admin/daftar_table',$tampilakun,TRUE);
					$this->load->view('/admin/vadmin',$data);	
				}else{
					$this->load->view('/auth/daftar');	
				}
				
			} else{
				$this->mdaftar->simpandaftar();
			}
			
		}

		function tampilakun()
		{
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