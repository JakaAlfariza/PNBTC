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
                        <th>Email</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Aksi</th>
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
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->email ?></td>
                        <td><?php echo $data->username ?></td>
                        <td><?php echo $data->nama ?></td>
                        <td><?php echo $data->role ?></td>
                        <td>
                            <button type="button" onclick="hapusakun('<?php echo $data->id ?>')" class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr> 
                    <?php
                            $no++;
                            endforeach;
                        }
                    ?> 
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
            "responsive": true
        });
    });

    //Hapus Button
    function hapusakun(id) {
        if (confirm("Apakah yakin menghapus data ini?")) {
            window.location.href = "<?php echo base_url()?>cdaftar/hapusakun/" + id;
        }
    }
</script>
