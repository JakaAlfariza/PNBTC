<?php
	class Mdaftar extends CI_Model
	{
		
		
		function simpandaftar()
		{
			$Username=$this->input->post('Username');
            $Email=$this->input->post('Email');
			$Password=$this->input->post('Password');
			
			
			$data=array(
				'Username'=>$Username,
                'Email'=>$Email,
				'Password'=>$Password
				
			);
			
			$this->db->insert('user',$data);
			echo "<script>alert('Data sudah disimpan');</script>";
			redirect('chalaman/daftar','refresh');
		}
		
		
	}
?>