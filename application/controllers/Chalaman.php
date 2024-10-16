<?php
	class Chalaman extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('memail');
			$this->load->library('form_validation');
		}

        function index()
		{
			if ($this->session->userdata('role')=='admin') {
				redirect('cdashboard/tampildata');
			}
			$this->load->view('index');
		}

		function contactus(){
			$this->load->view('contactus');
		}

		function institutions(){
			$this->load->view('institutions');
		}

		function test_info(){
			$this->load->view('test_info');
		}

		//PROSES LOGIN & SESSION
		public function login()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}
			$data['konten'] = $this->load->view('/auth/login',"", TRUE);
			$this->load->view('/auth/login_page', $data);
		}

		public function lupa_pass()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}
			$data['konten'] = $this->load->view('/auth/lupa_pass',"", TRUE);
			$this->load->view('/auth/login_page', $data);
		}

		public function reset_pass()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}
			$data['konten'] = $this->load->view('/auth/reset_pass',"", TRUE);
			$this->load->view('/auth/login_page', $data);
		}

		function proseslogin()
		{
			$this->form_validation->set_rules('email','Email','required|trim|valid_email[user.email]'
			,['required'=>'Input Email!','valid_email'=>'Email Not Valid!']);
			$this->form_validation->set_rules('password','Password','required|trim|min_length[5]',
			['min_length'=>'Password Min 5 Number','required'=>'Input Password!']);

			if($this->form_validation->run()==false){
				if ($this->session->userdata('role') === 'admin'){
					$data['konten']=$this->load->view('/admin/daftar_admin','',TRUE);
					$this->load->view('/admin/vadmin',$data);	
				}else{
					$data['konten']=$this->load->view('/auth/login','',TRUE);
					$this->load->view('/auth/login_page',$data);	
				}
			} else{
				if ($this->session->userdata('role')!=null) {

					redirect('chalaman/index');
				}
				$this->load->model('mlogin');
				$this->mlogin->proseslogin();
			}
			
				
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}

		function daftar()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}
			$data['konten'] = $this->load->view('/auth/daftar',"", TRUE);
			$this->load->view('/auth/login_page', $data);
		}

		//Untuk mengirim notif ke semua user diteruskan ke MEmail
		// function mailing(){
		// 	$mailing = $this->db->query("SELECT * FROM user")->result();
		// 	foreach ($mailing as $data) {
		// 		$this->memail->send($data->email);
		// 	}
		// }
	}
?>