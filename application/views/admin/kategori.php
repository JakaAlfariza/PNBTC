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

    .dataTables_filter {
        margin-left: 220px;
    }

</style>

<!-- Main Content -->
<div class="card mt-3">
    <div class="card-body">
    <h2 class="card-title d-flex justify-content-center mb-4">Tambah Kategori</h2>
        <form class="forms-sample" method="POST" action="<?php echo base_url('ckategori/simpankategori'); ?>">
            <div class="mb-3">
                <label for="nama_kategori">Nama Kategori:</label>
                <input type="text" class="form-control <?php echo form_error('nama_kategori') ? 'is-invalid' : ''; ?>" name="nama_kategori" placeholder="Nama Kategori">
                <div class="invalid-feedback">
                    <?php echo form_error('nama_kategori', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>