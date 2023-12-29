<?php
class Mkarosel extends CI_Model{
        function simpandata()
        {
            $nama_karosel=$this->input->post('nama_karosel');
            $gambar_k=$this->input->post('gambar_k');
            $nama_sponsor=$this->input->post('nama_sponsor');
        
            $data=array(
                'nama_karosel'=>$nama_karosel,
                'gambar_k'=>$gambar_k,
                'nama_sponsor'=>$nama_sponsor,
            );
        
            $this->db->insert('karosel',$data);
            $this->session->set_flashdata('pesan','Data berhasil disimpan');
            redirect('ckarosel/tampilkarosel','refresh');
        }

        function tampildata()
        {
            $sql="select * from karosel";
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
            redirect('ckarosel/tampilkarosel','refresh');	
        }

        public function getCarouselImages()
        {
            $query = $this->db->get('karosel');
            return $query->result();
        }

        function updatekarosel($id_karosel)
        {
            $data = $_POST;

            $condition = array('id_karosel' => $id_karosel);

            $response = $this->db->update('karosel',$data, $condition);
 
            
            redirect('ckarosel/tampilkarosel','refresh');	
        }


        function getkarosel($id_karosel) {

            $this->db->select('*')->from('karosel')->where('id_karosel',$id_karosel);
            $data = $this->db->get()->result();

            echo json_encode($data);
            
        }
    }
?>