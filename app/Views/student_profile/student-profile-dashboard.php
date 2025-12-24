
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.student'); ?> <?= lang('App.profile'); ?> </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.student'); ?> <?= lang('App.profile'); ?> </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <div class="container">
        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-9">
                <div class="card custom-card">
                    <div class="card-body p-0 product-checkout">
                        <ul class="nav nav-tabs tab-style-2 d-sm-flex d-block border-bottom border-block-end-dashed" id="myTab1" role="tablist">
                            <!--Personal Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personalInformatiom-tab" data-bs-toggle="tab"
                                        data-bs-target="#personalinfo-tab-pane" type="button" role="tab"
                                        aria-controls="personalInformatiom-tab" aria-selected="false"><i
                                        class="ri-user-3-line me-2 align-middle"></i><?= lang('App.personal'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Address Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="order-tab" data-bs-toggle="tab"
                                        data-bs-target="#order-tab-pane" type="button" role="tab"
                                        aria-controls="order-tab" aria-selected="true"><i
                                        class="ri-map-pin-line me-2 align-middle"></i><?= lang('App.address'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Parent Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipped-tab" data-bs-toggle="tab"
                                        data-bs-target="#shipped-tab-pane" type="button" role="tab"
                                        aria-controls="shipped-tab" aria-selected="false"><i
                                        class="ri-parent-line me-2 align-middle"></i><?= lang('App.parent'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Educational Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="delivered-tab" data-bs-toggle="tab"
                                        data-bs-target="#delivery-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false"><i
                                        class="ri-book-open-line me-2 align-middle"></i><?= lang('App.educational'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Document Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="document-tab" data-bs-toggle="tab"
                                        data-bs-target="#document-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false"><i
                                        class="ri-upload-2-line me-2 align-middle"></i><?= lang('App.document'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Course Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="delivered-tab" data-bs-toggle="tab"
                                        data-bs-target="#applycourse-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false"><i
                                        class="ri-file-edit-line me-2 align-middle"></i><?= lang('App.apply'); ?> for <?= lang('App.course'); ?></button>
                            </li>
                            <!--Payment Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab"
                                        data-bs-target="#payment-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false">
                                    <i class="ri-money-pound-circle-line me-2 align-middle"></i><?= lang('App.payment'); ?>  <?= lang('App.details'); ?></button>
                            </li>

                            <!--Declaration Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="declaration-tab" data-bs-toggle="tab"
                                        data-bs-target="#declaration-tab-pane" type="button" role="tab"
                                        aria-controls="declaration-tab" aria-selected="false">
                                    <i class="ri-checkbox-line me-2 align-middle"></i><?= lang('App.declaration'); ?></button>
                            </li>

                            <!--Print  form TAB-->
                            <!--                            <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="formprint-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#formprint-tab-pane" type="button" role="tab"
                                                                    aria-controls="formprint-tab" aria-selected="false">
                                                                <i class="ri-printer-line me-2 align-middle"></i><?= lang('App.form'); ?>  <?= lang('App.print'); ?></button>
                                                        </li>-->
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <!--Personal Details START-->
                            <?= $this->include('student_profile/student-personal-details') ?>

                            <!--Personal Details END-->
                            <!--Address Details START-->
                            <?= $this->include('student_profile/student-address-details') ?>
                            <!--Address Details END-->

                            <!--Parent Details START-->
                            <?= $this->include('student_profile/student-parent-details') ?>

                            <!--Parent Details END-->
                            <!--Educational Details START-->
                            <?= $this->include('student_profile/student-educational-details') ?>
                            <!--Educational Details END-->
                            <!--Document Details START-->

                            <?= $this->include('student_profile/student-document-details') ?>
                            <!--Document Details END-->
                            <!--Course Details START-->
                            <?= $this->include('student_profile/student-applycourse-details') ?>
                            <!--Course Details END-->
                            <!--Payment Details START-->
                            <?= $this->include('student_profile/student-payment-details') ?>
                            <!--Payment Details END-->

                            <!--Declaration Details START-->
                            <?= $this->include('student_profile/student-declaration-details') ?>
                            <!--Declaration Details END-->
                            <!--Form Print START-->
                            <?= $this->include('student_profile/student-formprint') ?>
                            <!--Form Print END-->

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?= lang('App.student'); ?> <?= lang('App.details'); ?> 
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center border-bottom border-block-end-dashed p-3 flex-wrap">
                                    <div class="me-2">
                                        <span class="avatar avatar-lg avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/images.png'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-0"><?= session('username'); ?></p>
                                        <p class="mb-0 text-muted fs-12"></p>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary-transparent"><?= session('role'); ?></span>
                                    </div>
                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="fs-14 fw-semibold">Student Address :</span>
                                        <button class="btn btn-icon btn-wave btn-primary btn-sm"><i class="ri-pencil-line"></i></button>
                                    </div>
                                    <p class="mb-2 text-muted"><span class="fw-semibold text-default">City : </span>SATARA</p>
                                    <p class="mb-2 text-muted"><span class="fw-semibold text-default">State : </span>MAHARASHTRA</p>
                                    <p class="mb-2 text-muted"><span class="fw-semibold text-default">Country : </span>INDIA</p>
                                    <p class="mb-0 text-muted"><span class="fw-semibold text-default">Pincode    : </span>415001</p>
                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="mb-3">
                                        <span class="fs-14 fw-semibold">Contact Details :</span>
                                    </div>    
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default">Phone : </span>
                                        9748124632
                                    </p>

                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="mb-3">
                                        <span class="fs-14 fw-semibold">Academic  Details : </span>
                                    </div>    
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default"> Course -</span>
                                        B.COM
                                    </p>
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default"> Year -</span>
                                        FIRST YEAR
                                    </p>
                                    <p class="mb-0 text-muted">
                                        <span class="fw-semibold text-default">Academic Year :</span>
                                        2025-2026
                                    </p>
                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="mb-3">
                                        <span class="fs-14 fw-semibold">Fees  Details : </span>
                                    </div>    
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default">  </span>

                                    </p>
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default">  </span>

                                    </p>
                                    <p class="mb-0 text-muted">
                                        <span class="fw-semibold text-default"></span>

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


