<div class="card mt-3 mb-3">
    <div class="card-body">
        <h4 class="card-title">Data Karosel</h4>
        </p>
        <div class="table-responsive">
            <table class="table table-hover" id="tabel-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Nama Sponsor</th>
                        <th>Pembuat Karosel</th>
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
                        <td><img src="<?php echo base_url('images/' . $data->gambar_k); ?>" alt="Image" style="max-width: 50px; max-height: 50px;"></td>
                        <td><?php echo $data->nama_sponsor ?></td>
                        <td><?php echo $data->id_user ?></td>
                        <td>
                            <button type="button" id="edit-<?= $data->id_karosel ?>" class="btn btn-sm btn-primary">Edit</button>
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

<!-- Javascript, JQuery & Ajax -->
<script>

    //Hapus Button
    function hapusdata(id_karosel) {
        if (confirm("Apakah yakin menghapus data ini?")) {
            window.open("<?php echo base_url()?>ckarosel/hapusdata/" + id_karosel, "_self");
        }
    }

    //Menampikan gambar edit
    $(document).ready(function () {
        $('#gambar_k').on('change', function () {
            $('#tampilGambar').show();
            readURL(this);
        });
    });

    //Edit Button
    $(document).ready(function () {
        $('[id^=edit]').on('click',function(){
            const id = $(this).attr('id').split('-')[1]; 

            $.ajax({
                url : "<?=base_url('ckarosel/getkarosel/')?>"+id,
                type : "GET",
                dataType : "json",
                success : function (response) {
                    console.log(response);
                    $('#form').attr("action", "<?=base_url('ckarosel/updatekarosel/')?>"+id);
                    $('#nama_karosel').val(response[0].nama_karosel);
                    $('#nama_sponsor').val(response[0].nama_sponsor); 
                    // Menampilkan Gambar
                    $('#tampilGambar').show();
                    $('#tampil_gambar').attr('src', "<?php echo base_url('images/')?>"+response[0].gambar_k);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });

        
        $('button[type="reset"]').on('click', function () {
            $('#tampilGambar').hide();
        });
    });
</script>