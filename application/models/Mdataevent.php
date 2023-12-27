<?php
class Mdataevent extends CI_Model{
        function simpandata()
        {
            $nama_event=$this->input->post('nama_event');
            $gambar=$this->input->post('gambar');
            $penyelenggara=$this->input->post('penyelenggara');
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $tgl_event=$this->input->post('tgl_event');
            $harga=$this->input->post('harga');
            $lokasi=$this->input->post('lokasi');
            $deskripsi=$this->input->post('deskripsi');
            $kategori=$this->input->post('kategori');
            $link_daftar=$this->input->post('link_daftar');
        
        
            $data=array(
                'nama_event'=>$nama_event,
                'gambar'=>$gambar,
                'penyelenggara'=>$penyelenggara,
                'tgl_awal'=>$tgl_awal,
                'tgl_akhir'=>$tgl_akhir,
                'tgl_event'=>$tgl_event,
                'harga'=>$harga,
                'lokasi'=>$lokasi,
                'deskripsi'=>$deskripsi,
                'kategori'=>$kategori,
                'link_daftar'=>$link_daftar
            );
        
            $this->db->insert('event',$data);
            $this->session->set_flashdata('pesan','Data berhasil disimpan');
            redirect('cevent/tampilevent','refresh');
        }

        function tampildata()
        {
            $sql="select * from event";
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

        function hapusdata($id_event)
        {
            $sql="delete from event where id_event='".$id_event."'";
            $this->db->query($sql);
            redirect('cevent/tampilevent','refresh');	
        }

        function updateEvent($id_event)
        {
            $data = $_POST;

            $condition = array('id_event' => $id_event);

            $response = $this->db->update('event',$data, $condition);
 
            
            redirect('cevent/tampilevent','refresh');	
        }


        function getEvent($id_event) {

            $this->db->select('*')->from('event')->where('id_event',$id_event);
            $data = $this->db->get()->result();

            echo json_encode($data);
            
        }
    }
?>