<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.manage'); ?> <?= lang('App.role'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.manage'); ?> <?= lang('App.role'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header  justify-content-between">
                    <div class="card-title">
                        <?= lang('App.manage'); ?> <?= lang('App.role'); ?>
                    </div>
                    <?php if (hasPermission('createRole')): ?>
                    <div class="d-flex">
                        <a href="<?= base_url('roles/add-role'); ?>" class="btn btn-success m-1"><?= lang('App.add'); ?> <?= lang('App.role'); ?><i class="bi bi-plus ms-2"></i></a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php // if (!empty($head_group_datas)): ?>
                        <table id="role-table" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <?php if (hasPermission('viewRole') || hasPermission('deleteRole')): ?>
                                        <th><?= lang('App.action'); ?></th>
                                    <?php endif; ?>
                                    <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                                    <th><?= lang('App.role'); ?> <?= lang('App.name'); ?></th>
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

<?php if (session()->has('toast')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showToast(
                    "<?= esc(session('toast.status')) ?>",
                    "<?= esc(session('toast.message')) ?>"
                    );
        });
    </script>
<?php endif; ?>