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

    .form-group select.is-invalid,
    .form-group input.is-invalid {
        border-color: #dc3545 !important;
    }

    .form-group .invalid-feedback {
        position: absolute;
        bottom: -1rem;
        color: #dc3545;
    }

    .dataTables_filter {
        margin-left: 300px;
    }
</style>

<!-- Main Content -->
<div class="card mt-3">
    <div class="card-body">
        <h2 class="card-title d-flex justify-content-center mb-4">Tambah Akun</h2>
        <?php echo form_open('cdaftar/simpandaftar'); ?>
        <form class="forms-sample" method="POST" action="<?php echo base_url('cdaftar/simpandaftar'); ?>">
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Email" value="<?= set_value('email')?>">
                <div class="invalid-feedback">
                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="Nama" value="<?= set_value('nama')?>">
                <div class="invalid-feedback">
                    <?php echo form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
            <div class="mb-3" style="margin-top: 15px;">
                <label for="username">Username:</label>
                <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username" value="<?= set_value('username')?>">
                <div class="invalid-feedback">
                <?php echo form_error('username', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password" >
                    <div class="input-group-append">
                        <span class="input-group-text" id="eyeIcon" onclick="togglePasswordVisibility()">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="invalid-feedback">
                    <?php echo form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                    </div> 
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Role:</label>
                <select name="role" class="form-control <?php echo form_error('role') ? 'is-invalid' : ''; ?>" id="role">
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <div class="invalid-feedback">
                <?php echo form_error('role', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
            <?php echo form_close(); ?>
        </form>
    </div>
</div>