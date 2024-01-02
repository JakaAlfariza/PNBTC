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
			// Set form validation rules
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
				'required' => 'Masukan username',
				'is_unique' => 'Username telah terdaftar'
			]);

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
				'required' => 'Masukan email',
				'is_unique' => 'Email telah terdaftar',
				'valid_email' => 'Email salah'
			]);

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
				'required' => 'Masukan nama',
			]);

			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]', [
				'required' => 'Masukan password',
				'min_length' => 'Password minimal 5 karakter'
			]);

			$this->form_validation->set_rules('role', 'Role', 'trim|required', [
				'required' => 'Masukan Role',
			]);

			// Run the form validation
			if ($this->form_validation->run() == FALSE) {
            // Form validation failed, return to the view
				$this->tampilakun(); // You should load your view here
				return;
			}
			
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