<!-- Reset Password Form -->
<div class="card container-card text-dark">
    <div class="card-body">
        <form name="formResetPassword" method="post" action="<?php echo base_url('creset/resetPassword'); ?>" class="text-left">
            <div class="card-body-p">
                <p>Reset Password</p>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password:</label>
                <input type="password" class="form-control <?php echo form_error('new_password') ? 'is-invalid' : ''; ?>" name="new_password" placeholder="New Password">
                <div class="invalid-feedback">
                    <?php echo form_error('new_password', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
            <button type="submit" class="btn text-white btn-click">Reset Password</button>
        </form>
    </div>
</div>
