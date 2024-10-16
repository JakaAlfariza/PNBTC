<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certificate Preview</title>
    <style>
        /* Add your styling here */
        body, html {
            background-color: #AACF7D;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 40px;
        }
        .content-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 30px;
            width: 90%;
            max-width: 800px;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
        }
        .display-1 {
            font-size: 4rem;
            line-height: 1;
        }
        .card h5 {
            color: #666;
            font-weight: normal;
            margin-bottom: 0.5rem;
        }
        .card p {
            margin-bottom: 0.5rem;
            color: #333;
        }
        .btn-custom {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #355E3B;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-custom:hover {
            background-color: #2e4d33;
        }
        .btn-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="content-container">
            <!-- Score card -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h5>Overall</h5>
                            <h1 class="display-1 fw-bold"><?php echo $result->nilai_total; ?></h1>
                        </div>
                        <div class="col-8">
                            <h5>Test Score</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p>Listening <span class="float-end fw-bold"><?php echo $result->nilai_listening; ?></span></p>
                                </div>
                                <div class="col-6">
                                    <p>Reading <span class="float-end fw-bold"><?php echo $result->nilai_reading; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status and description -->
            <div class="card">
                <div class="card-body">
                    <h4>STATUS</h4>
                    <p class="text-success">
                     PASSED! <i class="bi bi-check-circle-fill"></i>
                    </p>
                    <h4>SCORE DESCRIPTION</h4>
                    <p><strong>Intermediate</strong></p>
                    <p>An "intermediate" level score on an English test shows that you have a decent understanding of the language and can use it in everyday situations. Here's what it means in simpler terms:</p>
                    <ol>
                      <li>
                        <strong>Reading:</strong> You can understand the main points and some details in short and simple texts, like articles and emails. Longer and more complex texts might be harder for you, but you can get the general idea.
                      </li>
                      <li>
                        <strong>Listening:</strong> You can follow the main points of conversations, presentations, and media when people speak clearly. You understand everyday conversations about common topics but might need things repeated or explained if the speech is fast or complicated.
                      </li>
                      <li>
                        <strong>Grammar and Vocabulary:</strong> You know the basics of English grammar and have a good range of everyday vocabulary. You can use different tenses and sentence structures but might make mistakes with more complicated ones.
                      </li>
                    </ol>
                    <p>Overall, an intermediate level means you can handle most routine tasks and social interactions in English, but you still need to improve to handle more advanced or specialized communication.</p>
                </div>
            </div>

            <!-- Action buttons -->
            <div class="btn-container">
                <a href="#" class="btn-custom">SHARE SCORE</a>
                <a href="#" class="btn-custom">PRINT TEST</a>
                <a href="#" class="btn-custom">CERTIFICATE</a>
            </div>
        </div>
    </div>
</body>
</html>
