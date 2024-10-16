<?php
class Cdashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasi();
        $this->load->model('mdashboard');
        if ($this->session->userdata('role') != 'admin') {
            redirect('chalaman/index');
        }
        $this->load->model('Mbuytest');
        $this->load->model('mpractice');
    }

    public function tampildata()
    {
        $data['soalCount'] = $this->mdashboard->getSoalCounts();
        $data['userCount'] = $this->mdashboard->getUserCounts();
        $data['adminCount'] = $this->mdashboard->getAdminCounts();
        $data['konten'] = $this->load->view('/admin/dashboard', $data, TRUE);
        $this->load->view('/admin/vadmin', $data);
    }

    public function tampilhasil()
    {
        $data['hasil'] = $this->mpractice->get_all_results();
        $data['konten'] = $this->load->view('/admin/hasil_ujian', $data, TRUE);
        $this->load->view('/admin/vadmin', $data);
    }

    public function tampilcredits()
    {
        $this->load->model('Mbuytest');
        $data['test_credits'] = $this->Mbuytest->get_all_credits();
        $data['konten'] = $this->load->view('/admin/credits', $data, TRUE);
        $this->load->view('/admin/vadmin', $data);
    }

    public function accept_credit() {
        $id = $this->input->post('id_bayar');
        if ($id) {
            if ($this->Mbuytest->accept_credit($id)) {
                echo 'success';
            } else {
                log_message('error', 'Failed to accept credit for id_bayar: ' . $id);
                echo 'error';
            }
        } else {
            log_message('error', 'ID not received in accept_credit.');
            echo 'error';
        }
    }

    public function decline_credit() {
        $id = $this->input->post('id_bayar');
        if ($id) {
            if ($this->Mbuytest->decline_credit($id)) {
                echo 'success';
            } else {
                log_message('error', 'Failed to decline credit for id_bayar: ' . $id);
                echo 'error';
            }
        } else {
            log_message('error', 'ID not received in decline_credit.');
            echo 'error';
        }
    }

    public function hapushasil($id_hasil) {
        $this->mpractice->delete_result($id_hasil);
        $this->session->set_flashdata('success', 'Data Successfully Deleted.');
        redirect('cdashboard/tampilhasil', 'refresh');
    }

    public function view_certificate($id_hasil) {			
        // Fetch the test result based on the ID
        $result = $this->mpractice->get_test_result_by_id($id_hasil);
        
        if ($result) {
            // Pass the result data to the view
            $data['result'] = $result;
            $data['konten'] = $this->load->view('/dashUser/certificate_preview',$data, TRUE);
            $this->load->view('/admin/vadmin', $data);
        } else {
            // Handle the case where the result is not found
            show_404();
        }
    }
}
?>
