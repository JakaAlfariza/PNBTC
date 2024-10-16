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
</style>

<!-- Main Content -->
<div class="card mt-3">
    <div class="card-body">
        <h2 class="card-title d-flex justify-content-center mb-4">Manage Question Bank</h2>
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

            <?php if ($this->session->flashdata('warning')): ?>
                <div class="alert alert-warning" style="font-size:14px;">
                    <?= $this->session->flashdata('warning'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Button Input -->
            <button type="button" class="custom-button" data-toggle="modal" data-target="#questionBankModal">
                Create New Question Bank
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="questionBankModal" tabindex="-1" role="dialog" aria-labelledby="questionBankModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="questionBankModalLabel">Create New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?php echo base_url('csoal/simpanbanksoal'); ?>">
                                <div class="form-group">
                                    <label for="nama_bank">Question Bank Name</label>
                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Enter question bank name" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskrip_bank">Description</label>
                                    <textarea class="form-control" id="deskrip_bank" name="deskrip_bank" rows="3" placeholder="Enter description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <select name="tipe_bank" class="form-control" id="tipe_bank" required>
                                        <option value="">Choose Type</option>
                                        <option value="Test">Test</option>
                                        <option value="Practice">Practice</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn text-white" style="width: 100px; background-color:#355E3B;">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editQuestionBankModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionBankModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editQuestionBankModalLabel">Edit Question Bank</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" method="post" action="">
                                <input type="hidden" id="edit_id_bank" name="id_bank">
                                <div class="form-group">
                                    <label for="edit_nama_bank">Question Bank Name</label>
                                    <input type="text" class="form-control" id="edit_nama_bank" name="nama_bank" placeholder="Enter question bank name" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_deskrip_bank">Description</label>
                                    <textarea class="form-control" id="edit_deskrip_bank" name="deskrip_bank" rows="3" placeholder="Enter description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <select name="tipe_bank" class="form-control" id="edit_tipe_bank" required>
                                        <option value="">Choose Type</option>
                                        <option value="Test">Test</option>
                                        <option value="Practice">Practice</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn text-white" style="width: 100px; background-color:#355E3B;">Update</button>
                                </div>
                            </form>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php foreach ($hasil as $data): ?>
                        <tr>
                            <td></td>
                            <td><?php echo $data->nama_bank; ?></td>
                            <td><?php echo $data->deskrip_bank; ?></td>
                            <td><?php echo $data->tipe_bank; ?></td>
                            <td><?php echo $data->created_at; ?></td>
                            <td><?php echo $data->updated_at; ?></td>
                            <td>
                                <a href="<?= base_url('csoal/tampilsection/' . $data->id_bank) ?>" class="btn btn-sm btn-success">Open Section</a>
                                <button type="button" id="edit-<?php echo $data->id_bank; ?>" class="btn btn-sm btn-primary">Edit</button>
                                <button type="button" onclick="hapusdata('<?php echo $data->id_bank; ?>')" class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    //Datatables
    $(document).ready(function () {
        $('#tabel-data').DataTable({
            "lengthMenu": [ [5, 10], [5, 10] ],
            "pageLength": 10,
            "scrollX": false,
            "responsive": true,
            "order": [[4, 'desc']],
            "drawCallback": function (settings) {
                var api = this.api();
                api.column(0).nodes().each(function (cell, i) {
                    var page = api.page.info();
                    $(cell).html(page.start + i + 1);
                });
            }
        });
    });
    
    function hapusdata(id_bank) {
        if (confirm("Are you sure to delete this data?")) {
            window.open("<?php echo base_url()?>csoal/hapusdata/" + id_bank, "_self");
        }
    }

    $(document).ready(function () {
        $('[id^=edit]').on('click', function() {
            const id = $(this).attr('id').split('-')[1];

            $.ajax({
                url: "<?php echo base_url('Csoal/getbank/')?>" + id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $('#edit_id_bank').val(response[0].id_bank);
                    $('#edit_nama_bank').val(response[0].nama_bank);
                    $('#edit_deskrip_bank').val(response[0].deskrip_bank);
                    $('#edit_tipe_bank').val(response[0].tipe_bank);
                    $('#editForm').attr("action", "<?php echo base_url('Csoal/updatebank/')?>" + id);
                    $('#editQuestionBankModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

</script>
