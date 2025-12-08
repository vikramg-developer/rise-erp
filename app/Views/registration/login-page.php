

<?= $this->extend('layouts/custom-main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="container">
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
                    <p class="h5 fw-semibold mb-2 text-center"><?= lang('App.login'); ?></p>
                    <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back !</p>
                    <?= form_open('authenticate'); ?>
                    <div class="row gy-3">
                        <div class="col-xl-12">
                            <label for="login-username" class="form-label text-default"><?= lang('App.rise') ?> <?= lang('App.number') ?></label>
                            <input type="text" class="form-control form-control-lg" id="login-username" maxlength="13" minlength="13"name="login-username" placeholder="<?= lang('App.rise') ?> <?= lang('App.number') ?>"required>
                        </div>
                        <div class="col-xl-12 mb-2">
                            <label for="login-password" class="form-label text-default d-block"><?= lang('App.password') ?><a href="<?php echo base_url('reset-password-basic'); ?>" class="float-end text-danger">Forget password ?</a></label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg"  maxlength="8" minlength="8"id="login-password" name="login-password"placeholder="<?= lang('App.password') ?>"required>
                                <button class="btn btn-light" type="button" onclick="createpassword('signin-password', this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                            <div class="mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                        Remember password ?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 d-grid mt-2">
                            <!--<button id="createBtn"class="btn btn-lg btn-primary"type="submit"disabled>Create Account</button>-->
                            <button class="btn btn-lg btn-primary"id="signup-submit" type="submit"><?= lang('App.login'); ?> </button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                    <div class="text-center">
                        <p class="fs-12 text-muted mt-3">Dont have an account? <a href="<?php echo base_url('registration'); ?>" class="text-primary"><?= lang('App.register') ?></a></p>
                    </div>
                 </div>
             </div>
        </div>
    </div>
</div>
<!--
                    
                    
<?= $this->endSection('content'); ?>
<?= $this->section('scripts'); ?>
<script src="<?php echo base_url('assets/js/show-password.js'); ?>"></script>
<script src="<?= base_url('assets/js/registrationpage.js') ?>"></script>
<?= $this->endSection('scripts'); ?>
