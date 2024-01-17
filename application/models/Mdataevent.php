<?php
class Mdataevent extends CI_Model{

        public function __construct()
        {
            parent::__construct();
            //load model untuk kirim email
            $this->load->model('memail');
        }

        function simpandata()
        {
            $data = $_POST;
            $id_user = $this->session->userdata('id');
            $data['id_user'] = $id_user;
            unset($data['notif']); //agar value tidak masuk ke database

            $this->db->insert('event',$data);

            $notif = $this->input->post('notif');
            
            //Jika notif di ceklis
            if($notif == "on"){
                $link = base_url('cdetail/detailEvent/'.$this->db->insert_id());
    
                $item = $this->db->query("SELECT * FROM user")->result();
                foreach ($item as $data) {
                    $this->memail->send($link,$data->email);
                }
            }
        
            echo "<script>alert('Event berhasil disimpan');</script>";
            redirect('cevent/tampilevent','refresh');
        }

        function tampildata()
        {
            $sql=
            "
            select event.*, user.nama AS id_user, kategori.nama_kategori as id_kategori
            FROM event
            INNER JOIN user ON event.id_user = user.id
            INNER JOIN kategori ON event.id_kategori = kategori.id_kategori;
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
            $id_user = $this->session->userdata('id');
            $data['id_user'] = $id_user;

            $condition = array('id_event' => $id_event);
            $response = $this->db->update('event',$data, $condition);
            redirect('cevent/tampilevent','refresh');	
        }

        //Mengambil value untuk Edit event ajax
        function getEvent($id_event) 
        {
            $this->db->select('*')->from('event')->where('id_event',$id_event);
            $data = $this->db->get()->result();

            echo json_encode($data);
            
        }

        //Mengambil value untuk simpan dan tampil pada event
        public function getKategoriData()
        {
            $query = $this->db->get('kategori');
            return $query->result();
        }

        //Mengambil value untuk print surat
        function getEventSurat($id_event) {
        return $this->db->select('*')->from('event')->where('id_event',$id_event)->get()->first_row(); 
        }        

        //Mengambil value untuk menampilkan event di Index
        public function getEventIndex() 
        {
            $query = $this->db->get('event');
            return $query->result();
        }
        
        //Mengambil value dari kategori untuk menampilkan event di Index
        public function getEventKategori() {
            $this->db->distinct();
            $this->db->select('kategori.id_kategori, kategori.nama_kategori');
            $this->db->from('event');
            $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori');
            
            $query = $this->db->get();

            return $query->result();
        }

        //Mengambil value hasil search
        public function searchEvent($query) {
            $this->db->select('id_event, nama_event, penyelenggara, thumbnail');
            $this->db->like('nama_event', $query);
            $this->db->or_like('penyelenggara', $query);

            $result = $this->db->get('event');

            return $result->result();
        }

    }
?>