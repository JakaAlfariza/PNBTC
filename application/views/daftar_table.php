<div class="card mt-3 mb-3">
    <div class="card-body">
        <h4 class="card-title">Data Akun</h4>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" onclick="showAll()">Show All</button>
            <button type="button" class="btn btn-primary" onclick="filterByRole('admin')">Admin</button>
            <button type="button" class="btn btn-primary" onclick="filterByRole('panitia')">Panitia</button>
            <button type="button" class="btn btn-primary" onclick="filterByRole('user')">User</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover" id="tabel-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Username</th>
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
                        <td><?php echo $data->role ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary">Edit</button>
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

<script>
    function filterByRole(role) {
        // Hide all rows initially
        $('#tabel-data tbody tr').hide();

        // Show rows with the selected role
        $('#tabel-data tbody tr[data-role="' + role + '"]').show();
    }

    function showAll() {
        // Show all rows
        $('#tabel-data tbody tr').show();
    }
</script>
