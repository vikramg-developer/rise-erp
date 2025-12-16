<?php
$page_session = \Config\Services::session();
$errors = $errors ?? [];
?>
<?= $this->extend('layouts/custom-main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-5 d-flex justify-content-center">
                <a href="<?php //echo base_url('index');      ?>">
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
                    <?= form_open('save-registration'); ?>

                    <div class="row gy-3">
                        <!--First name-->
                        <div class="col-xl-12">
                            <label for="student_first_name" class="form-label"><?= lang('App.first') ?> <?= lang('App.name') ?></label>
                            <input type="text" class="form-control required-input" name="student_first_name" id="student_first_name" placeholder="<?= lang('App.first'); ?> <?= lang('App.name'); ?>"value="<?= set_value('student_first_name'); ?>" oninput="forceUppercase(this)"onkeypress="return isAlphaKey(event)">
                            <?php if (isset($errors['student_first_name'])): ?>
                                <small class="text-danger"><?= esc($errors['student_first_name']); ?></small>
                            <?php endif; ?>
                        </div>
                        <!--Middle name-->
                        <div class="col-xl-12">
                            <label for="student_middle_name" class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control required-input" id="student_middle_name" name="student_middle_name" placeholder="<?= lang('App.middle'); ?> <?= lang('App.name'); ?>" onkeypress="return isAlphaKey(event)"oninput="forceUppercase(this)"value="<?= set_value('student_middle_name'); ?>">
                            <?php if (isset($errors['student_middle_name'])): ?>
                                <small class="text-danger"><?= esc($errors['student_middle_name']); ?></small>
                            <?php endif; ?>
                        </div>
                        <!--Last name-->
                        <div class="col-xl-12">
                            <label for="student_last_name" class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control required-input" id="student_last_name" name="student_last_name" placeholder="<?= lang('App.last'); ?> <?= lang('App.name'); ?>"onkeypress="return isAlphaKey(event)"oninput="forceUppercase(this)"value="<?= set_value('student_last_name'); ?>">
                            <?php if (isset($errors['student_last_name'])): ?>
                                <small class="text-danger"><?= esc($errors['student_last_name']); ?></small>
                            <?php endif; ?>
                        </div>
                        <!--Aadhar Number-->
                        <div class="col-xl-12">
                            <label for="student_aadhar_number" class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?></label>
                            <input type="text" class="form-control" id="student_aadhar_number" name="student_aadhar_number"onkeypress="return isNumber(event)" maxlength="12" minlength="12" placeholder="<?= lang('App.aadhar'); ?> <?= lang('App.no'); ?>"value="<?= set_value('student_aadhar_number'); ?>">
                            <?php if (isset($errors['student_aadhar_number'])): ?>
                                <small class="text-danger"><?= esc($errors['student_aadhar_number']); ?></small>
                            <?php endif; ?>
                        </div>
                        <!--Password-->
                        <!-- Password -->
                        <div class="col-xl-12">
                            <label for="student_password" class="form-label text-default">
                                <?= lang('App.password'); ?>
                            </label>
                            <div class="input-group">
                                <input type="password"class="form-control form-control-lg required-input <?= isset($errors['student_password']) ? 'is-invalid' : '' ?>"name="student_password"id="student_password"placeholder="  <?= lang('App.password'); ?>"onkeyup="check();"required>
                                <button class="btn btn-light"
                                        type="button"
                                        onclick="createpassword('student_password', this)">
                                    <i class="ri-eye-off-line align-middle"></i>
                                </button>
                            </div>

                            <?php if (isset($errors['student_password'])): ?>
                                <small class="text-danger">
                                    <?= esc($errors['student_password']); ?>
                                </small>
                            <?php endif; ?>
                        </div>

                        <!--Confirm Password-->
                        <div class="col-xl-12 mb-2">
                            <label for="signup-confirmpassword" class="form-label text-default"><?= lang('App.confirm'); ?> <?= lang('App.password'); ?></label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg required-input"name="confirmpassword" id="signup-confirmpassword" placeholder="confirm password"maxlength="8" minlength="8"onkeyup='check();'required>
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
                        <p class="fs-12 text-muted mt-3">Already Registerd?<a href="<?php echo base_url('login'); ?>" class="text-primary"> <?= lang('App.login'); ?> <?= lang('App.here'); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>
<!--Registration Page JS -->
<script src="<?= base_url('partials/js/student_registration/registrationpage.js') ?>"></script>

<!-- Show Password JS -->
<script src="<?php echo base_url('assets/js/show-password.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
