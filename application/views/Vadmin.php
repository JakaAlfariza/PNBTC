<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>admin page</title>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
      </a>

      <ul class="navbar-nav font-weight-bold">
    
        <li class="nav-item">
          <a class="nav-link" style="margin-left: 20px;" href="<?= base_url('cadmin/logout');?>"> <i class="fa fa-sign-out"></i> 
		  log out</a>
        </li>
      </ul>
    </nav>

    <h3>Tambahkan Event</h3>
    <form class="forms-sample" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="exampleInputName1">Nama event:</label>
											<input type="text" name="nama_event" class="form-control"  placeholder="nama_event" required>
										</div>
										<div class="form-group">
											<label for="exampleInputName1">Gambar :</label>
											<input type="file" name="gambar" class="form-control" placeholder="gambar" required>
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Penyelenggara :</label>
											<input type="text" name="penyelenggara" class="form-control"  placeholder="penyelenggara" required>
										</div>
										<div class="form-group">
                                        <label for="exampleInputName1">tanggal Awal :</label>
											<input type="date" name="tgl_awal" class="form-control"  placeholder="tgl_awal" required>
										</div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">tanggal Akhir :</label>
											<input type="date" name="tgl_akhir" class="form-control"  placeholder="tgl_akhir" required>
										</div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">tanggal Event :</label>
											<input type="date" name="tgl_event" class="form-control"  placeholder="tgl_event" required>
										</div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">Harga :</label>
											<input type="text" name="harga" class="form-control"  placeholder="harga" required>
										</div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">Lokasi :</label>
											<input type="text" name="lokasi" class="form-control"  placeholder="lokasi" required>
										</div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">Deskripsi :</label>
											<input type="text" name="deskripsi" class="form-control"  placeholder="deskripsi" required>
										</div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">Kategori :</label>
											<input type="text" name="kategori" class="form-control"  placeholder="kategori" required>
										</div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">Link Pendaftaran :</label>
											<input type="text" name="link_pendaftaran" class="form-control"  placeholder="link_pendaftaran" required>
										</div>
									<button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
									<button type="reset" class="btn btn-dark">Cancel</button>
								</form>
	
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>