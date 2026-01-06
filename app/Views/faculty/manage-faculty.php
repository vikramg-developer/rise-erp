<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.manage'); ?> <?= lang('App.employee'); ?>
        </h1>
        
         <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                     <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('App.manage'); ?> <?= lang('App.employee'); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- ADD BUTTON -->
    <!-- Start::row-1 -->
    <?php if (hasPermission('createFaculty')): ?>
        <div class="row mt-1">
            <div class="col-xl-12">
                <div class="px-1 py-1 d-sm-flex justify-content-start">
                    <a href="<?= base_url('faculty/'); ?>" class="btn btn-success m-1"><?= lang('App.add'); ?> <?= lang('App.employee'); ?><i class="bi bi-plus ms-2"></i></a>
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
                            <th> <?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                            <th><?= lang('App.employee'); ?> <?= lang('App.name'); ?></th>
                            <th><?= lang('App.gender'); ?> </th>
                            <th><?= lang('App.contact'); ?> <?= lang('App.no'); ?></th>
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
