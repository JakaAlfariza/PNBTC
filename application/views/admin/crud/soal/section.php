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

    #tipe_section, #edit_tipe_section {
        display: none;
    }
</style>

<!-- Main Content -->
<div class="card mt-3">
    <div class="card-body">
        <h2 class="card-title d-flex justify-content-center mb-4">Manage Sections "<?= $bank->nama_bank ?>" </h2>
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
            <a href="<?= base_url('csoal/tampilbanksoal') ?>" class="btn-back btn-sm btn-info"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <button type="button" class="custom-button" data-toggle="modal" data-target="#sectionModal">
                Create New Section
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="sectionModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sectionModalLabel">Create New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" action="<?= base_url('csoal/simpansection') ?>">
                                <input type="hidden" name="id_bank" value="<?= $id_bank ?>">
                                <div class="mb-3">
                                    <label for="nama_section" class="form-label">Select Part:</label>
                                    <select name="nama_section" class="form-control" id="nama_section" required>
                                        <option value="">Choose Part</option>
                                        <option value="Part 1: Photographs">Part 1: Photographs</option>
                                        <option value="Part 2: Question-Response">Part 2: Question-Response</option>
                                        <option value="Part 3: Conversations">Part 3: Conversations</option>
                                        <option value="Part 4: Talk">Part 4: Talk</option>
                                        <option value="Part 5: Incomplete Sentences">Part 5: Incomplete Sentences</option>
                                        <option value="Part 6: Text Completion">Part 6: Text Completion</option>
                                        <option value="Part 7: Reading Comprehension">Part 7: Reading Comprehension</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select name="tipe_section" class="form-control" id="tipe_section" required>
                                        <option value="">Choose Type</option>
                                        <option value="Listening">Listening</option>
                                        <option value="Reading">Reading</option>
                                    </select>
                                </div>
                                <div class="form-group" id="create_audio_input" style="display: none;">
                                    <label for="audio_section">Audio</label>
                                    <input type="file" class="form-control-file" id="audio_section" name="audio_section" accept="audio/*">
                                </div> 
                                <div class="form-group">
                                    <label for="add_media" class="form-label">Add Media:</label>
                                    <select class="form-control" id="add_media" name="add_media">
                                        <option value="">None</option>
                                        <option value="image">Image</option>
                                    </select>
                                </div>
                                <div class="form-group" id="image_input" style="display: none;">
                                    <label for="gambar_section">Image</label>
                                    <input type="file" class="form-control-file" id="gambar_section" name="gambar_section" accept="image/*">
                                </div>
                                <div class="form-group" id="timer_input" style="display: none;>
                                    <label for="create_timer">Section Timer (Second)</label>
                                    <input type="number" class="form-control" id="create_timer" name="timer" placeholder="Input timer in Second">
                                </div>
                                <input type="hidden" id="create_formatted_timer" name="formatted_timer">
                                
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn text-white" style="width: 100px; background-color:#355E3B;">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editSectionModal" tabindex="-1" role="dialog" aria-labelledby="editSectionModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSectionModalLabel">Edit Section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editSectionForm" enctype="multipart/form-data" method="post" action="<?= base_url('csoal/updatesection') ?>">
                                <input type="hidden" name="id_bank" value="<?= $id_bank ?>">
                                <input type="hidden" id="edit_id_section" name="id_section">
                                <div class="mb-3" style="display: none;>
                                    <label for="edit_nama_section" class="form-label">Select Part:</label>
                                    <select name="nama_section" class="form-control" id="edit_nama_section" required>
                                        <option value="">Choose Part</option>
                                        <option value="Part 1: Photographs">Part 1: Photographs</option>
                                        <option value="Part 2: Question-Response">Part 2: Question-Response</option>
                                        <option value="Part 3: Conversations">Part 3: Conversations</option>
                                        <option value="Part 4: Talk">Part 4: Talk</option>
                                        <option value="Part 5: Incomplete Sentences">Part 5: Incomplete Sentences</option>
                                        <option value="Part 6: Text Completion">Part 6: Text Completion</option>
                                        <option value="Part 7: Reading Comprehension">Part 7: Reading Comprehension</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select name="tipe_section" class="form-control" id="edit_tipe_section" required>
                                        <option value="">Choose Type</option>
                                        <option value="Listening">Listening</option>
                                        <option value="Reading">Reading</option>
                                    </select>
                                </div>
                                <div class="form-group" id="edit_audio_input" style="display: none;">
                                    <label for="edit_audio_section">Audio</label>
                                    <input type="file" class="form-control-file" id="edit_audio_section" name="audio_section" accept="audio/*">
                                    <audio id="edit_audio_preview" controls style="display: none;">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                                <div class="form-group" id="edit_image_input" style="display: none;">
                                    <label for="edit_gambar_section">Image</label>
                                    <input type="file" class="form-control-file" id="edit_gambar_section" name="gambar_section" accept="image/*">
                                    <img id="edit_image_preview" src="" alt="Image preview" style="display: none; max-width: 100%; margin-top: 10px;">
                                </div>
                                <div class="mb-3" id="edit_timer_input" style="display: none;">
                                    <label for="edit_timer" class="form-label">Section Timer (Second)</label>
                                    <input type="number" class="form-control" id="edit_timer" name="timer" placeholder="Input timer in Second" required>
                                </div>
                                <input type="hidden" id="edit_formatted_timer" name="formatted_timer">
                                <div class="modal-footer">
                                    <button type="button" id="cancelEdit" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn text-white" style="width: 100px; background-color:#355E3B;">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables -->
            <div class="table-responsive mt-3">
                <table class="table table-hover" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Total Questions</th>
                            <th>Type</th>
                            <th>Timer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sections as $section): ?>
                        <tr>
                            <td></td>
                            <td><?= htmlspecialchars($section->nama_section, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= $section->total_questions ?></td>
                            <td><?= htmlspecialchars($section->tipe_section, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($section->timer, ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <a href="<?= base_url('csoal/tampilsoal/' . $section->id_section) ?>" class="btn btn-sm btn-success">Open Question</a>
                                <button type="button" id="edit-<?= $section->id_section ?>" class="btn btn-sm btn-primary">Edit</button>
                                <button type="button" onclick="hapusdata('<?= $section->id_section ?>', '<?= $id_bank ?>')" class="btn btn-sm btn-danger">Hapus</button>
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
                    "targets": [1,2], // Description column
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            var maxLength = 31;
                            var ellipsis = '...';
                            if (data.length > maxLength) {
                                return data.substr(0, maxLength) + ellipsis;
                            }
                        }
                        return data;
                    }
                }
            ],
            "order": [[1, 'asc']],
            "drawCallback": function (settings) {
                var api = this.api();
                api.column(0).nodes().each(function (cell, i) {
                    var page = api.page.info();
                    $(cell).html(page.start + i + 1);
                });
            }
        });

        function clearAndCloseModal() {
            // Clear file inputs
            $('#edit_audio_section').val('');
            $('#edit_gambar_section').val('');
            
            // Reset file previews
            $('#edit_audio_preview').attr('src', '').hide();
            $('#edit_image_preview').attr('src', '').hide();

            // Reset other form fields as needed
            $('#edit_id_section').val('');
            $('#edit_nama_section').val('');
            $('#edit_tipe_section').val('');
            $('#edit_timer').val('');
            $('#edit_formatted_timer').val('');

            // Hide the modal
            $('#editSectionModal').modal('hide');
        }

        // Attach event handler to the Cancel button
        $('#cancelEdit').on('click', function() {
            clearAndCloseModal();
        });

        $('#editSectionModal').on('hidden.bs.modal', function () {
            clearAndCloseModal();
        });

        // Ensure that any form submission also clears the inputs if needed
        $('#editSectionForm').on('submit', function() {
            clearAndCloseModal();
        });

        var baseUrl = '<?= base_url('soal_material/') ?>';

        // Show and populate the edit modal
        $(document).on('click', '[id^=edit-]', function() {
            const id = $(this).attr('id').split('-')[1];
            $.ajax({
                url: "<?php echo base_url('Csoal/getsection/')?>" + id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Check if the response has the required data
                    if (response && response.id_section) {
                        // Populate the form fields in the edit modal
                        $('#edit_id_section').val(response.id_section);
                        $('#edit_nama_section').val(response.nama_section);
                        $('#edit_deskrip_section').val(response.deskrip_section);

                        var timer = response.timer || "00:00:00"; // Default value if undefined
                        $('#edit_timer').val(convertTimeToSeconds(timer)); // Convert HH:MM:SS to seconds
                        $('#edit_formatted_timer').val(timer);
                        $('#edit_tipe_section').val(response.tipe_section);

                        // Toggle visibility and set previews
                        if (response.tipe_section === 'Listening') {
                            $('#edit_audio_input').show();
                            $('#edit_image_input').show();
                            $('#edit_timer_input').show();
                            if (response.audio_section) {
                                $('#edit_audio_preview').attr('src', baseUrl + `audio/${response.audio_section}`).show();
                            } else {
                                $('#edit_audio_preview').hide();
                            }

                            if (response.gambar_section) {
                                $('#edit_image_preview').attr('src', baseUrl + `images/${response.gambar_section}`).show();
                            } else {
                                $('#edit_image_preview').hide();
                            }
                            
                        } else if (response.tipe_section === 'Reading') {
                            $('#edit_audio_input').hide();
                            $('#edit_timer_input').hide();
                            $('#edit_image_input').show();
                            if (response.gambar_section) {
                                $('#edit_image_preview').attr('src', baseUrl + `images/${response.gambar_section}`).show();
                            } else {
                                $('#edit_image_preview').hide();
                            }
                        } else {
                            $('#edit_audio_input').hide();
                            $('#edit_image_input').hide();
                        }

                        // Show the edit modal
                        $('#editSectionModal').modal('show');
                    } else {
                        console.error('Invalid response format', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error); // Debug log
                }
            });
        });

        // Toggle visibility of media inputs based on section type in the edit modal
        $('#edit_tipe_section').on('change', function() {
            var selectedType = $(this).val();
            $('#edit_audio_input').toggle(selectedType === 'Listening');
        });

        // Convert seconds to HH:MM:SS before form submission (Edit)
        $('#editSectionForm').on('submit', function(event) {
            event.preventDefault();

            var timerInSeconds = parseInt($('#edit_timer').val(), 10);
            var formattedTimer = secondsToTime(timerInSeconds);

            $('#edit_formatted_timer').val(formattedTimer);
            $(this).off('submit').submit(); // Submit the form
        });

        // Toggle section input based on section name
        document.getElementById('nama_section').addEventListener('change', function() {
            var selectedPart = this.value;
            var tipeSection = document.getElementById('tipe_section');
            var audioInput = document.getElementById('create_audio_input');
            var audioInputField = document.getElementById('audio_section');
            var timerInput = document.getElementById('timer_input');
            var timerInputField = document.getElementById('create_timer');

            if (selectedPart === 'Part 1: Photographs' || 
                selectedPart === 'Part 2: Question-Response' || 
                selectedPart === 'Part 3: Conversations' || 
                selectedPart === 'Part 4: Talk') {
                tipeSection.value = 'Listening';
                audioInput.style.display = 'block';
                timerInput.style.display = 'block';
                audioInputField.setAttribute('required', 'required');
                timerInputField.setAttribute('required', 'required');
            } else if (selectedPart === 'Part 5: Incomplete Sentences' || 
                    selectedPart === 'Part 6: Text Completion' || 
                    selectedPart === 'Part 7: Reading Comprehension') {
                tipeSection.value = 'Reading';
                audioInput.style.display = 'none';
                timerInput.style.display = 'none';
                audioInputField.removeAttribute('required');
                timerInputField.removeAttribute('required');
            } else {
                timerInput.style.display = 'none';
                audioInput.style.display = 'none';
                audioInputField.removeAttribute('required');
                timerInputField.removeAttribute('required');
            }
        });

        // Toggle section visibility based on selection
        document.getElementById('add_media').addEventListener('change', function() {
            var selectedMedia = this.value;
            var imageInput = document.getElementById('image_input');

            if (selectedMedia === 'image') {
                imageInput.style.display = 'block';
            } else {
                imageInput.style.display = 'none';
            }
        });

        // Convert seconds to HH:MM:SS before form submission (Create)
        $('#createSectionForm').on('submit', function(event) {
            event.preventDefault();

            var timerInSeconds = parseInt($('#create_timer').val(), 10);
            var formattedTimer = secondsToTime(timerInSeconds);

            $('#create_formatted_timer').val(formattedTimer);
            $(this).off('submit').submit(); // Submit the form
        });

        // Convert HH:MM:SS to seconds
        function convertTimeToSeconds(time) {
            if (!time) return 0; // Default to 0 if time is not provided

            var parts = time.split(':');
            if (parts.length !== 3) return 0; // Ensure the format is HH:MM:SS

            var hours = parseInt(parts[0], 10) || 0;
            var minutes = parseInt(parts[1], 10) || 0;
            var seconds = parseInt(parts[2], 10) || 0;

            return (hours * 3600) + (minutes * 60) + seconds;
        }

        // Convert seconds to HH:MM:SS
        function secondsToTime(seconds) {
            var hours = Math.floor(seconds / 3600);
            var minutes = Math.floor((seconds % 3600) / 60);
            var secs = seconds % 60;

            return [hours, minutes, secs].map(function(val) {
                return val < 10 ? '0' + val : val;
            }).join(':');
        }

        // Convert seconds to HH:MM:SS before form submission (Edit)
        $('#editSectionForm').on('submit', function(event) {
            event.preventDefault();

            var timerInSeconds = parseInt($('#edit_timer').val(), 10);
            var formattedTimer = secondsToTime(timerInSeconds);

            $('#edit_formatted_timer').val(formattedTimer);
            $(this).off('submit').submit(); // Submit the form
        });
    });

    function hapusdata(id_section, id_bank) {
        if (confirm("Are you sure you want to delete this section?")) {
            window.location.href = '<?= site_url('Csoal/hapussection') ?>/' + id_section + '/' + id_bank;
        }
    }

</script>


