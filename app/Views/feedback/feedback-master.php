<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Feedback Master</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Rise</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Feedback Master</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

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
                                            <div class="col-xl-3">
                                                <label for="product-type" class="form-label"> 
                                                    <?= lang('App.feedback') ?> <?= lang('App.name') ?>
                                                </label>
                                                <input type="text" class="form-control" id="Feedback_name" placeholder="<?= lang('App.feedback') ?> <?= lang('App.name') ?>">
                                            </div>

                                            <div class="col-xl-3">
                                                <label for="product-category-add" class="form-label"><?= lang('App.feedback') ?> <?= lang('App.type') ?></label>
                                                <select class="form-control" data-trigger name="product-category-add" id="product-category-add">
                                                    <option value="">Select Type</option>
                                                    <option value="1">Theory</option>
                                                    <option value="2">Practical </option>
                                                    <option value="3">Project </option>
                                                    <option value="4">Seminar</option>
                                                    <option value="5">Tutorial</option>

                                                </select>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="product-category-add" class="form-label"><?= lang('App.semester') ?> </label>
                                                <select class="form-control" data-trigger name="product-category-add" id="product-category-add">
                                                    <option value="">Select Semester</option>
                                                    <option value="1">Odd</option>
                                                    <option value="2">Even </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="product-category-add" class="form-label"><?= lang('App.part') ?> </label>
                                                <select class="form-control" data-trigger name="product-category-add" id="product-category-add">
                                                    <option value="">Select Part</option>
                                                    <option value="1">Pre</option>
                                                    <option value="2">Post </option>
                                                </select>
                                            </div>

                                            <div class="col-xl-3">
                                                <label for="product-size-add" class="form-label"><?= lang('App.academic') ?>  <?= lang('App.year') ?></label>
                                                <select class="form-control" data-trigger name="product-size-add" id="product-size-add">
                                                    <option value="">Select Academic Year</option>
                                                    <option value="Extra Small">2025-2026</option>
                                                    <option value="Extra Small">2024-2025</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button class="btn btn-primary-light m-1"><?= lang('App.add') ?></button>
                    </div>
                    <?php
//                    print_r($lc_data);
                    ?>
                    <div class="p-4 border-top ">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"><?= lang('App.sr')?>.<?= lang ('App.no')?></th>
                                        <th scope="col"><?= lang('App.feedback') ?> <?= lang('App.name') ?></th>
                                        <th scope="col"><?= lang('App.type') ?></th>
                                        <th scope="col"><?= lang('App.semester') ?></th>
                                        <th scope="col"><?= lang('App.part') ?></th>
                                        <th scope="col"><?= lang('App.academic') ?> <?= lang('App.year') ?></th>
                                        <th scope="col"><?= lang('App.manage') ?> <?= lang('App.question') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Consolidated Feedback Analysis Theory</td>
                                        <td>Theory</td>
                                        <td>Odd</td>
                                        <td>Pre</td>
                                        <td>2025-2026</td>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-wave">
                                                <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i>Upload Questions
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Consolidated Feedback Analysis Practical</td>
                                        <td>Practical</td>
                                        <td>Odd</td>
                                        <td>Pre</td>
                                        <td>2025-2026</td>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-wave">
                                                <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i>Upload Questions
                                            </button>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--End::row-1 -->


</div>