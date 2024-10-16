<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/aboutTest.css'); ?>">
</head>
<body>
    <div class="container">
        <div class="main-content">
            <div class="test-info">
                <!-- <h1>About the Test</h1> -->
                <div class="test-question-types">
                    <h2>About Test</h2>
                    <p>The TOEIC tests assess your English-language communication skills for the workplace. Learn about each test, how they benefit you and access official test prep materials.</p>
                    <a href="<?= base_url('cuser/abouttest2'); ?>" class="btn" style="background-color: #355E3B; color: white;">Learn More</a>
                </div>
            </div>
            <div class="explore-videos">
                <h2>Explore TOEIC Videos</h2>
                <div class="video">
                    <iframe width="200" height="113" src="https://www.youtube-nocookie.com/embed/ku6XQTDfYh0" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <p>Preparing for TOEIC® test</p>
                    <span>1:55</span>
                </div>
                <div class="video">
                    <iframe width="200" height="113" src="https://www.youtube-nocookie.com/embed/KbcUp8HFCE0" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <p>Benefits of TOEIC® test</p>
                    <span>2:15</span>
                </div>
                <div class="video">
                    <iframe width="200" height="113" src="https://www.youtube-nocookie.com/embed/ndCUaJLm4sY" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <p>TOEIC® Tests Prove English Language Proficiency</p>
                    <span>2:18</span>
                </div>
            </div>
        </div>
        <div class="preparation-materials">
            <h2>Preparation Materials</h2>
            <ul>
                <li>
                    <h3>How the Test Works</h3>
                    <a href="https://www.ets.org/pdfs/toeic/toeic-bridge-listening-reading-tests-examinee-handbook.pdf">Read More</a>
                </li>
                <li>
                    <h3>How Scores Work</h3>
                    <a href="https://www.ets.org/content/dam/ets-org/pdfs/toeic/toeic-listening-reading-score-descriptors.pdf">Read More</a>
                </li>
                <li>
                    <h3>Test Rules</h3>
                    <a href="https://www.ets.org/content/dam/ets-org/pdfs/toeic/toeic-listening-reading-score-descriptors.pdf">Read More</a>
                </li>
                <li>
                    <h3>Official Test Guide</h3>
                    <a href="https://www.ets.org/content/dam/ets-org/pdfs/toeic/toeic-listening-reading-sample-test.pdf">Download PDF</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
