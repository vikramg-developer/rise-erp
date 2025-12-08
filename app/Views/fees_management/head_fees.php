<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.head'); ?> <?= lang('App.fees'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.head'); ?> <?= lang('App.fees'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <?= form_open('', ['class' => ' needs-validation', 'novalidate' => 'true']) ?>
                <div class="card-body head-group p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-4">
                                                <label for="course_id" class="form-label"><?= lang('App.course'); ?></label> <span class="text-danger">*</span>
                                                <select class="form-control js-example-basic-single" name="course_id" id="course_id" required>
                                                    <option value="">-- <?= lang('App.select') ?> <?= lang('App.course') ?> --</option>
                                                    <option value="1">B.A.</option>
                                                    <option value="2">B.Com.</option>
                                                    <option value="2">B.Sc.</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Course
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <label for="year_id" class="form-label"><?= lang('App.year'); ?></label> <span class="text-danger">*</span>
                                                <select class="form-control js-example-basic-single" name="year_id" id="year_id" required>
                                                    <option value="">-- <?= lang('App.select') ?> <?= lang('App.year') ?> --</option>
                                                    <option value="1">First Year</option>
                                                    <option value="2">Second Year</option>
                                                    <option value="2">Third Year</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Year
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <label for="academic_year_id" class="form-label"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></label>
                                                <select class="form-control js-example-basic-single" name="academic_year_id" id="academic_year_id" required>
                                                    <option value="">-- <?= lang('App.select') ?> <?= lang('App.academic') ?> <?= lang('App.year'); ?> --</option>
                                                    <option value="1">2025-2026</option>
                                                    <option value="2">2024-2025</option>
                                                    <option value="2">2023-2024</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Academic Year
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <label for="head_group_id" class="form-label"><?= lang('App.head'); ?> <?= lang('App.group'); ?></label>
                                                <select class="form-control js-example-basic-single" name="head_group_id" id="head_group_id" required>
                                                    <option value="">-- <?= lang('App.select') ?> <?= lang('App.head') ?> <?= lang('App.group'); ?> --</option>
                                                    <option value="1">Fee Register</option>
                                                    <option value="2">Sanstha Register</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Head Group
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <label for="payment_category_id" class="form-label"><?= lang('App.payment'); ?> <?= lang('App.category'); ?></label>
                                                <select class="form-control js-example-basic-single" name="payment_category_id" id="payment_category_id" required>
                                                    <option value="">-- <?= lang('App.select') ?> <?= lang('App.payment') ?> <?= lang('App.category'); ?> --</option>
                                                    <option value="1">Paying</option>
                                                    <option value="2">Scholarship</option>
                                                    <option value="2">EBC</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Head Group
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap table-primary">
                                                        <thead>
                                                            <tr>
                                                                <th><?= lang('App.head') ?> <?= lang('App.name') ?></th>
                                                                <th></th>
                                                                <th><?= lang('App.fees') ?></th>
                                                                <th><?= lang('App.priority') ?></th>
                                                                <th><?= lang('App.head') ?> <?= lang('App.name') ?></th>
                                                                <th></th>
                                                                <th><?= lang('App.fees') ?></th>
                                                                <th><?= lang('App.priority') ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tuition Fee</td>
                                                                <td><input class="form-check-input" type="checkbox" id="head_id" value="" aria-label="..."></td>
                                                                <td><input type="text" class="form-control" id="fees"></td>
                                                                <td><input type="number" class="form-control" id="priority" placeholder="<?= lang('App.priority')?>" min="1"></td>
                                                                <td>Development Fee</td>
                                                                <td><input class="form-check-input" type="checkbox" id="head_id" value="" aria-label="..."></td>
                                                                <td><input type="text" class="form-control" id="fees"></td>
                                                                <td><input type="number" class="form-control" id="priority" placeholder="<?= lang('App.priority')?>" min="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Flag Fund</td>
                                                                <td><input class="form-check-input" type="checkbox" id="head_id" value="" aria-label="..."></td>
                                                                <td><input type="text" class="form-control" id="fees"></td>
                                                                <td><input type="number" class="form-control" id="priority" placeholder="<?= lang('App.priority')?>" min="1"></td>
                                                                <td>Security Deposit</td>
                                                                <td><input class="form-check-input" type="checkbox" id="head_id" value="" aria-label="..."></td>
                                                                <td><input type="text" class="form-control" id="fees"></td>
                                                                <td><input type="number" class="form-control" id="priority" placeholder="<?= lang('App.priority')?>" min="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Insurance Fee</td>
                                                                <td><input class="form-check-input" type="checkbox" id="head_id" value="" aria-label="..."></td>
                                                                <td><input type="text" class="form-control" id="fees"></td>
                                                                <td><input type="number" class="form-control" id="priority" placeholder="<?= lang('App.priority')?>" min="1"></td>
                                                                <td>Shikshan Shulk</td>
                                                                <td><input class="form-check-input" type="checkbox" id="head_id" value="" aria-label="..."></td>
                                                                <td><input type="text" class="form-control" id="fees"></td>
                                                                <td><input type="number" class="form-control" id="priority" placeholder="<?= lang('App.priority')?>" min="1"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button class="btn btn-success m-1"><?= lang('App.save'); ?><i class="bi bi-save2 ms-2"></i></button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
    
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.head'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php // if (!empty($head_group_datas)): ?>
                    <table id="feesTable" class="table table-bordered text-nowrap table-primary table-striped w-100">
                        <thead>
                            <tr>
                                <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                                <th><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                                <th><?= lang('App.year'); ?></th>
                                <th><?= lang('App.academic'); ?> <?= lang('App.year'); ?></th>
                                <th><?= lang('App.payment'); ?> <?= lang('App.category'); ?></th>
                                <th><?= lang('App.head'); ?> <?= lang('App.group'); ?></th>
                                <th><?= lang('App.head'); ?> <?= lang('App.name'); ?></th>
                                <th><?= lang('App.fees'); ?></th>
                                <th><?= lang('App.priority'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>Fee Register</td>
                                <td>Tuition Fee</td>
                                <td>5000</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>Sanstha Register</td>
                                <td>Flag Fund</td>
                                <td>25</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>Fee Register</td>
                                <td>Security Deposit</td>
                                <td>1000</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Scholarship</td>
                                <td>Fee Register</td>
                                <td>Tuition Fee</td>
                                <td>5000</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Scholarship</td>
                                <td>Sanstha Register</td>
                                <td>Flag Fund</td>
                                <td>25</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Scholarship</td>
                                <td>Fee Register</td>
                                <td>Security Deposit</td>
                                <td>1000</td>
                                <td>3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>