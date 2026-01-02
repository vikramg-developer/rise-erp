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
                <form method="post" action="" id="lc_report">
                    <div class="card-body add-products p-0">
                        <div class="p-4">
                            <div class="row gx-5">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6">
                                    <div class="card custom-card shadow-none mb-0 border-0">
                                        <div class="card-body p-0">                                        
                                            <div class="row gy-3">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="from_date" class="form-label"><?= lang('App.from'); ?> <?= lang('App.date'); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                        <input type="text" class="form-control" name="from_date" id="from_date" placeholder="<?= lang('App.from'); ?> <?= lang('App.date'); ?>">
                                                    </div>
                                                    <small class="text-danger field-error" id="from_date_error" style="display:none;"></small>

                                                </div> 

                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="to_date" class="form-label"><?= lang('App.to'); ?> <?= lang('App.date'); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                        <input type="text" class="form-control" name="to_date" id="to_date" placeholder="<?= lang('App.to'); ?> <?= lang('App.date'); ?>">
                                                    </div>
                                                    <small class="text-danger field-error" id="to_date_error" style="display:none;"></small>

                                                </div>
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
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                            <button type="submit" class="btn btn-success m-1"><?= lang('App.search'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

    <!-- Start:: row-2 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?> <?= lang('App.report'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="lc-student-list" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                                    <th scope="col"><?= lang('App.student'); ?> <?= lang('App.name'); ?></th>                               
                                    <th scope="col"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></th>
                                    <th scope="col"><?= lang('App.department'); ?></th>
                                    <th scope="col"><?= lang('App.year'); ?></th>
                                    <th scope="col"><?= lang('App.status'); ?></th>
                                    <th scope="col"><?= lang('App.print'); ?></th>
                                    <th scope="col"><?= lang('App.cancel'); ?></th>
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