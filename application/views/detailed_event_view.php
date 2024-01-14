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
        #iklan {
            height: 350px;
            overflow: hidden;
        }

        .carousel-inner img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .body {
            background-color: #e8e8e8;
            overflow-x: hidden; /* Add this style to prevent horizontal scrolling */
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
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px; /* Adjust the gap between cards as needed */
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

        .card img {
            width: 100%;
            height: 150px; /* Set the desired height for the card images */
            object-fit: cover;
        }
    </style>
</head>

<body class="body">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= base_url('chalaman/index');?>">
            <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
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
            <?php
                // Cek jika login
                if ($this->session->userdata('id')) {
                // Login
                echo '<li class="nav-item">';
                echo '<a class="nav-link text-danger" href="' . base_url('chalaman/logout') . '"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a>';
                echo '</li>';
                }else {
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

    <!-- Container Parent -->
    <div class="container-fluid p-0 text-center">
        <!-- Container for Event Details -->
        <div class="container mt-5">
            <?php if (!empty($event)): ?>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= base_url('images/' . $event->thumbnail); ?>" class="img-fluid"
                            alt="<?= $event->nama_event; ?>">
                    </div>
                    <div class="col-md-6">
                        <h2><?= $event->nama_event; ?></h2>
                        <p><?= $event->deskripsi; ?></p>
                        <ul>
                            <li>Tanggal Mulai: <?= $event->tgl_awal; ?></li>
                            <li>Tanggal Selesai: <?= $event->tgl_akhir; ?></li>
                            <li>Tanggal Event: <?= $event->tgl_event; ?></li>
                            <li>Lokasi: <?= $event->lokasi; ?></li>
                            <li>Harga: <?= $event->harga; ?></li>
                            <li>Penyelenggara: <?= $event->penyelenggara; ?></li>
                            <li>Tingkat Event: <?= $event->tingkat_event; ?></li>
                            <!-- Add more details as needed -->
                        </ul>
                        <!-- Add any additional content or buttons here -->
                    </div>
                </div>
            <?php else: ?>
                <p>No event details available.</p>
            <?php endif; ?>
        </div>
    </div>




<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>