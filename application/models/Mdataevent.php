<?php
class Mdataevent extends CI_Model{
        function simpandata()
        {
            $data = $_POST;
            $pembuat_event = $this->session->userdata('id');
            $data['pembuat_event'] = $pembuat_event;

            $this->db->insert('event',$data);
            echo "<script>alert('Event berhasil disimpan');</script>";
            redirect('cevent/tampilevent','refresh');
        }

        function tampildata()
        {
            $sql=
            "
            select event.*, user.nama AS pembuat_event, kategori.nama_kategori as kategori
            FROM event
            JOIN user ON event.pembuat_event = user.id
            JOIN kategori ON event.kategori = kategori.id_kategori;
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

        function hapusdata($id_event)
        {
            $sql="delete from event where id_event='".$id_event."'";
            $this->db->query($sql);
            echo "<script>alert('Event berhasil dihapus');</script>";
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

        public function getKategoriData()
        {
            $query = $this->db->get('kategori');
            return $query->result();
        }

        public function get_events() {
            // Gantilah query di bawah ini sesuai dengan struktur tabel dan kolom database Anda
            $query = $this->db->get('event');
            return $query->result();
        }

    }
?>