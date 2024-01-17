<?php
	class Chalaman extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mkarosel');
			$this->load->model('mdataevent');
			$this->load->model('memail');
			$this->load->library('form_validation');
		}

        function index()
		{
			if ($this->session->userdata('role')=='admin') {
				redirect('cdashboard/tampildata');
			}
			$data['karosel'] = $this->mkarosel->getGambarKarosel();
			$data['event'] = $this->mdataevent->getEventIndex();
			$data['kategori'] = $this->mdataevent->getEventKategori();
			$this->load->view('index', $data);
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
			$this->load->view('/auth/daftar');	
		}

		function login()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}

			$this->load->view('/auth/login');	
		}

		function proseslogin()
		{
			$this->form_validation->set_rules('username','Username','required|trim',['required'=>'Username harus diisi!']);
			$this->form_validation->set_rules('password','Password','required|trim',['required'=>'Password harus diisi!']);
			

			if($this->form_validation->run()==false){
				$this->load->view('/auth/login');	
				
			} else{
				if ($this->session->userdata('role')!=null) {

					redirect('chalaman/index');
				}
				$this->load->model('mlogin');
				$this->mlogin->proseslogin();
			}
			
				
		}

		function lupaPass()
		{
			if ($this->session->userdata('role')!=null) {
				if ($this->session->userdata('role')=='admin') {
					redirect('cdashboard/tampildata');
				}elseif ($this->session->userdata('role')!='admin') {
					redirect('chalaman/index');
				}
				redirect('chalaman/index');
			}
			$this->load->view('/auth/lupa_pass');
		}

		function resetPass(){
			$this->form_validation->set_rules('username','Username','required|trim',['required'=>'Username harus diisi!']);
			$this->form_validation->set_rules('email','Email','required|trim|valid_email'
			,['required'=>'Email harus diisi!','valid_email'=>'Email tidak Valid!',]);
			$this->form_validation->set_rules('new_password','Password baru','required|trim|min_length[5]',
			['min_length'=>'Password minimal 5 kata','required'=>'Password harus diisi!']);
			$this->form_validation->set_rules('confirm_password','Password baru','required|trim|min_length[5]|matches[new_password]',
			['min_length'=>'Password minimal 5 kata','required'=>'Konfirmasi password harus diisi!','matches'=>'password tidak sama']);
			if($this->form_validation->run()==false){
				$this->load->view('/auth/lupa_pass');	
				
			} else{
				if ($this->session->userdata('role')!=null) {
				
					redirect('chalaman/index');
				}
				$this->load->model('mlupaPass');
				$this->mlupaPass->resetPass();	
			}
			
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}

		//Untuk mengirim notif ke semua user diteruskan ke MEmail
		function mailing(){
			$mailing = $this->db->query("SELECT * FROM user")->result();
			foreach ($mailing as $data) {
				$this->memail->send($data->email);
			}
		}

		public function searchEvent() {
			$query = $this->input->get('query');

			$suggestions = $this->mdataevent->searchEvent($query);

			$data['event'] = $suggestions;
			$this->load->view('hasil_search', $data);
		}

	}
?>