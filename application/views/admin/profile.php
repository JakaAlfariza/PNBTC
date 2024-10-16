<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="<?= base_url('images/logo.png'); ?>" type="image/png">
    <?php if ($this->session->userdata('role') == 'admin') : ?>
        <title>[Admin] PNB TOEIC Center</title>
    <?php else : ?>
        <title>PNB TOEIC Center</title>
    <?php endif; ?>
    
    <!-- Custom CSS -->
    <style>
        body, html {
           background-color: #AACF7D;
           margin: 0;
       }

       .container-main {
           background-color: #ffffff;
           border-radius: 10px;
           padding: 30px;
           max-width: 90%;
           margin: 20px auto;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           box-sizing: border-box;
       }

        .form-container {
            margin-top: 40px;
            margin-left: -20px;
            margin-bottom: 40px;
            border: 2px solid #355E3B;
            padding: 10px;
            border-radius: 10px;
            box-sizing: border-box; /* Ensure padding and border are included in total width */
        }

        .form-group {
            margin-bottom: 15px; /* Adjusted margin for better spacing */
            width: 100%; /* Use full width of parent container */
            box-sizing: border-box; /* Include padding and border in width calculation */
        }

        .form-control {
            width: 100%; /* Ensure form controls fill their container */
        }

        .alert {
            margin-bottom: 20px; /* Space between alerts and form */
        }

        .container {
            justify-content: center;
            align-items: center;
            max-width: 100%;
        }

        .btn-success {
            background-color: #355E3B;
            width: 70%;
        }

        .btn-danger {
            background-color: #dc3545;
            width: 29%;
        }

        .btn{
            background-color: #004789;
            color: #ffffff;
        }

        .text-center {
            text-align: center;
        }

        .text-center2 {
            text-align: center;
        }

        .profile-photo-container {
            display: inline-block;
            position: relative;
        }

        .profile-photo {
            margin-top: 60px;
            margin-bottom: -15px;
            width: 250px;
            height: 250px;
            object-fit: cover;
            border: 2px solid #355E3B;
        }

        .upload-icon {
            width: 50px;
            height: 50px;
            position: absolute;
            bottom: 0;
            right: 0;
            background: #fff;
            border: 2px solid #355E3B;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
            align-item: center;
        }

        .dropdown-menu-right.show {
            right: 0;
            left: auto;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="<?php echo base_url('cdashboard/tampildata'); ?>">
            <?php if ($this->session->userdata('role') == 'admin') : ?>
                <a class="navbar-brand font-weight-bold" href="<?php echo base_url('cdashboard/tampildata'); ?>">
                <img src="<?= base_url('images/logo_home.png');?>" width="270px" height="50px" alt=""> [<?= strtoupper($this->session->userdata('role')); ?>]
                </a>
            <?php else : ?>
                <a class="navbar-brand font-weight-bold" href="<?php echo base_url('cdashboard/tampildata'); ?>">
                <img src="<?= base_url('images/logo_scroll.png');?>" width="100%" height="40px" alt="">
                </a>
            <?php endif; ?>
        
        <ul class="navbar-nav font-weight-bold ml-auto">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle custom-btn" style="background-color: #355E3B; border-radius:8px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url('img_profile/'.$this->session->userdata('foto')); ?>" alt="User Image" width="25px" height="25px" class="rounded-circle">
                        <span class="ml-1"><?= $this->session->userdata('nama'); ?></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <?php if ($this->session->userdata('role') == 'admin') : ?>
                            <a class="dropdown-item" href="<?php echo base_url('cdashboard/tampildata'); ?>"><i class="fa-solid fa-gauge mr-2"></i> Dashboard</a>
                        <?php else : ?>
                            <a class="dropdown-item" href="<?php echo base_url('cuser/dashboarduser'); ?>"><i class="fa-solid fa-gauge mr-2"></i> Dashboard</a>
                        <?php endif; ?>
                        <a class="dropdown-item text-danger" href="<?= base_url('chalaman/logout');?>"><i class="fa-solid fa-right-from-bracket mr-2"></i> Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <div class="container-main">                       
        <div class="judul text-center mb-0 mt-4">
            <h2>Edit Profile</h2>
        </div>

        <?php if ($this->session->userdata('role') != 'admin') : ?>
            <div class="container" style="margin-top:100px">
        <?php else : ?>
            <div class="container" style="margin-top:30px">
        <?php endif; ?>

        <!-- Tabs -->
        <?php if ($this->session->userdata('role') != 'admin') : ?>
            <ul class="nav nav-tabs" style="margin-top:-100px;" id="profileTab" role="tablist">
        <?php else : ?>
            <ul class="nav nav-tabs" style="margin-top:-40px;" id="profileTab" role="tablist">
        <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link <?= ($active_tab === 'profile' || !$active_tab) ? 'active' : '' ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active_tab === 'password' ? 'active' : '' ?>" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
            </li>
        </ul>
        
        <div class="tab-content" id="profileTabContent">
            <div class="tab-pane fade <?= ($active_tab === 'profile' || !$active_tab) ? 'show active' : '' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- Modal -->
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Update Profile Photo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('cprofile/uploadfoto') ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="profilePhoto">Choose a photo</label>
                                        <input type="file" class="form-control-file" id="profilePhoto" name="profilePhoto" accept="image/*">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Upload Image Column -->
                    <div class="col-md-4 text-center">
                        <div class="profile-photo-container">
                            <img src="<?= base_url('img_profile/' . $this->session->userdata('foto')); ?>" alt="Profile Photo" class="rounded-circle profile-photo">
                            <i class="fa fa-camera upload-icon" data-toggle="modal" data-target="#uploadModal" style="font-size:30px;"></i>
                        </div>
                        <div class="back text-center" style="color:blue; margin-top: 45px; font-size:18px;">
                            <?php if ($this->session->userdata('role') == 'admin') : ?>
                                <p><a href="<?= base_url('cdashboard/tampildata'); ?>"><i class="fa-solid fa-circle-arrow-left"></i> Back to Admin Dashboard </a></p>
                            <?php else : ?>
                                <p><a href="<?= base_url('cuser/dashboarduser'); ?>"><i class="fa-solid fa-circle-arrow-left"></i> Back to Admin Dashboard </a></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="col-md-8">
                        <div class="form-container w-100">
                            <form action="<?= base_url('cprofile/simpanprofile') ?>" method="post">
                                <!-- Hidden input field for user ID -->
                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                                <input type="hidden" name="email" value="<?= $this->session->userdata('email') ?>">
                                
                                <!-- Alerts for success and error messages -->
                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success">
                                        <?= $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger">
                                        <?= $this->session->flashdata('error'); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Two-column form layout -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Name:</label>
                                            <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : ''; ?>" name="nama" value="<?= $this->session->userdata('nama') ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tipe_card">ID Card Type:</label>
                                            <select name="tipe_card" class="form-control <?php echo form_error('tipe_card') ? 'is-invalid' : ''; ?>" id="tipe_card">
                                                <option value="">Choose ID Card Type</option>
                                                <option value="Identity Card" <?= ($this->session->userdata('tipe_card') == 'Identity Card') ? 'selected' : ''; ?>>Identity Card</option>
                                                <option value="Driver License" <?= ($this->session->userdata('tipe_card') == 'Driver License') ? 'selected' : ''; ?>>Driver License</option>
                                                <option value="Student Card" <?= ($this->session->userdata('tipe_card') == 'Student Card') ? 'selected' : ''; ?>>Student Card</option>
                                                <option value="Passport" <?= ($this->session->userdata('tipe_card') == 'Passport') ? 'selected' : ''; ?>>Passport</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tipe_card', '<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_lahir">Date of Birth:</label>
                                            <input type="date" class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid' : ''; ?>" name="tgl_lahir" value="<?= $this->session->userdata('tgl_lahir') ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_card">ID Card Number:</label>
                                            <input type="text" class="form-control <?php echo form_error('id_card') ? 'is-invalid' : ''; ?>" name="id_card" value="<?= $this->session->userdata('id_card') ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_card', '<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select name="gender" class="form-control <?php echo form_error('gender') ? 'is-invalid' : ''; ?>" id="gender">
                                                <option value="">Choose Gender</option>
                                                <option value="Male" <?= ($this->session->userdata('gender') == 'Male') ? 'selected' : ''; ?>>Male</option>
                                                <option value="Female" <?= ($this->session->userdata('gender') == 'Female') ? 'selected' : ''; ?>>Female</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('gender', '<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Current Status:</label>
                                            <select name="status" class="form-control <?php echo form_error('status') ? 'is-invalid' : ''; ?>" id="status">
                                                <option value="">Choose Status</option>
                                                <option value="Student" <?= ($this->session->userdata('status') == 'Student') ? 'selected' : ''; ?>>Student</option>
                                                <option value="Worker" <?= ($this->session->userdata('status') == 'Worker') ? 'selected' : ''; ?>>Worker</option>
                                                <option value="Unemployed" <?= ($this->session->userdata('status') == 'Unemployed') ? 'selected' : ''; ?>>Unemployed</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('status', '<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form buttons -->
                                <div class="text-center mt-4">
                                    <button type="button" onclick="hapusakun()" class="btn-sm btn-danger">Hapus Akun</button>    
                                    <button type="submit" class="btn-sm btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade <?= $active_tab === 'password' ? 'show active' : '' ?>" id="password" role="tabpanel" aria-labelledby="password-tab">
                <!-- Change Password Form -->
                <div class="form-container" style="width:600px; margin: 45px auto;">
                    <form action="<?= base_url('cprofile/updatepassword') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                        <!-- Alert -->
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group" style="align-item:center; width: 100%;">
                            <label for="current_password">Current Password:</label>
                            <input type="password" class="form-control <?php echo form_error('current_password') ? 'is-invalid' : ''; ?>" name="current_password">
                            <div class="invalid-feedback">
                                <?php echo form_error('current_password', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="align-item:center; width: 100%;">
                            <label for="new_password">New Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control <?php echo form_error('new_password') ? 'is-invalid' : ''; ?>" id="passwordInput" name="new_password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="eyeIcon" onclick="togglePasswordVisibility()">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('new_password', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="align-item:center; width: 100%;">
                            <label for="confirm_password">Confirm Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control <?php echo form_error('confirm_password') ? 'is-invalid' : ''; ?>" id="passwordInput2" name="confirm_password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="eyeIcon2" onclick="togglePasswordVisibility2()">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('confirm_password', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn-sm btn-success" style="width: 100%;">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
        //Function button hapus akun
        //Function button hapus akun
        function hapusakun(id_user) {
            var id_user = document.querySelector('input[name="id_user"]').value;
            
            if (confirm("Apakah yakin menghapus Akun ini? (Segala data yang dibuat oleh akun ini akan hilang)")) {
                window.location.href = "<?php echo base_url()?>cprofile/hapusakun/" + id_user;
            }
        }

        //Function button lihat password
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("passwordInput");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
            }
        }

        function togglePasswordVisibility2() {
            var passwordInput = document.getElementById("passwordInput2");
            var eyeIcon = document.getElementById("eyeIcon2");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
            }
        }

        $(document).ready(function() {
            // Check if there is a fragment in the URL
            var hash = window.location.hash;

            // Activate tab based on URL fragment
            if (hash) {
                // Remove the '#' from the hash to match the tab ID
                var tabId = hash.substring(1);
                // Activate the tab and show the associated content
                $('a[href="#' + tabId + '"]').tab('show');
            }
        });
    </script>
</body>
</html>
