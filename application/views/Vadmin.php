<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      body,html{
        background-color: #004789;
        height: 120%;
      }
    </style>
    <title>admin page</title>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
  </a>

      <ul class="navbar-nav font-weight-bold ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('cadmin/logout');?>"> <i class="fa-solid fa-sign-out"></i> 
		  log out</a>
        </li>
      </ul>
    </nav>

    
    <div class="container-fluid page-body-wrapper" style="margin-top: 30px;">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="page-header">
					
					<!-- </div> -->
					<!-- <div class="row">
						<div class="col-lg-5 grid-margin stretch-card"> -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title d-flex justify-content-center">Tambah data Event/lomba</h4>
                  <div class="row">
                  <div class="col-6">
                  <form class="forms-sample" method="POST" action="<?php echo base_url('cadmin/simpandata'); ?>">
                  <div class="mb-3">    
                   <div class="form-label">
											<label for="exampleInputName1" class="form-label">Nama event:</label>
											<input type="text" name="nama_event" class="form-control" style="font-size:17px"  required>
										</div>
                  </div>
                  <div class="mb-3">
										<div class="form-group">
											<label for="exampleInputName1" class="form-label">Gambar :</label>
											<input type="file" name="gambar" class="form-control"  required>
										</div>
                  </div>
                  <div class="mb-3">
										<div class="form-group">
                      <label for="exampleInputName1" class="form-label">Penyelenggara :</label>
											<input type="text" name="penyelenggara" class="form-control"   required>
										</div>
                  </div>
                  <div class="mb-3">
                    <div class="form-group">
                      <label for="exampleInputName1" class="form-label">tanggal Awal :</label>
											<input type="date" name="tgl_awal" class="form-control"   required>
										</div>
                  </div>
                  <div class="mb-3">     
                    <div class="form-group">
                      <label for="exampleInputName1" class="form-label">tanggal Akhir :</label>
											<input type="date" name="tgl_akhir" class="form-control"  required>
										</div>
                  </div>
                </div>
              <div class="col-6">
                <div class="mb-3">
                    <div class="form-group">
                      <label for="exampleInputName1" class="form-label">tanggal Event :</label>
											<input type="date" name="tgl_event" class="form-control"   required>
										</div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                      <label for="exampleInputName1" class="form-label">Harga :</label>
											<input type="text" name="harga" class="form-control" style="font-size: 19px"  required>
										</div>
                </div>
                <div class="mb-3">
                  <div class="form-group">
                      <label for="exampleInputName1" class="form-label">Lokasi :</label>
											<input type="text" name="lokasi" class="form-control"   required>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-group">
                    <label for="exampleInputName1" class="form-label">Link Pendaftaran :</label>
									  <input type="text" name="link_daftar" class="form-control"   required>
								  </div>
                </div>
                <div class="mb-3">
                  <div class="form-group">
                    <label for="exampleInputName1" class="form-label">Kategori :</label>
										<input type="text" name="kategori" class="form-control"   required>
									</div>
                </div>
              </div>
            </div> 
                <div class="mb-3">                     
                  <div class="form-group">
                      <label class="form=label">Deskripsi :</label>
                      <textarea class="form-control" name="deskripsi" required></textarea>
                  </div>
                </div>  
									<button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
									<button type="reset" class="btn btn-dark">Cancel</button>
								  </form>
                </div>
						</div>
					</div>
          
					<div class="mt-4">
						<div class="card">
							<div class="card-body" style="margin-top: 20px;">	
              <h4 class="card-title">Tabel data</h4>
								</p>
								<div class="table-responsive" >
									<table class="table table-hover" id="tabel-data">
										<thead>
											<tr>
                        <th>No</th>
												<th>Nama Event</th>
												<th>Penyelenggara</th>
												<th>Kategori</th>
												<th>Aksi</th>
											</tr>
									</thead>

                    <tbody>
             <?php
                 if(empty($hasil))
                 {
                     echo "Data Kosong";	
                 }
                 else
                 {
                     $no=1;
                     foreach ($hasil as $data):
             ?>
               <tr>
                 <td><?php echo $no; ?></td>
                 <td><?php echo $data->nama_event ?></td>
                 <td><?php echo $data->penyelenggara ?></td>
                 <td><?php echo $data->kategori ?></td>
                 <td>
                 <button type="button" class="btn btn-sm btn-primary">Edit</button>
                     <button type="button" onclick="hapusdata
                     ('<?php echo $data->id_event ?>')" class="btn btn-sm btn-danger">Hapus</button>
                 </td>
               </tr>
              <?php
                      $no++;
                      endforeach;
                 }
              ?>
               </tr>
             </tbody>
           </table>
          </div>
          </div>
          </div>
          </div>
          <br>
           <script>
               function hapusdata(id_event){
                   if(confirm("Apakah yakin menghapus data ini?")){
                     window.open("<?php echo base_url()?>cadmin/hapusdata/"+id_event,"_self");
                   }
               }
           </script>        
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>