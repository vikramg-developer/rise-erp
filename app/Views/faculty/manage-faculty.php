<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.manage'); ?> <?= lang('App.faculty'); ?>
        </h1>
    </div>

    <!-- ADD BUTTON -->
    <!-- Start::row-1 -->
    <?php if (hasPermission('createFaculty')): ?>
        <div class="row">
            <div class="col-xl-12">
                <div class="px-4 py-3 d-sm-flex justify-content-start">
                    <a href="<?= base_url('faculty/'); ?>" class="btn btn-success m-1"><?= lang('App.add'); ?> <?= lang('App.faculty'); ?><i class="bi bi-plus ms-2"></i></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--End::row-1 -->

    <!-- TABLE -->
    <div class="card custom-card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="faculty-table" class="table table-hover table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th  width="5%">#</th>
                            <th><?= lang('App.action'); ?></th>
                            <th> Faculty Rise No</th>
                            <th><?= lang('App.faculty'); ?> <?= lang('App.name'); ?></th>
                            <th><?= lang('App.mobile'); ?></th>
                            <th>Added By</th>
                            <th>Updated By</th>
                            <th>Action</th>    
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
