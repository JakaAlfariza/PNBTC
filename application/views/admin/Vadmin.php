<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    
    <style>
        body,html {
            background-color: #004789;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .navbar {
            z-index: 1000;
            height: 10vh;
        }

        .container-fluid {
            display: flex;
            height: 90vh;
            overflow: hidden;
        }

        .col-sm-2 {
            background-color: #ffffff;
            padding: 15px;
            min-height: 100%;
            position: sticky;
            top: 0;
            overflow-y: auto;
            height: 100%;
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

        .col-sm-10 {
            flex: 1;
            overflow-y: auto;
        }
        
        .custom-btn {
        background-color: #004789;
        color: #fff;
        }

        .custom-btn:hover,
        .custom-btn:active {
            background-color: #0066a2;
            color: #fff;
        }
    </style>
    <title>Admin Dashboard</title>
</head>

<body>
    <!-- Navbar -->
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
                        <a class="dropdown-item" href="<?php echo base_url('cprofile/tampilakun'); ?>">Profile</a>
                        <a class="dropdown-item text-danger" href="<?= base_url('cadmin/logout');?>">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <!-- GRID -->
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
        <!-- Sidebar -->
        <div class="col-sm-2 bg-light" id="sidebar">
            <ul class="list-group">
                <a href="<?php echo base_url('cdashboard/tampildata'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a href="<?php echo base_url('cdaftar/tampilakun'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-user"></i> Data Akun</a>
                <a href="<?php echo base_url('cevent/tampilevent'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-calendar-plus"></i> Data Event</a>
                <a href="<?php echo base_url('ckarosel/tampilkarosel'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-image"></i> Data Karosel</a>
                <a href="<?php echo base_url('ckategori/tampilkategori'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-list"></i></i> Data Kategori</a>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="col-sm-10">
            <div class="container mt-3">
                <?php
                if (empty($konten)) {
                    echo "";
                } else {
                    echo $konten;
                }
                ?>

                <?php
                if (empty($table)) {
                    echo "";
                } else {
                    echo "$table";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
