<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        .form-group {
            margin-bottom: 20px;
            width: 500px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-width: 100%;
        }

        .btn-success {
            background-color: #28a745;
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php if ($this->session->userdata('role') != 'admin') : ?>
        <?php
            $homepage = true;
            $profile = false;
            include __DIR__ . '/../navbar.php';
        ?>
    <?php else : ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand font-weight-bold" href="<?php echo base_url('cdashboard/tampildata'); ?>">
                <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt=""> PNBCC [<?= strtoupper($this->session->userdata('role')); ?>]
            </a>
            <ul class="navbar-nav font-weight-bold ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle custom-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            <span class="ml-2"><?= $this->session->userdata('nama'); ?></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo base_url('cdashboard/tampildata'); ?>">Home</a>
                            <a class="dropdown-item text-danger" href="<?= base_url('cadmin/logout');?>">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    <?php endif; ?>

    <div class="judul text-center mb-0 mt-4">
        <h2>Edit Profile</h2>
    </div>
    <?php if ($this->session->userdata('role') != 'admin') : ?>
        <div class="container" style="margin-top:100px">
    <?php else : ?>
        <div class="container" style="margin-top:30px">
    <?php endif; ?>
        <form action="<?= base_url('cprofile/simpanprofile') ?>" method="post">
            <!-- Add a hidden input field to store the user's ID -->
            <input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">

            <div class="form-group">
                <label for="nama">Name:</label>
                <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('nama') ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= $this->session->userdata('email') ?>">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="passwordInput" value="">
                    <div class="input-group-append">
                        <span class="input-group-text" id="eyeIcon" onclick="togglePasswordVisibility()">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="<?= $this->session->userdata('username') ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn-sm btn-success">Update</button>
                <button type="button" onclick="hapusakun()" class="btn-sm btn-danger">Hapus Akun</button>
            </div>
            <div class="back text-center" style="color:blue;">
                <?php if ($this->session->userdata('role') != 'admin') : ?>
                    <p><a href="<?= base_url('chalaman/index'); ?>">Kembali Ke Halaman Utama </a><i class="fa-solid fa-circle-arrow-left"></i></p>
                <?php else : ?>
                    <p><a href="<?= base_url('cdashboard/tampildata'); ?>">Kembali Ke Halaman Utama </a><i class="fa-solid fa-circle-arrow-left"></i></p>
                <?php endif; ?>
            </div>
        </form>
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
        function hapusakun(id) {
            var id = document.querySelector('input[name="id"]').value;
            
            if (confirm("Apakah yakin menghapus data ini?")) {
                window.location.href = "<?php echo base_url()?>cprofile/hapusakun/" + id;
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
    </script>
</body>
</html>
