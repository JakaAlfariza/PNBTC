<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/contactus.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/navbar.css'); ?>">
    <link rel="icon" href="<?= base_url('images/logo.png'); ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="contact-container">
    <div class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15771.462281916085!2d115.162487!3d-8.798698!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sen!2sid!4v1721578236161!5m2!1sen!2sid" width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contact-information">
        <h1>Contact Information</h1>
        <hr>
        <p><i class="fas fa-map-marker-alt"></i> <strong>Politeknik Negeri Bali</strong></p>
        <p>Kampus Politeknik Negeri Bali, Bukit Jimbaran, Kuta Selatan,<br> Badung - Bali 80361<br> PO BOX 1064 Tuban</p>
        <p><i class="fas fa-phone"></i> +62 (0361)701981</p>
        <p><i class="fas fa-envelope"></i> poltek@pnb.ac.id</p>
        
        <div class="social-icons">  
            <a href="#"><i style="color: #0a0a0c;" class="fab fa-facebook fa-2x"></i></a>
            <a href="#"><i style="color: #0a0a0c;" class="fab fa-youtube fa-2x"></i></a>
            <a href="#"><i style="color: #0a0a0c;" class="fab fa-instagram fa-2x"></i></a>
            <a href="#"><i style="color: #0a0a0c;" class="fab fa-linkedin fa-2x"></i></a>
        </div>
    </div>
</div>
     
</body>
</html>
