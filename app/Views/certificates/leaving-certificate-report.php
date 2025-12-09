<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <?= form_open(''); ?>
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">                                        
                                        <div class="row gy-3">
                                            <div class="col-xl-4">
                                                <label for="from-date" class="form-label"><?= lang('App.from'); ?> <?= lang('App.date'); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                    <input type="text" class="form-control" name="from-date" id="from-date" placeholder="<?= lang('App.from'); ?> <?= lang('App.date'); ?>" required>
                                                    <!--<div class="invalid-feedback"><?= lang('App.date'); ?></div>-->
                                                </div>
                                            </div>                                           
                                            <div class="col-xl-4">
                                                <label for="date-of-leaving" class="form-label"><?= lang('App.to'); ?> <?= lang('App.date'); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                    <input type="text" class="form-control" name="to-date" id="to-date" placeholder="<?= lang('App.to'); ?> <?= lang('App.date'); ?>" required>
                                                    <!--<div class="invalid-feedback"><?= lang('App.date'); ?></div>-->
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="course-id" class="form-label"><?= lang('App.course'); ?></label>
                                                <select class="form-control js-example-basic-single" name="course-id" id="course-id" required>
                                                    <option value="">Select Course</option>
                                                    <option value="1">Computer Science & Engineering</option>
                                                    <option value="2">Civil Engineering</option>
                                                    <option value="3">Mechanical Engineering</option>
                                                    <option value="4">E & TC Engineering</option>
                                                </select>
                                                <!--<div class="invalid-feedback"><?= lang('App.date'); ?></div>-->
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-success m-1"><?= lang('App.search'); ?></button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

    <!-- Start::row-2 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="table-responsive">
                                                <table class="table text-nowrap table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                                                            <th scope="col"><?= lang('App.student'); ?> <?= lang('App.name'); ?></th>
                                                            <th scope="col"><?= lang('App.mobile'); ?> <?= lang('App.no'); ?></th>
                                                            <th scope="col"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></th>
                                                            <th scope="col"><?= lang('App.course'); ?></th>
                                                            <th scope="col"><?= lang('App.year'); ?></th>
                                                            <th scope="col"><?= lang('App.action'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>202610100001</td>
                                                            <td>SHINDE NAGESH TUKARAM</td>
                                                            <td>9876543210</td>
                                                            <td>2024-2025</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <a type="button" class="btn btn-warning mb-1" >Print</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>R11120250002</td>
                                                            <td>KALE RAJ AJAY</td>
                                                            <td>9876656560</td>
                                                            <td>2024-2025</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <a type="button" class="btn btn-warning mb-1">Print</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>R11120250003</td>
                                                            <td>Patil Anil Shankar</td>
                                                            <td>9876543210</td>
                                                            <td>2024-2025</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <a type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Print</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div> <!--end table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-2 -->
</div>
