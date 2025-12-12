<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.add'); ?> <?= lang('App.faculty'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.faculty'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.add'); ?> <?= lang('App.faculty'); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body p-4">

                    <h5 class="mb-3"><b><?= lang('App.faculty'); ?> <?= lang('App.information'); ?></b></h5>

                    <?= form_open('add-faculty', ['class' => 'needs-validation', 'novalidate' => true]); ?>
                    <div class="row gy-4">


                        <!-- FACULTY ROLE -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label"><?= lang('App.faculty'); ?> <?= lang('App.role'); ?> <span class="text-danger">*</span></label>
                            <select class="form-select" name="user_role" required>
                                <option value=""><?= lang('App.select'); ?></option>
                                <option value="faculty"><?= lang('App.faculty'); ?></option>
                                <option value="cashier">Cashier</option>
                                <option value="hod"><?= lang('App.head'); ?></option>
                                <option value="admin">Admin</option>
                            </select>
                            <div class="invalid-feedback"><?= lang('App.error_faculty_role'); ?></div>
                        </div>

                        <div class="col-xl-9 col-lg-8 d-none d-lg-block"></div>

                        <!-- FIRST NAME -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.first'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" required 
                                   pattern="^[A-Za-z]+(?: [A-Za-z]+)*$"
                                   placeholder="Enter First Name">
                            <div class="invalid-feedback"><?= lang('App.error_first_name'); ?></div>
                        </div>

                        <!-- MIDDLE NAME -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" name="middle_name" class="form-control" required
                                   pattern="^[A-Za-z]+(?: [A-Za-z]+)*$"
                                   placeholder="Enter Middle Name">
                            <div class="invalid-feedback"><?= lang('App.error_middle_name'); ?></div>
                        </div>

                        <!-- LAST NAME -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" required 
                                   pattern="^[A-Za-z]+(?: [A-Za-z]+)*$" placeholder="Enter Last Name">
                            <div class="invalid-feedback"><?= lang('App.error_last_name'); ?></div>
                        </div>

                        <!-- MOBILE -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.mobile'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" class="form-control" required 
                                   pattern="[0-9]{10}"
                                   placeholder="9999999999">
                            <div class="invalid-feedback"><?= lang('App.error_mobile'); ?></div>
                        </div>

                        <!-- EMAIL -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.email'); ?> <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required 
                                   placeholder="email@example.com">
                            <div class="invalid-feedback"><?= lang('App.error_email'); ?></div>
                        </div>

                        <!-- AADHAR -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="aadhar" class="form-control" required 
                                   pattern="[0-9]{12}"
                                   placeholder="000000000000">
                            <div class="invalid-feedback"><?= lang('App.error_aadhar'); ?></div>
                        </div>

                        <!-- PAN -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label">PAN <?= lang('App.number'); ?> <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="pan" 
                                   class="form-control"
                                   required
                                   pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                   placeholder="ABCDE1234F">
                            <div class="invalid-feedback"><?= lang('App.error_pan'); ?></div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.password'); ?> <span class="text-danger">*</span></label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="form-control" 
                                   required>
                            <div class="invalid-feedback"><?= lang('App.error_password'); ?></div>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <label class="form-label"><?= lang('App.confirm'); ?> <?= lang('App.password'); ?> <span class="text-danger">*</span></label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                            <div class="invalid-feedback"><?= lang('App.error_confirm_password'); ?></div>
                        </div>

                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fe fe-save"></i> <?= lang('App.save'); ?>
                        </button>
                    </div>

                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>

</div>
