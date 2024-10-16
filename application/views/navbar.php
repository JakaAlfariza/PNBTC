<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/navbar.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</head>
<body>
    <div class="header container-fluid" data-aos="fade" data-aos-duration="1500">
        <div class="logo">
            <a href="<?= base_url('chalaman/index'); ?>">
                <img id="main-logo" src="<?= base_url('images/logo_home.png'); ?>" data-alt-src="<?= base_url('images/logo.png'); ?>" class="d-inline-block align-top" alt="">
            </a>
        </div>
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars h4"></i>
        </div>
        <div class="contact-info d-none d-md-flex">
            <div><i class="fa-solid fa-chalkboard-user custom1"></i> Work Hour: Mon-Fri, 7am-3pm</div>
            <div><i class="fa-solid fa-square-phone custom1"></i> Phone: (0361)701981</div>
        </div>
    </div>
    <div class="header-under container-fluid" data-aos="fade" data-aos-duration="1500">
        <div class="navbar-left">
            <div class="nav-links">
                <a href="<?= base_url('chalaman/index'); ?>">Home</a>
                <a href="<?= base_url('chalaman/test_info'); ?>">Test Info</a>
                <a href="<?= base_url('chalaman/institutions'); ?>">Institutions</a>
                <a href="<?= base_url('chalaman/contactus'); ?>">Contact us</a>
            </div>
        </div>
        <div class="navbar-right">
            <div class="button-container">
                <a href="<?= base_url('chalaman/daftar'); ?>" class="signin btn">Sign-Up</a>
                <a href="<?= base_url('chalaman/login'); ?>" class="login btn">Login</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar-overlay" id="sidebar-overlay"></div>
    <div class="sidebar" id="sidebar">
        <div class="close-btn" id="close-btn">
            <i class="fas fa-times h4"></i> <!-- Close Icon -->
        </div>
        <div class="sidebar-links">
            <a href="<?= base_url('chalaman/index'); ?>">Home</a>
            <a href="<?= base_url('chalaman/test_info'); ?>">Test Info</a>
            <a href="<?= base_url('chalaman/institutions'); ?>">Institutions</a>
            <a href="<?= base_url('chalaman/contactus'); ?>">Contact us</a>
        </div>
        <div class="button-container">
            <a href="<?= base_url('chalaman/daftar'); ?>" class="signin btn text-center">Sign-Up</a>
            <a href="<?= base_url('chalaman/login'); ?>" class="login btn text-center">Login</a>
        </div>
    </div>

    <!-- Scrolled Navbar -->
    <div class="header-scrolled container-fluid">
        <div class="logo">
            <a href="<?= base_url('chalaman/index'); ?>">
                <img id="main-logo" src="<?= base_url('images/logo_scroll.png'); ?>" data-alt-src="<?= base_url('images/logo.png'); ?>" class="d-inline-block align-top" alt="">
            </a>
        </div>
        <div class="hamburger" id="hamburger-scrolled">
            <i class="fas fa-bars h4"></i>
        </div>
        <div class="navbar-left d-none d-md-block">
            <div class="nav-links">
                <a href="<?= base_url('chalaman/index'); ?>">Home</a>
                <a href=<?= base_url('chalaman/test_info'); ?>>Test Info</a>
                <a href="page3.html">Institutions</a>
                <a href="<?= base_url('chalaman/contactus'); ?>">Contact us</a>
            </div>
        </div>
        <div class="navbar-right d-none d-md-block">
            <div class="button-container">
                <a href="<?= base_url('chalaman/daftar'); ?>" class="signin btn">Sign-Up</a>
                <a href="<?= base_url('chalaman/login'); ?>" class="login btn">Login</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var mainLogo = document.getElementById('main-logo');
            var headerOriginal = document.querySelector('.header');
            var headerScrolled = document.querySelector('.header-scrolled');
            var originalSrc = mainLogo.src;
            var altSrc = mainLogo.getAttribute('data-alt-src');

            window.addEventListener('scroll', function () {
                if (window.innerWidth < 480) {
                    if (window.scrollY > 10) { // Adjust the scroll threshold as needed
                        mainLogo.src = altSrc;
                        headerOriginal.style.opacity = '0'; /* Hide original header smoothly */
                        headerScrolled.classList.add('show'); /* Show scrolled header smoothly */
                    } else {
                        mainLogo.src = originalSrc;
                        headerOriginal.style.opacity = '1'; /* Show original header smoothly */
                        headerScrolled.classList.remove('show'); /* Hide scrolled header smoothly */
                    }
                } else {
                   if (window.scrollY > 44) { // Adjust the scroll threshold as needed
                        mainLogo.src = altSrc;
                        headerOriginal.style.opacity = '0'; /* Hide original header smoothly */
                        headerScrolled.classList.add('show'); /* Show scrolled header smoothly */
                    } else {
                        mainLogo.src = originalSrc;
                        headerOriginal.style.opacity = '1'; /* Show original header smoothly */
                        headerScrolled.classList.remove('show'); /* Hide scrolled header smoothly */
                    } 
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.hamburger').forEach(function(hamburger) {
            hamburger.addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay'); // Get the overlay

                // Toggle the sidebar active class
                sidebar.classList.toggle('active');

                // Check if sidebar is active to manage overlay
                if (sidebar.classList.contains('active')) {
                    overlay.style.opacity = '1'; // Show overlay
                    overlay.style.visibility = 'visible'; // Make overlay visible
                    document.body.classList.add('no-scroll');  // Disable scrolling
                } else {
                    overlay.style.opacity = '0'; // Hide overlay
                    overlay.style.visibility = 'hidden'; // Make overlay hidden
                    document.body.classList.remove('no-scroll');  // Enable scrolling
                }
            });
        });

        // Close button for the sidebar
        document.getElementById('close-btn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay'); // Get the overlay

            sidebar.classList.remove('active'); // Remove active class from sidebar
            overlay.style.opacity = '0'; // Hide overlay
            overlay.style.visibility = 'hidden'; // Make overlay hidden
            document.body.classList.remove('no-scroll');  // Enable scrolling
        });
    </script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        AOS.init({
            duration: 1200, // Duration of animation in milliseconds
            once: true
        });
    </script>
</body>

</html>
