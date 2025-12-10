<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" loader="disable" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> RISE</title>
        <meta name="Description" content="Bootstrap Codeigniter Responsive Admin Web Dashboard HTML5 Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="bootstrap dashboard, bootstrap 5 admin template, admin template bootstrap 5, admin dashboard template, codeigniter, codeigniter template, bootstrap admin dashboard, codeigniter admin panel, admin dashboard, dashboard template, admin panel, bootstrap admin panel, template dashboard, bootstrap template, bootstrap themes.">
    
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/images/brand-logos/favicon.ico'); ?>">
       
        <!-- styles code -->
        <?= $this->include('partials/components/styles'); ?>
        <!-- End styles -->

    </head>    
    
    <body class="">

        <!-- Start::main-switcher -->
        <?= $this->include('partials/components/switcher'); ?>
        <!-- End::main-switcher -->

        <!-- Loader -->
        <div id="loader" >
            <img src="<?php echo base_url('assets/images/media/loader.svg'); ?>" alt="">
        </div>
        <!-- Loader -->

		<!-- page -->
        <div class="page">

			<!-- Start::main-header -->
            <?= $this->include('partials/components/main-header'); ?>
			<!-- End::main-header -->

			<!-- Start::main-sidebar -->
            //<?= $this->include('partials/components/main-sidebar'); ?>
			<!-- End::main-sidebar -->

            <!-- Start::app-content -->
            <div class="main-content app-content">