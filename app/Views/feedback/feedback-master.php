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
                <!---------------------------Start Add master-------------------------------------------------------------->
                <div class="card-header justify-content-between">
                    <div class="card-title"><?= lang('App.master') ?> </div>
                    <div class="d-flex">
                        <button class="btn  btn-primary btn-wave me-2" data-bs-toggle="modal" data-bs-target="#add_feedback_master_modal">
                            <i class="ri-add-line fw-semibold align-middle me-1"></i> <?= lang('App.add') ?> <?= lang('App.feedback') ?> <?= lang('App.master') ?>
                        </button>
                        <!-- Start::add modal -->
                        <form method="post" id="feedback-master-form">
                            <div class="modal fade" id="add_feedback_master_modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">

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
                                                    <input type="text" class="form-control" id="feedback_name" name="feedback_name" placeholder="<?= lang('App.feedback') ?> <?= lang('App.name') ?>" >
                                                    <small class="text-danger" id="feedback_name_error" style="display:none;"></small>
                                                </div>

                                                <!---------------------subject_type----------------------------------->
                                                <div class="col-xl-6">
                                                    <label class="form-label"><?= lang('App.feedback') ?> <?= lang('App.type') ?></label>  <span class="text-danger">*</span>
                                                    <select class="form-select" id="type_id" name="type_id" >
                                                        <option value="" >Select Type</option>
                                                        <?php
                                                        foreach ($subject_type as $sub_type) {
                                                            ?>
                                                            <option value="<?= esc($sub_type['subject_type_id']) ?>">
                                                                <?= esc($sub_type['subject_type_name']) ?>
                                                            </option>
                                                        <?php }
                                                        ?>   
                                                    </select>
                                                    <small class="text-danger" id="type_id_error" style="display:none;"></small>
                                                </div>
                                                <!---------------------semester----------------------------------->
                                                <div class="col-xl-6">
                                                    <label class="form-label"><?= lang('App.semester') ?></label> <span class="text-danger">*</span>
                                                    <select class="form-select" id="semester_id" name="semester_id" >
                                                        <option value="" >Select Semester</option>
                                                        <?php
                                                        foreach ($semester as $sem) {
                                                            ?>
                                                            <option value="<?= esc($sem['semester_id']) ?>">
                                                                <?= esc($sem['semester_name']) ?>
                                                            </option>
                                                        <?php }
                                                        ?>    
                                                    </select>
                                                    <small class="text-danger" id="semester_id_error" style="display:none;"></small>
                                                </div>
                                                <!---------------------semester_part---------------------------------->
                                                <div class="col-xl-6">
                                                    <label class="form-label"><?= lang('App.semester') ?> <?= lang('App.part') ?></label> <span class="text-danger">*</span>
                                                    <select class="form-select" id="part_id" name="part_id" >
                                                        <option value="" >Select Part</option>
                                                        <?php
                                                        foreach ($semester_part as $part) {
                                                            ?>
                                                            <option value="<?= esc($part['semester_part_id']) ?>">
                                                                <?= esc($part['semester_part_name']) ?>
                                                            </option>
                                                        <?php }
                                                        ?>    
                                                    </select>
                                                    <small class="text-danger" id="part_id_error" style="display:none;"></small>
                                                </div>
                                                <!---------------------academic_year---------------------------------->
                                                <div class="col-xl-6">
                                                    <label class="form-label"><?= lang('App.academic') ?> <?= lang('App.year') ?></label> <span class="text-danger">*</span>
                                                    <select class="form-select"  id="academic_year_id" name="academic_year_id" >
                                                        <option value="">Select Academic Year</option>
                                                        <?php
                                                        foreach ($academic_year as $year) {
                                                            ?>
                                                            <option value="<?= esc($year['academic_year_id']) ?>">
                                                                <?= esc($year['academic_year_name']) ?>
                                                            </option>
                                                        <?php }
                                                        ?>             
                                                    </select>
                                                    <small class="text-danger" id="academic_year_id_error" style="display:none;"></small>
                                                </div>
                                                <!--------------------------------------------------------------------------->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success m-1" id="submit_btn"><?= lang('App.save') ?>  <i class="bi bi-save2 ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End::add modal --> 
                    </div>
                </div>
                <!---------------------------End Add master-------------------------------------------------------------->
                <div class="card-body">
                    <div class="table-responsive">
                    <!--<table id="feedback-master-table" class="table table-bordered w-100">-->
                        <table id="feedback-master-table" class="table table-hover table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th width="5%"><?= lang('App.sr') ?> <?= lang('App.no') ?></th>
                                <th><?= lang('App.action') ?></th>
                                <th> <?= lang('App.feedback') ?> <?= lang('App.name') ?></th>
                                <th><?= lang('App.type') ?> </th>
                                <th><?= lang('App.semester') ?> </th>
                                <th><?= lang('App.part') ?> </th>
                                <th><?= lang('App.academic') ?> <?= lang('App.year') ?> </th>
                                <th><?= lang('App.added') ?> <?= lang('App.by') ?></th>
                                <th><?= lang('App.updated') ?> <?= lang('App.by') ?></th>
                                <th><?= lang('App.action') ?></th>
                                <th><?= lang('App.manage') ?> <?= lang('App.question') ?> </th>
                               
                            </tr>
                        </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

</div>