<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.head'); ?> <?= lang('App.group'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.head'); ?> <?= lang('App.group'); ?></li>
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
                            <strong class="me-auto"><?= lang('App.rise')?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Your,toast message here.
                        </div>
                    </div>
                </div>
                <form method="post" action="" id="head-group-form">
                    <div class="card-body head-group p-0">
                        <div class="p-4">
                            <div class="row gx-5">
                                <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                    <div class="card custom-card shadow-none mb-0 border-0">
                                        <div class="card-body p-0">
                                            <div class="row gy-3">
                                                <div class="col-xl-12">
                                                    <input type="hidden" id="head_group_id" name="head_group_id">
                                                    <label for="head_group" class="form-label"><?= lang('App.head'); ?> <?= lang('App.group'); ?></label>
                                                    <input type="text" class="form-control" id="head_group" name="head_group" placeholder="<?= lang('App.head'); ?> <?= lang('App.group'); ?>">
                                                    <small class="text-danger" id="head_group_error" style="display:none;"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                            <button class="btn btn-success m-1" id="submit_btn"><?= lang('App.save'); ?><i class="bi bi-save2 ms-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.head'); ?> <?= lang('App.group'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php // if (!empty($head_group_datas)): ?>
                        <table id="head-group-table" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                                    <th><?= lang('App.head'); ?> <?= lang('App.group'); ?> <?= lang('App.name'); ?></th>
                                    <th><?= lang('App.action'); ?></th>
                                    <th><?= lang('App.remark'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>