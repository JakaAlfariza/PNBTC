</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<style>
    body,
    html {
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

    .custom-button {
        background-color: #355E3B; /* Custom hex color */
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 7px;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #355E3B; /* Darker shade for hover effect */
    }

    .form-group select.is-invalid,
    .form-group input.is-invalid {
        border-color: #dc3545 !important;
    }

    .form-group .invalid-feedback {
        position: absolute;
        bottom: -1rem;
        color: #dc3545;
    }

    .dataTables_filter {
        margin-left: 300px;
    }

    .status-container {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 4px;
        /* Background colors can be added if needed */
    }
    .pending-status {
        background-color: #ffc107; /* Warning color (yellow) */
        color: orange; /* Text color for pending status */
    }
    .success-status {
        background-color: #28a745; /* Success color (green) */
        color: white; /* Text color for success status */
    }
    .decline-status {
        background-color: #dc3545; /* Decline color (red) */
        color: white; /* Text color for decline status */
    }
    
</style>

<!-- Main Content -->
 <div class="card mt-3">
    <div class="card-body">
        <h2 class="card-title d-flex justify-content-center mb-4">Buy Test Credit</h2>
        <div class="container">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" style="font-size:14px;">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" style="font-size:14px;">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <!-- Button to Trigger Modal -->
            <button type="button" class="custom-button" data-toggle="modal" data-target="#questionBankModal">
                Buy Test Credits
            </button>
            <div class="mt-4">
                <h5>
                    Current test credits:
                    <strong><span><?php echo $current_credits; ?></span></strong>
                </h5>
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
                                    <input type="text" inputmode="numeric" class="form-control" id="jmlh_beli" name="jmlh_beli" value="1" required>
                                </div>
                                <div class="form-group">
                                    <label for="bukti_bayar">Payment Invoice:</label>
                                    <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" required>
                                </div>
                                <button type="submit" class="btn custom-button btn-block">Buy Credit</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables -->
            <div class="table-responsive mt-3">
                <table class="table table-hover" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Credit Buy</th>
                            <th>Date Payment</th>
                            <th>Invoice</th>
                            <th>Total Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($hasil as $data): ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data->jmlh_beli; ?></td>
                            <td><?php echo $data->tgl_bayar; ?></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#invoiceModal" data-image="<?php echo base_url('./buy_material/' . $data->bukti_bayar); ?>">
                                    View Invoice
                                </button>
                            </td>
                            <td><?php
                                    // Format the number with currency symbol and comma separator
                                    $formatted_total_bayar = number_format($data->total_bayar, 0, ',', '.');
                                    echo 'Rp. ' . $formatted_total_bayar;
                                ?>
                            </td>
                            <td><div class="status-container <?php 
                                    if ($data->status == 'Pending') {
                                        echo 'pending-status';
                                    } elseif ($data->status == 'Success') {
                                        echo 'success-status';
                                    } elseif ($data->status == 'Decline') {
                                        echo 'decline-status';
                                    }
                                ?>">
                                    <span class="<?php 
                                        if ($data->status == 'Pending') {
                                            echo 'text-dark'; // Orange text for pending
                                        } elseif ($data->status == 'Success') {
                                            echo 'text-white'; // Green text for success
                                        } elseif ($data->status == 'Decline') {
                                            echo 'text-white'; // Red text for decline
                                        }
                                    ?>">
                                        <?php echo $data->status; ?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Viewing Invoice -->
<div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="invoiceImage" src="" alt="Invoice" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#insufficientCreditsModal').modal('show');
    });
    
    $(document).ready(function () {
        // When the modal is about to be shown, update the image source
        $('#invoiceModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget); // Button that triggered the modal
            var imageUrl = button.data('image'); // Extract image URL from data-* attributes
            var modal = $(this);
            modal.find('#invoiceImage').attr('src', imageUrl); // Set the image source
        });
    });

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

        $('#tabel-data').DataTable({
            "lengthMenu": [ [5, 10], [5, 10] ],
            "pageLength": 10,
            "scrollX": false,
            "responsive": true,
            "order": [[2, 'desc']]
        });
    });

</script>
