<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <?= form_open('bonafide-certificate'); ?>
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">                                        
                                        <div class="row gy-3">
                                            <div class="col-xl-4">
                                                <label for="course_id" class="form-label"><?= lang('App.course'); ?></label>
                                                <select class="form-control js-example-basic-single" name="course_id" id="course_id" required>
                                                    <option value="">Select Course</option>
                                                    <option value="1">Computer Science & Engineering</option>
                                                    <option value="2">Civil Engineering</option>
                                                    <option value="3">Mechanical Engineering</option>
                                                    <option value="4">E & TC Engineering</option>
                                                </select>
                                            </div>                                            
                                            <div class="col-xl-4">
                                                <label for="year_id" class="form-label"><?= lang('App.year'); ?></label>
                                                <select class="form-control js-example-basic-single" name="year_id" id="year_id" required>
                                                    <option value="">Select Year</option>
                                                    <option value="1">First Year</option>
                                                    <option value="2">Second Year</option>
                                                    <option value="3">Third Year</option>
                                                    <option value="4">Fourth Year</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="aca_year_id" class="form-label"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></label>
                                                <select class="js-example-basic-single" name="aca_year_id" id="aca_year_id" required>
                                                    <option value="">Select Academic Year</option>
                                                    <option value="Extra Small">2025-2026</option>
                                                    <option value="Extra Small">2024-2025</option>
                                                    <option value="Small">2023-2024</option>
                                                    <option value="Medium">2022-2023</option>
                                                    <option value="Large">2021-2022</option>
                                                    <option value="Extra Large">2020-2021</option>
                                                </select>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-1"><?= lang('App.search'); ?></button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!--End::row-1 

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
                                                            <td>2025-2026</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <a href="<?= base_url('bonafide-print'); ?>" target="_blank"  class="btn btn-warning mb-1" >Bonafide Certificate</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>202610100002</td>
                                                            <td>KALE RAJ AJAY</td>
                                                            <td>9876656560</td>
                                                            <td>2025-2026</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <a target="_blank"  class="btn btn-warning mb-1" >Bonafide Certificate</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>202610100003</td>
                                                            <td>PATIL ANIL SHANKAR</td>
                                                            <td>9876543210</td>
                                                            <td>2025-2026</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <a target="_blank"  class="btn btn-warning mb-1" >Bonafide Certificate</a>
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
