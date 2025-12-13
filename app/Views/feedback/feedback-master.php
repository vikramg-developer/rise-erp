<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.feedback') ?> <?= lang('App.master') ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.rise') ?> </a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.feedback') ?> <?= lang('App.master') ?></li>
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
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Your,toast message here.
                        </div>
                    </div>
                </div>
                <!---------------------------Start Add master-------------------------------------------------------------->
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        <?= lang('App.master') ?>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal" data-bs-target="#create-task">
                            <i class="ri-add-line fw-semibold align-middle me-1"></i> <?= lang('App.add') ?> <?= lang('App.feedback') ?> <?= lang('App.master') ?>
                        </button>
                        <!-- Start::add modal -->
                        <div class="modal fade" id="create-task" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <?= form_open('feedback/save-feedback-master'); ?>  
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?= lang('App.feedback') ?> <?= lang('App.master') ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <div class="row gy-2">
                                            <!---------------------feedback_name----------------------------------->
                                            <div class="col-xl-12">
                                                <label for="feedback_name" class="form-label"><?= lang('App.feedback') ?> <?= lang('App.name') ?></label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="feedback_name" name="feedback_name" placeholder="<?= lang('App.feedback') ?> <?= lang('App.name') ?>" required>
                                            </div>
                                            <!---------------------feedback_type----------------------------------->
                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.feedback') ?> <?= lang('App.type') ?></label>  <span class="text-danger">*</span>
                                                <select class="form-select" id="type_id" name="type_id" required>
                                                <!--<select class="js-example-basic-single" id="type_id" name="type_id" required>-->
                                                    <option value="" >Select Type</option>
                                                    <option value="1">Theory</option>
                                                    <option value="2">Practical</option>
                                                    <option value="3">Project</option>
                                                    <option value="4">Seminar</option>
                                                    <option value="5">Tutorial</option>
                                                </select>
                                            </div>
                                            <!---------------------semester_id----------------------------------->
                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.semester') ?></label> <span class="text-danger">*</span>
                                                <select class="form-select" id="semester_id" name="semester_id" required>
                                                    <option value="" >Select Semester</option>
                                                    <option value="1">Odd</option>
                                                    <option value="2">Even</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.part') ?></label> <span class="text-danger">*</span>
                                                <select class="form-select" id="part_id" name="part_id" required>
                                                    <option value="" >Select Part</option>
                                                    <option value="1">Pre</option>
                                                    <option value="2">Post</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.academic') ?> <?= lang('App.year') ?></label> <span class="text-danger">*</span>
                                                <select class="form-select"  id="academic_year_id" name="academic_year_id" required>
                                                    <option value="">Select Academic Year</option>
                                                    <option value="2">2025-2026</option>
                                                    <option value="1">2024-2025</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success m-1"> <?= lang('App.save') ?>  <i class="bi bi-save2 ms-2"></i></button>
                                    </div>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                        <!-- End::add modal --> 
                    </div>
                </div>
                <!---------------------------End Add master-------------------------------------------------------------->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"><?= lang('App.sr') ?> <?= lang('App.no') ?></th>
                                    <th scope="col"> <?= lang('App.feedback') ?> <?= lang('App.name') ?></th>
                                    <th scope="col"><?= lang('App.type') ?> </th>
                                    <th scope="col"><?= lang('App.semester') ?> </th>
                                    <th scope="col"><?= lang('App.part') ?> </th>
                                    <th scope="col"><?= lang('App.academic') ?> <?= lang('App.year') ?> </th>
                                    <!--<th scope="col"><?= lang('App.status') ?> </th>-->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="task-list">
                                    <td><span class="fw-semibold">1</span></td>
                                    <td><span class="fw-semibold">Consolidated Feedback Analysis (Theory)</span></td>
                                    <td>Theory</td>
                                    <td>Odd</td>
                                    <td>pre Semester</td>
                                    <td>2025-2026</td>
                                    <td>
                                        <a href="<?php echo base_url('manage-question'); ?>" class="btn btn-sm btn-success btn-wave">
                                            <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i><?= lang('App.manage') ?> <?= lang('App.question') ?> 
                                        </a>
                                    </td>
                                </tr>

                                <tr class="task-list">
                                    <td><span class="fw-semibold">2</span></td>
                                    <td><span class="fw-semibold">Consolidated Feedback Analysis (Practical)</span></td>
                                    <td>Practical</td>
                                    <td>Odd</td>
                                    <td>Pre Semester</td>
                                    <td>2025-2026</td>
                                    <td>
                                        <a href="<?php echo base_url('manage-question'); ?>" class="btn btn-sm btn-success btn-wave">
                                            <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i><?= lang('App.manage') ?> <?= lang('App.question') ?> 
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
</div>