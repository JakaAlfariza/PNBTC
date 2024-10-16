<div class="card container-card text-dark">
    <div class="card-body">
        <form name="formotp" method="post" action="<?php echo base_url('creset/otp'); ?>"
            class="text-left">
            <div class="card-body-p">
                <p>Reset Password</p>
            </div>
            <div class="card-body-p2">
                <p>Send Code Verifiation via Email</p>
            </div>
            <!-- Alert -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" style="font-size:14px;">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" style="font-size:14px;">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>


            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <div class="input-group">
                    <input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" name="email" placeholder="Email" value="<?= set_value('email')?>">
                    <div class="input-group-append">
                        <button type="submit" name="action" value="send" class="btn-send text-white btn-click">Send</button>
                    </div>
                    <div class="invalid-feedback">
                        <?php echo form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                    </div> 
                </div>
            </div>
            <div class="mb-3">
                <label for="otp" class="form-label">Code:</label>
                <input type="text" class="form-control <?php echo form_error('otp') ? 'is-invalid' : ''; ?>" name="otp" placeholder="Code" value="<?= set_value('otp')?>">
                <div class="invalid-feedback">
                    <?php echo form_error('otp', '<small class="text-danger pl-3">','</small>'); ?>
                </div> 
            </div>
            <button type="submit" name="action" value="verify" class="btn text-white btn-click">V E R I F Y</button>
            <p class="text-center mt-3">Remember the password? <a href="<?php echo base_url('chalaman/login'); ?>" class="form-label">Click Here</a></p>
        </form>
    </div>
</div>