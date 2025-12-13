<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close --> 
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                    <div id="successToast" class="toast colored-toast bg-success-transparent" role="alert" aria-live="assertive"
                         aria-atomic="true">
                        <div class="toast-header bg-success text-fixed-white">
                            <img class="bd-placeholder-img rounded me-2" src="<?php echo base_url('assets/images/brand-logos/toggle-rise.jpg'); ?>" alt="...">
                            <strong class="me-auto"><?= lang('App.rise') ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Your,toast message here.
                        </div>
                    </div>
                </div>
                <form method="post" action="" id="fetch_student">
                    <div class="card-body add-products p-0">
                        <div class="p-4">
                            <div class="row gx-5">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6">
                                    <div class="card custom-card shadow-none mb-0 border-0">
                                        <div class="card-body p-0">                                        
                                            <div class="row gy-3">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="department_id" class="form-label"><?= lang('App.department'); ?></label>
                                                    <select class="form-control js-example-basic-single" name="department_id" id="department_id" required>
                                                        <option value="">Select Department</option>
                                                        <?php
                                                        foreach ($departments as $department) {
                                                            ?>
                                                            <option value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>
                                                        <?php }
                                                        ?> 
                                                    </select>
                                                    <small class="text-danger" id="fetch_student_error" style="display:none;"></small>
                                                </div>                                            
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="year_id" class="form-label"><?= lang('App.year'); ?></label>
                                                    <select class="form-control js-example-basic-single" name="year_id" id="year_id" required>
                                                        <option value="">Select Year</option>
                                                        <?php
                                                        foreach ($years as $year) {
                                                            ?>
                                                            <option value="<?php echo $year['year_id']; ?>"><?php echo $year['year_name']; ?></option>
                                                        <?php }
                                                        ?> 
                                                    </select>
                                                    <small class="text-danger" id="fetch_student_error" style="display:none;"></small>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="aca_year_id" class="form-label"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></label>
                                                    <select class="js-example-basic-single" name="aca_year_id" id="aca_year_id" required>
                                                        <option value="">Select Academic Year</option>
                                                        <?php
                                                        foreach ($academic_year as $aca_year) {
                                                            ?>
                                                            <option value="<?php echo $aca_year['academic_year_id']; ?>"><?php echo $aca_year['academic_year_name']; ?></option>
                                                        <?php }
                                                        ?>   
                                                    </select>
                                                    <small class="text-danger" id="fetch_student_error" style="display:none;"></small>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                            <button type="submit" class="btn btn-primary m-1"><?= lang('App.search'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::row-1 
    <!--modal to add leaving certificate info-->
    <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?= form_open('add-lc-info', ['target' => '_blank']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel"><?= lang('App.add'); ?> <?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?> <?= lang('App.information'); ?></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row gy-3">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <label for="examination" class="form-label"><?= lang('App.examination'); ?></label>
                            <input type="text" class="form-control" name="examination" id="examination" value="S.Y. Civil Engineering" placeholder="<?= lang('App.examination'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'examination') ?></span>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <label for="exam_held_in" class="form-label"><?= lang('App.exam'); ?> <?= lang('App.held'); ?> <?= lang('App.in'); ?></label>
                            <input type="text" class="form-control" name="exam_held_in" id="exam_held_in" value="Summer Sem Exam 2025" placeholder="<?= lang('App.exam'); ?> <?= lang('App.held'); ?> <?= lang('App.in'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'exam-held-in') ?></span>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <label for="date_of_leaving" class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.leaving'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" class="form-control" name="date_of_leaving" id="date_of_leaving" value="2025-06-30" placeholder="<?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.leaving'); ?>" required>
                                <span class="text-danger"><?= displayError($validation, 'date-of-leaving') ?></span>

                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('App.close'); ?></button>
                    <button type="submit" class="btn btn-success"><?= lang('App.submit'); ?></button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <!--End::modal-->
    <!-- Start:: row-2 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                                <th scope="col"><?= lang('App.student'); ?> <?= lang('App.name'); ?></th>
                                <th scope="col"><?= lang('App.mobile'); ?> <?= lang('App.no'); ?></th>
                                <th scope="col"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></th>
                                <th scope="col"><?= lang('App.course'); ?></th>
                                <th scope="col"><?= lang('App.year'); ?></th>
                                <th scope="col"><?= lang('App.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>202610100001</td>
                                <td>SHINDE NAGESH TUKARAM</td>
                                <td>9876543210</td>
                                <td>2025-2026</td>
                                <td>Civil Engineering</td>
                                <td>Third Year</td>
                                <td>
                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Add Lc Info</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>202610100002</td>
                                <td>KALE RAJ AJAY</td>
                                <td>9876656560</td>
                                <td>2025-2026</td>
                                <td>Civil Engineering</td>
                                <td>Third Year</td>
                                <td>
                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Add Lc Info</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>202610100003</td>
                                <td>PATIL ANIL SHANKAR</td>
                                <td>9876543210</td>
                                <td>2025-2026</td>
                                <td>Civil Engineering</td>
                                <td>Third Year</td>
                                <td>
                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Add Lc Info</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-2 -->
</div><!--End::container-fluid -->