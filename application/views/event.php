<!-- include libraries(jQuery, bootstrap, Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <style>
        body,
        html {
            background-color: #004789;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .col-sm-2 {
            background-color: #ffffff;
            padding: 15px;
            min-height: 100%;
        }

        .list-group {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .list-group-item {
            border: none;
            width: 100%;
        }

        .custom-btn {
            background-color: #004789;
            color: #fff;
        }
        
    </style>

    <!-- Main Content -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <h2 class="card-title d-flex justify-content-center mb-4">Tambah Event</h2>
                            <div class="row">
                                <div class="col-6">
                                    <form class="forms-sample" method="POST" action="<?php echo base_url('cevent/simpandata'); ?>">
                                        <div class="mb-3">
                                            <div class="form-label">
                                                <label for="exampleInputName1" class="form-label">Nama Event:</label>
                                                <input type="text" name="nama_event" class="form-control" style="font-size:17px" placeholder="Nama Event" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleInputName1" class="form-label">Gambar:</label>
                                                <input type="file" name="gambar" class="form-control" required>
                                                <p>*Gunakan ukuran gambar 000px*000px</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleInputName1" class="form-label">Penyelenggara:</label>
                                                <input type="text" name="penyelenggara" class="form-control" placeholder="Penyelenggara" required>
                                            </div>
                                        </div>
                                        
                                  </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputName1" class="form-label">Tanggal Awal Pendaftaran:</label>
                                            <input type="date" name="tgl_awal" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputName1" class="form-label">Tanggal Akhir Pendaftaran:</label>
                                            <input type="date" name="tgl_akhir" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputName1" class="form-label">Tanggal Event:</label>
                                            <input type="date" name="tgl_event" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputName1" class="form-label">Harga:</label>
                                            <input type="text" name="harga" class="form-control" placeholder="Harga" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputName1" class="form-label">Link Pendaftaran:</label>
                                            <input type="text" name="link_daftar" class="form-control" placeholder="Link Pendaftaran" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form=label">Deskripsi:</label>
                                    <textarea class="form-control" name="deskripsi" id="summernote" required></textarea>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
        
    <!-- Bootstrap JS and dependencies -->
    <script>
        function hapusdata(id_event) {
            if (confirm("Apakah yakin menghapus data ini?")) {
                window.open("<?php echo base_url()?>cevent/hapusdata/" + id_event, "_self");
            }
        }
    </script>
    <script>
      $('#summernote').summernote({
        placeholder: 'Ketikkan Deskripsi',
        tabsize: 2,
        height: 200
      });
    </script>