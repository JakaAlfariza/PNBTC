<div class="card mt-3 mb-3">
    <div class="card-body">
        <h4 class="card-title">Data Karosel</h4>
        </p>
        <div class="table-responsive">
            <table class="table table-hover" id="tabel-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama karosel</th>
                        <th>Gambar</th>
                        <th>Penyelenggara</th>
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
                        <td><?php echo $data->nama_karosel ?></td>
                        <!-- Display small images -->
                        <td><img src="<?php echo base_url('images/' . $data->gambar_k); ?>" alt="Image" style="max-width: 50px; max-height: 50px;"></td>
                        <td><?php echo $data->penyelenggara ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            <button type="button" onclick="hapusdata('<?php echo $data->id_karosel ?>')" class="btn btn-sm btn-danger">Hapus</button>
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
