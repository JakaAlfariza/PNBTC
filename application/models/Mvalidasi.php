<?php
	class Mvalidasi extends CI_Model
	{
		function validasi()
		{
			if ($this->session->userdata('email')=='')
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini..!');</script>";
				redirect('chalaman/login','refresh');
			}
		}
		
	}
?>