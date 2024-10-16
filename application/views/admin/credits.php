<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Test Credits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
        color: white; /* Text color for pending status */
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
</head>
<body>
    <div class="card mt-3" style="padding: 30px;">
        <h2 class="card-title d-flex justify-content-center mb-4">Manage Credits Payment</h2>
        <table class="table table-hover" id="tabel-data-admin">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Credit Buy</th>
                    <th>Date Payment</th>
                    <th>Invoice</th>
                    <th>Total Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($test_credits as $data): ?>
                <tr>
                    <td></td>
                    <td><?php echo $data->nama; ?></td>
                    <td><?php echo $data->jmlh_beli; ?></td>
                    <td><?php echo $data->tgl_bayar; ?></td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#invoiceModal" data-image="<?php echo base_url('./buy_material/' . $data->bukti_bayar); ?>">
                            View Invoice
                        </button>
                    </td>
                    <td><?php
                            $formatted_total_bayar = number_format($data->total_bayar, 0, ',', '.');
                            echo 'Rp. ' . $formatted_total_bayar;
                        ?>
                    </td>
                    <td>
                        <div class="status-container <?php 
                            if ($data->status == 'Pending') {
                                echo 'pending-status';
                            } elseif ($data->status == 'Success') {
                                echo 'success-status';
                            } elseif ($data->status == 'Decline') {
                                echo 'decline-status';
                            }
                        ?>">
                            <span><?php echo $data->status; ?></span>
                        </div>
                    </td>
                    <td>
                        <?php if ($data->status == 'Pending'): ?>
                            <button class="btn btn-success btn-sm accept-button" data-id="<?php echo $data->id_bayar; ?>">Accept</button>
                            <button class="btn btn-danger btn-sm decline-button" data-id="<?php echo $data->id_bayar; ?>">Decline</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
        $(document).ready(function () {
            $('#tabel-data-admin').DataTable({
                "lengthMenu": [ [5, 10], [5, 10] ],
                "pageLength": 10,
                "scrollX": false,
                "responsive": true,
                "order": [[3, 'desc']],
                "drawCallback": function (settings) {
                    var api = this.api();
                    api.column(0).nodes().each(function (cell, i) {
                        var page = api.page.info();
                        $(cell).html(page.start + i + 1);
                    });
                }
            });

            $('#invoiceModal').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var imageUrl = button.data('image');
                var modal = $(this);
                modal.find('#invoiceImage').attr('src', imageUrl);
            });

            $('.accept-button').click(function() {
                var id_bayar = $(this).data('id');
                if (confirm('Are you sure you want to accept this credit?')) {
                    $.post('<?= base_url("cdashboard/accept_credit") ?>', {id_bayar: id_bayar}, function(response) {
                        if (response === 'success') {
                            location.reload();
                        } else {
                            alert('Error accepting credit.');
                        }
                    });
                }
            });

            $('.decline-button').click(function() {
                var id_bayar = $(this).data('id');
                if (confirm('Are you sure you want to decline this credit?')) {
                    $.post('<?= base_url("cdashboard/decline_credit") ?>', {id_bayar: id_bayar}, function(response) {
                        if (response === 'success') {
                            location.reload();
                        } else {
                            alert('Error declining credit.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
