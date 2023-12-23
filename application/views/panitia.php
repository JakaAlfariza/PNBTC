<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body,
        html {
            background-color: #004789;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .col-sm-2 {
            background-color: #ffffff;
            /* Set the background color for the sidebar */
            padding: 15px;
            min-height: 100%;
            /* Ensure the sidebar takes at least the full height of its parent container */
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
        
    </style>

    <!-- Main Content -->
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title d-flex justify-content-center mb-4">Tambah Event</h2>
                            <div class="row">
                                <div class="col-6">
                                    <form class="forms-sample" method="POST" action="<?php echo base_url('cevent/simpandata'); ?>">
                                        <div class="mb-3">
                                            <div class="form-label">
                                                <label for="exampleInputName1" class="form-label">Nama Panitia :</label>
                                                <input type="text" name="username" class="form-control" style="font-size:17px" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleInputName1" class="form-label">email :</label>
                                                <input type="file" name="gambar" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleInputName1" class="form-label">Password :</label>
                                                <input type="text" name="penyelenggara" class="form-control" required>
                                            </div>
                                        </div>
                                       
                            <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
        
    <!-- Bootstrap JS and dependencies -->
    <script>
        function hapusdata(id_event) {
            if (confirm("Apakah yakin menghapus data ini?")) {
                window.open("<?php echo base_url()?>cevent/hapusdata/" + id_event, "_self");
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>