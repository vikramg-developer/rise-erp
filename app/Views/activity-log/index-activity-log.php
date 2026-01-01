<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.activity'); ?> <?= lang('App.log'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.activity'); ?> <?= lang('App.log'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.activity'); ?> <?= lang('App.log'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="activity-log-table" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                                    <th><?= lang('App.table'); ?> <?= lang('App.name'); ?></th>
                                    <th><?= lang('App.column'); ?> <?= lang('App.name'); ?></th>
                                    <th><?= lang('App.record'); ?> <?= lang('App.id'); ?></th>
                                    <th><?= lang('App.old'); ?> <?= lang('App.values'); ?></th>
                                    <th><?= lang('App.new'); ?> <?= lang('App.values'); ?></th>
                                    <th><?= lang('App.action'); ?></th>
                                    <th><?= lang('App.ip_address'); ?></th>
                                    <th><?= lang('App.user'); ?> <?= lang('App.agent'); ?></th>
                                    <th><?= lang('App.added'); ?> <?= lang('App.by'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>