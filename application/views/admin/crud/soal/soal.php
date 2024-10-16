<style>
    body,
    html {
        background-color: #AACF7D;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .col-sm-2 {
        background-color: #ffffff;
        padding: 15px;
        min-height: 100%;
    }

    .list-group {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .list-group-item {
        border: none;
        width: 100%;
    }

    .custom-button {
        background-color: #355E3B; /* Custom hex color */
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 7px;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #355E3B; /* Darker shade for hover effect */
    }

    .btn-back {
        border: none;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 7px;
        cursor: pointer;
    }

    .form-group select.is-invalid,
    .form-group input.is-invalid {
        border-color: #dc3545 !important;
    }

    .form-group .invalid-feedback {
        position: absolute;
        bottom: -1rem;
        color: #dc3545;
    }

    .dataTables_filter {
        margin-left: 300px;
    }

    #tipe_soal, #edit_tipe_soal {
        display: none;
    }
</style>

<!-- Main Content -->
<div class="card mt-3">
    <div class="card-body">
        <h2 class="card-title d-flex justify-content-center mb-4">Manage Question "<?= $section->nama_section ?>"</h2>
        <div class="container">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" style="font-size:14px;">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" style="font-size:14px;">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Button Input -->
            <a href="<?= base_url('csoal/tampilsection/'.$id_bank) ?>" class="btn-back btn-sm btn-info"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <button type="button" id="getsection-<?= $tipe_section->id_section ?>" class="custom-button" data-toggle="modal" data-target="#questionModal">
                Create New Question
            </button>

            <!-- Modal -->
            <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="questionModalLabel">Add New Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" action="<?= base_url('csoal/simpansoal') ?>">
                                <input type="hidden" name="id_bank" value="<?= $id_bank ?>">
                                <input type="hidden" name="id_section" value="<?= $id_section ?>">
                                <div class="mb-3">
                                    <!-- Hidden Question Type -->
                                    <!-- <label for="tipe_soal" class="form-label">Question Type:</label> -->
                                    <select name="tipe_soal" class="form-control" id="tipe_soal" required>
                                        <option value="">Choose Type</option>
                                        <option value="Listening">Listening</option>
                                        <option value="Reading">Reading</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="add_media" class="form-label">Add Media:</label>
                                    <select class="form-control" id="add_media" name="add_media">
                                        <option value="">None</option>
                                        <option value="image">Image</option>
                                    </select>
                                </div>
                                <div class="form-group" id="image_input" style="display: none;">
                                    <label for="gambar">Image</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                                </div>
                                <div class="form-group" id="audio_input" style="display: none;">
                                    <label for="audio">Audio</label>
                                    <input type="file" class="form-control-file" id="audio" name="audio" accept="audio/*">
                                </div>
                                <div class="form-group">
                                    <label for="pertanyaan">Question</label>
                                    <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3" placeholder="Enter question"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="a">Option A</label>
                                    <textarea class="form-control" id="a" name="a" rows="3" placeholder="Enter option A"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="b">Option B</label>
                                    <textarea class="form-control" id="b" name="b" rows="3" placeholder="Enter option B"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="c">Option C</label>
                                    <textarea class="form-control" id="c" name="c" rows="3" placeholder="Enter option C"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="d">Option D</label>
                                    <textarea class="form-control" id="d" name="d" rows="3" placeholder="Enter option D"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban" class="form-label">Correct Answer:</label>
                                    <select name="jawaban" class="form-control" id="jawaban" required>
                                        <option value="">Choose Answer</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn text-white" style="width: 100px; background-color:#355E3B;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Question Modal -->
            <div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editQuestionModalLabel">Edit Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" action="<?= base_url('csoal/updatesoal') ?>">
                                <input type="hidden" id="edit_id_soal" name="id_soal">
                                <input type="hidden" name="id_section" value="<?= $id_section ?>">
                                <div class="mb-3">
                                    <!-- Hidden Question Type -->
                                    <!-- <label for="tipe_soal" class="form-label">Question Type:</label> -->
                                    <select name="tipe_soal" class="form-control" id="edit_tipe_soal" required>
                                        <option value="">Choose Type</option>
                                        <option value="Listening">Listening</option>
                                        <option value="Reading">Reading</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_add_media">Add Media</label>
                                    <select class="form-control" id="edit_add_media" name="add_media">
                                        <option value="">None</option>
                                        <option value="image">Image</option>
                                    </select>
                                </div>
                                <div class="form-group" id="edit_image_input" style="display: none;">
                                    <label for="edit_gambar">Image</label>
                                    <input type="file" class="form-control-file" id="edit_gambar" name="gambar" accept="image/*">
                                    <div id="edit_image_preview" class="mt-2"></div>
                                </div>
                                <div class="form-group" id="edit_audio_input" style="display: none;">
                                    <label for="edit_audio">Audio</label>
                                    <input type="file" class="form-control-file" id="edit_audio" name="audio" accept="audio/*">
                                    <div id="edit_audio_preview" class="mt-2"></div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_pertanyaan">Question</label>
                                    <textarea class="form-control" id="edit_pertanyaan" name="pertanyaan" rows="3" placeholder="Enter question"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="edit_a">Option A</label>
                                    <textarea class="form-control" id="edit_a" name="a" rows="3" placeholder="Enter option A"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="edit_b">Option B</label>
                                    <textarea class="form-control" id="edit_b" name="b" rows="3" placeholder="Enter option B"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="edit_c">Option C</label>
                                    <textarea class="form-control" id="edit_c" name="c" rows="3" placeholder="Enter option C"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="edit_d">Option D</label>
                                    <textarea class="form-control" id="edit_d" name="d" rows="3" placeholder="Enter option D"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_jawaban" class="form-label">Correct Answer:</label>
                                    <select name="jawaban" class="form-control" id="edit_jawaban" required>
                                        <option value="">Choose Answer</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn text-white" style="width: 100px; background-color:#355E3B;">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tables -->
            <div class="table-responsive mt-3">
                <table class="table table-hover" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>Image</th>
                            <th>Audio</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($soal as $soal): ?>
                        <tr>
                            <td></td>
                            <td><?= htmlspecialchars($soal->pertanyaan, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($soal->gambar, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($soal->audio, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($soal->jawaban, ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <button type="button" onclick="window.location.href='<?= base_url('csoal/preview/' . $soal->id_soal) ?>'" class="btn btn-sm btn-success">Preview</button>
                                <button type="button" id="edit-<?= $soal->id_soal ?>" class="btn btn-sm btn-primary">Edit</button>
                                <button type="button" onclick="hapusdata('<?= $soal->id_soal ?>', '<?= $id_section ?>','<?= $id_bank ?>')" class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // Initialize DataTable
    $('#tabel-data').DataTable({
        "lengthMenu": [ [5, 10], [5, 10] ],
        "pageLength": 10,
        "scrollX": false,
        "responsive": true,
        "columnDefs": [
            {
                "targets": [1, 2, 3], // Question column
                "render": function(data, type, row, meta) {
                    if (type === 'display') {
                        var maxLength = 20;
                        var ellipsis = '...';
                        if (data.length > maxLength) {
                            return data.substr(0, maxLength) + ellipsis;
                        }
                    }
                    return data;
                }
            }
        ],
        "drawCallback": function (settings) {
            var api = this.api();
            api.column(0).nodes().each(function (cell, i) {
                var page = api.page.info();
                $(cell).html(page.start + i + 1);
            });
        }
    });

    function handleInputVisibility(inputId, show) {
        $(inputId).toggle(show);
    }

    // Preview Image
    function previewImage(input, previewId) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(previewId).attr('src', e.target.result);
                $(previewId).show();
            };
            reader.readAsDataURL(file);
        } else {
            $(previewId).attr('src', '');
            $(previewId).hide();
        }
    }

    // Preview Audio
    function previewAudio(input, previewId) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(previewId).attr('src', e.target.result);
                $(previewId).show();
            };
            reader.readAsDataURL(file);
        } else {
            $(previewId).attr('src', '');
            $(previewId).hide();
        }
    }

    // Handle the add media dropdown for adding new question
    $('#add_media').change(function() {
        handleInputVisibility('#image_input', $(this).val() === 'image');
    });

    // Handle the question type dropdown for adding new question
    $('#tipe_soal').change(function() {
        handleInputVisibility('#audio_input', $(this).val() === 'Listening');
    });

    // Handle image input change for adding new question
    $('#gambar').change(function() {
        previewImage(this, '#image_preview');
    });

    // Handle audio input change for adding new question
    $('#audio').change(function() {
        previewAudio(this, '#audio_preview');
    });

    // Handle the add media dropdown for editing question
    $(document).on('change', '#edit_add_media', function() {
        handleInputVisibility('#edit_image_input', $(this).val() === 'image');
    });

    // Handle the question type dropdown for editing question
    $(document).on('change', '#edit_tipe_soal', function() {
        handleInputVisibility('#edit_audio_input', $(this).val() === 'Listening');
    });

    // Handle image input change for editing question
    $(document).on('change', '#edit_gambar', function() {
        previewImage(this, '#edit_image_preview');
    });

    // Handle audio input change for editing question
    $(document).on('change', '#edit_audio', function() {
        previewAudio(this, '#edit_audio_preview');
    });

    // Create new question modal
    $(document).on('click', '[id^=getsection-]', function() {
        const id_section = $(this).attr('id').split('-')[1];

        $.ajax({
            url: `<?= base_url('Csoal/get_tipe_section/') ?>${id_section}`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response) {
                    $('#tipe_soal').val(response.tipe_section).change(); // Trigger change event
                    handleInputVisibility('#image_input', response.tipe_section !== 'Listening');
                    $('#questionModal').modal('show');
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('Failed to fetch section type. Please try again.');
            }
        });
    });

    // Edit question modal
    $(document).on('click', '[id^=edit-]', function() {
        const id = $(this).attr('id').split('-')[1];
        $.ajax({
            url: `<?= base_url('Csoal/getsoal/') ?>${id}`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response) {
                    // Populate form fields
                    $('#edit_id_soal').val(response.id_soal);
                    $('#edit_tipe_soal').val(response.tipe_soal).change();
                    $('#edit_pertanyaan').val(response.pertanyaan);
                    $('#edit_a').val(response.a);
                    $('#edit_b').val(response.b);
                    $('#edit_c').val(response.c);
                    $('#edit_d').val(response.d);
                    $('#edit_jawaban').val(response.jawaban);

                    // Display existing image
                    if (response.gambar) {
                        $('#edit_image_input').html(`<label for="edit_gambar">Image</label>
                                                        <input type="file" class="form-control-file" id="edit_gambar" name="gambar" accept="image/*">
                                                        <img src="<?= base_url('soal_material/images/') ?>${response.gambar}" class="img-fluid mb-2" id="edit_image_preview" style="max-width: 100%;">`);
                    } else {
                        $('#edit_image_input').html(`<label for="edit_gambar">Image</label>
                                                        <input type="file" class="form-control-file" id="edit_gambar" name="gambar" accept="image/*">
                                                        <img id="edit_image_preview" style="display: none; max-width: 100%;">`);
                    }

                    // Display existing audio
                    if (response.audio) {
                        $('#edit_audio_input').html(`<label for="edit_audio">Audio</label>
                                                        <input type="file" class="form-control-file" id="edit_audio" name="audio" accept="audio/*">
                                                        <audio src="<?= base_url('soal_material/audio/') ?>${response.audio}" controls class="mb-2" id="edit_audio_preview" style="width: 100%;"></audio>`);
                    } else {
                        $('#edit_audio_input').html(`<label for="edit_audio">Audio</label>
                                                        <input type="file" class="form-control-file" id="edit_audio" name="audio" accept="audio/*">
                                                        <audio id="edit_audio_preview" style="display: none; width: 100%;"></audio>`);
                    }
                    
                    $('#edit_add_media').val(response.add_media).change();
                    handleInputVisibility('#edit_image_input', response.add_media === 'image');
                    handleInputVisibility('#edit_audio_input', response.tipe_soal === 'Listening');
                    
                    $('#editQuestionModal').modal('show');
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('Failed to fetch question details. Please try again.');
            }
        });
    });

    $('#tipe_soal').change(function() {
        handleInputVisibility('#audio_input', $(this).val() === 'Listening');
        if ($(this).val() === 'Listening') {
            $('#audio').attr('required', true);
        } else {
            $('#audio').removeAttr('required');
        }
    });

    // Handle the question type dropdown for editing question
    $(document).on('change', '#edit_tipe_soal', function() {
        handleInputVisibility('#edit_audio_input', $(this).val() === 'Listening');
        if ($(this).val() === 'Listening') {
            $('#edit_audio').attr('required', true);
        } else {
            $('#edit_audio').removeAttr('required');
        }
    });
    
});



    function hapusdata(id_soal, id_section, id_bank) {
        if (confirm("Are you sure you want to delete this question?")) {
            window.location.href = `<?= site_url('Csoal/hapussoal') ?>/${id_soal}/${id_section}/${id_bank}`;
        }
    }

</script>