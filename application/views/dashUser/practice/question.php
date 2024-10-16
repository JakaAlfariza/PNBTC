<!DOCTYPE html>
<html>
<head>
    <title>Question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body, html {
            background-color: #AACF7D;
            min-height: 80%;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            max-width: 900px;
            width: 100%;
            margin-top: 40px;
        }
        .title-container {
            margin-bottom: 20px;
        }
        .preview-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        .question-image {
            max-width: 400px;
            height: auto;
        }
        .question-content {
            flex-grow: 1;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            font-size: 18px;
        }
        .button-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        input[type="radio"] {
            display: none;
        }
        .radio-container label {
            display: flex;
            align-items: center;
            position: relative;
            padding-left: 30px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .radio-container label::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border: 2px solid #355E3B;
            border-radius: 50%;
            background: #fff;
            transition: background 0.3s, border-color 0.3s;
            transform: translateY(26%);
        }
        .radio-container label::after {
            content: attr(data-label);
            position: absolute;
            left: 6px;
            top: 2px;
            font-size: 12px;
            color: #355E3B;
            transform: translateY(22%);
        }
        input[type="radio"]:checked + label::before {
            background-color: #355E3B;
            border-color: #355E3B;
        }
        input[type="radio"]:checked + label::after {
            color: #fff;
        }
        input[type="radio"]:checked + label {
            font-weight: bold;
        }

        #timer {
            font-size: 20px;
            font-weight: bold;
            color: #355E3B;
            border: 1px solid grey;
            padding: 0px 20px 0px 20px;
            display: inline-block;
            border-radius: 4px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid grey;
            width: 100%;
        }
    </style>
</head>
<body>
    
    <div class="container">        
        <div class="title-container">
            <div id="timer"></div>
        </div>
        <div class="preview-container">
            <div id="question-image-container"></div>
            <div class="question-content">
                <h5 class="text mb-3" style="width: 100%; font-weight: bold;">Question <?= $question_number; ?></h5>
                <p id="question-text"></p>
                <form id="questionForm">
                    <div class="radio-container">
                        <input class="form-check-input" type="radio" name="option" id="optionA" value="a">
                        <label class="form-check-label" for="optionA" data-label="A" style="font-size: 18px;">
                            <span id="optionALabel"></span>
                        </label>
                    </div>
                    <div class="radio-container mt-2">
                        <input class="form-check-input" type="radio" name="option" id="optionB" value="b">
                        <label class="form-check-label" for="optionB" data-label="B" style="font-size: 18px;">
                            <span id="optionBLabel"></span>
                        </label>
                    </div>
                    <div class="radio-container mt-2">
                        <input class="form-check-input" type="radio" name="option" id="optionC" value="c">
                        <label class="form-check-label" for="optionC" data-label="C" style="font-size: 18px;">
                            <span id="optionCLabel"></span>
                        </label>
                    </div>
                    <div class="radio-container mt-2 mb-2">
                        <input class="form-check-input" type="radio" name="option" id="optionD" value="d">
                        <label class="form-check-label" for="optionD" data-label="D" style="font-size: 18px;">
                            <span id="optionDLabel"></span>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="button-container">
            <button type="button" class="btn btn-custom text-white" style="background-color: #355E3B; margin-top: 20px;" onclick="nextQuestion()">Next Question</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Attention</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please do not switch tabs or minimize the window.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let question = <?= json_encode($question); ?>;
        let isLastQuestion = <?= json_encode($is_last_question); ?>;
        let timerString = '<?= $timer; ?>';

        function convertTimeToSeconds(timeString) {
            let timeParts = timeString.split(':');
            let minutes = parseInt(timeParts[1], 10);
            let seconds = parseInt(timeParts[2], 10);
            return (minutes * 60) + seconds;
        }

        function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            seconds = seconds % 60;
            return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        function startTimer() {
            let timerDuration = convertTimeToSeconds(timerString);
            let timeLeft = timerDuration;
            const timerElement = document.getElementById('timer');

            function updateTimer() {
                timerElement.innerText = formatTime(timeLeft);

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    nextQuestion(); // Automatically proceed to the next question when the timer ends
                }
                timeLeft--;
            }

            updateTimer(); // Initial call to display the timer immediately
            timerInterval = setInterval(updateTimer, 1000); // Update every second
        }

        function setupAudioAndTimer() {
            const audioElement = document.getElementById('questionAudio');
            if (audioElement) {
                audioElement.addEventListener('ended', function() {
                    startTimer(); // Start timer after audio ends
                });

                audioElement.addEventListener('error', function() {
                    console.error('Error loading audio file.');
                    startTimer(); // Start timer immediately if there's an error with the audio
                });

                audioElement.play().catch(error => {
                    console.error('Error playing audio:', error);
                    startTimer(); // Start timer if audio fails to play
                });
            } else {
                startTimer(); // Start timer immediately if no audio
            }
        }

        function renderQuestion() {
            const questionText = document.getElementById('question-text');
            const optionALabel = document.getElementById('optionALabel');
            const optionBLabel = document.getElementById('optionBLabel');
            const optionCLabel = document.getElementById('optionCLabel');
            const optionDLabel = document.getElementById('optionDLabel');
            const questionImageContainer = document.getElementById('question-image-container');

            questionText.innerText = question.pertanyaan;
            optionALabel.innerText = question.a;
            optionBLabel.innerText = question.b;
            optionCLabel.innerText = question.c;
            optionDLabel.innerText = question.d;

            let contentHtml = '';
            if (question.gambar) {
                contentHtml += '<img src="<?= base_url("soal_material/images/") ?>' + question.gambar + '" class="question-image" alt="Question Image">';
            }
            if (question.audio) {
                contentHtml += '<audio id="questionAudio" src="<?= base_url("soal_material/audio/") ?>' + question.audio + '" preload="auto"></audio>';
            }
            questionImageContainer.innerHTML = contentHtml;

            if (isLastQuestion) {
                const nextButton = document.querySelector('.btn-custom');
                nextButton.innerText = 'Next Section';
            }

            document.getElementById('timer').innerText = formatTime(convertTimeToSeconds(timerString));
        }

        function nextQuestion() {
            const idSection = <?= json_encode($section->id_section); ?>;
            const selectedOptionElement = document.querySelector('input[name="option"]:checked');

            let selectedOption = null;
            if (selectedOptionElement) {
                selectedOption = selectedOptionElement.value;
            }

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= base_url("cpractice/next_question") ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.status === 'continue') {
                            // Redirect to the next question
                            window.location.href = '<?= base_url("cpractice/show_questions/") ?>' + response.id_section;
                        } else if (response.status === 'next_section') {
                            // Redirect to the section intro
                            window.location.href = '<?= base_url("cpractice/show_section_intro/") ?>' + response.id_section;
                        } else if (response.status === 'complete') {
                            alert('No more sections available. Completing the test.');
                            window.location.href = '<?= base_url("cpractice/complete") ?>';
                        }
                    } catch (e) {
                        console.error('Error parsing JSON response:', e);
                    }
                } else {
                    console.error('Request failed. Returned status of ' + xhr.status);
                }
            };
            xhr.send('id_section=' + idSection + '&selected_option=' + (selectedOption || 'none'));
        }

        document.addEventListener('DOMContentLoaded', function() {
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
            renderQuestion();
            setupAudioAndTimer();
        });

        let hasShownModal = false;

        // Handle visibility change (e.g., switching tabs)
        function handleVisibilityChange() {
            if (document.hidden) {
                $('#alertModal').modal('show'); // Show modal when the page is not visible
            }
        }

        // Handle window focus/blur
        function handleFocusBlur() {
            window.addEventListener('blur', function() {
                if (!hasShownModal && !document.hidden) {
                    $('#alertModal').modal('show'); // Show modal when the window loses focus
                    hasShownModal = true;
                }
            });

            window.addEventListener('focus', function() {
                hasShownModal = false; // Reset the flag when the window regains focus
            });
        }

        // Initialize event listeners
        document.addEventListener('visibilitychange', handleVisibilityChange);
        handleFocusBlur();


    </script>


</body>
</html>
