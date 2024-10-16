<?php
class Mkategori extends CI_Model
{
    function simpankategori()
    {
        $nama_kategori=$this->input->post('nama_kategori');        
    
        $data=array(
            'nama_kategori'=>$nama_kategori,
        );   
        
        $this->db->insert('kategori',$data);
        echo "<script>alert('Kategori berhasil disimpan');</script>";
        redirect('ckategori/tampilkategori','refresh');
    }

    function tampilkategori()
    {
        $sql="select * from kategori";
        $query= $this->db->query($sql);
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $hasil[]=$row; 
            }
        }else{
            $hasil="";
        }
        
        return $hasil;
    }

    function hapuskategori($id_kategori)
    {
        $sql="delete from kategori where id_kategori='".$id_kategori."'";
        $this->db->query($sql);
        echo "<script>alert('Kategori berhasil dihapus');</script>";
        redirect('ckategori/tampilkategori','refresh');	
    }

    function updateKategori($id_kategori)
    {
        $nama_kategori = $this->input->post('nama_kategori', TRUE);
        $data = array(
            'nama_kategori' => $nama_kategori,
        );

        $this->db->where('id_kategori', $id_kategori);
        $response = $this->db->update('kategori', $data);
        echo "<script>alert('Nama kategori berhasil diubah');</script>";
        redirect('Ckategori/tampilkategori','refresh');	
    }

    //Mengambil value untuk Edit event ajax
    function getKategori($id_kategori) 
    {
        $this->db->select('*')->from('kategori')->where('id_kategori',$id_kategori);
        $data = $this->db->get()->result();

        echo json_encode($data);
    }
}
?>