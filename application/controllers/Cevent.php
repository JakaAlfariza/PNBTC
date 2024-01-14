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
			$this->load->library('form_validation');
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

			$this->form_validation->set_rules('nama_event','nama event','required|trim',
			['required'=>'Nama event harus diisi harus diisi!']);
			$this->form_validation->set_rules('gambar','Gambar','required|trim',['required'=>'gambar harus diisi!']);
			$this->form_validation->set_rules('thumbnail','Thumbnail','required|trim',['required'=>'Thumbnail harus diisi!']);
			$this->form_validation->set_rules('penyelenggara','Penyelenggara','required|trim',['required'=>'Penyelenggara harus diisi!']);
			$this->form_validation->set_rules('tgl_awal','Tanggal awal','required|trim',['required'=>'Tanggal awal harus diisi!']);
			$this->form_validation->set_rules('tgl_akhir','Tanggal akhir','required|trim',['required'=>'Tanggal akhir harus diisi!']);
			$this->form_validation->set_rules('tgl_event','Tanggal event','required|trim',['required'=>'Tanggal event harus diisi!']);
			$this->form_validation->set_rules('harga','Harga','required|trim',['required'=>'Harga harus diisi!']);
			$this->form_validation->set_rules('lokasi','Lokasi','required|trim',['required'=>'Lokasi harus diisi!']);
			$this->form_validation->set_rules('tingkat_event','Tingkat Event','required|trim',['required'=>'Tingkat event harus diisi!']);
			$this->form_validation->set_rules('deskripsi','Deskripsi','required|trim',['required'=>'Deskripsi harus diisi!']);
			$this->form_validation->set_rules('id_kategori','Kategori','required|trim',['required'=>'Kategori harus diisi!']);
			$this->form_validation->set_rules('link_daftar','Link pendaftaran','required|trim',['required'=>'Link pendaftaran harus diisi!']);
			if($this->form_validation->run()==false){
				$tampildata['hasil']=$this->mdataevent->tampildata();
				$data['kategoriData'] = $this->mdataevent->getKategoriData();
				$data['konten']=$this->load->view('/admin/event',$data,TRUE);
				$data['table']=$this->load->view('/admin/event_table',$tampildata,TRUE);
				$this->load->view('/admin/vadmin',$data);
			} else{
				$this->mdataevent->simpandata();
			}
			
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
			$event = $this->mdataevent->getEventSurat($id_event);
			$report['event']=$this->mdataevent->getEventSurat($id_event); 
			// var_dump($report);
			require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
			$pdf = new Dompdf\Dompdf();
			$filename = $event->nama_event . '.pdf';
			$pdf->setPaper('A4', 'potrait');
			$pdf->set_option('isRemoteEnabled', TRUE);
			$pdf->set_option('isHtml5ParserEnabled', true);
			$pdf->set_option('isPhpEnabled', true);
			$pdf->set_option('isFontSubsettingEnabled', true);
			
			$pdf->loadHtml($this->load->view('admin/cetak_pdf',$report, true));
			$pdf->render();
			$pdf->stream('Surat Pemberitahuan ' . $filename, ['Attachment' => 0]);
		}
	}
?>