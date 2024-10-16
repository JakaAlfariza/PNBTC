<style>
    body,
    html {
        background-color: #AACF7D;
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
        <h2 class="card-title d-flex justify-content-center mb-4">Manage Accounts</h2>
        <div class="container">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" style="font-size:14px;">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" style="font-size:14px;">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('warning')): ?>
                <div class="alert alert-warning" style="font-size:14px;">
                    <?= $this->session->flashdata('warning'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="add-account-tab" data-toggle="tab" href="#add-account" role="tab" aria-controls="add-account" aria-selected="true">Add Account</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="import-file-tab" data-toggle="tab" href="#import-file" role="tab" aria-controls="import-file" aria-selected="false">Import File Excel</a>
                </li>
            </ul>
            
            <!-- Tabs Content -->
            <div class="tab-content" id="myTabContent">
                <!-- Add Account Tab -->
                <div class="tab-pane fade show active" id="add-account" role="tabpanel" aria-labelledby="add-account-tab">
                    <div class="mt-3">
                        <form class="forms-sample" enctype="multipart/form-data" id="form" method="POST" action="<?php echo base_url('cdaftar/simpandaftar'); ?>">
                            <div class="row">
                                <div class="col-md-6">
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
                                        <label for="exampleInputName1" class="form-label">Gender:</label>
                                        <select name="gender" class="form-control <?php echo form_error('gender') ? 'is-invalid' : ''; ?>" id="gender">
                                            <option value="">Choose Gender</option>
                                            <option value="Male" <?= set_select('gender', 'Male'); ?>>Male</option>
                                            <option value="Female" <?= set_select('gender', 'Female'); ?>>Female</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        <?php echo form_error('gender', '<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">ID Type:</label>
                                        <select name="tipe_card" class="form-control <?php echo form_error('tipe_card') ? 'is-invalid' : ''; ?>" id="tipe_card">
                                            <option value="">Choose Id Type</option>
                                            <option value="Identity Card" <?= set_select('tipe_card', 'Identity Card'); ?>>Identity Card</option>
                                            <option value="Driver License" <?= set_select('tipe_card', 'Driver License'); ?>>Driver License</option>
                                            <option value="Student Card" <?= set_select('tipe_card', 'Student Card'); ?>>Student Card</option>
                                            <option value="Passport" <?= set_select('tipe_card', 'Passport'); ?>>Passport</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        <?php echo form_error('tipe_card', '<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_card">ID Card Number:</label>
                                        <input type="text" class="form-control <?php echo form_error('id_card') ? 'is-invalid' : ''; ?>" name="id_card" id="id_card" placeholder="ID Card Number" value="<?= set_value('id_card')?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('id_card', '<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Role:</label>
                                        <select name="role" class="form-control <?php echo form_error('role') ? 'is-invalid' : ''; ?>" id="role">
                                            <option value="">Choose Role</option>
                                            <option value="admin" <?= set_select('role', 'admin'); ?>>Admin</option>
                                            <option value="user" <?= set_select('role', 'user'); ?>>User</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        <?php echo form_error('role', '<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="credits">Credits:</label>
                                        <input type="number" class="form-control <?php echo form_error('credits') ? 'is-invalid' : ''; ?>" name="credits" id="credits" placeholder="Input Test Credits" value="<?= set_value('credits')?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('credits', '<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn ml-3" style="width:150px; background-color: #355E3B; color: white;">Submit</button>
                                <button type="reset" class="btn btn-danger ml-2" onclick="refreshakun()">Cancel</button>
                            </div>
                            <?php echo form_close(); ?>
                        </form>
                    </div>
                </div>

                <!-- Import File Excel Tab -->
                <div class="tab-pane fade" id="import-file" role="tabpanel" aria-labelledby="import-file-tab">
                    <div class="mt-3">
                        <h4>Create Account by Import File Excel </h4>
                        <p>Automatically Generate Password, Send Account to Email and Get 1 Test Credit</p>
                        <form method="post" action="<?php echo base_url('Cimport/import'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="upload_file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Import</button>
                            <a href="<?php echo base_url('documents/template.xlsx'); ?>" class="btn btn-success" download>Download Template</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.getElementById('eyeIcon').querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    function refreshakun() {
        window.location.href = 'tampilakun';
    }
</script>
