<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed" data-theme-mode="light">

    <head>

        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> YNEX - Codeigniter Bootstrap 5 Premium Admin & Dashboard Template </title>
        <meta name="Description" content="Bootstrap Codeigniter Responsive Admin Web Dashboard HTML5 Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="bootstrap dashboard, bootstrap 5 admin template, admin template bootstrap 5, admin dashboard template, codeigniter, codeigniter template, bootstrap admin dashboard, codeigniter admin panel, admin dashboard, dashboard template, admin panel, bootstrap admin panel, template dashboard, bootstrap template, bootstrap themes.">
    
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/images/brand-logos/favicon.ico'); ?>">
        
        <!-- styles code -->
        <?= $this->include('layouts/components/landingpage/styles'); ?>
        <!-- End styles -->

    </head>

    <body class="landing-body">

        <!-- Start::main-switcher -->
        <?= $this->include('layouts/components/landingpage/switcher'); ?>
        <!-- End::main-switcher -->

        <div class="landing-page-wrapper">

            <!-- Start::main-header -->
            <?= $this->include('layouts/components/landingpage/main-header'); ?>
            <!-- End::main-header -->

            <!-- Start::main-sidebar -->
            <?= $this->include('layouts/components/landingpage/main-sidebar'); ?>
            <!-- End::main-sidebar -->
                
            <!-- Start::app-content -->
            <div class="main-content landing-main">
                
                <?= $this->renderSection('content'); ?>

            </div>
            <!--app-content closed-->

        </div>
        <!-- End Page -->

        <!-- Start::main-scripts -->
        <?= $this->include('layouts/components/landingpage/scripts'); ?>
        <!-- End::main-scripts -->

    </body>

</html>