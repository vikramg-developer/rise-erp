
<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

                    <div class="container-fluid">

                        <!-- Page Header -->
                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                            <h1 class="page-title fw-semibold fs-18 mb-0">Apex Mixed Charts</h1>
                            <div class="ms-md-1 ms-0">
                                <nav>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Apex Charts</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Apex Mixed Charts</li>
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
                                        <div class="card-title">Line & Column Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="mixed-linecolumn"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Multiple Y-Axis Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="mixed-multiple-y"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Line & Area Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="mixed-linearea"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Line,Column & Area Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="mixed-all"></div>
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

        <!-- Internal Apex Mixed Charts JS -->
        <script src="<?php echo base_url('assets/js/apexcharts-mixed.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>