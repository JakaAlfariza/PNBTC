
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
                            <form class="forms-sample" method="POST" enctype="multipart/form-data" id="form" action="<?php echo base_url('ckarosel/simpandata'); ?>">
                                <div class="mb-3">
                                    <div class="form-label">
                                        <label for="exampleInputName1" class="form-label">Judul Karosel:</label>
                                        <input type="text" name="nama_karosel" id="nama_karosel" class="form-control" style="font-size:17px" placeholder="Judul Karosel" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputName1" class="form-label">Gambar: (000px*000px)</label>
                                        <input type="file" name="gambar_k" id="gambar_k" class="form-control" onchange="readURL(this);">
                                        <div id="tampilGambar" style="display: none;">
                                            <img id="tampil_gambar" src="" alt="Existing Image" style="max-width: 200px; max-height: 200px; margin-top:5px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputName1" class="form-label">Nama Sponsor:</label>
                                        <input type="text" name="nama_sponsor" id="nama_sponsor" class="form-control" placeholder="Nama Sponsor" required>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#tampil_gambar').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        $('#gambar_k').on('change', function () {
            $('#tampilGambar').show();
            readURL(this);
        });
    });
</script>
