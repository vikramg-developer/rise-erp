<?php
$page_session = \Config\Services::session();
?>
<?= $this->extend('layouts/custom-main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-5 d-flex justify-content-center">
                <a href="<?php //echo base_url('index'); ?>">
                    <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="desktop-logo">
                    <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="desktop-dark">
                </a>
            </div>

            <div class="card custom-card">
                <div class="card-body p-5">
                    <?php if ($page_session->getTempdata('success')): ?>
                        <div class="alert alert-primary rounded-pill alert-dismissible fade show"><?= $page_session->getTempdata('success'); ?></div>
                    <?php endif; ?>

                    <?php if ($page_session->getTempdata('error')): ?>
                                               <div class="alert alert-danger rounded-pill alert-dismissible fade show">       
                                    <?= $page_session->getTempdata('error'); ?></div>
                    <?php endif; ?>



                    <p class="h5 fw-semibold mb-2 text-center"><?= lang('App.register'); ?> </p>
                    <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome to Rise Portal! Sign up to access your learning tools and updates.</p>
                    <?= form_open('savesignup'); ?>
                    <div class="row gy-3">
                       <!--First name-->
                       <div class="col-xl-12">
                            <label class="form-label"><?= lang('App.first') ?> <?= lang('App.name') ?> </label>
                            <input type="text" class="form-control  required-input" name="first-name" placeholder="<?= lang('App.first'); ?> <?= lang('App.name'); ?>"onkeypress="return isAlphaKey(event)"value=""required>
                        </div>
                            <!--Middle name-->
                        <div class="col-xl-12">
                            <label for="middle-name" class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control required-input" id="middle-name" name="middle-name" placeholder="<?= lang('App.middle'); ?> <?= lang('App.name'); ?>" onkeypress="return isAlphaKey(event)"value=""required>
                        </div>
                             <!--Last name-->
                        <div class="col-xl-12">
                            <label for="last-name" class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control required-input" id="last-name" name="last-name" placeholder="<?= lang('App.last'); ?> <?= lang('App.name'); ?>"onkeypress="return isAlphaKey(event)"value=""required>
                        </div>
                             <!--Aadhar Number-->
                        <div class="col-xl-12">
                            <label for="aadhar-number" class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?></label>
                            <input type="text" class="form-control required-input" id="aadhar-number" name="aadhar-number"  maxlength="12" minlength="12" placeholder="<?= lang('App.aadhar'); ?> <?= lang('App.no'); ?>"onkeypress="return isNumber(event)"value=""required>

                        </div>
                        <!--Password-->
                        <div class="col-xl-12">
                            <label for="signup-password" class="form-label text-default"><?= lang('App.password'); ?></label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg required-input" name="signup-password" id="signup-password" placeholder="password" maxlength="8" minlength="8"value="" onkeyup='check();'required>
                                <button class="btn btn-light" onclick="createpassword('signup-password', this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                        </div>
                        <!--Confirm Password-->
                        <div class="col-xl-12 mb-2">
                            <label for="signup-confirmpassword" class="form-label text-default"><?= lang('App.confirm'); ?> <?= lang('App.password'); ?></label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg required-input"name="signup-confirmpassword" id="signup-confirmpassword" placeholder="confirm password"maxlength="8" minlength="8"onkeyup='check();'required>
                                <button class="btn btn-light" onclick="createpassword('signup-confirmpassword', this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                              <small id="password-message"></small>
                        </div>
                        <div class="col-xl-12 d-grid mt-2">
                            <!--<button id="createBtn"class="btn btn-lg btn-primary"type="submit"disabled>Create Account</button>-->
                            <button class="btn btn-lg btn-primary"id="signup-submit" type="submit"><?= lang('App.register'); ?> </button>
                        </div>
                    </div>
                    <?= form_close(); ?>

                    <div class="text-center">
                        <p class="fs-12 text-muted mt-3">Already Registerd?<a href="<?php echo base_url('login'); ?>" class="text-primary"> <?= lang('App.login') ;?> <?= lang('App.here') ;?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

<script src="<?= base_url('assets/js/registrationpage.js') ?>"></script>

<!-- Show Password JS -->
<script src="<?php echo base_url('assets/js/show-password.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
