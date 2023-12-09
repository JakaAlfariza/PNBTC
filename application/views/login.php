<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login</title>
    <style>
    
    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>
<body>
<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
      </a>

      <div class="ml-auto">
        <ul class="navbar-nav font-weight-bold">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('chalaman/index');?>">
            <i class="fas fa-home"></i> Home
            </a>
          </li>
        </ul>
      </div>
    </nav>

<div class="container mt-3 centered-form">
  <form name="formlogin" method="post" action="<?php echo base_url('chalaman/proseslogin'); ?>" class="text-left">
    <div class="text-center mb-3">
      <h2>Dosen Login</h2>
    </div>
    <div class="mb-3">
      <label for="nik">NIK:</label>
      <input type="text" class="form-control" name="nik">
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Ingat Akun Saya
      </label>
    </div>
    <button type="submit" class="btn btn-info text-white" style="width: 100%">Login</button>
    <p class="text-center mt-3">Belum memiliki akun? <a href="<?php echo base_url('chalaman/daftar'); ?>">Daftar disini</a></p>
  </form>
</div>

<!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

