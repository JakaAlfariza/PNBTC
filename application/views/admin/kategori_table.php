<div class="card mt-3 mb-3">
    <div class="card-body">
        <h4 class="card-title">Data Kategori</h4>
        <div class="table-responsive">
            <table class="table table-hover" id="tabel-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    if (empty($hasil)) {
                        echo "<td colspan='5'>Data Kosong</td>";	
                        echo "</tr>";	
                    } else {
                        $no=1;
                        foreach ($hasil as $data):
                    ?> 
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->nama_kategori ?></td>
                        <td>
                            <button type="button" onclick="hapuskategori('<?php echo $data->id_kategori ?>')" class="btn btn-sm btn-danger">Hapus</button>
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
            "pageLength": 5
        });
    });

    //Hapus Button
    function hapuskategori(id_kategori) {
        if (confirm("Apakah yakin menghapus data ini?")) {
            window.location.href = "<?php echo base_url()?>ckategori/hapuskategori/" + id_kategori;
        }
    }
</script>

