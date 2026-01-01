<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>



<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Admin Dashboard</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
            <div class="card custom-card hrm-main-card primary">
                <a href="<?= base_url('student-list') ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar ">
                                    <img src="<?php echo base_url('assets/images/dashboard-icons/books.png'); ?>" alt="">
                                </span>

                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">B.A.</span>
                                <h5 class="fw-semibold mb-2">103</h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Male: 60</span>
                                    <span class="badge bg-success-transparent">Female: 43</span>
                                </p>
                            </div>
                            <div>
                                <span class="fs-14 fw-semibold text-success"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-3 col-lg-3 col-md-3 col-sm-12">
            <div class="card custom-card hrm-main-card primary">
                <a href="<?= base_url('student-list') ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar ">
                                    <img src="<?php echo base_url('assets/images/dashboard-icons/commerce.png'); ?>" alt="">
                                </span>

                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">B.Com.</span>
                                <h5 class="fw-semibold mb-2">98</h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Male: 40</span>
                                    <span class="badge bg-success-transparent">Female: 58</span>
                                </p>
                            </div>
                            <div>
                                <span class="fs-14 fw-semibold text-success"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-3 col-lg-3 col-md-3 col-sm-12">
            <div class="card custom-card hrm-main-card primary">
                <a href="<?= base_url('student-list') ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar ">
                                    <img src="<?php echo base_url('assets/images/dashboard-icons/lab-items.png'); ?>" alt="">
                                </span>

                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">B.Sc.</span>
                                <h5 class="fw-semibold mb-2">120</h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Male: 60</span>
                                    <span class="badge bg-success-transparent">Female: 60</span>
                                </p>
                            </div>
                            <div>
                                <span class="fs-14 fw-semibold text-success"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-3 col-lg-3 col-md-3 col-sm-12">
            <div class="card custom-card hrm-main-card primary">
                <a href="<?= base_url('student-list') ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar ">
                                    <img src="<?php echo base_url('assets/images/dashboard-icons/microscope.png'); ?>" alt="">
                                </span>

                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">M.Sc.</span>
                                <h5 class="fw-semibold mb-2">120</h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Male: 80</span>
                                    <span class="badge bg-success-transparent">Female: 40</span>
                                </p>
                            </div>
                            <div>
                                <span class="fs-14 fw-semibold text-success"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <div class="col-xxl-12 col-xl-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Upcoming Events
                        </div>
                        <div>
                            <button type="button" class="btn btn-light btn-sm">View All</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 personal-upcoming-events">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded bg-light">
                                            <i class="bi bi-calendar2-heart fs-16 text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Freshers  <span class="text-primary fw-semibold">2024-2025</span></span>
                                        <span class="d-block text-muted fs-12">2 Hours</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary-transparent">11-06-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/2.jpg'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span><span class="text-primary fw-semibold"> </span>National Seminar on AI & Global Governance</span>
                                        <span class="d-block text-muted fs-12">5 Hours</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-success-transparent">15-07-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded bg-light">
                                            <i class="bi bi-compass fs-16 text-pink"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Holiday Trip To Italy</span>
                                        <span class="d-block text-muted fs-12">1 Week</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-danger-transparent">20-08-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded bg-light">
                                            <i class="bi bi-balloon-heart fs-16 text-success"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>AR-VR Bootcamp Workshop</span>
                                        <span class="d-block text-muted fs-12">1 Day</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-secondary-transparent">1-09-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/7.jpg'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Sports meets & competitions <span class="text-primary fw-semibold"></span></span>
                                        <span class="d-block text-muted fs-12">6 days</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning-transparent">15-10-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/7.jpg'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Online Workshop on Research Writing <span class="text-primary fw-semibold"></span></span>
                                        <span class="d-block text-muted fs-12">1 hour</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning-transparent">01-11-2024</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Fee Report</div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm btn-wave">1M</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">6M</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">1Y</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">All</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="courses-earnings"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xxl-6 col-xl-12">
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="card custom-card hrm-main-card primary">
                        <div class="card-body">
                            <div class="d-flex align-items-top">
                                <div class="me-3">
                                    <span class="avatar ">
                                        <img src="<?php echo base_url('assets/images/dashboard-icons/teaching.png'); ?>" alt="">
                                    </span>

                                </div>
                                <div class="flex-fill">
                                    <span class="fw-semibold text-muted d-block mb-2">Teaching Staff</span>
                                    <h5 class="fw-semibold mb-2">30</h5>
                                    <p class="mb-0">
                                        <span class="badge bg-primary-transparent">Male: 20</span>
                                        <span class="badge bg-success-transparent">Female: 10</span>
                                    </p>
                                </div>
                                <div>
                                    <span class="fs-14 fw-semibold text-success"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="card custom-card hrm-main-card primary">

                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar ">
                                    <img src="<?php echo base_url('assets/images/dashboard-icons/non-teaching.png'); ?>" alt="">
                                </span>

                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Non Teaching Staff</span>
                                <h5 class="fw-semibold mb-2">20</h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Male: 10</span>
                                    <span class="badge bg-success-transparent">Female: 10</span>
                                </p>
                            </div>
                            <div>
                                <span class="fs-14 fw-semibold text-success"></span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
         


        </div>
    </div>
</div>


