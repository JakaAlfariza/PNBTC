<?php
	class Cevent extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			$this->load->model('mdataevent');
			if ($this->session->userdata('role')!='admin') {
				redirect('chalaman/index');
			}
		}	

		function tampilevent(){
			$tampildata['hasil']=$this->mdataevent->tampildata();
			$data['kategoriData'] = $this->mdataevent->getKategoriData();
			$data['konten']=$this->load->view('/admin/event',$data,TRUE);
			$data['table']=$this->load->view('/admin/event_table',$tampildata,TRUE);
			$this->load->view('/admin/vadmin',$data);
		
		}
		function updateEvent($id_event) {
			$this->mdataevent->updateEvent($id_event);
			
		}
		function simpandata(){
			$this->mdataevent->simpandata();
		}

		function hapusdata($id_event)
		{
			$this->mdataevent->hapusdata($id_event);	
		}

		function getEvent($id_event) {
			$this->mdataevent->getEvent($id_event);
		
		}
		
		public function detailEvent($id_event) {
			
			$this->load->view('detailed_event_view');
		}
		
		function cetakpdf($id_event)
		{	
			$report['event']=$this->mdataevent->getEventSurat($id_event); 
			// var_dump($report);
			require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
			$pdf = new Dompdf\Dompdf();
			$pdf->setPaper('A4', 'potrait');
			$pdf->set_option('isRemoteEnabled', TRUE);
			$pdf->set_option('isHtml5ParserEnabled', true);
			$pdf->set_option('isPhpEnabled', true);
			$pdf->set_option('isFontSubsettingEnabled', true);
			
			$pdf->loadHtml($this->load->view('admin/cetak_pdf',$report, true));
			$pdf->render();
			$pdf->stream('NamaFile.pdf', ['Attachment' => 0]);	

		}

	}
?>