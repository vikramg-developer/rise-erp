<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <form method="post" action="" id="fetch_bonafide_student">
                    <div class="card-body add-products p-0">
                        <div class="p-4">
                            <div class="row gx-5">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6">
                                    <div class="card custom-card shadow-none mb-0 border-0">
                                        <div class="card-body p-0">                                        
                                            <div class="row gy-3">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="department_id" class="form-label"><?= lang('App.department'); ?></label>
                                                    <select class="form-control js-example-basic-single" name="department_id" id="department_id">
                                                        <option value="">Select Department</option>
                                                        <?php
                                                        foreach ($departments as $department) {
                                                            ?>
                                                            <option value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>
                                                        <?php }
                                                        ?> 
                                                    </select>
                                                    <small class="text-danger field-error" id="department_id_error" style="display:none;"></small>
                                                </div>                                            
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="year_id" class="form-label"><?= lang('App.year'); ?></label>
                                                    <select class="form-control js-example-basic-single" name="year_id" id="year_id">
                                                        <option value="">Select Year</option>
                                                        <?php
                                                        foreach ($years as $year) {
                                                            ?>
                                                            <option value="<?php echo $year['year_id']; ?>"><?php echo $year['year_name']; ?></option>
                                                        <?php }
                                                        ?> 
                                                    </select>
                                                    <small class="text-danger field-error" id="year_id_error" style="display:none;"></small>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="academic_year_id" class="form-label"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></label>
                                                    <select class="form-control js-example-basic-single" name="academic_year_id" id="academic_year_id">
                                                        <option value="">Select Academic Year</option>
                                                        <?php
                                                        foreach ($academic_year as $aca_year) {
                                                            ?>
                                                            <option value="<?php echo $aca_year['academic_year_id']; ?>"><?php echo $aca_year['academic_year_name']; ?></option>
                                                        <?php }
                                                        ?>   
                                                    </select>
                                                    <small class="text-danger field-error" id="academic_year_id_error" style="display:none;"></small>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top border-block d-sm-flex justify-content-end">
                            <button class="btn btn-primary m-1"><i class="bi bi-search ms-2"></i> <?= lang('App.search'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::row-1 
    
    <!--modal to add leaving certificate info-->
    <div class="modal fade" id="bonafide_modal" tabindex="-1" aria-labelledby="bonafideModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="post" action="" id ="bonafide_modal_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="bonafideModalLabel"><?= lang('App.add'); ?> <?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?> <?= lang('App.information'); ?></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row gy-3">
                            <?= csrf_field(); ?>
                            <input type="hidden" id="yearwise_student_data_id" name="yearwise_student_data_id">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="authorized_person" class="form-label"><?= lang('App.authorized'); ?> <?= lang('App.person'); ?></label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="authorized_person" id="authorized_person" value="" placeholder="<?= lang('App.authorized'); ?> <?= lang('App.person'); ?>">
                                <small class="text-danger field-error" id="authorized_person_error"></small>
                            </div>                           

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="bonafide_valid_upto" class="form-label"><?= lang('App.bonafide'); ?> <?= lang('App.valid'); ?> <?= lang('App.upto'); ?></label> <span class="text-danger">*</span>
                                <div class="input-group">
                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                    <input type="text" class="form-control" name="bonafide_valid_upto" id="bonafide_valid_upto" value="" placeholder="<?= lang('App.bonafide'); ?> <?= lang('App.valid'); ?> <?= lang('App.upto'); ?>">
                                </div>
                                <small class="text-danger field-error" id="bonafide_valid_upto_error"></small>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('App.close'); ?></button>
                        <a href="javascript:void(0);" id="bonafide_preview_btn" type="button" class="btn btn-warning"><?= lang('App.preview'); ?></a>
                        <button type="submit" class="btn btn-success"><?= lang('App.submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--End::modal-->

    <!-- Start:: row-2 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bonafide-student-list" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                                    <th scope="col"><?= lang('App.student'); ?> <?= lang('App.name'); ?></th>                               
                                    <th scope="col"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></th>
                                    <th scope="col"><?= lang('App.department'); ?></th>
                                    <th scope="col"><?= lang('App.year'); ?></th>
                                    <th scope="col">Generate<?= lang('App.bonafide'); ?></th>
                                </tr>
                            </thead>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-2 -->
</div>