<!DOCTYPE html>
<html>
<head>
    <title>Section Intro</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            margin-top: 30px;
            margin-bottom: 30px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            min-height: 100%;
            align-items: center;
        }
        .title-container {
            margin-bottom: 20px;
        }
        .preview-container {
            text-align: center;
        }
        .section-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .section-content {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .btn-custom {
            margin-top: 20px;
            background-color: #355E3B;
            color: white;
            width: 150px;
        }
        .button-container {
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid grey;
            width: 90%;
            margin-left: 50px;
        }

        .section-content p{
            overflow-wrap: break-word;
            white-space: normal;
            max-width: 83%;
            font-size: 18px;
            margin-bottom: 10px;
            margin-left: 80px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="title-container">
            <div id="timer"></div>
            <h2 class="text-center" style="width: 100%;"><?= htmlspecialchars($section->nama_section, ENT_QUOTES, 'UTF-8') ?></h2>
        </div>
        <div class="section-content">
            <?php if ($section->audio_section): ?>
                <audio id="sectionAudio" src="<?= base_url('section_material/audio/' . $section->audio_section) ?>" autoplay></audio>
            <?php endif; ?>
            <strong><p><?= htmlspecialchars($section->tipe_section . " Section", ENT_QUOTES, 'UTF-8') ?></p></strong>
            <p><?= $section->deskrip_section ?></p>
            <div class="preview-container">
                <?php if ($section->gambar_section): ?>
                    <img src="<?= base_url('./section_material/images/' . $section->gambar_section) ?>" class="section-image" alt="Section Image">
                <?php endif; ?> 
            </div>
        </div>
        <div class="button-container">
            <button type="button" class="btn btn-custom text-white" onclick="startSection()">Start Section</button>
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
        // Extract duration from PHP variable
        let timerString = '<?= $section->timer; ?>'; // Format should be 'mm:ss'

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
                    endSection(); // Automatically proceed to the next section when the timer ends
                }
                timeLeft--;
            }

            updateTimer(); // Initial call to display the timer immediately
            timerInterval = setInterval(updateTimer, 1000); // Update every second
        }

        function setupAudioAndTimer() {
            const audioElement = document.getElementById('sectionAudio');
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

        function startSection() {
            window.location.href = '<?= base_url("cpractice/show_questions/") ?>' + <?= json_encode($section->id_section); ?>;
        }
        
        function renderIntro() {
            document.getElementById('timer').innerText = formatTime(convertTimeToSeconds(timerString));
            setupAudioAndTimer(); // Start audio and timer when section starts
        }

        function endSection() {
            window.location.href = '<?= base_url("cpractice/show_questions/") ?>' + <?= json_encode($section->id_section); ?>;
        }

        window.onpopstate = function(event) {
            endSession();
        };

        function endSession() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= base_url("index.php/cpractice/end_session") ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Session ended');
                }
            };
            xhr.send();
        }
        
        function handleVisibilityChange() {
            if (document.hidden) {
                $('#alertModal').modal('show'); // Show modal when the page is not visible
            }
        }

        function handleFocusBlur() {
            let hasShownModal = false;
            window.addEventListener('blur', function() {
                if (!hasShownModal) {
                    $('#alertModal').modal('show'); // Show modal when the window loses focus
                    hasShownModal = true;
                }
            });

            window.addEventListener('focus', function() {
                hasShownModal = false; // Reset the flag when the window regains focus
            });
        }

        document.addEventListener('visibilitychange', handleVisibilityChange);

        document.addEventListener('DOMContentLoaded', function() {
            renderIntro(); // Automatically start the section and setup audio and timer when page loads;
        });


    </script>

</body>
</html>
