<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/login.css'); ?>">
        <link rel="icon" href="<?= base_url('images/logo.png'); ?>" type="image/png">
        <title>PNB TOEIC Center</title>
        <style>
            .carousel-item {
                transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
                position: absolute;
                width: 100%;
                left: 0;
            }

            .carousel-item-next, .carousel-item-prev, .carousel-item-active {
                opacity: 1;
                transform: translateX(0);
            }

            .carousel-item-next {
                transform: translateX(100%);
            }

            .carousel-item-prev {
                transform: translateX(-100%);
            }

            .carousel-item-prev.carousel-item-left,
            .carousel-item-next.carousel-item-right {
                opacity: 0;
                transform: translateX(0);
            }

        </style>
    </head>

    <body>
        <!-- Container -->
        <div class="container-fluid full-height">
            <div class="row full-height">
                <!-- Left Half: Carousel -->
                <div class="col-md-7 p-0">
                    <div id="carouselExampleIndicators" class="carousel slide full-height" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner full-height"  data-aos="fade">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?= base_url('images/us1.jpg'); ?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url('images/us2.jpg'); ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url('images/us3.jpg'); ?>" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <!-- Right Half: Login Form -->
                <div class="col-md-5 d-flex flex-column justify-content-center align-items-center" data-aos="fade-down">
                    <div class="header-login">
                        <a href="<?= base_url('chalaman/index'); ?>">
                            <img id="main-logo" src="<?= base_url('images/logo_home.png'); ?>" class="d-inline-block align-top" alt="">
                        </a>
                    </div>
                    <!-- Konten -->
                    <?php
                    if (empty($konten)) {
                        echo "";
                    } else {
                        echo $konten;
                    }
                    ?>
                    <a href="<?= base_url('chalaman/index');?>" class="btn-home mt-3 rounded-pill d-flex align-items-center" style="color: primary;">
                        <i class="fa-solid mr-2 fa-arrow-left-long"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        <!-- Lihat password -->
        <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById("passwordInput");
                var eyeIcon = document.getElementById("eyeIcon");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    eyeIcon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                } else {
                    passwordInput.type = "password";
                    eyeIcon.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
                }
            }
        </script>
        <script>
            $(document).ready(function(){
                $('#carouselExampleIndicators').carousel({
                    interval: 5000 
                });
            });
        </script>
        <script>
            AOS.init({
                duration: 1200, // Duration of animation in milliseconds
                once: true
            });
        </script>
    </body>
</html>
