
<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>
  
                    <div class="container-fluid">

                        <!-- Page Header -->
                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                            <h1 class="page-title fw-semibold fs-18 mb-0">Apex Timeline Charts</h1>
                            <div class="ms-md-1 ms-0">
                                <nav>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Apex Charts</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Apex Timeline Charts</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- Page Header Close -->

                        <!-- Start::row-1 -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Basic TImeline Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="timeline-basic"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Multiple Colored TImeline Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="timeline-colors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Multi Series Timeline Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="timeline-multi"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Advanced Timeline Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="timeline-advanced"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Timeline-Grouped Rows</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="timeline-grouped"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End::row-1 -->
        
                    </div>
<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

        <!-- Apex Charts JS -->
        <script src="<?php echo base_url('assets/libs/apexcharts/apexcharts.min.js'); ?>"></script>

        <!-- Used For Multiple Colored TImeline Chart -->
        <script src="<?php echo base_url('assets/libs/moment/moment.js'); ?>"></script>

        <!-- Internal Apex Timeline Charts JS -->
        <script src="<?php echo base_url('assets/js/apexcharts-timeline.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>