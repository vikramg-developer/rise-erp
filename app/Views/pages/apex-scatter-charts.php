
<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

                    <div class="container-fluid">

                        <!-- Page Header -->
                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                            <h1 class="page-title fw-semibold fs-18 mb-0">Apex Scatter Charts</h1>
                            <div class="ms-md-1 ms-0">
                                <nav>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Apex Charts</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Apex Scatter Charts</li>
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
                                        <div class="card-title">Basic Scatter Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="scatter-basic"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Datetime Scatter Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="scatter-datetime"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Image Fill Scatter Chart</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="scatter-image"></div>
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

        <!-- Internal Apex Scatter Charts JS -->
        <script src="<?php echo base_url('assets/js/apexcharts-scatter.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>