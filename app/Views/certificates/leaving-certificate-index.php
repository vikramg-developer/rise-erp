<?php //$page_session=\config\services::session();?>
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
    <?php
//    if($php_session->getTempdata('error'))
//    { ?>
<!--        <div class="toast align-items-center text-bg-success border-0 fade show mb-4" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Hello, world! This is the Success toast message.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>-->
    <?php    
//    }
    ?>
    <!-- Start::row-1 -->
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

                                            <div class="col-xl-4">
                                                <label for="course-id" class="form-label"><?= lang('App.course'); ?></label>
                                                <select class="form-control" data-trigger name="course-id" id="course-id">
                                                    <option value="">Select Course</option>
                                                    <option value="1">Computer Science & Engineering</option>
                                                    <option value="2">Civil Engineering</option>
                                                    <option value="3">Mechanical Engineering</option>
                                                    <option value="4">E & TC Engineering</option>

                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="year-id" class="form-label"><?= lang('App.year'); ?></label>
                                                <select class="form-control" data-trigger name="year-id" id="year-id">
                                                    <option value="">Select Year</option>
                                                    <option value="1">First Year</option>
                                                    <option value="2">Second Year</option>
                                                    <option value="3">Third Year</option>
                                                    <option value="4">Fourth Year</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="aca-year-id" class="form-label"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></label>
                                                <select class="form-control" data-trigger name="aca-year-id" id="aca-year-id">
                                                    <option value="">Select Academic Year</option>
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
                        <button class="btn btn-primary m-1"><?= lang('App.search'); ?></button>
                    </div>


                </div>
            </div>
        </div>


    </div>
    <!--End::row-1 
    <!--modal to add leaving certificate info-->
    <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?= form_open('add-lc-info', ['target' => '_blank']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel"><?= lang('App.add'); ?> <?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?> <?= lang('App.information'); ?></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row gy-3">
<!--                        <div class="col-xl-8">
                            <label for="full-name" class="form-label mt-3 mt-xl-0"><?= lang('App.full'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control" id="full-name" name="full-name" value="<?= set_value('full-name'); ?>" placeholder="<?= lang('App.full'); ?> <?= lang('App.name'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'full-name') ?></span>
                        </div>
                        <div class="col-xl-4">
                            <label for="mother-name" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.name'); ?></label>
                            <input type="text" class="form-control" name="mother-name" id="mother-name" placeholder="<?= lang('App.mother'); ?> <?= lang('App.name'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'mother-name') ?></span>
                        </div>
                        <div class="col-xl-4">
                            <label for="course-id" class="form-label"><?= lang('App.course'); ?></label>
                            <input type="text" class="form-control" name="course-id" id="course-id" placeholder="<?= lang('App.course'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'course-id') ?></span>
                        </div>
                        <div class="col-xl-4">
                            <label for="general-register-no" class="form-label"><?= lang('App.general'); ?> <?= lang('App.register'); ?> <?= lang('App.no'); ?></label>
                            <input type="text" class="form-control" name="general-register-no" id="general-register-no" placeholder="<?= lang('App.general'); ?> <?= lang('App.register'); ?> <?= lang('App.no'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'general-register-no') ?></span>
                        </div>
                        <div class="col-xl-4">
                            <label for="date-of-admission" class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.admission'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" class="form-control" name="date-of-admission" id="date" placeholder="<?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.admission'); ?>" required>
                                <span class="text-danger"><?= displayError($validation, 'date-of-admission') ?></span>
                            </div>  
                        </div>    -->
                        <div class="col-xl-4">
                            <label for="examination" class="form-label"><?= lang('App.examination'); ?></label>
                            <input type="text" class="form-control" name="examination" id="examination" value="B.Tech Civil Engineering" placeholder="<?= lang('App.examination'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'examination') ?></span>
                        </div>

                        <div class="col-xl-4">
                            <label for="exam-held-in" class="form-label"><?= lang('App.exam'); ?> <?= lang('App.held'); ?> <?= lang('App.in'); ?></label>
                            <input type="text" class="form-control" name="exam-held-in" id="exam-held-in" value="Summer Sem Exam 2025" placeholder="<?= lang('App.exam'); ?> <?= lang('App.held'); ?> <?= lang('App.in'); ?>" required>
                            <span class="text-danger"><?= displayError($validation, 'exam-held-in') ?></span>
                        </div>

                        <div class="col-xl-4">
                            <label for="date-of-leaving" class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.leaving'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" class="form-control" name="date-of-leaving" id="date" value="2025-06-30" placeholder="<?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.leaving'); ?>" required>
                                <span class="text-danger"><?= displayError($validation, 'date-of-leaving') ?></span>

                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('App.close'); ?></button>
                    <button type="submit" class="btn btn-primary"><?= lang('App.submit'); ?></button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <!--End::modal-->
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
                                                            <th scope="col"><?= lang('App.registration'); ?> <?= lang('App.no'); ?></th>
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
                                                            <td>R11120250001</td>
                                                            <td>SHINDE NAGESH TUKARAM</td>
                                                            <td>9876543210</td>
                                                            <td>2024-2025</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Add Lc Info</button>
                                                            </td>
                                                        </tr>
<!--                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>R11120250002</td>
                                                            <td>KALE RAJ AJAY</td>
                                                            <td>9876656560</td>
                                                            <td>2024-2025</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Add Lc Info</button>
                                                            </td>
                                                        </tr>-->
<!--                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>R11120250003</td>
                                                            <td>Patil Anil Shankar</td>
                                                            <td>9876543210</td>
                                                            <td>2024-2025</td>
                                                            <td>Civil Engineering</td>
                                                            <td>Third Year</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Add Lc Info</button>
                                                            </td>
                                                        </tr>-->

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
</div><!--End::container-fluid -->