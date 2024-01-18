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
                    <input type="text" name="nama_karosel" id="nama_karosel" class="form-control <?php echo form_error('nama_karosel') ? 'is-invalid' : ''; ?>" style="font-size:17px" placeholder="Judul Karosel">
                    <div class="invalid-feedback">
                    <?php echo form_error('nama_karosel', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="exampleInputName1" class="form-label">Gambar: (1350px300px)</label>
                    <input type="file" name="gambar_k" id="gambar_k" class="form-control <?php echo form_error('gambar_k') ? 'is-invalid' : ''; ?>" onchange="readURL(this);">
                    <div class="invalid-feedback">
                    <?php echo form_error('gambar_k', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div id="tampilGambar" style="display: none;">
                        <img id="tampil_gambar" src="" alt="Existing Image" style="max-width: 100px; max-height: 200px; margin-top:5px;">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="exampleInputName1" class="form-label">Nama Sponsor:</label>
                    <input type="text" name="nama_sponsor" id="nama_sponsor" class="form-control <?php echo form_error('nama_sponsor') ? 'is-invalid' : ''; ?>" placeholder="Nama Sponsor">
                    <div class="invalid-feedback">
                    <?php echo form_error('nama_sponsor', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button type="reset" class="btn btn-danger" onclick="refreshCarousel()">Cancel</button>
        </form>
    </div>
</div>
    
<!-- Javascript & JQuery -->
<script>
    //Reset Button
    function refreshCarousel() {
        window.location.href = 'tampilkarosel';
    }

    //Menampikan gambar input
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#tampil_gambar').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
