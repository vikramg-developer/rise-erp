<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.add'); ?> <?= lang('App.employee'); ?>
        </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><?= lang('App.employee'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('App.add'); ?> <?= lang('App.employee'); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">

                <form id="faculty-registration-form">
                    <div class="card-body p-4">

                        <h5 class="mb-3">
                            <b><?= lang('App.employee'); ?> <?= lang('App.information'); ?></b>
                        </h5>
                        <hr>
                        <div class="row gy-4">

                            <!-- FACULTY ROLE -->
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.employee'); ?> <?= lang('App.role'); ?> <span class="text-danger">*</span>
                                </label>
                                <select class="from-control js-example-basic-single" name="faculty_role_id" id="faculty_role_id">
                                    <option value="">Select Role</option>
                                    <?php
                                    foreach ($roles as $role) {
                                        ?>
                                        <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
                                    <?php }
                                    ?> 
                                </select>
                                <small class="text-danger" id="faculty_role_id_error" style="display:none;"></small>
                            </div>

                            <!-- GENDER -->
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.gender'); ?> <span class="text-danger">*</span>
                                </label>
                                <select class="from-control js-example-basic-single" name="faculty_gender" id="faculty_gender">
                                    <option value="">Select Gender</option>
                                    <option value="male"><?= lang('App.male'); ?></option>
                                    <option value="female"><?= lang('App.female'); ?></option>
                                    <option value="transgender"><?= lang('App.transgender'); ?></option>
                                </select>
                                <small class="text-danger" id="faculty_gender_error" style="display:none;"></small>
                            </div>


                         <div class="col-xl-4 d-none d-lg-block"></div>


                            <!-- FIRST NAME -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.first'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_first_name"
                                       id="faculty_first_name"
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
                                       id="faculty_middle_name"
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
                                       id="faculty_last_name"
                                       class="form-control"
                                       placeholder="Enter Last Name">
                                <small class="text-danger" id="faculty_last_name_error" style="display:none;"></small>
                            </div>

                            <!-- Contact -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.contact'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="faculty_contact_number" id="faculty_contact_number"  maxlength="10" class="form-control" placeholder="9999999999">
                                <small class="text-danger" id="faculty_contact_number_error" style="display:none;"></small>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.email'); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       name="faculty_email_id"
                                       id="faculty_email_id"
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
                                       id="faculty_aadhar_number"
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
                                       id="faculty_pan_number"
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

                                <div class="input-group">
                                    <input type="password"
                                           id="faculty_password"
                                           name="faculty_password"
                                           class="form-control"
                                           placeholder="Enter Password">

                                    <span class="input-group-text bg-white"
                                          role="button"
                                          onclick="createpassword('faculty_password', this)">
                                        <i class="ri-eye-off-line align-middle"></i>
                                    </span>
                                </div>

                                <small class="text-danger" id="faculty_password_error" style="display:none;"></small>
                            </div>

                            <!-- CONFIRM PASSWORD -->
                            <div class="col-xl-4 col-md-6">
                                <label class="form-label">
                                    <?= lang('App.confirm'); ?> <?= lang('App.password'); ?> <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">
                                    <input type="password"
                                           id="confirm_password"
                                           name="confirm_password"
                                           class="form-control"
                                           placeholder="Confirm Password">

                                    <span class="input-group-text bg-white"
                                          role="button"
                                          onclick="createpassword('confirm_password', this)">
                                        <i class="ri-eye-off-line"></i>
                                    </span>
                                </div>

                                <small id="password-message" class="fw-semibold"></small>
                                <small class="text-danger" id="confirm_password_error" style="display:none;"></small>
                            </div>


                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success btn-lg" disabled>
                                <i class="fe fe-save"></i> <?= lang('App.save'); ?>
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


