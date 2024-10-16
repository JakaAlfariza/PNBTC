<!DOCTYPE html>
<html>
<head>
    <title>Score</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
            <h1>Test Results</h1>
        </div>
            <p>Congratulations, you have completed the test!</p>
            <p>Listening Score: <?= isset($listening_score) ? $listening_score : 0; ?></p>
            <p>Reading Score: <?= isset($reading_score) ? $reading_score : 0; ?></p>
            <p>Total Score: <?= isset($total_correct) ? $total_correct : 0; ?></p>
        <div class="button-container">
            <a href="<?= base_url('cuser/dashboarduser'); ?>" class="btn btn-custom" style="background-color: #355E3B; color: white; margin-top: 20px;">End Test</a>
        </div>
    </div>
</body>
</html>
