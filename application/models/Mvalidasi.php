<?php
	class Mvalidasi extends CI_Model
	{
		function validasi()
		{
			if ($this->session->userdata('nama')=='')
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini..!');</script>";
				redirect('chalaman/login','refresh');
			}
		}
		
	}
?>