
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="<?php echo base_url('index'); ?>" class="header-logo">
            <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="desktop-logo">
                <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="toggle-logo">
                    <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="desktop-dark">
                        <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="toggle-dark">
                            <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="desktop-white">
                                <img src="<?php echo base_url('assets/images/brand-logos/rise.jpeg'); ?>" alt="logo" class="toggle-white">
                                    </a>
                                    </div>
                                    <!-- End::main-sidebar-header -->

                                    <!-- Start::main-sidebar -->
                                    <div class="main-sidebar" id="sidebar-scroll">

                                        <!-- Start::nav -->
                                        <nav class="main-menu-container nav nav-pills flex-column sub-open">
                                            <div class="slide-left" id="slide-left">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                                            </div>
                                            <ul class="main-menu">
                                                <!-- Start::slide__category -->
                                                <li class="slide__category"><span class="category-name">Student</span></li>
                                                <!-- End::slide__category -->
                                                <!-- Start::Dashboard -->
                                                <li class="slide">
                                                    <a href="<?php echo base_url('studentDashboard'); ?>" class="side-menu__item">
                                                        <i class="bx bx-home side-menu__icon"></i>
                                                        <span class="side-menu__label"><?= lang('App.dashboard') ?></span>
                                                    </a>
                                                </li>
                                                <!-- End::Dashboard -->



                                                <!-- Start::StudentProfile -->
                                                <li class="slide">
                                                    <a href="<?php echo base_url('studentProfile'); ?>" class="side-menu__item">
                                                        <i class="bx bx-user side-menu__icon"></i>
                                                        <span class="side-menu__label"><?= lang('App.student'); ?> <?= lang('App.profile'); ?></span>
                                                    </a>
                                                </li>
                                                <!-- End::StudentProfile --> 




                                            </ul>
                                            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                                        </nav>
                                        <!-- End::nav -->
                                    </div>
                                    <!-- End::main-sidebar -->
</aside>