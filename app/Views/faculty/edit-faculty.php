<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.update'); ?> <?= lang('App.faculty'); ?>
        </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('faculty/fetch-faculty') ?>"> <?= lang('App.manage'); ?><?= lang('App.faculty'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('App.update'); ?> <?= lang('App.faculty'); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <form id="edit-faculty-registration-form">
                    <input type="hidden" name="faculty_id" value="<?= esc($faculty['faculty_registration_id']); ?>">

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

                                <select class="from-control js-example-basic-single"
                                        name="edit_faculty_role_id"
                                        id="edit_faculty_role_id">
                                    <option value="">  <?= lang('App.select'); ?>   <?= lang('App.role'); ?> </option>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= $role['role_id']; ?>"
                                                <?= ($faculty['faculty_role_id'] == $role['role_id']) ? 'selected' : ''; ?>>
                                                    <?= esc($role['role_name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <small class="text-danger" id="edit_faculty_role_id_error" style="display:none;"></small>
                            </div>

                            <div class="col-xl-9 d-none d-lg-block"></div>

                            <!-- FIRST NAME -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.first'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="edit_faculty_first_name"
                                       id="edit_faculty_first_name"
                                       class="form-control"
                                       value="<?= esc($faculty['faculty_first_name']); ?>">
                                <small class="text-danger" id="edit_faculty_first_name_error" style="display:none;"></small>
                            </div>

                            <!-- MIDDLE NAME -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.middle'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="edit_faculty_middle_name"
                                       id="edit_faculty_middle_name"
                                       class="form-control"
                                       value="<?= esc($faculty['faculty_middle_name']); ?>">
                                <small class="text-danger" id="edit_faculty_middle_name_error" style="display:none;"></small>
                            </div>

                            <!-- LAST NAME -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.last'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="edit_faculty_last_name"
                                       id="edit_faculty_last_name"
                                       class="form-control"
                                       value="<?= esc($faculty['faculty_last_name']); ?>">
                                <small class="text-danger" id="edit_faculty_last_name_error" style="display:none;"></small>
                            </div>

                            <!-- MOBILE -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.mobile'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="edit_faculty_mobile_number"
                                       id="edit_faculty_mobile_number"
                                       maxlength="10"
                                       class="form-control"
                                       value="<?= esc($faculty['faculty_mobile_number']); ?>">
                                <small class="text-danger" id="edit_faculty_mobile_number_error" style="display:none;"></small>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.email'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="edit_faculty_email_id"
                                       id="edit_faculty_email_id"
                                       class="form-control"
                                       value="<?= esc($faculty['faculty_email_id']); ?>">
                                <small class="text-danger" id="edit_faculty_email_id_error" style="display:none;"></small>
                            </div>

                            <!-- AADHAR -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.aadhar'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="edit_faculty_aadhar_number"
                                       id="edit_faculty_aadhar_number"
                                       maxlength="12"
                                       class="form-control"
                                       value="<?= esc($faculty['faculty_aadhar_number']); ?>">
                                <small class="text-danger" id="edit_faculty_aadhar_number_error" style="display:none;"></small>
                            </div>

                            <!-- PAN -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    PAN <?= lang('App.number'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="edit_faculty_pan_number"
                                       id="edit_faculty_pan_number"
                                       maxlength="10"
                                       class="form-control"
                                       value="<?= esc($faculty['faculty_pan_number']); ?>"
                                       oninput="this.value = this.value.toUpperCase();">
                                <small class="text-danger" id="edit_faculty_pan_number_error" style="display:none;"></small>
                            </div>

                            <!-- PAN -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.status'); ?> <span class="text-danger">*</span>
                                </label>

                                <select class="form-control js-example-basic-single"
                                        name="edit_faculty_status_id"
                                        id="edit_faculty_status_id">
                                    <option value="1" <?= ($faculty['faculty_status'] == 1) ? 'selected' : ''; ?>>
                                        Active
                                    </option>
                                    <option value="0"<?= ($faculty['faculty_status'] == 0) ? 'selected' : ''; ?>>
                                        In-Active
                                    </option>
                                </select>
                                <small class="text-danger" id="edit_faculty_status_id_error" style="display:none;"></small>
                            </div>


                        </div>


                        <!--<div class="text-end mt-4">-->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <!-- BACK BUTTON (LEFT) -->
                            <a href="<?= base_url('faculty/fetch-faculty'); ?>" class="btn btn-info m-1">
                               <i class="bi bi-skip-backward ms-2"></i> <?= lang('App.back'); ?>
                            </a>
                            <button type="submit" class="btn btn-success btn-lg">
                                 <?= lang('App.update'); ?><i class="bi bi-save2 ms-2"></i>
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

