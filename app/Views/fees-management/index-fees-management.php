<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.head'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.head'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->


    <!-- Start::row-1 -->
    <?= form_open_multipart('fees-management/import'); ?>
    <input type="file" name="excel_file" accept=".xls,.xlsx" required>
    <button type="submit">Import</button>
<?= form_close(); ?>
</div>