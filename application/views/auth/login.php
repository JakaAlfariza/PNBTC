<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login</title>

    <style>
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .centered-form {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            background-color: #004789;
        }

        .header h1 {
            text-align: center;
            font-weight: bold;
            color: #ffc107;
            font-size: 4em;
            padding-top: 30px;
        }

        .header p {
            text-align: center;
            color: #fff; 
            font-size: 1.2em;
            margin-top: -10px;
        }

        .container-card {
            padding: 20px;
            border-radius: 10px;
            min-width: 350px;
            margin: 10px ;
        }

        .btn-login {
            width: 100%;
            background-color: #004789;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="<?= base_url('chalaman/index');?>">
            <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
            PNBCC
        </a>

        <div class="ml-auto">
            <ul class="navbar-nav font-weight-bold">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('chalaman/daftar');?>"><i class="fa-solid fa-user-plus"></i> Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('chalaman/index');?>"><i class="fas fa-home"></i> Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Container -->
    <div class="container-fluid centered-form">
        <div class="header">
            <h1>PNBCC</h1>
            <p>Sign in to your account</p>
        </div>
        <div class="row justify-content-center align-items-center" style="height: 60vh;">
            <!-- Card Login -->
            <div class="card container-card text-dark"style="padding-bottom: 0px; padding-top: 10px;">
                <div class="card-body">
                    <form name="formlogin" method="post" action="<?php echo base_url('chalaman/proseslogin'); ?>" class="text-left">
                        <div class="mb-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid' : ''; ?>" name="username" placeholder="Username" value="<?= set_value('username')?>">
                            <div class="invalid-feedback">
                            <?php echo form_error('username', '<small class="text-danger pl-3">','</small>'); ?>
                            </div> 
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" id="passwordInput" name="password" placeholder="Password" >
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
                        <a href="<?= base_url('chalaman/lupaPass');?>">Lupa Password?</a>
                        </div>
                        <button type="submit" class="btn text-white btn-login">L O G I N</button>
                        <p class="text-center mt-3">Belum memiliki akun? <a href="<?php echo base_url('chalaman/daftar'); ?>">Daftar disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
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
