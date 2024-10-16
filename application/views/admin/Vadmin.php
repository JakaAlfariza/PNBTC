<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <link rel="icon" href="<?= base_url('images/logo.png'); ?>" type="image/png">
    <title>[Admin] PNB TOEIC Center</title>
    <style>
        body,html {
            background-color: #AACF7D;
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
        background-color: #355E3B;
        color: #fff;
        }

        .custom-btn:hover,
        .custom-btn:active {
            background-color: #0066a2;
            color: #fff;
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
            <img src="<?= base_url('images/logo_home.png');?>" width="270px" height="50px" alt=""> [<?= strtoupper($this->session->userdata('role')); ?>]
        </a>
        <ul class="navbar-nav font-weight-bold ml-auto">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle custom-btn" style="background-color: #355E3B; border-radius:8px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url('img_profile/'.$this->session->userdata('foto')); ?>" alt="User Image" width="25px" height="25px" class="rounded-circle">
                        <span class="ml-1"><?= $this->session->userdata('nama'); ?></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo base_url('cprofile/tampilakun'); ?>"><i class="fa-solid fa-address-card mr-2"></i>Profile</a>
                        <a class="dropdown-item text-danger" href="<?= base_url('chalaman/logout');?>"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</a>
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
                <a href="<?php echo base_url('cdaftar/tampilakun'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-user"></i> Manage Accounts</a>
                <a href="<?php echo base_url('csoal/tampilbanksoal'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-calendar-plus"></i> Manage Questions</a>
                <a href="<?php echo base_url('cdashboard/tampilhasil'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-square-poll-vertical"></i></i></i> User Score Results</a>
                <a href="<?php echo base_url('cdashboard/tampilcredits'); ?>" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-circle-dollar-to-slot"></i></i> Credits Payment</a>
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
