<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('images/logo.png'); ?>" type="image/png">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/aboutTest.css'); ?>">
    <title>PNB TOEIC Center - Test Information</title>
    <style>

.test-info-section {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-wrap: wrap;
}

h1 {
    text-align: center;
    color: #006400;
    margin-bottom: 20px;
    width: 100%;
}

.accordion-button {
    background-color: #006400;
    color: #fff;
    border: none;
    width: 100%;
    text-align: left;
    padding: 15px;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.accordion-button:hover {
    background-color: #004b23;
}

.accordion-button:focus {
    box-shadow: none;
}

.accordion-collapse {
    border-top: 1px solid #ddd;
}

.accordion-body {
    padding: 20px;
    background-color: #f1f1f1;
}

.accordion-body h3 {
    margin-top: 0;
}

.accordion-body ul {
    list-style-type: disc;
    padding-left: 20px;
}

.sidebar-2 {
    padding: 20px;
    background-color: #e9f5ff;
    border-left: 3px solid #006400;
    margin-top: 20px;
    flex: 1;
    margin-left: 20px;
}

.sidebar-2 h2 {
    color: #006400;
}

.sidebar-2 ul {
    list-style-type: none;
    padding: 0;
}

.sidebar-2 ul li {
    margin-bottom: 10px;
    font-size: 16px;
}

.download-link {
    display: block;
    margin-top: 10px;
    color: #006400;
    text-decoration: none;
    font-weight: bold;
}

.download-link:hover {
    text-decoration: underline;
}

.accordion-container {
    flex: 2;
    margin-right: 20px;
}
    </style>
</head>
<body>


    <!-- Test Information Section -->
    <div class="test-info-section" data-aos="fade-up" data-aos-duration="1200">
        <div class="accordion-container">
            <h1>Test information</h1>
            <div class="accordion" id="testInfoAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Why choose the TOEIC Listening and Reading test?
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-parent="#testInfoAccordion">
                        <div class="accordion-body">
                            <h3>Benefits of the TOEIC Test</h3>
                            <ul>
                                <li>Measures written and oral comprehension skills in everyday professional and international settings.</li>
                                <li>Helps in standing out in the job market.</li>
                                <li>Demonstrates your ability to communicate in English with international colleagues and clients.</li>
                                <li>Prepares you for the job market, monitors your progress in English, and improves your skills.</li>
                                <li>Obtains the necessary qualifications to earn a new position and/or promotion in an international company.</li>
                                <li>Completes a degree or meets a graduation requirement.</li>
                                <li>Evaluates, reinforces, and verifies your English language proficiency.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Content and Test Format
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#testInfoAccordion">
                        <div class="accordion-body">
                            <h3>Listening Section</h3>
                            <ul>
                                <li>Part 1: Photographs</li>
                                <li>Part 2: Questions and answers</li>
                                <li>Part 3: Conversations</li>
                                <li>Part 4: Short presentations</li>
                                <li>2h version: 100 questions in 45 minutes</li>
                                <li>1h version, Multistage Adaptive: 45 questions in 25 minutes</li>
                            </ul>
                            <h3>Reading Section</h3>
                            <ul>
                                <li>Part 5: Incomplete sentences</li>
                                <li>Part 6: Text completions</li>
                                <li>Part 7: Reading comprehension</li>
                                <li>2h version: 100 questions in 75 minutes</li>
                                <li>1h version, Multistage Adaptive: 45 questions in around 37 minutes</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            How Can I Register and/or Take the Test?
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#testInfoAccordion">
                        <div class="accordion-body">
                            <h3>Registration Process</h3>
                            <ul>
                                <li>TOEIC® Listening and Reading test sessions are organized year-round at our Public Program test centers throughout France.</li>
                                <li>Check the session dates offered by each center and register directly on our website by clicking on the "Register" button.</li>
                                <li>You'll need to upload a passport-style photo before your test day, as this will appear on your results certificate.</li>
                                <li>If you are taking an English language course or are a student, your training organization, school, or university may offer you the opportunity to take the test as part of your studies or training. Contact your school or university for registration details.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Test Day
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-parent="#testInfoAccordion">
                        <div class="accordion-body">
                            <h3>What to Bring</h3>
                            <ul>
                                <li>A valid form of identification bearing your name and signature.</li>
                                <li>Your admission form.</li>
                                <li>A consent form for candidates under 18, completed and signed by a parent or guardian. Without the completed consent form, you will not be admitted to the testing room.</li>
                                <li>For the paper-and-pencil test, 2 HB pencils and an eraser.</li>
                            </ul>
                            <h3>Additional Information</h3>
                            <ul>
                                <li>On the day of the test, you will be asked to sign an admission form which will be provided either in advance by e-mail during the registration process, or on the spot by test center staff.</li>
                                <li>This admission form is required for taking the test and will be collected by test center staff at the end of the test session.</li>
                                <li>Read the <a href="https://etswebsiteprod.cdn.prismic.io/etswebsiteprod/ZnPW45m069VX153H_MAN037-ProctorExam_TOEIC-4-Skills_EXHB_IP_PP_CBT.pdf">Examinee Handbook</a> to ensure you are fully informed about the test procedure and the identity documents accepted.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Score Report and Delivery Date
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-parent="#testInfoAccordion">
                        <div class="accordion-body">
                            <h3>Score Report</h3>
                            <ul>
                                <li>The TOEIC Listening and Reading test is not a "pass" or "fail" test.</li>
                                <li>You will receive a score report showing your score in each of the four skills.</li>
                                <li>Results are scored from 5 to 495 points each for Listening and Reading sections.</li>
                                <li>The total score is from 10 to 990 points.</li>
                                <li>Each result is correlated with the European Framework of Reference for Languages (CEFR), from level A1 to C1.</li>
                            </ul>
                            <h3>Validity and Delivery</h3>
                            <ul>
                                <li>Results are valid for 2 years.</li>
                                <li>The Public Program score report is valid worldwide.</li>
                                <li>Results can be checked using the QR code on your digital score certificate.</li>
                                <li>Your digital score report will be available in your online account within the day for computer-based tests and between 10 and 15 business days following the test date for paper-and-pencil tests.</li>
                                <li>If you take the test with a training organization or academic institution, your institution will communicate your results directly or your digital results certificate will be made available in your online account.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            How Do I Prepare for the TOEIC Listening and Reading Test?
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-parent="#testInfoAccordion">
                        <div class="accordion-body">
                            <h3>Preparation Resources</h3>
                            <ul>
                                <li><a href="https://etswebsiteprod.cdn.prismic.io/etswebsiteprod/29619a45-b3ed-4cdc-9fa4-8bd03a86b74f_toeic-listening-reading-sample-test.pdf">An example</a> of a TOEIC Listening and Reading test with the <a href="https://etswebsiteprod.cdn.prismic.io/etswebsiteprod/32325931-b50b-4959-9b79-fcd744eb2b89_Audio+Files+for+TOEIC+Sample+Test.zip">audio file</a> for the Listening section.</li>
                                <li>TOEIC Official Learning and Preparation Course: a self-study program available online 24/7 with 90 hours of learning and test preparation material in 3 units.</li>
                                <li>Coming soon: a free practice TOEIC Listening and Reading test to study for the test and obtain your CEFR level.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Remote Proctored Test
                            <i class="fa-solid fa-chevron-down icon-toggle"></i>
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-parent="#testInfoAccordion">
                        <div class="accordion-body">
                            <h3>Remote Proctoring</h3>
                            <ul>
                                <li>You can take the TOEIC Listening and Reading test (1h or 2h) with remote proctoring.</li>
                                <li>Available only for candidates who register with a higher education institution or training organization.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar sidebar-2">
            <h2>Quick Info</h2>
            <ul>
                <li>Total Test Length: 2 hours or 1 hour (only available for professional organizations)</li>
                <li>Score Validity: 2 years</li>
                <li>Format: pencil and paper or online (on a computer or tablet)</li>
                <li>Levels assessed: beginner to advanced (A1 to C1 according to CECRL)</li>
                <li>Skills assessed: reading and listening comprehension via multiple choice questions</li>
                <li>Test Discounts are available for: students, members of the armed forces, and job seekers</li>
            </ul>
            <a href="https://etswebsiteprod.cdn.prismic.io/etswebsiteprod/ZnPW45m069VX153H_MAN037-ProctorExam_TOEIC-4-Skills_EXHB_IP_PP_CBT.pdf" class="download-link">TOEIC Examinee Handbook (version 2h and 1h)</a>
            <a href="https://etswebsiteprod.cdn.prismic.io/etswebsiteprod/4b110407-502b-46a9-bb2f-0fab65976fa9_ETS+Consent+Form.pdf" class="download-link">Consent form for test takers under 18 years of age</a>
        </div>
    </div>
</body>
</html>
