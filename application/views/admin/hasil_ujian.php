<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Credit</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
            padding: 5px;
            border-radius: 5px;
        }
        .pending-status {
            background-color: #f0ad4e;
        }
        .success-status {
            background-color: #5bc0de;
        }
        .decline-status {
            background-color: #d9534f;
        }
        .text-dark {
            color: #343a40;
        }
        .text-white {
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="card-title d-flex justify-content-center mb-4">User Results</h2>
            <div class="container">
                <!-- Tables -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" style="font-size:14px;">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php elseif ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger" style="font-size:14px;">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive mt-3">
                    <table class="table table-hover" id="tabel-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Test Taken</th>
                                <th>Total Score</th>
                                <th>Test Type</th>
                                <th>Certificate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hasil as $data): ?>
                            <tr>
                                <td></td>
                                <td><?php echo $data->nama; ?></td>
                                <td><?php echo $data->tgl_ujian; ?></td>
                                <td><?php echo $data->nilai_total; ?></td>
                                <td><?php echo $data->tipe_ujian; ?></td>
                                <td>
                                    <a href="<?php echo site_url('cdashboard/view_certificate/' . $data->id_hasil); ?>" class="btn btn-info">
                                        View Certificate
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function hapushasil(id_hasil) {
            if (confirm("Are you sure to delete this data?")) {
                window.location.href = "<?php echo base_url()?>cdashboard/hapushasil/" + id_hasil;
            }
        }

        $(document).ready(function () {
            $('#tabel-data').DataTable({
                "lengthMenu": [ [5, 10], [5, 10] ],
                "pageLength": 10,
                "scrollX": false,
                "responsive": true,
                "order": [[2, 'desc']],
                "drawCallback": function (settings) {
                    var api = this.api();
                    api.column(0).nodes().each(function (cell, i) {
                        var page = api.page.info();
                        $(cell).html(page.start + i + 1);
                    });
                }
            });
        });
    </script>
</body>
</html>
