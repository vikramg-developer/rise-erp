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
                <?= form_open('FeesManagement/add_head_group') ?>
                <div class="card-body head-group p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="head-group" class="form-label"><?= lang('App.head'); ?> <?= lang('App.group'); ?></label>
                                                <input type="text" class="form-control" id="head-group" name="head-group" placeholder="<?= lang('App.head'); ?> <?= lang('App.group'); ?>">
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
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>dsfsdfs</td>
                                    <td>xcdgd443</td>
                                    <td>54645</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>