<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.department'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.department'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->


    <!-- Start::row-1 -->
    <?php if(hasPermission('createDepartment')): ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                
                <form method="post" action="" id="department-form">
                    <div class="card-body department p-0">
                        <div class="p-4">
                            <div class="row gx-5">
                                <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                    <div class="card custom-card shadow-none mb-0 border-0">
                                        <div class="card-body p-0">
                                            <div class="row gy-3">
                                                <div class="col-xl-12">
                                                    <input type="hidden" id="department_id" name="department_id">
                                                    <label for="department_name" class="form-label"><?= lang('App.department'); ?></label>
                                                    <input type="text" class="form-control" id="department_name" name="department_name" placeholder="<?= lang('App.department'); ?>">
                                                    <ul id="searchResult" class="list-group position-absolute w-100" style="z-index:1000"></ul>
                                                    <small class="text-danger" id="department_name_error" style="display:none;"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top border-block-start d-sm-flex justify-content-start">
                            <button class="btn btn-success m-1" id="submit_btn"><?= lang('App.save'); ?><i class="bi bi-save2 ms-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!--End::row-1 -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.department'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="department-table" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <?php if (hasPermission('updateDepartment') || hasPermission('deleteDepartment')): ?>
                                        <th><?= lang('App.action'); ?></th>
                                    <?php endif; ?>
                                    <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                                    <th><?= lang('App.department'); ?> <?= lang('App.name'); ?></th>
                                    <th><?= lang('App.added'); ?> <?= lang('App.by'); ?></th>
                                    <th><?= lang('App.updated'); ?> <?= lang('App.by'); ?></th>
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