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

        .custom-btn {
            background-color: #004789;
            color: #fff;
        }
        
    </style>

    <!-- Main Content -->
                    <div class="card mt-3">
                        <div class="card-body">
                        <h2 class="card-title d-flex justify-content-center mb-4">Tambah Akun</h2>
                            <form class="forms-sample" method="POST" action="<?php echo base_url('cdaftar/simpandaftar'); ?>">
                                <div class="mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control <?php if (!empty($email_error)) echo 'is-invalid'; ?>" name="email" id="email"  placeholder="Email" required>
                                    <div class="invalid-feedback">
                                        <?php echo $email_error; ?>
                                    </div>
                                </div>
                                <div class="mb-3" style="margin-top: 15px;">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control <?php if (!empty($username_error)) echo 'is-invalid'; ?>" name="username" id="username" placeholder="Username" required>
                                    <div class="invalid-feedback">
                                        <?php echo $username_error; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="eyeIcon" onclick="togglePasswordVisibility()">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputName1" class="form-label">Role:</label>
                                        <select name="role" class="form-control" id="role" required>
                                            <option value="">Pilih Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="panitia">Panitia</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                            <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
        
    <!-- Bootstrap JS and dependencies -->
    <script>
        function hapusakun(id) {
        if (confirm("Apakah yakin menghapus data ini?")) {
            window.location.href = "<?php echo base_url()?>cdaftar/hapusakun/" + id;
        }
        }

        function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        var eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
        }
    }
    </script>