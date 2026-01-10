<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">
            <?= lang('App.manage'); ?> <?= lang('App.employee'); ?>
        </h1>

        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('App.manage'); ?> <?= lang('App.employee'); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- ADD BUTTON -->
    <!-- Start::row-1 -->
    <?php if (hasPermission('createFaculty')): ?>
        <div class="row mt-1">
            <div class="col-xl-12">
                <div class="px-1 py-1 d-sm-flex justify-content-start">
                    <a href="<?= base_url('faculty/'); ?>" class="btn btn-success m-1"><?= lang('App.add'); ?> <?= lang('App.employee'); ?><i class="bi bi-plus ms-2"></i></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--End::row-1 -->

    <!-- TABLE -->
    <div class="card custom-card">
        <div class="card-body">

            <div class="table-responsive">
                <table id="faculty-table" class="table table-hover table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th  width="5%">#</th>
                            <th><?= lang('App.action'); ?></th>
                            <th> <?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                            <th><?= lang('App.employee'); ?> <?= lang('App.name'); ?></th>
                            <th><?= lang('App.gender'); ?> </th>
                            <th><?= lang('App.contact'); ?> <?= lang('App.no'); ?></th>
                            <th>Added By</th>
                            <th>Updated By</th>
                            <th>Action</th>    
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


<!-- Start:: Contact Details Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
     aria-labelledby="offcanvasExample">
    <div class="offcanvas-body p-0">

        <!-- HEADER SECTION -->
        <div class="d-sm-flex align-items-top p-4 border-bottom border-block-end-dashed main-profile-cover">
            <div>
                <span class="avatar avatar-xxl avatar-rounded me-3">
                    <img src="<?= base_url('assets/images/student-photo/girl1.jpg'); ?>" alt="">
                </span>
            </div>

            <div class="flex-fill main-profile-info">
                <div class="d-flex align-items-center justify-content-between">

                    <!-- FACULTY NAME -->
                    <h6 class="fw-semibold mb-1 text-fixed-white" id="faculty_name">---</h6> 

                    <button type="button"
                            class="btn-close crm-contact-close-btn"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close">
                    </button>
                </div>

                <!-- RISE NO -->
                <p class="mb-1 text-muted text-fixed-white op-7" id="faculty_rise_no">---</p>

                <!-- STATIC -->
                <p class="fs-12 text-fixed-white mb-4 op-5">
                    <span class="me-3">
                        <i class="ri-bank-line me-1 align-middle"></i>Faculty
                    </span>
                    <span>
                        <i class="ri-calendar-line me-1 align-middle"></i>
                        <span id="faculty_status">---</span>
                    </span>
                </p>

                <div class="d-flex mb-0">
                    <div class="me-4">
                        <p class="fw-bold fs-15 text-fixed-white text-shadow mb-0">Employee</p>
                        <p class="mb-0 fs-11 op-5 text-fixed-white">Details</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTACT INFORMATION -->
        <div class="p-4 border-bottom border-block-end-dashed">
            <p class="fs-14 mb-2 me-4 fw-semibold">Contact Information :</p>

            <div>
                <!-- EMAIL -->
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                            <i class="ri-mail-line align-middle fs-14"></i>
                        </span>
                    </div>
                    <div id="faculty_email">---</div>
                </div>

                <!-- MOBILE -->
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                            <i class="ri-phone-line align-middle fs-14"></i>
                        </span>
                    </div>
                    <div id="faculty_mobile">---</div>
                </div>

                <!-- ADDRESS (STATIC / OPTIONAL) -->
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                            <i class="ri-map-pin-line align-middle fs-14"></i>
                        </span>
                    </div>
                    <div>---</div>
                </div>
            </div>
        </div>

        <!-- ADDITIONAL INFORMATION -->
        <div class="p-4 border-bottom border-block-end-dashed">
            <p class="fs-14 mb-2 me-4 fw-semibold">Additional Information :</p>

            <div>
                <!-- ROLE -->
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                            <i class="ri-user-star-line align-middle fs-14"></i>
                        </span>
                    </div>
                    <div id="faculty_role">---</div>
                </div>

                <!-- FACULTY TYPE -->
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                            <i class="ri-briefcase-line align-middle fs-14"></i>
                        </span>
                    </div>
                    <div id="faculty_type">---</div>
                </div>

                <!-- GENDER -->
                <div class="d-flex align-items-center mb-0">
                    <div class="me-2">
                        <span class="avatar avatar-sm avatar-rounded bg-light text-muted">
                            <i class="ri-men-line align-middle fs-14"></i>
                        </span>
                    </div>
                    <div id="faculty_gender">---</div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End:: Contact Details Offcanvas -->



</div>
