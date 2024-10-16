<!DOCTYPE html>
<html>
<head>
    <title>Preview Question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body, html {
            background-color: #AACF7D;
            height: 100%;
            margin: 0;
            padding: 0;

        }
        .col-sm-2 {
            background-color: #ffffff;
            padding: 15px;
            min-height: 100%;
        }

        .list-group {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .list-group-item {
            border: none;
            width: 100%;
        }
        
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            min-height: 75vh;
        }
        .title-container {
            margin-bottom: 20px;
        }
        .preview-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: auto
        }
        .question-image {
            max-width: 400px;
            height: auto
        }
        .question-content {
            flex-grow: 1;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: left;
            font-size: 18px;
        }

        input[type="radio"] {
            display: none;
        }
        .radio-container label {
            display: flex;
            align-items: center;
            position: relative;
            padding-left: 30px; /* Adjusted padding for circle and text */
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
        
    </style>
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h2 class="text-center" style="width: 100%;">Question Preview</h2>
        </div>
        <div class="preview-container">
            <?php if ($soal->gambar): ?>
                <img src="<?= base_url('soal_material/images/' . $soal->gambar) ?>" class="question-image" alt="Question Image">
            <?php endif; ?>
            <?php if ($soal->audio): ?>
                <audio id="questionAudio" src="<?= base_url('soal_material/audio/' . $soal->audio) ?>" autoplay></audio>
            <?php endif; ?>
            <div class="question-content">
                <p><?= htmlspecialchars($soal->pertanyaan, ENT_QUOTES, 'UTF-8') ?></p>
                <form id="questionForm">
                    <div class="radio-container">
                        <input class="form-check-input" type="radio" name="option" id="optionA" value="a">
                        <label class="form-check-label" style="font-size: 18px;" style="font-size: 18px;" for="optionA" data-label="A">
                            <?= htmlspecialchars($soal->a, ENT_QUOTES, 'UTF-8') ?>
                        </label>
                    </div>
                    <div class="radio-container mt-2">
                        <input class="form-check-input" type="radio" name="option" id="optionB" value="b">
                        <label class="form-check-label" style="font-size: 18px;" for="optionB" data-label="B">
                            <?= htmlspecialchars($soal->b, ENT_QUOTES, 'UTF-8') ?>
                        </label>
                    </div>
                    <div class="radio-container mt-2">
                        <input class="form-check-input" type="radio" name="option" id="optionC" value="c">
                        <label class="form-check-label" style="font-size: 18px;" for="optionC" data-label="C">
                            <?= htmlspecialchars($soal->c, ENT_QUOTES, 'UTF-8') ?>
                        </label>
                    </div>
                    <div class="radio-container mt-2 mb-2">
                        <input class="form-check-input" type="radio" name="option" id="optionD" value="d">
                        <label class="form-check-label" style="font-size: 18px;" for="optionD" data-label="D">
                            <?= htmlspecialchars($soal->d, ENT_QUOTES, 'UTF-8') ?>
                        </label>
                    </div>
                    <button type="button" class="btn text-white mt-3" style="background-color: #355E3B;" onclick="checkAnswer()">Check Answer</button>
                </form>
                <div id="result" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script>
        function checkAnswer() {
            const selectedOption = document.querySelector('input[name="option"]:checked');
            const correctAnswer = "<?= $soal->jawaban ?>";
            const resultDiv = document.getElementById('result');

            if (!selectedOption) {
                resultDiv.innerHTML = '<div class="alert alert-warning">Please select an option.</div>';
                return;
            }

            if (selectedOption.value === correctAnswer) {
                resultDiv.innerHTML = '<div class="alert alert-success">Correct!</div>';
            } else {
                resultDiv.innerHTML = '<div class="alert alert-danger">Incorrect. The correct answer is ' + correctAnswer.toUpperCase() + '.</div>';
            }
        }
    </script>
</body>
</html>