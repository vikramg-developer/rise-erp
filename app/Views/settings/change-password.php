<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.change'); ?> <?= lang('App.password'); ?>
        </h1>

        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>">
                            <?= lang('App.settings'); ?>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?= lang('App.change'); ?> <?= lang('App.password'); ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Card -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <form id="faculty-registration-form">
                    <div class="card-body p-4">
                        <div class="row gy-4">

                            <!-- Old Password -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label"><?= lang('App.old'); ?> <?= lang('App.password'); ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Enter Old Password" required>
                                    <span class="input-group-text bg-white" role="button" onclick="createpassword('old_password', this)"><i class="ri-eye-off-line align-middle"></i></span>
                                </div>
                                <small class="text-danger" id="old_password_error" style="display:none;"></small>
                            </div>

                            <!-- New Password -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label"><?= lang('App.new'); ?> <?= lang('App.password'); ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" id="faculty_password" name="faculty_password" class="form-control" placeholder="Enter New Password" required>
                                    <span class="input-group-text bg-white" role="button" onclick="createpassword('faculty_password', this)"><i class="ri-eye-off-line align-middle"></i></span>
                                </div>
                                <small class="text-danger" id="faculty_password_error" style="display:none;"></small>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label"><?= lang('App.confirm'); ?> <?= lang('App.password'); ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                    <span class="input-group-text bg-white" role="button" onclick="createpassword('confirm_password', this)"><i class="ri-eye-off-line"></i></span>
                                </div>
                                <small id="password-message" class="fw-semibold"></small>
                                <small class="text-danger" id="confirm_password_error" style="display:none;"></small>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="<?= base_url('faculty/fetch-faculty'); ?>" class="btn btn-info m-1"><i class="bi bi-skip-backward ms-2"></i> <?= lang('App.back'); ?></a>
                            <button type="submit" class="btn btn-success btn-lg"><i class="fe fe-save"></i> <?= lang('App.save'); ?></button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
