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
}
?>