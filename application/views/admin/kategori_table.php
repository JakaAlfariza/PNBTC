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
                            <button type="button" onclick="hapusdata('<?php echo $data->id_kategori ?>')" class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr> 
                    <?php
                        $no++;
                        endforeach;
                    }
                    ?> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
