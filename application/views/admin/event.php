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

    .form-control {
        height: 100%;
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
        margin-left: 300px;
    }
</style>
<!-- Main Content -->
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="card-title d-flex justify-content-center mb-4">Tambah Event</h2>
            <div class="row">
                <div class="col-6">
                    <form class="forms-sample" method="POST" id="form" action="<?php echo base_url('cevent/simpandata'); ?>">
                        <div class="mb-3">
                            <div class="form-label">
                                <label for="exampleInputName1" class="form-label">Nama Event:</label>
                                <input type="text" id="nama_event" name="nama_event" class="form-control <?php echo form_error('nama_event') ? 'is-invalid' : ''; ?>" style="font-size:17px" placeholder="Nama Event" value="<?= set_value('nama_event')?>">
                                <div class="invalid-feedback">
                                <?php echo form_error('nama_event', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputName1"  class="form-label">Thumbnail: (278px*317px)</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control <?php echo form_error('thumbnail') ? 'is-invalid' : ''; ?>" value="<?= set_value('thumbnail')?>">
                                <div class="invalid-feedback">
                                <?php echo form_error('thumbnail', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputName1"  class="form-label">Gambar: (1000px*315px)</label>
                                <input type="file" name="gambar" id="gambar" class="form-control <?php echo form_error('gambar') ? 'is-invalid' : ''; ?>" value="<?= set_value('gambar')?>">
                                <div class="invalid-feedback">
                                <?php echo form_error('gambar', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputName1" class="form-label">Penyelenggara:</label>
                                <input type="text" name="penyelenggara" id="penyelenggara" class="form-control <?php echo form_error('penyelenggara') ? 'is-invalid' : ''; ?>"  placeholder="Penyelenggara" value="<?= set_value('penyelenggara')?>">
                                <div class="invalid-feedback">
                                <?php echo form_error('penyelenggara', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputName1" class="form-label">Lokasi Event:</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control <?php echo form_error('lokasi') ? 'is-invalid' : ''; ?>"  placeholder="Lokasi Event" value="<?= set_value('lokasi')?>">
                                <div class="invalid-feedback">
                                <?php echo form_error('lokasi', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleInputName1" class="form-label">Kategori :</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control <?php echo form_error('id_kategori') ? 
                                    'is-invalid' : ''; ?>" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        foreach ($kategoriData as $kategori) {
                                            echo '<option value="' . $kategori->id_kategori . '">' . $kategori->nama_kategori . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                    <?php echo form_error('id_kategori', '<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleInputName1" class="form-label">Tanggal Awal Pendaftaran:</label>
                            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control  <?php echo form_error('tgl_awal') ? 'is-invalid' : ''; ?>" value="<?= set_value('tgl_awal')?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('tgl_awal', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleInputName1" class="form-label">Tanggal Akhir Pendaftaran:</label>
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control <?php echo form_error('tgl_akhir') ? 'is-invalid' : ''; ?>" value="<?= set_value('tgl_akhir')?>" >
                            <div class="invalid-feedback">
                            <?php echo form_error('tgl_akhir', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleInputName1" class="form-label">Tanggal Event:</label>
                            <input type="datetime-local" name="tgl_event" id="tgl_event" class="form-control <?php echo form_error('tgl_event') ? 'is-invalid' : ''; ?>" value="<?= set_value('tgl_event')?>">
                            <div class="invalid-feedback">
                            <?php echo form_error('tgl_event', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleInputName1" class="form-label">Harga: (0 jika gratis)</label>
                            <input type="number" name="harga" id="harga" class="form-control <?php echo form_error('harga') ? 'is-invalid' : ''; ?>"  placeholder="Harga" value="<?= set_value('harga')?>">
                            <div class="invalid-feedback">
                            <?php echo form_error('harga', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleInputName1" class="form-label">Link Pendaftaran:</label>
                            <input type="text" name="link_daftar" id="link_daftar" class="form-control <?php echo form_error('link_daftar') ? 'is-invalid' : ''; ?>"  placeholder="Link Pendaftaran" value="<?= set_value('link_daftar')?>">
                            <div class="invalid-feedback">
                            <?php echo form_error('link_daftar', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="form-group">
                        <label for="exampleInputName1" class="form-label">Tingkat Event:</label>
                        <select name="tingkat_event" class="form-control <?php echo form_error('tingkat_event') ? 'is-invalid' : ''; ?>"  id="tingkat_event"  value="<?= set_value('tingkat_event')?>">
                            <option value="">Pilih Tingkat Event</option>
                            <option value="ukm">UKM</option>
                            <option value="kampus">Kampus</option>
                            <option value="regional">Regional</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                        </select>
                        <div class="invalid-feedback">
                        <?php echo form_error('tingkat_event', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <div class="form-check">
                        <input name="notif" class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Kirim Notifikasi Event Keseluruh Pengguna?
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label class="form-label">Deskripsi:</label>
                    <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid' : ''; ?>" name="deskripsi" id="summernote" value="<?= set_value('deskripsi')?>"></textarea>
                    <?php echo form_error('deskripsi', '<div class="invalid-feedback">', '</div>'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <button type="reset" class="btn btn-danger" onclick="resetSummernote()">Cancel</button>
            </form>
        </div>
    </div>
    
<!-- Summernote -->
<script>
    
    $('#summernote').summernote({
    placeholder: 'Ketikkan Deskripsi',
    tabsize: 2,
    height: 200
    });

    function resetSummernote() {
       window.location.href = 'tampilevent';
    }
</script>