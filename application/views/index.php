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
            margin-bottom: 30px;
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

        .footer {
            background-color: #333; /* Dark background color for the footer */
            color: white; /* Text color for the footer */
            padding: 20px;
            text-align: center;
            bottom: 0;
            width: 100%;
        }

        #searchDropdown {
            padding: 0; /* Set padding of the button to zero */
        }

        #searchDropdown i {
            margin: 0; /* Set margin of the icon to zero */
            padding: 0; /* Set padding of the icon to zero */
        }


    </style>
</head>

<body class="body">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="<?= base_url('chalaman/index');?>">
            <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0" id="searchForm">
                <div class="input-group mt" style="background-color: white;">
                    <input class="form-control" id="searchQuery" type="search" placeholder="Search Event" aria-label="Search">
                </div>
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="searchDropdown">
                    <i class="fas fa-search"></i>
                </button>
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

    <h3 class="text-left" style="margin-left: 85px;">Event List</h3>
    <!-- Add category buttons here -->
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
            <?php foreach ($event as $item_event): ?>
                <div class="card clickable-card" data-event-id="<?= $item_event->id_event; ?>" data-category="<?= $item_event->id_kategori; ?>">
                    <img src="<?= base_url('images/' . $item_event->thumbnail); ?>" class="card-img-top" alt="<?= $item_event->nama_event; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item_event->nama_event; ?></h5>
                        <p class="card-text"><?= substr($item_event->deskripsi, 0, 100) . '...'; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Tanggal Event: <?= $item_event->tgl_event; ?></li>
                        <li class="list-group-item">Lokasi: <?= $item_event->lokasi; ?></li>
                        <li class="list-group-item">Harga: <?= $item_event->harga; ?></li>
                    </ul>
                    <div class="card-body">
                        <!-- Add any additional actions or links here -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 PNBCC TEAM</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

<script>
   $(document).ready(function () {
        var debounceTimer;

        $('#searchQuery').on('keyup', function () {
            clearTimeout(debounceTimer);

            var query = $(this).val();

            if (query.length >= 3) {
                debounceTimer = setTimeout(function () {
                    $.ajax({
                        url: '<?= base_url('chalaman/searchEvent'); ?>',
                        method: 'GET',
                        data: { query: query },
                        success: function (response) {
                            // Update the dropdown with search results
                            $('#searchDropdown').html(response).show();
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                        }
                    });
                }, 300); // Adjust the delay (in milliseconds) as needed
            } else {
            
            }
        });

        // Search button click event
        $('#searchButton').on('click', function () {
            performSearch();
        });

        $('#searchDropdown').on('click', '.search-result-item', function () {
            var value = $(this).data('value');
            selectSuggestion(value);
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('#searchDropdown').length && !$(e.target).is('#searchQuery')) {
            
            }
        });

        // Function to handle selecting a suggestion from the dropdown
        function selectSuggestion(value) {
            $('#searchQuery').val(value);
        
            $('#searchForm').submit();
        }

        // Function to handle search button click
        function performSearch() {
            var query = $('#searchQuery').val();

            if (query.length >= 3) {
                $.ajax({
                    url: '<?= base_url('chalaman/searchEvent'); ?>',
                    method: 'GET',
                    data: { query: query },
                    success: function (response) {
                        // Handle the search results as needed
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            } else {
                // Handle the case when the search query is less than 3 characters
                alert('Please enter at least 3 characters for search');
            }
        }
    });




    document.addEventListener('DOMContentLoaded', function () {
        var cards = document.querySelectorAll('.clickable-card');
        var categoryButtons = document.querySelectorAll('.category-filter');

        categoryButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var selectedCategory = this.getAttribute('data-category');

                cards.forEach(function (card) {
                    var cardCategory = card.getAttribute('data-category');

                    if (selectedCategory === 'all' || selectedCategory === cardCategory) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        cards.forEach(function (card) {
            card.addEventListener('click', function () {
                var eventId = this.getAttribute('data-event-id');
                window.location.href = '<?= base_url('cdetail/detailEvent/'); ?>' + eventId;
            });
        });
    });
</script>

</body>
</html>