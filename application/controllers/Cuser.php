<?php
	class Cuser extends CI_Controller
	{
		 public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('Mbuytest'); // Load the model
        	$this->load->library('session');
			$this->load->model('mpractice');	
		}

		function dashboardUser(){
			$id_user = $this->session->userdata('id_user');
			$data['current_credits'] = $this->Mbuytest->get_current_credits($id_user);
            $data['kontenuser']= $this->load->view('/dashUser/starttest',$data,TRUE);
			$this->load->view('/dashUser/Vuser',$data);
		}

		function practice(){
            $data['kontenuser'] = $this->load->view('/dashUser/practice',"", TRUE);
			$this->load->view('dashUser/vuser', $data);
        }
        
        function aboutTest(){
            $data['kontenuser'] = $this->load->view('/dashUser/aboutTest',"", TRUE);
			$this->load->view('dashUser/vuser', $data);
        }

		function aboutTest2(){
            $data['kontenuser'] = $this->load->view('/dashUser/aboutTest2',"", TRUE);
			$this->load->view('dashUser/vuser', $data);
        }

        function institution(){
            $data['kontenuser'] = $this->load->view('/dashUser/institution',"", TRUE);
			$this->load->view('dashUser/vuser', $data);
        }

		function testresults(){
			$id_user = $this->session->userdata('id_user');
    		$data['hasil'] = $this->mpractice->get_results_by_user($id_user);
            $data['kontenuser'] = $this->load->view('/dashUser/testresults', $data, TRUE);
			$this->load->view('dashUser/vuser', $data);
        }

		function buytest(){
			$id_user = $this->session->userdata('id_user');
			$data['hasil'] = $this->Mbuytest->get_test_credits_by_user($id_user);
			$data['current_credits'] = $this->Mbuytest->get_current_credits($id_user);
            $data['kontenuser'] = $this->load->view('/dashUser/buytest',$data, TRUE);
			$this->load->view('dashUser/vuser', $data);
        }

		public function view_certificate($id_hasil) {			
			// Fetch the test result based on the ID
			$result = $this->mpractice->get_test_result_by_id($id_hasil);
			
			if ($result) {
				// Pass the result data to the view
				$data['result'] = $result;
				$data['kontenuser'] = $this->load->view('/dashUser/certificate_preview',$data, TRUE);
				$this->load->view('dashUser/vuser', $data);
			} else {
				// Handle the case where the result is not found
				show_404();
			}
		}

	}
?>