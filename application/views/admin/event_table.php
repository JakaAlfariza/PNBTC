<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

<div class="card mt-3 mb-3">
    <div class="card-body">
        <h4 class="card-title">Data Event</h4>
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
    function hapusdata(id_event) {
        if (confirm("Apakah yakin menghapus data ini?")) {
            window.open("<?php echo base_url()?>cevent/hapusdata/" + id_event, "_self");
        }
    }

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

<script>
     $(document).ready(function () {
        $('#tabel-data').DataTable({
            "lengthMenu": [ [5, 10], [5, 10] ],
            "pageLength": 5,
            "scrollX": false,
            "responsive": true,
            "columnDefs": [
                {
                    "targets": [1,2],  // Second column (zero-based index)
                    "width": "180px",  // Set the maximum width for the second column
                    "responsivePriority": 1  // Set the responsive priority for the second column
                }
            ]
        });
    });
</script>