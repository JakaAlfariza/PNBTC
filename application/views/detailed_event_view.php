<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Details of event</title>
    
    <style>
        body {
            background-color: #e8e8e8;
            margin: 0; 
            padding: 0; 
        }

        .container-details {
            background-color: #ffffff;
            padding: 0;
            border-radius: 8px;
            margin-top: 20px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 100px;
        }

        .container-details img {
            width: 100%;
            height: 350px;
            margin-bottom: 20px;
            object-fit: cover;
        }

        .container-details h2 {
            text-align: left;
            font-size: 40px;
            margin-bottom: 0px;
            padding-left: 20px; 
        }

        .container-details .tanggal {
            padding-left: 20px; 
            text-align: left;
            font-size: 20px;
            margin-bottom: -15px;
        }

        .container-details .lokasi {
            padding-left: 20px; 
            text-align: left;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .container-details .harga {
            padding-right: 20px; 
            color: #00A859;
            text-align: right;
            font-size: 30px;
            margin-bottom: -65px;
        }

        .container-details .deskripsi {
            padding: 20px;
            text-align: left;
            font-size: 18px;
            margin-bottom: 20px;
            width: 100%;
            word-wrap: break-word; 
        }


        .daftar-button a.btn {
            background-color: #003366;
            color: #ffffff;
            padding: 10px 30px;
            font-size: 16px;
            transition: transform 0.2s ease-in-out;
            margin-bottom: 20px;
        }

        .daftar-button a.btn:hover {
            transform: scale(1.05);
        }

        .daftar-button a.btn:active {
            transform: scale(0.95);
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body class="body">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= base_url('chalaman/index'); ?>">
            <img src="<?= base_url('images/pnb.png'); ?>" width="40" height="40" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Event" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <ul class="navbar-nav font-weight-bold">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('chalaman/index');?>">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <?php
            // Cek jika login
            if ($this->session->userdata('id')) {
                // Login
                echo '<li class="nav-item">';
                echo '<a class="nav-link text-danger" href="' . base_url('chalaman/logout') . '"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a>';
                echo '</li>';
            } else {
                // Tidak login
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . base_url('chalaman/daftar') . '"><i class="fa-solid fa-user-plus"></i> Daftar</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . base_url('chalaman/login') . '"><i class="fa-solid fa-right-from-bracket"></i> Login</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </nav>

    <!-- Container Parent -->
    <div class="container-fluid p-0 text-center">
        <!-- Container for Event Details -->
        <div class="container mt-5">
            <?php if (!empty($event)): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-details">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="<?= base_url('images/' . $event->thumbnail); ?>" class="img-fluid"
                                        alt="<?= $event->nama_event; ?>">
                                </div>
                                <div class="col-md-12">
                                    <div class="harga">
                                        <?php
                                        if ($event->harga != 0) {
                                            echo '<p class="card-harga " style="margin-bottom: 10px;">Rp. ' . $event->harga . '</p>';
                                        } else {
                                            echo '<p class="card-harga " style="color: green;">Gratis</p>';
                                        }
                                        ?> 
                                    </div>
                                    <h2><?= $event->nama_event; ?></h2>
                                    <div class="tanggal">
                                        <p><?= date('l, j-n-Y', strtotime($event->tgl_event)); ?></p>
                                    </div>
                                    <div class="lokasi">
                                        <p>Lokasi: <?= $event->lokasi; ?></p>
                                    </div>
                                    <div class="deskripsi">
                                        <p><?= $event->deskripsi; ?></p>
                                    </div>
                                    <div class="daftar-button">
                                        <a href="<?= $event->link_daftar; ?>" class="btn btn-primary" target="_blank">Daftar Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>No event details available.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer small" style="padding:10px;">
        <div class="container">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-4 mb-0" style="text-align:left;">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-1">Tentang PNBCC</h6>
                    <hr class="mt-0 d-inline-block mx-auto mb-1" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p>
                        PNBCC (Politeknik Negeri Bali Community Center) adalah  website yang berisikan kumpulan informasi kompetisi dan event, baik yang diselenggarakan oleh Unit Kegiatan Mahasiswa, event resmi dari Politeknik Negeri bali hingga event internasional
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mb-md-0 mb-0" style="text-align:left; margin-left:auto;">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-1">Partner & Sponsorship</h6>
                    <hr class="mt-0 d-inline-block mx-auto mb-1" style="width: 60px; background-color: #7c4dff; height: 2px" />
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <div class="text-center text-md-start mt-4">
            <p>&copy; 2024 PNBCC TEAM</p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>