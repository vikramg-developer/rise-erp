<div class="container-fluid">
    
<!--    <style>
.select2-container {
    z-index: 9999 !important;
}
.select2-container--open {
    z-index: 99999 !important;
}
.select2-dropdown {
    z-index: 999999 !important;
}
</style>-->


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
                                                <label for="feedback_name" class="form-label"><?= lang('App.feedback') ?> <?= lang('App.name') ?></label>
                                                <input type="text" class="form-control" id="feedback_name" name="feedback_name" placeholder="<?= lang('App.feedback') ?> <?= lang('App.name') ?>" required>
                                            </div>
                                            <!---------------------feedback_type----------------------------------->
                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.feedback') ?> <?= lang('App.type') ?></label>
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
                                            
<!--                                            <div class="card-body">
                                        <select class="js-example-basic-single" name="state">
                                            <option value="s-1">Selection-1</option>
                                            <option value="s-2">Selection-2</option>
                                            <option value="s-3">Selection-3</option>
                                            <option value="s-4">Selection-4</option>
                                            <option value="s-5">Selection-5</option>
                                        </select>
                                    </div>-->
                                            <!---------------------semester_id----------------------------------->
                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.semester') ?></label>
                                                <select class="form-select" id="semester_id" name="semester_id" required>
                                                    <option value="" >Select Semester</option>
                                                    <option value="1">Odd</option>
                                                    <option value="2">Even</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.part') ?></label>
                                                <select class="form-select" id="part_id" name="part_id" required>
                                                    <option value="" >Select Part</option>
                                                    <option value="1">Pre</option>
                                                    <option value="2">Post</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-6">
                                                <label class="form-label"><?= lang('App.academic') ?> <?= lang('App.year') ?></label>
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
                                        <button type="submit" class="btn btn-primary"><?= lang('App.add') ?> <?= lang('App.master') ?></button>
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
<!--                                    <td>
                                         <span class="fw-semibold text-success">Completed</span>
                                        <span class="fw-semibold text-warning">Pending</span>
                                    </td>-->
                                    <td>
                                        <a href="<?php echo base_url('manage-question'); ?>" class="btn btn-sm btn-success btn-wave">
                                            <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i><?= lang('App.manage') ?> <?= lang('App.question') ?> 
                                        </a>
                                        <!--<button class="btn btn-sm btn-success btn-wave">-->
                                            <!--<i class="ri-upload-2-line align-middle me-2 d-inline-block"></i>-->

                                    </td>
                                </tr>

                                <tr class="task-list">
                                    <td><span class="fw-semibold">2</span></td>
                                    <td><span class="fw-semibold">Consolidated Feedback Analysis (Practical)</span></td>
                                    <td>Practical</td>
                                    <td>Odd</td>
                                    <td>Pre Semester</td>
                                    <td>2025-2026</td>
<!--                                    <td>
                                        <span class="fw-semibold text-warning">Pending</span>
                                    </td>-->
                                    <td>
                                        <a href="<?php echo base_url('manage-question'); ?>" class="btn btn-sm btn-success btn-wave">
                                            <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i><?= lang('App.manage') ?> <?= lang('App.question') ?> 
                                        </a>
                                    </td>

                                    <!--<button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>-->
                                    <!--<button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i class="ri-delete-bin-5-line"></i></button>-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--------------------------paging------------------------------------------------------------->
                <div class="card-footer">
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0 float-end">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item " aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--------------------------paging-------------------------------------------------------------->
            </div>
        </div>

    </div>
    <!--End::row-1 -->


</div>