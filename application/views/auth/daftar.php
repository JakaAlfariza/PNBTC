<style>
    .card-body {
        border: 2px solid #355E3B; /* Green border */
        border-radius: 10px;
        padding: 1.25rem; /* Adjust padding as needed */
        box-shadow: none; /* Remove default shadow */
        margin-top: 20px;
        box-sizing: border-box; /* Ensure padding is included in width */
    }

.col-md-6 {
    padding: 0 15px; /* Padding inside columns */
}

.mb-3{
    max-height: 280px;
}

.form-control,
.input-group {
    width: 100%; /* Ensure form controls fit within their container */
    height: auto; /* Automatically adjust height */
}

.card {
    width: 80%;
    max-width: 100%; /* Ensure card width fits content */
}

</style>

<div class="card container-card text-dark">
    <div class="card-body">
        <div class="card-body-p">
            <p>Create Your Account</p>
        </div>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" style="font-size:14px;">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form name="formlogin" method="post" action="<?php echo base_url('cdaftar/simpandaftar'); ?>" class="text-left">
            <div class="row">
                <!-- First Column -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" name="email" placeholder="Email" value="<?= set_value('email')?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="Nama" value="<?= set_value('nama')?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid' : ''; ?>" name="tgl_lahir" id="tgl_lahir" placeholder="tgl_lahir" value="<?= set_value('tgl_lahir')?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="gender" class="form-label">Gender:</label>
                        <select name="gender" class="form-control <?php echo form_error('gender') ? 'is-invalid' : ''; ?>" id="gender">
                            <option value="">Choose Gender</option>
                            <option value="Male" <?= set_select('gender', 'Male', set_value('gender') == 'Male' ? true : false); ?>>Male</option>
                            <option value="Female" <?= set_select('gender', 'Female', set_value('gender') == 'Female' ? true : false); ?>>Female</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('gender', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" id="passwordInput" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text" id="eyeIcon" onclick="togglePasswordVisibility()">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback">
                                <?php echo form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control <?php echo form_error('confirm_password') ? 'is-invalid' : ''; ?>" id="passwordInput2" name="confirm_password" placeholder="Confirm Password">
                            <div class="input-group-append">
                                <span class="input-group-text" id="eyeIcon2" onclick="togglePasswordVisibility2()">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback">
                                <?php echo form_error('confirm_password', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
            <button type="submit" class="btn text-white btn-click">R E G I S T E R</button>
            <p class="text-center mt-3">Already Have an Account? <a href="<?php echo base_url('chalaman/login'); ?>" class="form-label">Click Here</a></p>
            </div>
        </form>
    </div>
</div>


<script>
    //Function button lihat password
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

    function togglePasswordVisibility2() {
        var passwordInput = document.getElementById("passwordInput2");
        var eyeIcon = document.getElementById("eyeIcon2");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
        }
    }

</script>