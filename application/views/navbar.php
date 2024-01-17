<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Inisialisasi script -->
<?php include 'script.php'; ?>

<style>
    .btn{
        background-color: #004789;
        color: #ffffff;
    }

    .search-result {
        display: flex;
        align-items: center;
    }

    .search-result-text {
        margin-left: 10px;
    }

    .search-result-img {
        width: 60px;
        height: 30px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="<?= base_url('chalaman/index');?>">
        <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
    </a>

    <!-- Search -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0" id="searchForm">
            <div class="input-group mt">
                <div class="input-group-prepend" style="border-right: none;">
                    <div id="searchDropdown" style=" z-index: 1; display: none;"></div>
                </div>
                <input class="form-control" id="searchQuery" type="search" placeholder="Search Event" aria-label="Search">
            </div>
        </form>
    </div>            

    <!-- Navigation Item -->
    <ul class="navbar-nav font-weight-bold">
        <?php
        // Cek jika login
        if ($this->session->userdata('id')) {
        ?>
            <?php
            if ($homepage) {
                echo '<a class="nav-item mt-1" style="margin-right:20px; color:black;" href="' . base_url('chalaman/index') . '"><i class="fas fa-home"></i> Home</a>';
            }
            ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle custom-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="ml-2"><?= $this->session->userdata('nama'); ?></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                    if ($profile) {
                        echo '<a class="dropdown-item" href="' . base_url('cprofile/tampilakun') . '">Profile</a>';
                    }
                    ?>
                    <a class="dropdown-item text-danger" href="<?= base_url('chalaman/logout');?>">Logout</a>
                </div>
            </div>
        <?php
        } else {
            // Tidak login
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="' .base_url('chalaman/daftar').'"><i class="fa-solid fa-user-plus"></i> Daftar</a>';
            echo '</li>';
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="' .base_url('chalaman/login') . '"><i class="fa-solid fa-right-from-bracket"></i> Login</a>';
            echo '</li>';
        }
        ?>
    </ul>
</nav>

