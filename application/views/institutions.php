<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/navbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/footer.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/css/institutions.css'); ?>">
    <link rel="icon" href="<?= base_url('images/logo.png'); ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <title>PNB TOEIC Center - Institutions</title>
</head>
<body>
    <!-- Header -->
    <?php include 'navbar.php'; ?>

    <!-- Institutions Section -->
    <div class="institutions-section" data-aos="fade-up" data-aos-duration="1200">
        <h1>Institutions Accepting TOEIC Test</h1>
        <table id="institutions-table">
            <thead>
                <tr>
                    <th>University Name</th>
                    <th>Programs</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
    <tr>
        <td>Harvard University</td>
        <td>Business, Law, Medicine</td>
        <td>Cambridge, MA</td>
    </tr>
    <tr>
        <td>Stanford University</td>
        <td>Engineering, Business, Law</td>
        <td>Stanford, CA</td>
    </tr>
    <tr>
        <td>MIT</td>
        <td>Engineering, Science, Management</td>
        <td>Cambridge, MA</td>
    </tr>
    <tr>
        <td>University of Oxford</td>
        <td>Humanities, Science, Law</td>
        <td>Oxford, England</td>
    </tr>
    <tr>
        <td>University of Cambridge</td>
        <td>Arts, Science, Engineering</td>
        <td>Cambridge, England</td>
    </tr>
    <tr>
        <td>University of Tokyo</td>
        <td>Engineering, Science, Law</td>
        <td>Tokyo, Japan</td>
    </tr>
    <tr>
        <td>Seoul National University</td>
        <td>Engineering, Business, Humanities</td>
        <td>Seoul, South Korea</td>
    </tr>
    <tr>
        <td>National University of Singapore</td>
        <td>Engineering, Business, Science</td>
        <td>Singapore</td>
    </tr>
    <tr>
        <td>University of Melbourne</td>
        <td>Arts, Science, Business</td>
        <td>Melbourne, Australia</td>
    </tr>
    <tr>
        <td>University of Toronto</td>
        <td>Engineering, Business, Humanities</td>
        <td>Toronto, Canada</td>
    </tr>
    <tr>
        <td>University of British Columbia</td>
        <td>Engineering, Science, Business</td>
        <td>Vancouver, Canada</td>
    </tr>
    <tr>
        <td>University of Sydney</td>
        <td>Arts, Science, Business</td>
        <td>Sydney, Australia</td>
    </tr>
    <tr>
        <td>Peking University</td>
        <td>Engineering, Business, Law</td>
        <td>Beijing, China</td>
    </tr>
    <tr>
        <td>University of Hong Kong</td>
        <td>Engineering, Business, Humanities</td>
        <td>Hong Kong</td>
    </tr>
    <tr>
        <td>London School of Economics</td>
        <td>Economics, Politics, Law</td>
        <td>London, England</td>
    </tr>
    <tr>
        <td>ETH Zurich</td>
        <td>Engineering, Science, Management</td>
        <td>Zurich, Switzerland</td>
    </tr>
    <tr>
        <td>University of Copenhagen</td>
        <td>Science, Humanities, Law</td>
        <td>Copenhagen, Denmark</td>
    </tr>
    <tr>
        <td>University of Auckland</td>
        <td>Engineering, Business, Science</td>
        <td>Auckland, New Zealand</td>
    </tr>
    <tr>
        <td>Technical University of Munich</td>
        <td>Engineering, Business, Science</td>
        <td>Munich, Germany</td>
    </tr>
    <tr>
        <td>University of Amsterdam</td>
        <td>Humanities, Science, Business</td>
        <td>Amsterdam, Netherlands</td>
    </tr>
    <tr>
        <td>University of Chicago</td>
        <td>Business, Law, Science</td>
        <td>Chicago, IL</td>
    </tr>
</tbody>

        </table>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
        });
    </script>
</body>
</html>
