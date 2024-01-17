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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?php include 'script.php'; ?>
    
    <title>Detail event</title>
    
    <style>
        .body {
            background-color: #e8e8e8;
            margin: 0; 
            padding: 0; 
        }

        .container-details {
            background-color: #ffffff;
            padding: 0;
            margin-top: 20px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
            margin-bottom: 50px;
        }

        .container-details img {
            width: 100%;
            height: 350px;
            margin-bottom: 20px;
            object-fit: cover;
        }

        .container-details h2 {
            text-align: left;
            font-size: 36px;
            margin-top: 20px;
            margin-bottom: 0px;
            padding-left: 20px; 
        }

        .container-details .tanggal {
            padding-left: 20px; 
            text-align: left;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .container-details .penyelenggara,
        .container-details .tanggal-daftar,
        .container-details .lokasi,
        .container-details .tingkat-event
        {
            padding-left: 20px; 
            text-align: left;
            font-size: 16px;
            margin-bottom: -15px;
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
            font-size: 16px;
            margin-bottom: 20px;
            width: 100%;
            word-wrap: break-word; 
        }

        .container-details .back {
            padding: 20px;
            text-align: center;
            font-size: 16px;
            width: 100%;
            color: blue;
        }

        .daftar-button a.btn {
            background-color: #003366;
            color: #ffffff;
            padding: 10px 30px;
            font-size: 16px;
            transition: transform 0.2s ease-in-out;
            margin-bottom: 0px;
        }

        .daftar-button a.btn:hover {
            transform: scale(1.05);
        }

        .daftar-button a.btn:active {
            transform: scale(0.95);
        }
    </style>
</head>

<body class="body">
    <!-- Navbar -->
    <?php 
    $homepage = true;
    $profile = true;
    include 'navbar.php'; 
    ?>

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
                                            $formatted_price = 'Rp. ' . number_format($event->harga, 0, ',', '.');
                                            echo '<p class="card-harga small" style="margin-bottom: 10px;">' . $formatted_price . '</p>';
                                        } else {
                                            echo '<p class="card-harga " style="color: green;">Gratis</p>';
                                        }
                                        ?> 
                                    </div>
                                    <h2><?= $event->nama_event; ?></h2>
                                    <div class="tanggal">
                                        <p><?= strftime('%A %H:%M'." WITA, ". '%e %B %Y', strtotime($event->tgl_event)); ?></p>
                                    </div>
                                    <div class="penyelenggara">
                                        <p>Penyelenggara: <?= $event->penyelenggara; ?></p>
                                    </div>
                                    <div class="tanggal-daftar">
                                        <p>Tanggal Pendaftaran: <?= strftime('%e %B %Y', strtotime($event->tgl_awal)); ?> - <?= strftime('%e %B %Y', strtotime($event->tgl_akhir)); ?></p>
                                    </div>
                                    <div class="lokasi">
                                        <p>Lokasi: <?= $event->lokasi; ?></p>
                                    </div>
                                    <div class="tingkat-event">
                                        <p>Tingkat Event: <?= $event->tingkat_event; ?></p>
                                    </div>
                                    <div class="deskripsi">
                                        <p><?= $event->deskripsi; ?></p>
                                    </div>
                                    <div class="daftar-button">
                                        <a href="<?= $event->link_daftar; ?>" class="btn btn-primary" target="_blank">Daftar Sekarang</a>
                                    </div>
                                    <div class="back">
                                        <p><a href="<?= base_url('chalaman/index'); ?>">Kembali Ke Halaman Utama </a><i class="fa-solid fa-circle-arrow-left"></i></p>
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
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</html>