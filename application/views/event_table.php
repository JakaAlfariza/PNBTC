<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Data Event</h4>
        </p>
        <div class="table-responsive">
            <table class="table table-hover" id="tabel-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Penyelenggara</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    if(empty($hasil))
                    {
                        echo "<td colspan='5'>Data Kosong</td>";	
                        echo "</tr>";	
                    }else {
                        $no=1;
                    foreach ($hasil as $data):
                    ?> 
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->nama_event ?></td>
                        <td><?php echo $data->penyelenggara ?></td>
                        <td><?php echo $data->kategori ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            <button type="button" onclick="hapusdata('<?php echo $data->id_event ?>')" class="btn btn-sm btn-danger">Hapus</button>
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