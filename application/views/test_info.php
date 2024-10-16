<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The TOEIC® Tests</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        :root {
            --primary-color: #007bff;
            --primary-color-hover: #0056b3;
            --secondary-color: #333;
            --background-color: #f5f5f5;
            --white-color: #fff;
            --box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            --border-radius: 8px;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
            color: var(--secondary-color);
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .nav-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px; 
            margin-bottom: 20px;
        }

        .nav-buttons button {
            flex: 1; 
            padding: 10px 20px;
            background-color: darkgreen;
            color: var(--white-color);
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center; 
        }

        .nav-buttons button:hover {
            background-color: var(--primary-color-hover);
        }

        .content {
            background-color: var(--white-color);
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        h1, h2 {
            color: var(--secondary-color);
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <h2>About the TOEIC Listening and Reading Test</h2>
        <p>The TOEIC Listening and Reading test assesses your English-language listening and reading skills for the workplace...</p>
        <div class="nav-buttons">
            <button onclick="showContent('about')">Learn About TOEIC</button>
            <button onclick="showContent('preparation')">Prepare for the Test</button>
            <button onclick="showContent('testday')">Test Day</button>
            <button onclick="showContent('scores')">Scores</button>
        </div>
        <div id="content" class="content">
            <!-- Default content goes here -->
            
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <script>
        function showContent(section) {
            var content = document.getElementById('content');
            if (section === 'about') {
                content.innerHTML = `
                    <h2>About the TOEIC Listening and Reading Test</h2>
                    <p>
                        The TOEIC Listening and Reading test is a multiple-choice assessment. There are two timed sections of 100 questions each.
                    </p>
                    <h3>Test length</h3>
                    <p>
                        The test takes about 2.5 hours total:
                        <ul>
                            <li>45 minutes for Section I: Listening</li>
                            <li>75 minutes for Section II: Reading</li>
                            <li>About 30 minutes to answer biographical questions</li>
                        </ul>
                    </p>
                    <h3>Section I: Listening</h3>
                    <p>
                        Listen to a variety of questions and short conversations recorded in English, then answer questions based on what you have heard (100 items total).
                        <ul>
                            <li>Part 1: Photographs</li>
                            <li>Part 2: Question-Response</li>
                            <li>Part 3: Conversations</li>
                            <li>Part 4: Talks</li>
                        </ul>
                    </p>
                    <h3>Section II: Reading</h3>
                    <p>
                        Read a variety of materials and respond at your own pace (100 items total).
                        <ul>
                            <li>Part 5: Incomplete Sentences</li>
                            <li>Part 6: Text Completion</li>
                            <li>Part 7: Reading Comprehension</li>
                        </ul>
                    </p>`;
            } else if (section === 'preparation') {
                content.innerHTML = `
                    <h2>Prepare for the Test</h2>
                    <p>
                        TOEIC® Official Learning and Preparation Course Online
                        Using real-life workplace scenarios and real TOEIC test questions, this course helps you prepare for the TOEIC Listening and Reading test. It includes:
                        <ul>
                            <li>three learning modules, from beginner to advanced</li>
                            <li>interactive exercises that reflect workplace situations and tasks</li>
                            <li>voice narration in the same voices you’ll hear on the actual TOEIC test</li>
                            <li>automated score report</li>
                            <li>an assessment of their strengths and areas where they can improve</li>
                        </ul>
                    </p>`;
            } else if (section === 'testday') {
                content.innerHTML = `
                    <h3>What to bring</h3>
                    <p>
                        You must bring two forms of valid identification (ID) with your name, signature and photograph. ID cannot be expired. For complete information on ID requirements, be sure to review the Examinee Handbook for your test.
                    </p>
                    <h3>Prohibited personal items</h3>
                    <p>
                        You’re not allowed to keep your personal belongings with you while taking the test. Personal belongings may be left in your car or a locker if one is provided at the test center. View a list of prohibited items in the Examinee Handbook.
                    </p>
                    <h3>Test security and test center procedures</h3>
                    <p>
                        Test security is very important to ETS. Test center staff must follow policies and procedures to ensure the test is administered fairly and securely. If you fail to follow the instructions of the test center staff, you won't be permitted to test, and your test fee won't be refunded. Any violation of security procedures during the test or during a break may result in dismissal from the test center and/or cancellation of your test scores. You can review all the security policies and procedures in the Examinee Handbook.
                    </p>`;
            } else if (section === 'scores') {
                content.innerHTML = `
                    <h2>Scores</h2>
                    <p>
                        You can use TOEIC scores to measure how well you’ll perform in the workplace and real-life situations where you need to communicate in English. They can help advance your career, get more job opportunities, and prepare you for higher education programs.
                    </p>
                    <h3>Use of Scores</h3>
                    <p>
                        Corporations and government agencies use TOEIC scores to make hiring decisions and determine if employees have the English-communication skills needed to carry out specific job responsibilities or communicate successfully when working in an English-speaking country.
                    </p>
                    <p>
                        Universities, high schools and other education institutions use scores to determine if students have met specific levels of English proficiency and if they have the skills needed to communicate effectively in their careers once they graduate.
                    </p>
                    <p>
                        English training programs use TOEIC scores to help place incoming students, show student progress, and evaluate the effectiveness of their program.
                    </p>`;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            showContent('about');
        });
    </script>
    
</body>
</html>
