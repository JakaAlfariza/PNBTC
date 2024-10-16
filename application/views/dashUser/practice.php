<!DOCTYPE html>
<html lang="en">
<head>
    <style>
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
            width: 100%;
        }
        .main-content {
            display: flex;
            align-items: center;
        }
        .main-content img {
            max-width: 400px;
            height: auto;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .btn-custom {
            background-color: #355E3B;
            color: white;
        }
        .btn-custom:hover {
            background-color: #2e4d33;
            color: white;
        }

        .filter-container {
            background-color: white;
            padding: 10px 10px 0px 10px;
            border-radius: 5px;
            max-width: 1067px;
        }

        .btn-filter {
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #355E3B; /* Green border */
            background-color: white; /* White background */
            color: #355E3B; /* Green text color */
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-filter:hover {
            border: none;
            background-color: #FFC107;
            color: black; /* Darker green */
        }

        .btn-filter.active {
            border: none;
            background-color: #FFC107; /* Darker green for active button */
            color: black; /* White text color for active button */
        }
    </style>
</head>
<body>
    <div class="main-container container">
        <div class="content-container" style=" margin-left:-16px; padding-right:0px; padding-top:0px; padding-bottom:0px; max-width: 1067px">
            <div class="main-content" style="justify-content: space-between;">
                <div>
                    <h1>Start Practice TOEIC  Test</h1>
                    <p style="width: 450px;">Sharpen Your Skills, Boost Your Confidence – Take Our Practice Test Today and Ace your TOEIC Dream Score</p>
                    <a href="<?= base_url('cpractice/section_intro'); ?>" class="btn btn-custom mt-3" style="width:200px;">Take Full Practice</a>
                </div>
                <img src="<?= base_url('images/modelpractice.png'); ?>" alt="TOEIC Test">
            </div>
        </div>
        <div class="container mb-4">
            <div class="row mt-3">
                <div class="col-md-12 filter-container">
                    <button class="btn btn-filter active" onclick="filterSections('all')">All</button>
                    <button class="btn btn-filter" onclick="filterSections('listening')">Listening</button>
                    <button class="btn btn-filter" onclick="filterSections('reading')">Reading</button>
                </div>
            </div>
            <div class="row" id="sections-container">
                <?php 
                $sections = [
                    ['part' => 'Part 1', 'title' => 'Photographs', 'type' => 'listening'],
                    ['part' => 'Part 2', 'title' => 'Question-Response', 'type' => 'listening'],
                    ['part' => 'Part 3', 'title' => 'Conversations', 'type' => 'listening'],
                    ['part' => 'Part 4', 'title' => 'Talks', 'type' => 'listening'],
                    ['part' => 'Part 5', 'title' => 'Incomplete Sentences', 'type' => 'reading'],
                    ['part' => 'Part 6', 'title' => 'Text Completion', 'type' => 'reading'],
                    ['part' => 'Part 7', 'title' => 'Reading Comprehension', 'type' => 'reading'],
                ];
                
                foreach ($sections as $index => $section) { 
                ?>
                    <div class="col-md-6 section-item <?= $section['type']; ?>" style="padding-left:0px;">
                        <div class="content-container">
                            <div class="main-content">
                                <img src="<?= base_url('images/section' . ($index + 1) . '.png'); ?>" style="max-width: 150px; height: 120px; margin-right:30px;" alt="<?= $section['title']; ?>">
                                <div>
                                    <h5><?= $section['part']; ?>: <?= $section['title']; ?></h5>
                                    <a href="<?= base_url('cuser/practice'); ?>" class="btn btn-custom">Start Practice</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                } 
                ?>
            </div>
        </div>
    </div>

    <script>
    function filterSections(type) {
        var sections = document.getElementsByClassName('section-item');
        for (var i = 0; i < sections.length; i++) {
            if (type === 'all') {
                sections[i].style.display = 'block';
            } else if (sections[i].classList.contains(type)) {
                sections[i].style.display = 'block';
            } else {
                sections[i].style.display = 'none';
            }
        }
        setActiveButton(type);
    }

    function setActiveButton(type) {
        var buttons = document.getElementsByClassName('btn-filter');
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('active');
            if (buttons[i].getAttribute('onclick').includes(type)) {
                buttons[i].classList.add('active');
            }
        }
    }
    </script>

</body>
</html>
