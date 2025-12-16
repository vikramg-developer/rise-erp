<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.add'); ?> <?= lang('App.faculty'); ?>
        </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.faculty'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('App.add'); ?> <?= lang('App.faculty'); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <!-- Toast -->
                <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                    <div id="successToast" class="toast colored-toast bg-success-transparent">
                        <div class="toast-header bg-success text-fixed-white">
                            <img class="bd-placeholder-img rounded me-2"
                                 src="<?= base_url('assets/images/brand-logos/toggle-rise.jpg'); ?>">
                            <strong class="me-auto"><?= lang('App.rise') ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="toast-body"></div>
                    </div>
                </div>

                <form id="faculty-registration-form">
                    <div class="card-body p-4">

                        <h5 class="mb-3">
                            <b><?= lang('App.faculty'); ?> <?= lang('App.information'); ?></b>
                        </h5>

                        <div class="row gy-4">

                            <!-- FACULTY ROLE -->
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.faculty'); ?> <?= lang('App.role'); ?> <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="faculty_role_id">
                                    <option value=""><?= lang('App.select'); ?></option>
                                    <option value="1">Admin</option>
                                    <option value="2">HOD</option>
                                    <option value="3"><?= lang('App.faculty'); ?></option>
                                    <option value="4">Cashier</option>
                                    <option value="5"><?= lang('App.head'); ?></option>

                                </select>
                                <small class="text-danger" id="faculty_role_id_error" style="display:none;"></small>
                            </div>

                            <div class="col-xl-9 d-none d-lg-block"></div>

                            <!-- FIRST NAME -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.first'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_first_name"
                                       class="form-control"
                                       placeholder="Enter First Name">
                                <small class="text-danger" id="faculty_first_name_error" style="display:none;"></small>
                            </div>

                            <!-- MIDDLE NAME -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.middle'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_middle_name"
                                       class="form-control"
                                       placeholder="Enter Middle Name">
                                <small class="text-danger" id="faculty_middle_name_error" style="display:none;"></small>
                            </div>

                            <!-- LAST NAME -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.last'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_last_name"
                                       class="form-control"
                                       placeholder="Enter Last Name">
                                <small class="text-danger" id="faculty_last_name_error" style="display:none;"></small>
                            </div>

                            <!-- MOBILE -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.mobile'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="faculty_mobile_number" maxlength="10" class="form-control" placeholder="9999999999">
                                <small class="text-danger" id="faculty_mobile_number_error" style="display:none;"></small>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.email'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_email_id"
                                       class="form-control"
                                       placeholder="email@example.com">
                                <small class="text-danger" id="faculty_email_id_error" style="display:none;"></small>
                            </div>

                            <!-- AADHAR -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.aadhar'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_aadhar_number"
                                       class="form-control"
                                       maxlength="12"
                                       placeholder="000000000000">
                                <small class="text-danger" id="faculty_aadhar_number_error" style="display:none;"></small>
                            </div>

                            <!-- PAN -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    PAN <?= lang('App.number'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_pan_number"
                                       class="form-control"
                                       maxlength="10"
                                       placeholder="ABCDE1234F"
                                       oninput="this.value = this.value.toUpperCase();">
                                <small class="text-danger" id="faculty_pan_number_error" style="display:none;"></small>
                            </div>

                            <!-- PASSWORD -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.password'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="password"
                                       name="faculty_password"
                                       class="form-control"
                                       placeholder="Enter Password">
                                <small class="text-danger" id="faculty_password_error" style="display:none;"></small>
                            </div>

                            <!-- CONFIRM PASSWORD -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.confirm'); ?> <?= lang('App.password'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="password"
                                       name="confirm_password"
                                       class="form-control"
                                       placeholder="Confirm Password" >
                                <small class="text-danger" id="confirm_password_error" style="display:none;" ></small>
                            </div>

                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fe fe-save"></i> <?= lang('App.save'); ?>
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
