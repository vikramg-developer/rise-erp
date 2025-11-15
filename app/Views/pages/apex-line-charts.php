
<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>

        <link rel="stylesheet" href="<?php echo base_url('assets/libs/apexcharts/apexcharts.css'); ?>">

<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

                    <div class="container-fluid">

                        <!-- Page Header -->
                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                            <h1 class="page-title fw-semibold fs-18 mb-0">Apex Line Charts</h1>
                            <div class="ms-md-1 ms-0">
                                <nav>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Apex Charts</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Apex Line Charts</li>
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
                                        <div class="card-title">Basic Line Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="line-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Line Chart With Data Labels</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="line-chart-datalabels"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Zoomable Time Series</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="zoom-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Line With Annotations</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="annotation-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Brush Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="brush-chart1"></div>
                                        <div id="brush-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">StepLine Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="stepline-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Gradient Line Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="gradient-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Missing/Null Values Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="null-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Real Time Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="dynamic-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Dashed Line Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="dashed-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Syncing Charts</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-line"></div>
                                        <div id="chart-line2"></div>
                                        <div id="chart-area"></div>
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

        <!-- Used In Zoomable TIme Series Chart -->
        <script src="<?php echo base_url('assets/js/dataseries.js'); ?>"></script>

        <!---Used In Annotations Chart-->
        <script src="<?php echo base_url('assets/js/apexcharts-stock-prices.js'); ?>"></script>

        <!-- Internal Apex Line Charts JS -->
        <script src="<?php echo base_url('assets/js/apexcharts-line.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>