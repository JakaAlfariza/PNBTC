    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                        <h2 class="card-title d-flex justify-content-center mb-4">Tambah Karosel</h2>
                            <form class="forms-sample" method="POST" action="<?php echo base_url('ckarosel/simpandata'); ?>">
                                <div class="mb-3">
                                    <div class="form-label">
                                        <label for="exampleInputName1" class="form-label">Nama karosel:</label>
                                        <input type="text" name="nama_karosel" class="form-control" style="font-size:17px" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputName1" class="form-label">Gambar :</label>
                                        <input type="file" name="gambar_k" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputName1" class="form-label">Penyelenggara :</label>
                                        <input type="text" name="penyelenggara" class="form-control" required>
                                    </div>
                                </div>
                            <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
        
    <!-- Bootstrap JS and dependencies -->
    <script>
        function hapusdata(id_karosel) {
            if (confirm("Apakah yakin menghapus data ini?")) {
                window.open("<?php echo base_url()?>ckarosel/hapusdata/" + id_karosel, "_self");
            }
        }
    </script>