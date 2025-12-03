
<?= $this->extend('layouts/custom-main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-5 d-flex justify-content-center">
                <a href="<?php echo base_url('index'); ?>">
                    <img src="<?php echo base_url('assets/images/brand-logos/desktop-logo.png'); ?>" alt="logo" class="desktop-logo">
                    <img src="<?php echo base_url('assets/images/brand-logos/desktop-dark.png'); ?>" alt="logo" class="desktop-dark">
                </a>
            </div>

            <div class="card custom-card">
                <div class="card-body p-5">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-primary rounded-pill alert-dismissible fade show">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>                     
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger rounded-pill alert-dismissible fade show">       
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                        </div>
                    <?php endif; ?>

                    <p class="h5 fw-semibold mb-2 text-center"><?= lang('App.sign'); ?> <?= lang('App.up'); ?></p>
                    <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome to Rise Portal! Sign up to access your learning tools and updates.</p>
                    <?= form_open('savesignup'); ?>
                    <div class="row gy-3">
                        <div class="col-xl-12">
                            <label for="first-name" class="form-label"><?= lang('App.first'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control" id="first-name" name="first-name" placeholder=" <?= lang('App.first'); ?> <?= lang('App.name'); ?>">
                        </div>
                        <div class="col-xl-12">
                            <label for="middle-name" class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control" id="middle-name" name="middle-name" placeholder="<?= lang('App.middle'); ?> <?= lang('App.name'); ?>">
                        </div>
                        <div class="col-xl-12">
                            <label for="last-name" class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control" id="last-name" name="last-name" placeholder="<?= lang('App.last'); ?> <?= lang('App.name'); ?>">
                        </div>
                        <div class="col-xl-12">
                            <label for="aadhar-number" class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?></label>
                            <input type="number" class="form-control" id="aadhar-number" name="aadhar-number" placeholder="<?= lang('App.aadhar'); ?> <?= lang('App.no'); ?>">
                        </div>

                        <div class="col-xl-12">
                            <label for="signup-password" class="form-label text-default">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg" name="signup-password" id="signup-password" placeholder="password">
                                <button class="btn btn-light" onclick="createpassword('signup-password', this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                        </div>
                        <div class="col-xl-12 mb-2">
                            <label for="signup-confirmpassword" class="form-label text-default">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg"name="signup-confirmpassword" id="signup-confirmpassword" placeholder="confirm password">
                                <button class="btn btn-light" onclick="createpassword('signup-confirmpassword', this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                        </div>
                        <div class="col-xl-12 d-grid mt-2">
                            <button class="btn btn-lg btn-primary"type="submit">Create Account</button>
                        </div>
                    </div>
                    <?= form_close(); ?>

                    <div class="text-center">
                        <p class="fs-12 text-muted mt-3">Already have an account? <a href="<?php echo base_url('registration/login'); ?>" class="text-primary">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

<!-- Show Password JS -->
<script src="<?php echo base_url('assets/js/show-password.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
