<?php
$session = session();
$errors = $errors ?? [];
?>
<?= $this->extend('layouts/custom-main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-5 d-flex justify-content-center">
                <a href="<?php //echo base_url('registration');          ?>">
                    <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="desktop-logo">
                    <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="desktop-dark">
                </a>
            </div>
            <div class="card custom-card">

                <div class="card-body p-5">                 
                    <?php $validation = session('validation'); ?>
                    <?php if (session('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>



                    <p class="h5 fw-semibold mb-2 text-center"><?= lang('App.login'); ?></p>
                    <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back !</p>

                    <?= form_open('/check-user'); ?>

                    <div class="row gy-3">
                        <div class="col-xl-12">
                            <label for="user_type" class="form-label"><?= lang('App.user'); ?> <?= lang('App.type'); ?></label>
                            <select class="form-select js-example-basic-single" name="user_type" id="user_type" >
                                <option value="">-- <?= lang('App.select') ?> <?= lang('App.user'); ?> <?= lang('App.type'); ?>  --</option>
                                <option value="1" <?= old('user_type') == '1' ? 'selected' : '' ?>>Faculty</option>
                                <option value="2" <?= old('user_type') == '2' ? 'selected' : '' ?>>Student</option>
                                <option value="3" <?= old('user_type') == '3' ? 'selected' : '' ?>>Parent</option>
                            </select>

                            <?php if (isset($validation) && $validation->getError('user_type')): ?>
                                <small class="text-danger"><?= $validation->getError('user_type') ?></small>
                            <?php endif; ?>

                        </div>
                        <div class="col-xl-12">
                            <label for="login_username" class="form-label text-default"><?= lang('App.rise') ?> <?= lang('App.number') ?></label>
                            <input type="text" class="form-control form-control-lg" id="login_username" value="<?= old('login_username') ?>" name="login_username" maxlength="12" placeholder="<?= lang('App.rise') ?> <?= lang('App.number') ?>">
                            <?php if (isset($validation) && $validation->getError('login_username')): ?>
                                <small class="text-danger"><?= $validation->getError('login_username') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-12">
                            <label for="login_password" class="form-label text-default d-block"><?= lang('App.password') ?><a href="" class="float-end text-danger">Forget password ?</a></label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg" id="login_password" name="login_password" placeholder="<?= lang('App.password') ?>">
                                <button class="btn btn-light"
                                        type="button"
                                        onclick="createpassword('login_password', this)">
                                    <i class="ri-eye-off-line align-middle"></i>
                                </button>                            </div>
                            <?php if (isset($validation) && $validation->getError('login_password')): ?>
                                <small class="text-danger"><?= $validation->getError('login_password') ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                    Remember password ?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 d-grid mt-2">
                        <button class="btn btn-lg btn-primary"id="signup-submit" type="submit"><?= lang('App.login'); ?> </button>
                    </div>
                    <?= form_close(); ?>
                </div>

                <div class="text-center">
                    <p class="fs-12 text-muted mt-3">Dont have an account? <a href="<?php echo base_url('student-registration'); ?>" class="text-primary"><?= lang('App.register') ?></a></p>
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
<?= $this->endSection('scripts'); ?>
