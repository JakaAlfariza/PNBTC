<div class="card container-card text-dark">
    <div class="card-body">
        <div class="card-body-p">
            <p>Login To Your Account</p>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" style="font-size:14px;">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" style="font-size:14px;">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        
        <form name="formlogin" method="post" action="<?php echo base_url('chalaman/proseslogin'); ?>" class="text-left">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" name="email" placeholder="Email" value="<?= set_value('email')?>">
                <div class="invalid-feedback">
                    <?php echo form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" id="passwordInput" name="password" placeholder="Password" >
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
            <div class="forget">
                <a href="<?= base_url('chalaman/lupa_pass');?>" class="form-label">Forget Password?</a>
            </div>
            <button type="submit" class="btn text-white btn-click">L O G I N</button>
            <p class="text-center mt-3">Create New Account? <a href="<?php echo base_url('chalaman/daftar'); ?>" class="form-label">Click Here</a></p>
        </form>
    </div>
</div>