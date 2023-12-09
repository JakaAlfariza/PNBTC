<?php
	class Mlogin extends CI_Model
	{
		function proseslogin()
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$sql="select * from user where username='$username' and password='$password '";
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				$data=$query->row();
				$array=array(
					
				);	
				$this->session->set_userdata($array);	
				redirect('cadmin/vadmin','refresh');	
			}	
			else
			{
				//echo "Login Gagal";
				$this->session->set_flashdata('pesan','Login gagal...');
				echo "<script>alert('Username/Password Salah');</script>";
				redirect('chalaman/login','refresh');		
			}
		}	
	}
?>