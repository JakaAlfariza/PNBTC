<?php
	class Chalaman extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mkarosel');
			$this->load->model('mdataevent');
			$this->load->model('memail');
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
			if ($this->session->userdata('role')!=null) {
				
				redirect('chalaman/index');
			}
			$this->load->model('mlogin');
			$this->mlogin->proseslogin();	
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
			if ($this->session->userdata('role')!=null) {
				
				redirect('chalaman/index');
			}
			$this->load->model('mlupaPass');
			$this->mlupaPass->resetPass();	
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('chalaman/login','refresh');	
		}

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