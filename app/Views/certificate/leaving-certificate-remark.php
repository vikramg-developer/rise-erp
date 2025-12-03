<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?=lang('App.add');?> <?=lang('App.leaving');?> <?=lang('App.certificate');?> <?=lang('App.remark');?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?=lang('App.leaving');?> <?=lang('App.certificate');?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=lang('App.add');?> <?=lang('App.lc');?> <?=lang('App.remark');?></li>
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
                                                <label for="first-name" class="form-label mt-3 mt-xl-0"><?=lang('App.first');?> <?=lang('App.name');?></label>
                                                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="<?=lang('App.first');?> <?=lang('App.name');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="middle-name" class="form-label"><?=lang('App.middle');?> <?=lang('App.name');?></label>
                                                <input type="text" class="form-control" name="middle-name" id="middle-name" placeholder="<?=lang('App.middle');?> <?=lang('App.name');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="last-name" class="form-label"><?=lang('App.last');?> <?=lang('App.name');?></label>
                                                <input type="text" class="form-control" name="l-name" id="l-name" placeholder="<?=lang('App.last');?> <?=lang('App.name');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="mother-name" class="form-label"><?=lang('App.mother');?> <?=lang('App.name');?></label>
                                                <input type="text" class="form-control" name="mother-name" id="mother-name" placeholder="<?=lang('App.mother');?> <?=lang('App.name');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="course-id" class="form-label"><?=lang('App.course');?></label>
                                                <input type="text" class="form-control" name="course-id" id="course-id" placeholder="<?=lang('App.course');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="examination" class="form-label"><?=lang('App.examination');?></label>
                                                <input type="text" class="form-control" name="examination" id="examination" placeholder="<?=lang('App.examination');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="exam-held-in" class="form-label"><?=lang('App.exam');?> <?=lang('App.held');?> <?=lang('App.in');?></label>
                                                <input type="text" class="form-control" name="exam-held-in" id="exam-held-in" placeholder="<?=lang('App.exam');?> <?=lang('App.held');?> <?=lang('App.in');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="date-of-admission" class="form-label"><?=lang('App.date');?> <?=lang('App.of');?> <?=lang('App.admission');?></label>
                                                <input type="text" class="form-control" name="date-of-admission" id="date-of-admission" placeholder="<?=lang('App.date');?> <?=lang('App.of');?> <?=lang('App.admission');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="date-of-leaving" class="form-label"><?=lang('App.date');?> <?=lang('App.of');?> <?=lang('App.leaving');?></label>
                                                <input type="text" class="form-control" name="date-of-leaving" id="date-of-leaving" placeholder="<?=lang('App.date');?> <?=lang('App.of');?> <?=lang('App.leaving');?>">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="general-register-no" class="form-label"><?=lang('App.general');?> <?=lang('App.register');?> <?=lang('App.no');?></label>
                                                <input type="text" class="form-control" name="general-register-no" id="general-register-no" placeholder="<?=lang('App.general');?> <?=lang('App.register');?> <?=lang('App.no');?>">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-success-light m-1"><?=lang('App.submit');?></button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

</div>