<?php
	class Csoal extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('msoal');
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
			$this->load->library('form_validation');
			$this->load->library('upload');
		}
		
		//BANK SOAL
		function tampilbanksoal(){
			$data['hasil'] = $this->msoal->get_all_banks();
			$data['konten'] = $this->load->view('/admin/crud/soal/banksoal', $data, TRUE);
			$this->load->view('/admin/vadmin', $data);
		}

		function simpanbanksoal(){
			$this->msoal->simpanbanksoal();
		}

		public function getbank($id_bank) {
			$data = $this->msoal->get_bank_by_id($id_bank);
			echo json_encode([$data]);
		}

		public function hapusdata($id_bank) {
			$this->msoal->delete_bank($id_bank);
			redirect('Csoal/tampilbanksoal');
		}

		public function updatebank($id_bank) {
			$this->msoal->updatebank($id_bank);
		}

		//SECTION
		public function tampilsection($id_bank) {
			$data['bank'] = $this->msoal->get_bank_by_id($id_bank);

			$data['id_bank'] = $id_bank;
			$data['sections'] = $this->msoal->get_sections_by_bank($id_bank);
			$data['konten'] = $this->load->view('/admin/crud/soal/section', $data, TRUE);
			$this->load->view('/admin/vadmin', $data);
		}

		public function simpanSection() {
			$this->msoal->simpansection();
		}

		public function getsection($id_section) {
			$data = $this->msoal->get_section_by_id($id_section);
			echo json_encode($data);
		}

		public function hapussection($id_section, $id_bank) {
			$this->msoal->delete_section($id_section);
			redirect('Csoal/tampilsection/' . $id_bank);
		}

		public function updatesection($id_section = null, $id_bank = null) {
			if ($id_section === null) {
				$id_section = $this->input->post('id_section');
			}
			if ($id_bank === null) {
				$id_bank = $this->input->post('id_bank');
			}
			
			$this->msoal->updatesection($id_section, $id_bank);
			redirect('Csoal/tampilsection/' . $id_bank);
		}

		//SOAL
		public function tampilsoal($id_section) {
			$this->load->model('msoal');
			$id_bank = $this->msoal->get_bank_id_by_section($id_section);
			$data['section'] = $this->msoal->get_section_by_id($id_section);

			$data['id_bank'] = $id_bank;
			$data['id_section'] = $id_section;
			$data['tipe_section'] = $this->msoal->get_tipe_section($id_section);
			$data['soal'] = $this->msoal->get_all_soal_by_section($id_section);
			$data['konten'] = $this->load->view('/admin/crud/soal/soal', $data, TRUE);
			$this->load->view('/admin/vadmin', $data);
		}

		public function get_tipe_section($id_section) {
			$this->load->model('msoal'); // Load your model

			// Fetch section data
			$section = $this->msoal->get_tipe_section($id_section);

			if ($section) {
				// Return JSON response
				echo json_encode([
					'tipe_section' => $section->tipe_section
				]);
			} else {
				// Handle case where section is not found
				echo json_encode([
					'tipe_section' => null
				]);
			}
		}

		public function simpanSoal() {
			$this->msoal->simpansoal();
			$id_section = $this->input->post('id_section');
			$id_bank = $this->input->post('id_bank');
			redirect("csoal/tampilsoal/$id_section/$id_bank");
		}

		public function hapussoal($id_soal, $id_section, $id_bank) {
			$this->msoal->delete_soal($id_soal);
			redirect('Csoal/tampilsoal/' . $id_section.'/'.$id_bank);
		}

		public function getsoal($id_soal) {
			$data = $this->msoal->get_soal_by_id($id_soal);
			echo json_encode($data);
		}

		public function updatesoal($id_soal = null, $id_section = null) {
			if ($id_soal === null) {
				$id_soal = $this->input->post('id_soal');
			}

			if ($id_section === null) {
				$id_section = $this->input->post('id_section');
			}
			
			$this->msoal->updatesoal($id_soal, $id_section);
			redirect("csoal/tampilsoal/$id_section");
		}

		public function preview($id_soal) {
			$this->load->model('msoal');
			$data['soal'] = $this->msoal->get_soal_by_id($id_soal);
			
			$data['konten'] = $this->load->view('/admin/crud/soal/preview_soal', $data, TRUE);
			$this->load->view('/admin/vadmin', $data);
		}


		// function cetakpdf($id_event)
		// {	
		// 	$event = $this->mdataevent->getEventSurat($id_event);
		// 	$report['event']=$this->mdataevent->getEventSurat($id_event); 
		// 	require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
		// 	$pdf = new Dompdf\Dompdf();
		// 	$filename = $event->nama_event . '.pdf';
		// 	$pdf->setPaper('A4', 'potrait');
		// 	$pdf->set_option('isRemoteEnabled', TRUE);
		// 	$pdf->set_option('isHtml5ParserEnabled', true);
		// 	$pdf->set_option('isPhpEnabled', true);
		// 	$pdf->set_option('isFontSubsettingEnabled', true);
			
		// 	$pdf->loadHtml($this->load->view('admin/cetak_pdf',$report, true));
		// 	$pdf->render();
		// 	$pdf->stream('Surat Pemberitahuan ' . $filename, ['Attachment' => 0]);
		// }
	}
?>