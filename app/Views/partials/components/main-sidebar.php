
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="" class="header-logo">
            <img src="<?php echo base_url('assets/images/brand-logos/rise.jpg'); ?>" alt="logo" class="desktop-logo">
                <img src="<?php echo base_url('assets/images/brand-logos/toggle-rise.jpg'); ?>" alt="logo" class="toggle-logo">
                    <img src="<?php echo base_url('assets/images/brand-logos/rise.jpg'); ?>" alt="logo" class="desktop-dark">
                        <img src="<?php echo base_url('assets/images/brand-logos/toggle-rise.jpg'); ?>" alt="logo" class="toggle-dark">
                            <img src="<?php echo base_url('assets/images/brand-logos/rise.jpg'); ?>" alt="logo" class="desktop-white">
                                <img src="<?php echo base_url('assets/images/brand-logos/toggle-rise.jpg'); ?>" alt="logo" class="toggle-white">
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
                                                <!------------------------------------------------------- start::users-------------------------------------------------------------->
                                                <li class="slide__category"><span class="category-name"><?= lang('App.faculty'); ?></span></li>
                                                <!-- End::slide__category -->

                                                <li class="slide has-sub">
                                                    <a href="javascript:void(0);" class="side-menu__item">
                                                        <i class="bx bx-user-pin side-menu__icon"></i>
                                                        <span class="side-menu__label"><?= lang('App.faculty'); ?></span>
                                                        <i class="fe fe-chevron-right side-menu__angle"></i>
                                                    </a>
                                                    <ul class="slide-menu child1">
                                                        <li class="slide side-menu__label1">
                                                            <a href="javascript:void(0)">Error</a>
                                                        </li>
                                                        <li class="slide">
                                                            <a href="<?php echo base_url('faculty'); ?>" class="side-menu__item"> <?= lang('App.add'); ?> <?= lang('App.faculty'); ?></a>
                                                        </li>

                                                        <li class="slide">
                                                            <a href="<?php echo base_url('faculty/manage-faculty'); ?>" class="side-menu__item"> <?= lang('App.manage'); ?> <?= lang('App.faculty'); ?></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- End::slide -->

                                                <!------------------------------------------------------- End::users-------------------------------------------------------------->

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

                                                <!-- Start::slide__category -->
                                                <li class="slide__category"><span class="category-name">Pages</span></li>
                                                <!-- End::slide__category -->

                                                <!-- Start::slide -->
                                                <li class="slide has-sub">
                                                    <a href="javascript:void(0);" class="side-menu__item">
                                                        <i class="bx bx-message-edit side-menu__icon"></i>
                                                        <span class="side-menu__label"><?= lang('App.feedback'); ?></span>
                                                        <i class="fe fe-chevron-right side-menu__angle"></i>
                                                    </a>
                                                    <ul class="slide-menu child1">
                                                        <li class="slide side-menu__label1">
                                                            <a href="javascript:void(0)"><?= lang('App.feedback'); ?></a>
                                                        </li>
                                                        <li class="slide">
                                                            <a href="<?php echo base_url('feedback'); ?>" class="side-menu__item"> <?= lang('App.feedback'); ?> <?= lang('App.master'); ?></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- End::slide -->

                                                <!-- Start::slide -->
                                                <li class="slide has-sub">
                                                    <a href="javascript:void(0);" class="side-menu__item">
                                                        <i class="bx bx-medal side-menu__icon"></i>
                                                        <span class="side-menu__label"><?= lang('App.certificate'); ?>s</span>
                                                        <i class="fe fe-chevron-right side-menu__angle"></i>
                                                    </a>
                                                    <ul class="slide-menu child1">
                                                        <li class="slide side-menu__label1">
                                                            <a href="javascript:void(0)"><?= lang('App.certificate'); ?></a>
                                                        </li>
                                                        <li class="slide">
                                                            <a href="<?php echo base_url('leaving-certificate'); ?>" class="side-menu__item"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?></a>
                                                        </li>
                                                        <!--                                                        <li class="slide">
                                                                                                                    <a href="<?php echo base_url('leaving-certificate-report'); ?>" class="side-menu__item"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?> <?= lang('App.report'); ?></a>
                                                                                                                </li>-->
                                                        <li class="slide">
                                                            <a href="<?php echo base_url('bonafide-certificate'); ?>" class="side-menu__item"><?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- End::slide -->

                                                <!-- Start::slide -->
                                                <li class="slide">
                                                    <a href="<?php echo base_url('i-card'); ?>" class="side-menu__item">
                                                        <i class="bx bx-id-card side-menu__icon"></i>
                                                        <span class="side-menu__label"><?= lang('App.icard'); ?></span>
                                                    </a>

                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <!--<i class="bx bx-task side-menu__icon"></i>-->
                                                            <i class=" bx bx-user-circle side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.faculty'); ?> <?= lang('App.profile'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1">
                                                                <a href="javascript:void(0)">Error</a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('faculty-profile'); ?>" class="side-menu__item"><?= lang('App.update'); ?>  <?= lang('App.profile'); ?></a>
                                                        </ul>
                                                    </li>

                                                    <!-- Start::slide -->
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class="bx bx-rupee side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.fees'); ?> <?= lang('App.management'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1">
                                                                <a href="javascript:void(0)"><?= lang('App.fees'); ?> <?= lang('App.management'); ?></a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('headgroup'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.head'); ?> <?= lang('App.group'); ?></a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('head'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.head'); ?></a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('head-fees'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.head'); ?> <?= lang('App.fees'); ?></a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('collect-fees'); ?>" class="side-menu__item"><?= lang('App.collect'); ?> <?= lang('App.fees'); ?></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End::slide -->

                                                    <!-- Start::slide -->
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class="bx bx-receipt side-menu__icon"></i>
                                                            <span class="side-menu__label">Ticket</span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1">
                                                                <a href="javascript:void(0)">Error</a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('Ticket'); ?>" class="side-menu__item">Create Ticket</a>
                                                        </ul>
                                                    </li>
                                                    <!-- End::slide -->

                                                    <!-- Start::slide -->
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class="bx bx-group side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.role'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1">
                                                                <a href="javascript:void(0)"><?= lang('App.role'); ?></a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('roles/add-role'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.role'); ?></a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('roles'); ?>" class="side-menu__item"><?= lang('App.manage'); ?> <?= lang('App.role'); ?></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End::slide -->

                                            </ul>
                                            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                                        </nav>
                                        <!-- End::nav -->

                                    </div>
                                    <!-- End::main-sidebar -->

                                    </aside>
