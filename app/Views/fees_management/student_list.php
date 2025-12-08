<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.student'); ?> <?= lang('App.list'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.student'); ?> <?= lang('App.list'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.student'); ?>  <?= lang('App.list'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php // if (!empty($head_group_datas)): ?>
                    <table id="feesTable" class="table table-bordered text-nowrap table-primary table-striped w-100">
                        <thead>
                            <tr>
                                <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                                <th><?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                                <th><?= lang('App.student'); ?> <?= lang('App.name'); ?></th>
                                <th><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                                <th><?= lang('App.year'); ?></th>
                                <th><?= lang('App.academic'); ?> <?= lang('App.year'); ?></th>
                                <th><?= lang('App.payment'); ?> <?= lang('App.category'); ?></th>
                                <th><?= lang('App.fees'); ?></th>
                                <th><?= lang('App.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>202610100001</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="<?php echo base_url('assets/images/student-photo/boy1.jpg'); ?>" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                                Amar Jadhav
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>5123</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>202610100002</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="<?php echo base_url('assets/images/student-photo/girl1.jpg'); ?>" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            Ashwini Shinde
                                        </div>
                                    </div>
                                </td>
                                <td>B.A.</td>
                                <td>Second Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>6487</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>202610100003</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="<?php echo base_url('assets/images/student-photo/girl2.jpg'); ?>" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            Priyanka Solanki
                                        </div>
                                    </div>
                                </td>
                                <td>B.A.</td>
                                <td>Second Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>7458</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>202610100004</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="<?php echo base_url('assets/images/student-photo/boy2.jpg'); ?>" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            Avinash Shinde
                                        </div>
                                    </div>
                                </td>
                                <td>B.A.</td>
                                <td>Third Year</td>
                                <td>2025-2026</td>
                                <td>EBC</td>
                                <td>6574</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>202610100005</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="<?php echo base_url('assets/images/student-photo/boy3.jpg'); ?>" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            Shivendra Salunkhe
                                        </div>
                                    </div>
                                </td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>5000</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>202610100006</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="<?php echo base_url('assets/images/student-photo/boy4.jpg'); ?>" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            Aditya Bhosale
                                        </div>
                                    </div>
                                </td>
                                <td>B.A.</td>
                                <td>Third Year</td>
                                <td>2025-2026</td>
                                <td>Scholarship</td>
                                <td>2145</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="modal fade"  id="modaldemo8">
                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Amar Jadhav</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo base_url('assets/images/student-photo/boy1.jpg'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start:: Contact Details Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
         aria-labelledby="offcanvasExample">
        <div class="offcanvas-body p-0">
            <div class="d-sm-flex align-items-top p-4 border-bottom border-block-end-dashed main-profile-cover">
                <div>
                    <span class="avatar avatar-xxl avatar-rounded me-3">
                        <img src="<?php echo base_url('assets/images/student-photo/boy1.jpg'); ?>" alt="">
                    </span>
                </div>
                <div class="flex-fill main-profile-info">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold mb-1 text-fixed-white">Amar Jadhav</h6>
                        <button type="button" class="btn-close crm-contact-close-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <p class="mb-1 text-muted text-fixed-white op-7">202610100001</p>
                    <p class="fs-12 text-fixed-white mb-4 op-5">  
                        <span class="me-3"><i class="ri-bank-line me-1 align-middle"></i>B.A.</span> 
                        <span><i class="ri-calendar-line me-1 align-middle"></i>First Year</span> 
                    </p>
                    <div class="d-flex mb-0">
                        <div class="me-4">
                            <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">&#8377; 5123</p>
                            <p class="mb-0 fs-11 op-5 text-fixed-white">Pending Fees</p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="p-4 border-bottom border-block-end-dashed">
                <p class="fs-14 mb-2 me-4 fw-semibold">Contact Information :</p>
                <div class="">
                    <div class="d-flex align-items-center mb-2">
                        <div class="me-2">
                            <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                                <i class="ri-mail-line align-middle fs-14"></i>
                            </span>
                        </div>
                        <div>
                            amarjadhav@gmail.com
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="me-2">
                            <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                                <i class="ri-phone-line align-middle fs-14"></i>
                            </span>
                        </div>
                        <div>
                            +(555) 555-1234
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-0">
                        <div class="me-2">
                            <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                                <i class="ri-map-pin-line align-middle fs-14"></i>
                            </span>
                        </div>
                        <div>
                            MIG-1-11, Monroe Street, Georgetown, Washington D.C, USA,20071
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: Contact Details Offcanvas -->
</div>