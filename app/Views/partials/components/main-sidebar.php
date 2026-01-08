<?php
$permissions = config('Permissions');
?>
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
                                                <?php if (hasAnyPermission($permissions->faculty_module_category)): ?>
                                                    <!------------------------------------------------------- start::Faculty Registration-------------------------------------------------------------->
                                                    <li class="slide__category"><span class="category-name"><?= lang('App.employee'); ?></span></li>
                                                    <!-- End::slide__category -->
                                                <?php endif; ?>
                                                <?php if (hasAnyPermission($permissions->faculty_module)): ?>
                                                    <li id="mainFacultyNav" class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class="bx bx-user-pin side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.employee'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <?php if (hasAnyPermission($permissions->faculty_registration)): ?>
                                                                <li id="manageFacultyNav" class="slide">
                                                                    <a href="<?php echo base_url('faculty/fetch-faculty'); ?>" class="side-menu__item"> <?= lang('App.manage'); ?> <?= lang('App.employee'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                                <!-- End::slide -->

                                                <!---============================ End::Faculty Registration =========================--->


                                                <!--============================== Dashboard START ===================================-->
                                                <?php if (hasAnyPermission($permissions->master_dashboard)): ?>
                                                    <li class="slide__category"><span class="category-name"><?= lang('App.dashboard'); ?></span></li>
                                                <?php endif; ?>

                                                <?php if (hasAnyPermission($permissions->dashboard)): ?>
                                                    <li id="dashboardNav" class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class='bx  bx-dashboard'></i> 
                                                            <span class="side-menu__label"><?= lang('App.dashboard'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1">
                                                                <a href="javascript:void(0)"><?= lang('App.dashboard'); ?></a>
                                                            </li>
                                                            <?php if (hasAnyPermission($permissions->adminDashboard)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('admin-dashboard'); ?>" class="side-menu__item"> <?= lang('App.dashboard'); ?> 1</a>
                                                                </li>                                                            
                                                            <?php endif; ?>

                                                            <?php if (hasAnyPermission($permissions->facultyDashboard)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('faculty-dashboard'); ?>" class="side-menu__item"><?= lang('App.dashboard'); ?> 2</a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if (hasAnyPermission($permissions->librarianDashboard)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('librarian-dashboard'); ?>" class="side-menu__item"><?= lang('App.dashboard'); ?> 3</a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if (hasAnyPermission($permissions->accountantDashboard)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('accountant-dashboard'); ?>" class="side-menu__item"><?= lang('App.dashboard'); ?> 4</a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if (hasAnyPermission($permissions->iqacDashboard)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('iqac-dashboard'); ?>" class="side-menu__item"><?= lang('App.dashboard'); ?> 5</a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if (hasAnyPermission($permissions->studentDashboard)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('student-dashboard'); ?>" class="side-menu__item"><?= lang('App.dashboard'); ?> 6</a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>

                                                <!--============================== Dashboard End ===================================-->
                                                <!--============================== Registration Admin site Start ===================================-->
                                                <?php if (hasAnyPermission($permissions->approveRegistration)): ?>
                                                    <li class="slide">
                                                        <a href="<?php echo base_url('approve-registration'); ?>" class="side-menu__item">
                                                            <i class="bx bx-user side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.approve'); ?> <?= lang('App.registration'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <!--============================== Registration Admin site End ===================================-->
                                                <!-- Start::slide__category -->
                                                <li class="slide__category"><span class="category-name">Student</span></li>
                                                <!-- End::slide__category -->


                                                <!-- Start::StudentProfile -->
                                                <?php if (hasAnyPermission($permissions->studentProfile)): ?>
                                                    <li class="slide">
                                                        <a href="<?php echo base_url('student-profile'); ?>" class="side-menu__item">
                                                            <i class="bx bx-user side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.student'); ?> <?= lang('App.profile'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <!-- End::StudentProfile --> 



                                                <!--========================= Feedback Module START =========================-->
                                                <?php if (hasAnyPermission($permissions->feedback_module_category)): ?>
                                                    <li class="slide__category"><span class="category-name"><?= lang('App.feedback'); ?> <?= lang('App.module'); ?></span></li>
                                                <?php endif; ?>
                                                <?php if (hasAnyPermission($permissions->feedback_module)): ?>
                                                    <li  id="mainFeedbackNav" class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class="bx bx-message-edit side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.feedback'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1"  id="feedbackNav">
                                                                <a href="javascript:void(0)"><?= lang('App.feedback'); ?></a>
                                                            </li>
                                                            <?php if (hasAnyPermission($permissions->feedback)): ?>
                                                                <li class="slide" id="feedbacmasterkNav" >
                                                                    <a href="<?php echo base_url('feedback'); ?>" class="side-menu__item"> <?= lang('App.feedback'); ?> <?= lang('App.master'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                                <!--========================= Feedback Module END =========================-->

                                                <!--=============================================Faculty Profile Start==============================================-->
                                                <?php if (hasAnyPermission($permissions->faculty_profile_module)): ?>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class=" bx bx-user-circle side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.faculty'); ?> <?= lang('App.profile'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <?php if (hasAnyPermission($permissions->faculty_profile)): ?>
                                                            <ul class="slide-menu child1">
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('faculty-profile'); ?>" class="side-menu__item"><?= lang('App.update'); ?>  <?= lang('App.profile'); ?></a>
                                                            </ul>
                                                        <?php endif; ?>   
                                                    </li>
                                                <?php endif; ?>

                                                <!--=============================================Faculty Profile End==============================================-->

                                                <!-- Start::slide__category -->
                                                <li class="slide__category"><span class="category-name">Pages</span></li>
                                                <!-- End::slide__category -->

                                                <!--========================= Certificates Module Start =========================-->

                                                <?php if (hasAnyPermission($permissions->certificates_category)): ?>
                                                    <li class="slide__category"><span class="category-name"><?= lang('App.certificate'); ?>s</span></li>
                                                <?php endif; ?>
                                                <!-- Start::slide -->

                                                <?php if (hasAnyPermission($permissions->certificates)): ?>
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
                                                            <?php if (hasAnyPermission($permissions->leaving_certificate)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('leavingcertificate'); ?>" class="side-menu__item"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?></a>
                                                                </li>

                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('leavingcertificate/leaving-certificate-report'); ?>" class="side-menu__item"><?= lang('App.leaving'); ?> <?= lang('App.certificate'); ?> <?= lang('App.report'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if (hasAnyPermission($permissions->bonafide_certificate)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('bonafidecertificate'); ?>" class="side-menu__item"><?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?></a>
                                                                </li>

                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('bonafidecertificate/bonafide-certificate-report'); ?>" class="side-menu__item"><?= lang('App.bonafide'); ?> <?= lang('App.certificate'); ?> <?= lang('App.report'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                                <!--===========================================Certificates Module End ================================== -->

                                                <li class="slide">
                                                    <a href="<?php echo base_url('icard'); ?>" class="side-menu__item">
                                                        <i class="bx bx-id-card side-menu__icon"></i>
                                                        <span class="side-menu__label"><?= lang('App.icard'); ?></span>
                                                    </a>
                                                </li>


                                                <!--=============================================Fee Management Start==============================================-->

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
                                                            <a href="<?php echo base_url('head-fees'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.head'); ?> <?= lang('App.fees'); ?></a>
                                                        </li>
                                                        <li class="slide">
                                                            <a href="<?php echo base_url('collect-fees'); ?>" class="side-menu__item"><?= lang('App.collect'); ?> <?= lang('App.fees'); ?></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- End::slide -->

                                                <!--=============================================Fee Management End==============================================-->

                                                <!-- Start::slide -->
                                                <?php if (hasPermission('createRole') || hasPermission('viewRole') || hasPermission('updateRole') || hasPermission('deleteRole')): ?>
                                                    <li id="mainRoleNav" class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class="bx bx-group side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.role'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1">
                                                                <a href="javascript:void(0)"><?= lang('App.role'); ?></a>
                                                            </li>
                                                            <?php if (hasPermission('createRole')): ?>
                                                                <li id="addroleNav" class="slide">
                                                                    <a href="<?php echo base_url('roles/add-role'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.role'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if (hasPermission('viewRole') || hasPermission('updateRole') || hasPermission('deleteRole')): ?>
                                                                <li id="manageroleNav" class="slide">
                                                                    <a href="<?php echo base_url('roles'); ?>" class="side-menu__item"><?= lang('App.manage'); ?> <?= lang('App.role'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                                <!-- End::slide -->

                                                <!--========================= MASTER START =========================-->
                                                <?php if (hasAnyPermission($permissions->master_category)): ?>
                                                    <li class="slide__category"><span class="category-name"><?= lang('App.master'); ?></span></li>
                                                <?php endif; ?>

                                                <?php if (hasAnyPermission($permissions->master)): ?>
                                                    <li id="mainRoleNav" class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <i class="bx bx-group side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.master'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                        <ul class="slide-menu child1">
                                                            <li class="slide side-menu__label1">
                                                                <a href="javascript:void(0)"><?= lang('App.role'); ?></a>
                                                            </li>
                                                            <?php if (hasAnyPermission($permissions->headGroup)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('headgroup'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.head'); ?> <?= lang('App.group'); ?></a>
                                                                </li>                                                            
                                                            <?php endif; ?>

                                                            <?php if (hasAnyPermission($permissions->head)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('head'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.head'); ?></a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if (hasAnyPermission($permissions->department)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('department'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.department'); ?></a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if (hasAnyPermission($permissions->activity_log)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('activity-log'); ?>" class="side-menu__item"><?= lang('App.activity'); ?> <?= lang('App.log'); ?></a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if (hasAnyPermission($permissions->subjectGroup)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('subjectgroup'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.subject'); ?> <?= lang('App.group'); ?></a>
                                                                </li>                                                            
                                                            <?php endif; ?>

                                                            <?php if (hasAnyPermission($permissions->subject)): ?>
                                                                <li class="slide">
                                                                    <a href="<?php echo base_url('subject'); ?>" class="side-menu__item"><?= lang('App.add'); ?> <?= lang('App.subject'); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                                <!--========================= MASTER END =========================-->


                                                <!--==========================================Ticket Module==============================================-->
                                                <?php if (hasAnyPermission($permissions->ticket_module_category)): ?>
                                                    <li class="slide__category"><span class="category-name"><?= lang('App.ticket'); ?></span></li>
                                                <?php endif; ?>

                                                <?php if (hasAnyPermission($permissions->ticket_module)): ?>
                                                    <li class="slide has-sub">
                                                        <a href="#" class="side-menu__item">
                                                            <i class="bx bx-receipt side-menu__icon"></i>
                                                            <span class="side-menu__label"><?= lang('App.ticket'); ?></span>
                                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <ul class="slide-menu child1">
                                                        <?php if (hasAnyPermission($permissions->Ticket)): ?>
                                                            <li class="slide">
                                                                <a href="<?php echo base_url('ticket'); ?>" class="side-menu__item"><?= lang('App.create'); ?> <?= lang('App.ticket'); ?></a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </li>
                                                <!--===========================================End Ticket==============================================-->
                                            </ul>
                                            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>

                                            <!--=================================================Admin Section ===================================================-->
                                            <li class="slide__category"><span class="category-name">Admin Section</span></li>
                                            <!--==============================================Admin Section  End==================================================-->

                                            <!--=================================================Establishment  Section ===================================================-->
                                            <li class="slide__category"><span class="category-name">Establishment Section</span></li>
                                            <!--==============================================Establishment Section  End==================================================-->

                                            <!--=================================================Student Section ===================================================-->
                                            <li class="slide__category"><span class="category-name">Student Section</span></li>
                                            <!--==============================================Student Section  End==================================================-->

                                            <!--===============================================Accounts Section===================================================-->
                                            <li class="slide__category"><span class="category-name">Accounts Section</span></li>
                                            <!--==============================================Accounts Section End==================================================-->

                                            <!--===============================================Examination Section===================================================-->
                                            <li class="slide__category"><span class="category-name">Examination Section</span></li>
                                            <!--==============================================Examination Section End==================================================-->


                                            <!--===============================================IQAC Section===================================================-->
                                            <li class="slide__category"><span class="category-name">IQAC Section</span></li>
                                            <!--==============================================IQAC Section End==================================================-->

                                            <!--===============================================Master Section===================================================-->
                                            <li class="slide__category"><span class="category-name">Master Section</span></li>
                                            <!--==============================================Master Section End==================================================-->

                                        </nav>
                                        <!-- End::nav -->

                                    </div>
                                    <!-- End::main-sidebar -->

                                    </aside>
