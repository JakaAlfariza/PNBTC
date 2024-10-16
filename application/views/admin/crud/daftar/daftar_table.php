<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

<div class="card mt-3 mb-3">
    <div class="card-body">
        <h4 class="card-title">Data Akun</h4>
        <div class="table-responsive">
            <table class="table table-hover" id="tabel-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Number</th>
                        <th>ID Type</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Credits</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                        if (empty($hasil)) {
                            echo "<td colspan='5'>Data Kosong</td>";    
                        } else {
                            $no = 1;
                            foreach ($hasil as $data):
                    ?> 
                    <tr data-role="<?php echo $data->role; ?>">
                        <td></td>
                        <td><?php echo $data->id_card ?></td>
                        <td><?php echo $data->tipe_card ?></td>
                        <td><?php echo $data->email ?></td>
                        <td><?php echo $data->nama ?></td>
                        <td><?php echo $data->gender ?></td>
                        <td><?php echo $data->role ?></td>
                        <td><?php echo $data->credits ?></td>
                        <td>
                            <button type="button" id="edit-<?= $data->id_user ?>" class="btn btn-sm btn-primary">Edit</button>
                            <button type="button" onclick="hapusakun('<?php echo $data->id_user ?>')" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr> 
                    <?php endforeach; } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Javascript & JQuery -->
<script>
    //Datatables
    $(document).ready(function () {
        $('#tabel-data').DataTable({
            "lengthMenu": [ [5, 10], [5, 10] ],
            "pageLength": 10,
            "scrollX": false,
            "responsive": true,
            "order": [[5, 'desc']],
            "drawCallback": function (settings) {
                var api = this.api();
                api.column(0).nodes().each(function (cell, i) {
                    var page = api.page.info();
                    $(cell).html(page.start + i + 1);
                });
            }
        });
    });

    //Hapus Button
    function hapusakun(id_user) {
        if (confirm("Are you sure to delete this data?")) {
            window.location.href = "<?php echo base_url()?>cdaftar/hapusakun/" + id_user;
        }
    }

    $(document).ready(function () {
        $('[id^=edit]').on('click',function(){
            const id = $(this).attr('id').split('-')[1];

            $.ajax({
                url : "<?=base_url('Cdaftar/getakun/')?>"+id,
                type : "GET",
                dataType : "json",
                success : function (response) {
                    
                    $('#form').attr("action", "<?=base_url('cdaftar/updateakun/')?>"+id);

                    $('#email').val(response[0].email);                    
                    $('#nama').val(response[0].nama); 
                    $('#gender').val(response[0].gender);
                    $('#tipe_card').val(response[0].tipe_card);
                    $('#id_card').val(response[0].id_card);  
                    $('#role').val(response[0].role);
                    $('#credits').val(response[0].credits);
                    
                },
                error : function (xhr, status, error) {
                 console.error(error);   
                }
            });
        });
    });
</script>
