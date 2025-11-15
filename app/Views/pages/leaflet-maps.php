
<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>

        <!-- Leaflet Maps CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/libs/leaflet/leaflet.css'); ?>">

<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

                    <div class="container-fluid">

                        <!-- Page Header -->
                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                            <h1 class="page-title fw-semibold fs-18 mb-0">Leaflet Maps</h1>
                            <div class="ms-md-1 ms-0">
                                <nav>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Maps</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Leaflet Maps</li>
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
                                        <div class="card-title">Leaflet Map</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Map With Markers,circles and Polygons</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="map1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Map With Popup</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="map-popup"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Map With Custom Icon</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="map-custom-icon"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Interactive Choropleth Map</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="interactive-map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End::row-1 -->

                    </div> 
                              
<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

        <!-- Leaflet Maps JS -->
        <script src="<?php echo base_url('assets/libs/leaflet/leaflet.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/leaflet.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>