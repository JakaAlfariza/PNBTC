<?php
	class Mdaftar extends CI_Model
	{
		
		
		function simpandaftar()
		{
			$username=$this->input->post('username');
            $email=$this->input->post('email');
			$password=$this->input->post('password');
			
			
			$data=array(
				'username'=>$username,
                'email'=>$email,
				'password'=>$password
				
			);
			
			$this->db->insert('user',$data);
			echo "<script>alert('Data sudah disimpan');</script>";
			redirect('chalaman/daftar','refresh');
		}
		
		
	}
?>