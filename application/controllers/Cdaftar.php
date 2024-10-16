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
			$this->form_validation->set_rules('nama','Nama','required|trim',['required'=>'Input Your Name!']);
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]'
			,['required'=>'Input Your Email!','valid_email'=>'Email Not Valid!','is_unique'=>'Email Already Exist!']);
			$this->form_validation->set_rules('password','Password','required|trim|min_length[5]',
			['min_length'=>'Password Min 5 Character','required'=>'Input Your Password!']);
			$this->form_validation->set_rules('gender','gender','required|trim',['required'=>'Choose Gender!']);
			$this->form_validation->set_rules('tgl_lahir','tgl_lahir','required|trim',['required'=>'Choose Date of Birth!']);
			$this->form_validation->set_rules('confirm_password','Confirm Password','required|trim|min_length[5]|matches[password]',
			['min_length'=>'Password Min 5 Character','required'=>'Input Your Password!','matches' => 'Passwords do not match!']);

			if ($this->session->userdata('role') === 'admin'){
                $this->form_validation->set_rules('tipe_card','tipe_card','required|trim',['required'=>'Choose ID Type!']);
				$this->form_validation->set_rules('id_card','id_card','required|trim',['required'=>'Input ID Number!']);
				$this->form_validation->set_rules('role','role','required|trim',['required'=>'Choose Role!']);
				$this->form_validation->set_rules('credits','credits','required|trim',['required'=>'Input Credits!']);
            }
			if($this->form_validation->run()==false){
				if ($this->session->userdata('role') === 'admin'){
					$tampilakun['hasil']=$this->mdaftar->tampilakun();
					$data['konten']=$this->load->view('/admin/crud/daftar/daftar_admin','',TRUE);
					$data['table']=$this->load->view('/admin/crud/daftar/daftar_table',$tampilakun,TRUE);
					$this->load->view('/admin/vadmin',$data);	
				}else{
					$data['konten'] = $this->load->view('/auth/daftar',"", TRUE);
					$this->load->view('/auth/login_page', $data);
				}
				
			} else{
				$this->mdaftar->simpandaftar();
			}
			
		}

		//Admin Only
		function tampilakun()
		{
			$this->load->model('mvalidasi');
        	$this->mvalidasi->validasi();
			if ($this->session->userdata('role')=='user') {
				redirect('cuser/dashboarduser');
			}elseif ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
			$tampilakun['hasil']=$this->mdaftar->tampilakun();
			$data['konten']=$this->load->view('/admin/crud/daftar/daftar_admin','',TRUE);
			$data['table']=$this->load->view('/admin/crud/daftar/daftar_table',$tampilakun,TRUE);
			$this->load->view('/admin/vadmin',$data);
		}
	
		//Admin Only
		function hapusakun($id)
		{
			$this->load->model('mvalidasi');
        	$this->mvalidasi->validasi();
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
			$this->mdaftar->hapusakun($id);	
		}
		
		function getakun($id_user) {
    		$this->mdaftar->getakun($id_user);
		}

		function updateakun($id_user) {
			$this->mdaftar->updateakun($id_user);
		}
	}
?>