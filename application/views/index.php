<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/home.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/navbar.css'); ?>">
    <link rel="icon" href="<?= base_url('images/logo.png'); ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <title>PNB TOEIC Center</title>
</head>
<body>
    <!-- Header -->
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <div class="header-home" >
        <div class="image-content2" data-aos="fade-up" data-aos-duration="1500">
            <img src="<?= base_url('images/model1p.png'); ?>" alt="TOEIC Test">
        </div>
        <div class="text-content" data-aos="fade-up" data-aos-duration="1500">
            <h1>Empower Your Future with TOEIC!</h1>
            <h5>Unlock Your Potential with TOEIC English Proficiency Computer Based Test, On-Site at Politeknik Negeri Bali.</h5>
            <p><i class="fa-solid fa-circle-check custom-icon"></i> TOEIC Official & Accurate Tests
                <br><i class="fa-solid fa-circle-check custom-icon"></i> Comfortable Test Environment
                <br><i class="fa-solid fa-circle-check custom-icon"></i> Flexible Scheduling</p>
            <a href="<?= base_url('chalaman/login'); ?>" class="test-button" data-aos="zoom-in" data-aos-duration="1500">TEST NOW!</a>
        </div>
        <div class="image-content d-none d-md-block" data-aos="fade-up" data-aos-duration="1500">
            <img src="<?= base_url('images/model1.png'); ?>" alt="TOEIC Test">
        </div>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="feature" data-aos="fade-up" data-aos-delay="200">
            <i class="fa-solid fa-earth-asia custom2"></i>
            <h1>Global Recognition</h1>
            <p>Recognized and valued by organizations, educational institutions, and professionals around the world.</p>
        </div>
        <div class="feature" data-aos="fade-up" data-aos-delay="400">
            <i class="fa-solid fa-hand-holding-dollar custom2"></i>
            <h1>Cheapest English Test</h1>
            <p>TOEIC ensures that more people can access a reputable English proficiency test without breaking the bank.</p>
        </div>
        <div class="feature" data-aos="fade-up" data-aos-delay="600">
            <i class="fa-solid fa-graduation-cap custom2"></i>
            <h1>Academic Excellence</h1>
            <p>Access the best educational resources, become an Awardee and succeed in global academic environments.</p>
        </div>
    </div>

    <!-- About Test Sections -->
    <div class="test-section" data-aos="fade-up" data-aos-duration="1200">
        <h1>About Test</h1>
        <div class="test-box-container">
            <div class="test-box" data-aos="flip-left" data-aos-duration="1800" data-aos-delay="200">
                <img src="<?= base_url('images/listening.jpg'); ?>" alt="Listening Test">
                <h2>Listening Test</h2>
                <p>The Listening Test is a component of English language proficiency assessment that evaluates your ability to understand spoken English in various contexts.</p>
            </div>
            <div class="test-box" data-aos="flip-left" data-aos-duration="1800" data-aos-delay="400">
                <img src="<?= base_url('images/reading.jpg'); ?>" alt="Reading Test">
                <h2>Reading Test</h2>
                <p>The Reading Test is part of the English language proficiency assessment that measures your ability to read and comprehend across a range of texts.</p>
            </div>
        </div>
        <a href="<?= base_url('chalaman/test_info'); ?>" class="learn-more-button" data-aos="fade">Learn More</a>
    </div>

    <!-- Call to Action Section -->
    <div class="cta-section" data-aos="fade" data-aos-duration="1000">
        <h1>Test Environment</h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-aos="zoom-in" data-aos-duration="1000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url('images/c1.jpg'); ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url('images/c2.jpg'); ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url('images/c3.jpg'); ?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" data-aos="fade-up" data-aos-duration="1000">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" data-aos="fade-up" data-aos-duration="1000">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <p data-aos="fade">"Achieve your dream TOEIC score! by taking practice sessions for FREE!"</p>
        <a href="<?= base_url('chalaman/daftar'); ?>" class="cta-button" data-aos="fade">SIGN-UP NOW!</a>
    </div>

    <!-- FAQ Section -->
    <div class="FAQ-section" data-aos="fade-up" data-aos-duration="1200">
        <h1>Frequently Asked Questions</h1>
        <div class="faq-container" data-aos="flip-up" data-aos-delay="200">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Where is this TOEIC test center located?
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong> The test can be taken at Bali State Polytechnic</strong>, located at Bukit Jimbaran, Kuta Selatan, Badung - Bali 80361, PO BOX 1064 Tuban. This serene and accessible campus offers a conducive environment for test-taking. The test is administered through a Computer-Based Test (CBT) system, ensuring a streamlined and efficient testing process. 
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How do I register for the TOEIC test?
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>To register for the TOEIC test,</strong> visit the official TOEIC website or the ETS website. You can search for available test dates and locations. Registration can often be completed online through these sites. Some test centers may also allow in-person registration. Be sure to check the specific registration process for your chosen test center, including deadlines and fees.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What should I do if I need to reschedule or cancel my TOEIC test?
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>If you need to reschedule or cancel your TOEIC test</strong>, contact the test center where you registered as soon as possible. The official TOEIC website or the test center should provide detailed information about their rescheduling and cancellation policies. Keep in mind that there may be deadlines and fees associated with rescheduling or canceling your test.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200, // Duration of animation in milliseconds
            once: true
        });
    </script>
</body>
</html>
