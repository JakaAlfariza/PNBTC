<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbuytest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mbuytest');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function buy() {
        $config['upload_path'] = './buy_material/';
        $config['allowed_types'] = 'gif|jpeg|png|jpg';
        $config['max_size'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_bayar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('success',"$error");
            redirect('cuser/buytest');
        } else {
            $data = $this->upload->data();
            $file_path = $data['file_name'];

            // Get the post data and clean it
            $jmlh_beli = $this->input->post('jmlh_beli');
            $total_bayar_raw = $this->input->post('total_bayar');

            // Remove 'Rp. ' and comma, then convert to integer
            $total_bayar = preg_replace('/[^0-9]/', '', $total_bayar_raw);

            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'tgl_bayar' => date('Y-m-d H:i:s'),
                'bukti_bayar' => $file_path,
                'jmlh_beli' => $jmlh_beli,
                'total_bayar' => $total_bayar, // Store only numerical value
                'status' => 'Pending'
            );

            $this->Mbuytest->insert_payment($data);
            $this->session->set_flashdata('success', 'Buy credits on progress, please wait until success.');
            redirect('cuser/buytest');
        }
    }
}
?>
