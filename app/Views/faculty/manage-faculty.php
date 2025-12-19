<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.manage'); ?> <?= lang('App.faculty'); ?>
        </h1>
    </div>

    <!-- ADD BUTTON -->
    <div class="mb-3">
        <a href="#" class="btn btn-success">
            <?= lang('App.add'); ?> <?= lang('App.faculty'); ?>
        </a>
    </div>

    <!-- TABLE -->
    <div class="card custom-card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="faculty-table" class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                            <th><?= lang('App.faculty'); ?> ID</th>
                            <th><?= lang('App.faculty'); ?> <?= lang('App.name'); ?></th>
                            <th><?= lang('App.mobile'); ?></th>
                            <th><?= lang('App.email'); ?></th>
                            <th><?= lang('App.action'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
