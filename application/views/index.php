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
    <title>Home</title>
    <style>
        #iklan {
            height: 300px;
            overflow: hidden;
            /* Ensure the container doesn't overflow */
        }

        .carousel-inner img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
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
            <li class="nav-item">
                <?php
            // Check if the user is logged in
            if ($this->session->userdata('id')) {
            // User is logged in
            echo '<a class="nav-link text-danger" href="' . base_url('chalaman/logout') . '"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a>';
            }else {
            // User is not logged in
            echo '<a class="nav-link" href="' . base_url('chalaman/login') . '"><i class="fa-solid fa-right-from-bracket"></i> Login</a>';
            }
          ?>
            </li>
        </ul>
    </nav>

    <!-- Container -->
    <div class="container-fluid p-0 text-center">
        <!-- Carousell -->
        <div id="iklan" class="carousel slide" data-ride="carousel" style="width: 100vw;">
            <div class="carousel-inner">
                <?php
                $firstItem = true; // To set the first item as active
                foreach ($karosel as $item):
                ?>
                <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                    <img class="d-block w-100" src="<?php echo base_url('images/' . $item->gambar_k); ?>" alt="<?php echo $item->nama_karosel; ?>">
                </div>
                <?php
                $firstItem = false; 
                endforeach;
                ?>
            </div>
            <!-- Add controls if needed -->
            <a class="carousel-control-prev" href="#iklan" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#iklan" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <?php
      echo '<pre>';
      print_r($this->session->all_userdata());
      echo '</pre>';
      ?>
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