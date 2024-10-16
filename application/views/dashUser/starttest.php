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
    </style>
</head>
<body>
    <div class="main-container container">
        <div class="content-container" style="padding-right:0px; padding-top:0px; padding-bottom:0px;">
            <div class="main-content" style="justify-content: space-between;">
                <div>
                    <h1>Start Certified TOEIC Test</h1>
                    <p style="width: 450px;">Unlock your potential with the TOEIC test - a global standard for English proficiency.</p>
                    <p> Current test credits: <strong><span><?php echo $current_credits; ?></span></strong></p>
                    <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#startTestModal" style="width:200px;">
                        Take Full Test
                    </button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#questionBankModal">
                        Buy Test Credits
                    </button>

                    <div class="modal fade" id="startTestModal" tabindex="-1" role="dialog" aria-labelledby="startTestModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="startTestModalLabel">Important Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Please make sure all your identity details are filled out and correct. This test requires test credits to start.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <a href="<?= base_url('cpractice/section_test'); ?>" class="btn btn-custom">Start Test</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for Buying Test Credit -->
                    <div class="modal fade" id="questionBankModal" tabindex="-1" role="dialog" aria-labelledby="questionBankModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="questionBankModalLabel">Buy Test Credit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart('cbuytest/buy'); ?>
                                        <div class="form-group">
                                            <label for="total_bayar">Total Payment:</label>
                                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="jmlh_beli">Buy Credit:</label>
                                            <input type="number" class="form-control" id="jmlh_beli" name="jmlh_beli" value="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="bukti_bayar">Payment Invoice:</label>
                                            <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" required>
                                        </div>
                                        <button type="submit" class="btn btn-custom btn-block">Buy Credit</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="<?= base_url('images/model2.png'); ?>" alt="TOEIC Test">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4" style="padding-left:0px;">
                    <div class="content-container">
                        <div class="main-content">
                            <img src="<?= base_url('images/practice.png'); ?>" style="max-width: 150px; height: 120px; margin-right:30px;" alt="TOEIC Test">
                            <div>
                                <h5>Let's take a Practice</h5>
                                <p>Make a bold move before taking the test</p>
                                <a href="<?= base_url('cuser/practice'); ?>" class="btn btn-custom">Start Practice</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4" style="padding-right:0px;">
                    <div class="content-container">
                        <div class="main-content">
                            <img src="<?= base_url('images/about.png'); ?>" style="max-width: 150px; height: 120px; margin-right:30px;" alt="TOEIC Test">
                            <div>
                                <h5>Understand About Test</h5>
                                <p>Read about test scoring, rules, etc.</p>
                                <a href="<?= base_url('cuser/aboutTest'); ?>" class="btn btn-custom <?php echo ($this->uri->segment(2) == 'aboutTest') ? 'active' : ''; ?>">About Test</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    //Datatables
    $(document).ready(function () {
        function calculateTotal() {
            var amountPerCredit = 550000; // Amount per credit
            var quantity = $('#jmlh_beli').val();
            var total = amountPerCredit * quantity;
            $('#total_bayar').val('Rp. ' + total.toLocaleString());
        }

        calculateTotal();

        // Bind the calculation to the input field change event
        $('#jmlh_beli').on('input', function () {
            calculateTotal();
        });

        $('form').on('submit', function (e) {
            var quantity = parseInt($('#jmlh_beli').val(), 10);
            if (isNaN(quantity) || quantity < 1) {
                e.preventDefault(); // Prevent form submission
                alert('Jumlah beli harus lebih dari 0 dan tidak boleh kurang dari 1.');
                $('#jmlh_beli').val('1'); // Reset to 1
                calculateTotal(); // Recalculate total
            }
        });
    });

</script>
</body>
</html>
