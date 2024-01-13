<div class="card mt-3 mb-3">
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
                        <th>Dibuat oleh</th>
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
                        <td><?php echo $data->id_kategori ?></td>
                        <td><?php echo $data->id_user ?></td>
                        <td>
                            <button type="button" id="edit-<?= $data->id_event ?>" class="btn btn-sm btn-primary">Edit</button>
                            <button type="button" onclick="hapusdata('<?php echo $data->id_event ?>')" class="btn btn-sm btn-danger">Hapus</button>
                            <button type="button" onclick="cetakpdf('<?php echo $data->id_event ?>')" class="btn btn-sm btn-success">Cetak Surat</button>
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


<script>
    $(document).ready(function () {
    
        
        $('[id^=edit]').on('click',function(){
            const id = $(this).attr('id').split('-')[1];

            $.ajax({
                url : "<?=base_url('Cevent/getEvent/')?>"+id,
                type : "GET",
                dataType : "json",
                success : function (response) {
                    
                    $('#form').attr("action", "<?=base_url('Cevent/updateEvent/')?>"+id);

                    $('#nama_event').val(response[0].nama_event);                    
                    $('#penyelenggara').val(response[0].penyelenggara); 
                    $('#lokasi').val(response[0].lokasi);
                    $('#id_kategori').val(response[0].id_kategori);
                    $('#tgl_awal').val(response[0].tgl_awal);  
                    $('#tgl_akhir').val(response[0].tgl_akhir);
                    $('#tgl_event').val(response[0].tgl_event);
                    $('#harga').val(response[0].harga);
                    $('#tingkat_event').val(response[0].tingkat_event);
                    $('#link_daftar').val(response[0].link_daftar);
                    $('#summernote').summernote('code',response[0].deskripsi);
                    console.log(response[0].deskripsi);

                },
                error : function (xhr, status, error) {
                 console.error(error);   
                }
            });
        });
    });

    function cetakpdf(id_event) {
    var url = "<?php echo base_url('Cevent/cetakpdf/') ?>" + id_event;

    window.open(url, "_blank");
    }

</script>