<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <title>Home</title>
    <style>
        #iklan {
            margin-top: 65px;
            height: 300px;
            overflow: hidden;
        }

        .carousel-inner img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .btn{
            background-color: #004789;
            color: #ffffff;
        }

        .body {
            background-color: #e8e8e8;
            overflow-x: hidden; /* Add this style to prevent horizontal scrolling */
            width: 100vw;
        }

        .container-parent {
            padding: 0;
            margin-left: 8px;
            margin-right: 8px;
        }

        .container-child {
            background-color: #ffffff;
            width: 90%;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Adjust the gap between cards as needed */
            margin-bottom: 40px;
        }

        .card {
            width: calc(25% - 20px); /* Adjust the width of each card and consider the gap */
            box-sizing: border-box;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow effect */
            transition: transform 0.3s ease-in-out;
        }

        .card:hover{
            transform: scale(1.1);
        }

        .card:active{
            transform: scale(0.75);
        }

        .card img {
            width: 100%;
            height: 150px; /* Set the desired height for the card images */
            object-fit: cover;
        }

    </style>
</head>

<body class="body">
    <!-- Navbar -->
    <?php 
    $homepage = false;
    $profile = true;
    include 'navbar.php'; 
    ?>

    <!-- Container Parent-->
    <div class="container-fluid p-0 text-center">
        <!-- Karosel -->
        <div id="iklan" class="carousel slide mb-4" data-ride="carousel" style="width: 100vw;">
            <div class="carousel-inner">
                <?php
                $firstItem = true;
                foreach ($karosel as $item_karosel):
                ?>
                <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                    <img class="d-block w-100" src="<?php echo base_url('images/' . $item_karosel->gambar_k); ?>" alt="<?php echo $item_karosel->nama_karosel; ?>">
                </div>
                <?php
                $firstItem = false; 
                endforeach;
                ?>
            </div>
            <!-- Button panah -->
            <a class="carousel-control-prev" href="#iklan" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#iklan" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <h3 class="text-left" style="margin-left: 85px;">List Event</h3>
        <!-- Button Kategori -->
            <div class="text-left mb-4" style="margin-left: 85px;">
                <button class="btn category-filter" data-category="all">Semua Event</button>
                <?php foreach ($kategori as $item_kategori): ?>
                    <button class="btn category-filter" data-category="<?= $item_kategori->id_kategori; ?>">
                        <?= $item_kategori->nama_kategori; ?>
                    </button>
                <?php endforeach; ?>
            </div>

        <!-- Child Container -->
        <div class="container-child">
            <div class="card-container">
                <!-- Card Event -->
                <?php
                    foreach ($event as $item_event):
                ?>
                <div class="card clickable-card" data-event-id="<?= $item_event->id_event; ?>" data-category="<?= $item_event->id_kategori; ?>">
                    <img src="<?= base_url('images/' . $item_event->thumbnail); ?>" class="card-img-top" alt="<?= $item_event->nama_event; ?>">
                    <div class="card-body" style="text-align:left;">
                        <h5 class="card-title" style="margin-bottom: 5px;"><?= $item_event->nama_event; ?></h5>
                        <p class="card-date small" style="margin-bottom: 0px;"><?= strftime('%A %H:%M %e %B %Y', strtotime($item_event->tgl_event)); ?></p>
                        <p class="card-text small" style="margin-bottom: 0px;"><?= substr($item_event->deskripsi, 0, 100); ?>...</p>
                        <?php
                        if ($item_event->harga != 0) {
                            $formatted_price = 'Rp. ' . number_format($item_event->harga, 0, ',', '.');
                            echo '<p class="card-harga small" style="margin-bottom: 10px;">' . $formatted_price . '</p>';
                        } else {
                            echo '<p class="card-harga small" style="color: green; margin-bottom: 10px;">Gratis</p>';
                        }
                        ?> 
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
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