<?php
class Mkarosel extends CI_Model{
        function simpandata()
        {
            //Konfigurasi Upload
            $config['upload_path']   = './images/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = 10240;
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            //Jika ada gambar yang diupload
            if ($this->upload->do_upload('gambar_k')) {
                $gambar_k = $this->upload->data('file_name');

                $nama_karosel = $this->input->post('nama_karosel', TRUE);
                $nama_sponsor = $this->input->post('nama_sponsor', TRUE);

                $data = array(
                    'nama_karosel' => $nama_karosel,
                    'gambar_k' => $gambar_k,
                    'nama_sponsor' => $nama_sponsor,
                );

                $id_user = $this->session->userdata('id');
                $data['id_user'] = $id_user;

                $this->db->insert('karosel', $data);
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                echo "<script>alert('Karosel berhasil disimpan');</script>";
                redirect('ckarosel/tampilkarosel', 'refresh');

            //Jika gambar kosong atau tidak sesuai
            } else {
                $this->form_validation->set_rules('gambar_k','Gambar karosel','required',['required'=>'Gambar karosel harus diisi/format gambar salah!']);
                if($this->form_validation->run()==false){
                    $tampildata['hasil']=$this->mkarosel->tampildata();
                    $data['konten']=$this->load->view('/admin/karosel','',TRUE);
                    $data['table']=$this->load->view('/admin/karosel_table',$tampildata,TRUE);
                    $this->load->view('/admin/vadmin',$data);
                } else{
                    $this->mkarosel->simpandata();
                }
            }
        }


        function tampildata()
        {
            $sql=
            "
            select karosel.*, user.nama AS id_user
            FROM karosel
            JOIN user ON karosel.id_user = user.id
            ";
            $query= $this->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    $hasil[]=$row; 
                }
                }
                else{
                    $hasil="";
        
                }
                return $hasil;
        }

        function hapusdata($id_karosel)
        {
            $sql="delete from karosel where id_karosel='".$id_karosel."'";
            $this->db->query($sql);
            echo "<script>alert('Karosel berhasil dihapus');</script>";
            redirect('ckarosel/tampilkarosel','refresh');	
        }

        public function updatekarosel($id_karosel)
        {
            //konfigurasi Upload Update
            $id_karosel = $this->db->escape_str($id_karosel);
            $config['upload_path']   = './images/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = 10240;
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            //Jika tidak ada gambar yang diupdate
            if (!$this->upload->do_upload('gambar_k')) {
                $nama_karosel = $this->input->post('nama_karosel', TRUE);
                $nama_sponsor = $this->input->post('nama_sponsor', TRUE);

                $data = array(
                    'nama_karosel' => $nama_karosel,
                    'nama_sponsor' => $nama_sponsor,
                );

                $id_user = $this->session->userdata('id');
                $data['id_user'] = $id_user;

                $this->db->where('id_karosel', $id_karosel);
                $this->db->update('karosel', $data);
                echo "<script>alert('Karosel berhasil diubah');</script>";
                redirect('ckarosel/tampilkarosel', 'refresh');

            //Jika ada gambar yang diupdate
            } else {
                $gambar_k = $this->upload->data();
                $gambar_k = $gambar_k['file_name'];
                $nama_karosel = $this->input->post('nama_karosel', TRUE);
                $nama_sponsor = $this->input->post('nama_sponsor', TRUE);

                $data = array(
                    'nama_karosel' => $nama_karosel,
                    'gambar_k' => $gambar_k,
                    'nama_sponsor' => $nama_sponsor,
                );

                $id_user = $this->session->userdata('id');
                $data['id_user'] = $id_user;


                $this->db->where('id_karosel', $id_karosel);
                $this->db->update('karosel', $data);
                echo "<script>alert('Karosel berhasil diubah');</script>";
                redirect('ckarosel/tampilkarosel', 'refresh');
            }
        }

        //Mengambil value karosel untuk preview
        function getkarosel($id_karosel) {

            $this->db->select('*')->from('karosel')->where('id_karosel',$id_karosel);
            $data = $this->db->get()->result();

            echo json_encode($data);
            
        }

        //Mengambil value karosel untuk tampil di index
        public function getGambarKarosel()
        {
            $query = $this->db->get('karosel');
            return $query->result();
        }

    }
?>