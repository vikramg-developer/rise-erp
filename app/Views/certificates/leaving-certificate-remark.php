<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.add'); ?> <?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?> <?= lang('App.remark'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.add'); ?> <?= lang('App.lc'); ?> <?= lang('App.remark'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <?= form_open('lc-remark'); ?>
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">

                                        <div class="row gy-3">
                                            <div class="col-xl-3">
                                                <label for="first-name" class="form-label mt-3 mt-xl-0"><?= lang('App.first'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="first-name" name="first-name" value="<?= set_value('first-name'); ?>" placeholder="<?= lang('App.first'); ?> <?= lang('App.name'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'first-name') ?></span>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="middle-name" class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" name="middle-name" id="middle-name" placeholder="<?= lang('App.middle'); ?> <?= lang('App.name'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'middle-name') ?></span>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="last-name" class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" name="last-name" id="last-name" placeholder="<?= lang('App.last'); ?> <?= lang('App.name'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'last-name') ?></span>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="mother-name" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" name="mother-name" id="mother-name" placeholder="<?= lang('App.mother'); ?> <?= lang('App.name'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'mother-name') ?></span>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="course-id" class="form-label"><?= lang('App.course'); ?></label>
                                                <input type="text" class="form-control" name="course-id" id="course-id" placeholder="<?= lang('App.course'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'course-id') ?></span>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="examination" class="form-label"><?= lang('App.examination'); ?></label>
                                                <input type="text" class="form-control" name="examination" id="examination" placeholder="<?= lang('App.examination'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'examination') ?></span>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="exam-held-in" class="form-label"><?= lang('App.exam'); ?> <?= lang('App.held'); ?> <?= lang('App.in'); ?></label>
                                                <input type="text" class="form-control" name="exam-held-in" id="exam-held-in" placeholder="<?= lang('App.exam'); ?> <?= lang('App.held'); ?> <?= lang('App.in'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'exam-held-in') ?></span>
                                            </div>
                                            
                                            <div class="col-xl-3">
                                                <label for="date-of-admission" class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.admission'); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                    <input type="text" class="form-control" name="date-of-admission" id="date" placeholder="<?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.admission'); ?>">
                                                    <span class="text-danger"><?= displayError($validation, 'date-of-admission') ?></span>

                                                </div>    
                                                   
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="date-of-leaving" class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.leaving'); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                    <input type="text" class="form-control" name="date1" id="date" placeholder="<?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.leaving'); ?>">
                                                    <span class="text-danger"><?= displayError($validation, 'date-of-leaving') ?></span>
                                            
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="general-register-no" class="form-label"><?= lang('App.general'); ?> <?= lang('App.register'); ?> <?= lang('App.no'); ?></label>
                                                <input type="text" class="form-control" name="general-register-no" id="general-register-no" placeholder="<?= lang('App.general'); ?> <?= lang('App.register'); ?> <?= lang('App.no'); ?>">
                                                <span class="text-danger"><?= displayError($validation, 'general-register-no') ?></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start d-sm-flex justify-content-between">
                        <a href="<?= base_url('leaving-certificate'); ?>" class="btn btn-primary m-1"><?= lang('App.back'); ?></a>
                        <button type="submit" class="btn btn-primary m-1"><?= lang('App.submit'); ?></button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

</div>