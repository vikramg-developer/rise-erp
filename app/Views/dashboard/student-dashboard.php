<div class="container-fluid">


    <!-- Start::page-header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <p class="fw-semibold fs-18 mb-0">Welcome back, <?= session('username'); ?> !</p>
            <span class="fs-semibold text-muted "><?= timeGreeting(); ?></span>

        </div>

        <!--        <div class="btn-list mt-md-0 mt-2">
                    <button type="button" class="btn btn-primary btn-wave">
                        <i class="ri-filter-3-fill me-2 align-middle d-inline-block"></i>Filters
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-wave">
                        <i class="ri-upload-cloud-line me-2 align-middle d-inline-block"></i>Export
                    </button>
                </div>-->
    </div>
    <!-- End::page-header -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xxl-4 col-xl-4">
            <div class="card custom-card overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-sm-flex align-items-top p-4 border-bottom-0 main-profile-cover">
                        <div>
                            <span class="avatar avatar-xxl avatar-rounded online me-3">
                                <img src="<?php echo base_url('assets/images/faces/images.png'); ?>" alt="">
                            </span>
                        </div>
                        <div class="flex-fill main-profile-info">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-semibold mb-1 text-fixed-white"><?= session('username'); ?></h6>
                                <a href="<?php echo base_url('studentProfile'); ?>"> 
                                    <button class="btn btn-light btn-wave">
                                        <i class="ri-eye-line me-1 align-middle d-inline-block"></i> </button></a>
                            </div>
                            <p class="mb-1 text-muted text-fixed-white op-7"><?= session('role_name'); ?></p>
                            <p class="fs-12 text-fixed-white mb-4 op-5">  
                                <span class="me-3"><i class="ri-building-line me-1 align-middle"></i>B.com</span> 
                                <span><i class="ri-map-pin-line me-1 align-middle"></i>Third Year</span> 
                            </p>
                            <div class="d-flex mb-0">
                                <div class="me-4">
                                    <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0"><?= session('rise_no'); ?></p>
                                    <p class="mb-0 fs-11 op-5 text-fixed-white"><?= lang('App.rise'); ?> <?= lang('App.no'); ?></p>
                                </div>
                                <!--                                <div class="me-4">
                                                                    <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0"><?lang('App.course'); ?></p>
                                                                    <p class="mb-0 fs-11 op-5 text-fixed-white">Followers</p>
                                                                </div>
                                                                <div class="me-4">
                                                                    <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0"><?lang('App.year'); ?></p>
                                                                    <p class="mb-0 fs-11 op-5 text-fixed-white">Following</p>
                                                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-bottom border-block-end-dashed">
                        <div class="mb-4">
                            <p class="fs-15 mb-2 fw-semibold">Achievement :</p>
                            <p class="fs-12 text-muted op-7 mb-0">
                                <!--I am <b class="text-default">Sonya Taylor,</b> here by conclude that,i am the founder and managing director of the prestigeous company name laugh at all and acts as the cheif executieve officer of the company.-->
                            </p>
                        </div>   
                        <div class="mb-0">
<!--                            <p class="fs-15 mb-2 fw-semibold">Links :</p>
                            <div class="mb-0">
                                <p class="mb-1">
                                    <a href="https://www.spruko.com/" class="text-primary"><u>https://www.spruko.com/</u></a>
                                </p>
                                <p class="mb-0">
                                    <a href="https://themeforest.net/user/spruko/portfolio" class="text-primary"><u>https://themeforest.net/user/spruko/portfolio</u></a>
                                </p>
                            </div>-->
                        </div>
                    </div>  
                    <div class="p-4 border-bottom border-block-end-dashed">
                        <p class="fs-15 mb-2 me-4 fw-semibold">Contact Information :</p>
                        <div class="text-muted">
                            <p class="mb-2">
                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                    <i class="ri-mail-line align-middle fs-14"></i>
                                </span>
                                sonyataylor2531@gmail.com
                            </p>
                            <p class="mb-2">
                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                    <i class="ri-phone-line align-middle fs-14"></i>
                                </span>
                                +(555) 555-1234
                            </p>
                            <p class="mb-0">
                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                    <i class="ri-map-pin-line align-middle fs-14"></i>
                                </span>
                                MIG-1-11, Monroe Street, Georgetown, Washington D.C, USA,20071
                            </p>
                        </div>
                    </div>
                    <!--                    <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-center">
                                            <p class="fs-15 mb-2 me-4 fw-semibold">Social Networks :</p>
                                            <div class="btn-list mb-0">
                                                <button class="btn btn-sm btn-icon btn-primary-light btn-wave waves-effect waves-light">
                                                    <i class="ri-facebook-line fw-semibold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-secondary-light btn-wave waves-effect waves-light">
                                                    <i class="ri-twitter-line fw-semibold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-warning-light btn-wave waves-effect waves-light">
                                                    <i class="ri-instagram-line fw-semibold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-success-light btn-wave waves-effect waves-light">
                                                    <i class="ri-github-line fw-semibold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-danger-light btn-wave waves-effect waves-light">
                                                    <i class="ri-youtube-line fw-semibold"></i>
                                                </button>
                                            </div>
                                        </div>-->
                    <div class="p-4 border-bottom border-block-end-dashed">
                        <p class="fs-15 mb-2 me-4 fw-semibold">Skills :</p>
                        <div>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Cloud computing</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Data analysis</span>
                            </a>    
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">DevOps</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Machine learning</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Programming</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Security</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Python</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">JavaScript</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Ruby</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">PowerShell</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">Statistics</span>
                            </a>
                            <a href="javascript:void(0);">
                                <span class="badge bg-light text-muted m-1">SQL</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xxl-8 col-xl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                         <!--//< view('student_registration/student-profile'); ?>-->
                        <div class="card-body p-0">
                            <div class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                                <div>
                                    <ul class="nav nav-tabs mb-0 tab-style-6 justify-content-start" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                                    data-bs-target="#personal-tab-pane" type="button" role="tab"
                                                    aria-controls="personal-tab-pane" aria-selected="true"><i
                                                    class="ri-home-8-line me-1 align-middle d-inline-block"></i><?= lang('App.personal'); ?> <?= lang('App.details'); ?></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="address-tab" data-bs-toggle="tab"
                                                    data-bs-target="#address-tab-pane" type="button" role="tab"
                                                    aria-controls="address-tab-pane" aria-selected="false"><i
                                                    class="ri-map-pin-line me-1 align-middle d-inline-block"></i><?= lang('App.address'); ?> <?= lang('App.details'); ?></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="parent-tab" data-bs-toggle="tab"
                                                    data-bs-target="#parent-tab-pane" type="button" role="tab"
                                                    aria-controls="parent-tab-pane" aria-selected="false"><i
                                                    class="ri-parent-line me-1 align-middle d-inline-block"></i><?= lang('App.parent'); ?> <?= lang('App.details'); ?></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="educational-tab" data-bs-toggle="tab"
                                                    data-bs-target="#educational-tab-pane" type="button" role="tab"
                                                    aria-controls="educational-tab-pane" aria-selected="false"><i
                                                    class="ri-graduation-cap-line me-1 align-middle d-inline-block"></i><?= lang('App.educational'); ?> <?= lang('App.details'); ?></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="document-tab" data-bs-toggle="tab"
                                                    data-bs-target="#document-tab-pane" type="button" role="tab"
                                                    aria-controls="document-tab-pane" aria-selected="false"><i
                                                    class="ri-file-upload-line me-1 align-middle d-inline-block"></i><?= lang('App.document'); ?> <?= lang('App.details'); ?></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="subject-tab" data-bs-toggle="tab"
                                                    data-bs-target="#subject-tab-pane" type="button" role="tab"
                                                    aria-controls="subject-tab-pane" aria-selected="false"><i
                                                    class="ri-checkbox-line me-1 align-middle d-inline-block"></i><?= lang('App.subject'); ?>  <?= lang('App.details'); ?></button>
                                        </li>
                                    </ul>
                                </div>   
                                <div>
                                    <p class="fw-semibold mb-2">Profile 60% completed - <a href="javascript:void(0);" class="text-primary fs-12">Finish now</a></p>
                                    <div class="progress progress-xs progress-animate">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                                    </div>
                                </div> 
                            </div>
                            <div class="p-3">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane show active fade p-0 border-0" id="personal-tab-pane"
                                         role="tabpanel" aria-labelledby="personal-tab" tabindex="0">
                                        <div class="row gy-4">
                                            <div class="col-xl-4">
                                                <label for="student-first-name" class="form-label"><?= lang('App.first'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="student-first-name" placeholder="<?= lang('App.first'); ?> <?= lang('App.name'); ?>" name="student-first-name"onkeypress="return isAlphaKey(event)"value="NAGESH"readonly>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-middle-name" class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="student-middle-name" name="student-middle-name"placeholder="<?= lang('App.middle'); ?> <?= lang('App.name'); ?>" onkeypress="return isAlphaKey(event)"value="TUKARAM"readonly>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-last-name" class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="student-last-name" name="student-last-name"placeholder="<?= lang('App.last'); ?> <?= lang('App.name'); ?>"onkeypress="return isAlphaKey(event)" value="SHINDE"readonly>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-rise-no" class="form-label"><?= lang('App.rise'); ?> <?= lang('App.number'); ?></label>
                                                <input type="text" class="form-control" id="student-rise-no" name="student-last-name"placeholder="<?= lang('App.rise'); ?> <?= lang('App.number'); ?>" value="S202610100001"readonly>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student_aadhar" class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?></label>
                                                <input type="text" class="form-control required-input" id="student_aadhar" name="student_aadhar"  maxlength="12" minlength="12" placeholder="<?= lang('App.aadhar'); ?> <?= lang('App.no'); ?>"onkeypress="return isNumber(event)"value="123456789112"readonly>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-email" class="form-label"><?= lang('App.email'); ?></label>
                                                <input type="email" class="form-control" id="student-email" name="student-email"placeholder="<?= lang('App.email'); ?> "value=""required>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.gender'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="1"><?= lang('App.male'); ?></option>
                                                    <option value="2"><?= lang('App.female'); ?></option>
                                                    <option value="3"><?= lang('App.transgender'); ?></option>
                                                </select>
                                            </div>
                                            <!--                                        <div class="card-body ">
                                                                                        <select class="js-example-basic-single" name="state">
                                                                                            <option value="s-1">Selection-1</option>
                                                                                            <option value="s-2">Selection-2</option>
                                                                                            <option value="s-3">Selection-3</option>
                                                                                            <option value="s-4">Selection-4</option>
                                                                                            <option value="s-5">Selection-5</option>
                                                                                        </select>
                                                                                    </div>-->
                                            <div class="col-xl-4">
                                                <label for="student-birthdate" class="form-label"><?= lang('App.blood'); ?> <?= lang('App.group'); ?></label>
                                                <input type="text" class="form-control" id="student-birthdate" placeholder="<?= lang('App.blood'); ?> <?= lang('App.group'); ?>"name="student-bloodgroup" value=""required>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-birthplace" class="form-label"><?= lang('App.birth'); ?> <?= lang('App.place'); ?></label>
                                                <input type="text" class="form-control" id="student-birthplace" placeholder="<?= lang('App.birth'); ?> <?= lang('App.place'); ?>"name="student-birthplace" value=""required>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-bloodgroup" class="form-label"><?= lang('App.birth'); ?> <?= lang('App.date'); ?></label>
                                                <input type="date" class="form-control"  id="date"placeholder="<?= lang('App.birth'); ?> <?= lang('App.date'); ?>"name="student-bloodgroup" value=""required>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.religion'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="1">Hindu</option>
                                                    <option value="2">Muslim</option>
                                                    <option value="2">Christian</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.caste'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="1">Hindu</option>
                                                    <option value="2">Muslim</option>
                                                    <option value="2">Christian</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.subcaste'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="1">Maratha</option>
                                                    <option value="2">Muslim</option>
                                                    <option value="2">Parsi</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.nationality'); ?> </label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="1">Indian</option>

                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.marital'); ?> <?= lang('App.status'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="single">Unmarried</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.minority'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.physical'); ?> <?= lang('App.handicap'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-4">
                                                <label for="student-gender" class="form-label"><?= lang('App.category'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                    <option value="1">OPEN</option>
                                                    <option value="2">OBC</option>
                                                    <option value="3">SC</option>
                                                    <option value="3">ST</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="tab-pane fade p-0 border-0" id="address-tab-pane"
                                         role="tabpanel" aria-labelledby="address-tab" tabindex="0">
                                        <!--Address Details START-->

                                        <div class="row gy-4">
                                            <div class="col-xl-10">
                                                <label for="student-permanant-address" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.address'); ?></label>
                                                <textarea class="form-control" aria-label="With textarea"id="student-permanant-address" name="student-permanant-address"></textarea>                                       
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-permanent-pincode" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?></label>
                                                <input type="text" class="form-control" id="student-permanent-pincode" name="student-permanent-pincode"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?>" value="">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-permanent-country" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.country'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-country"name="student-permanent-country"required>
                                                    <option value="1">India</option>
                                                    <option value="2">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-permanent-state" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.state'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-state"name="student-permanent-state"required>
                                                    <option value="1">Maharashtra</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-permanent-taluka" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.taluka'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-taluka"name="student-permanent-taluka"required>
                                                    <option value="1">Satara</option>
                                                    <option value="1">Wai</option>

                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-permanent-district" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.district'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-district"name="student-permanent-district"required>
                                                    <option value="1">Satara</option>
                                                </select>
                                            </div>


                                            <span><p class="mb-3 px-0 text-muted">Same as Permanant Address</p>
                                                <input class="form-check-input ms-2" type="checkbox" value="" checked=""></span>

                                            <div class="col-xl-10">
                                                <label for="student-current-address" class="form-label"><?= lang('App.current'); ?> <?= lang('App.address'); ?></label>
                                                <textarea class="form-control" aria-label="With textarea"id="student-current-address" name="student-current-address"></textarea>                                       
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-current-pincode" class="form-label"><?= lang('App.current'); ?> <?= lang('App.pincode'); ?></label>
                                                <input type="text" class="form-control" id="student-current-pincode" name="student-current-pincode"placeholder="<?= lang('App.current'); ?> <?= lang('App.pincode'); ?>" value="">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-current-country" class="form-label"><?= lang('App.current'); ?> <?= lang('App.country'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-current-country"name="student-current-country"required>
                                                    <option value="1">India</option>
                                                    <option value="2">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-current-state" class="form-label"><?= lang('App.current'); ?> <?= lang('App.state'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-current-state"name="student-current-state"required>
                                                    <option value="1">Maharashtra</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-current-taluka" class="form-label"><?= lang('App.current'); ?> <?= lang('App.taluka'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-current-taluka"name="student-current-taluka"required>
                                                    <option value="1">Satara</option>
                                                    <option value="1">Wai</option>

                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-current-district" class="form-label"><?= lang('App.current'); ?> <?= lang('App.district'); ?></label>
                                                <select class="form-control" data-trigger name="choices-single-default" id="student-current-district"name="student-current-district"required>
                                                    <option value="1">Satara</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <!--Address Details END-->





                                    <div class="tab-pane fade p-0 border-0" id="parent-tab-pane"
                                         role="tabpanel" aria-labelledby="parent-tab" tabindex="0">
                                        <div class="row gy-4">
                                            <div class="col-xl-4">
                                                <label for="student-father-name" class="form-label"><?= lang('App.father'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="student-father-name" placeholder="<?= lang('App.father'); ?> <?= lang('App.name'); ?>" name="student-first-name"onkeypress="return isAlphaKey(event)"value="TUKARAM"readonly>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-mother-name" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="student-mother-name" name="student-mother-name"placeholder="<?= lang('App.mother'); ?> <?= lang('App.name'); ?>" onkeypress="return isAlphaKey(event)"value="">
                                            </div>

                                            <div class="col-xl-4">
                                                <label for="student-mother-contactno" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></label>
                                                <input type="text" class="form-control" id="student-mother-contactno" name="student-mother-contactno"placeholder="<?= lang('App.contact'); ?> <?= lang('App.number'); ?>" value=""required>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-father-contactno" class="form-label"><?= lang('App.father'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></label>
                                                <input type="text" class="form-control" id="student-father-contactno" name="student-father-contactno"placeholder="<?= lang('App.contact'); ?> <?= lang('App.number'); ?>" value=""required>
                                            </div>

                                            <div class="col-xl-4">
                                                <label for="student-father-occupation" class="form-label"><?= lang('App.father'); ?> <?= lang('App.occupation'); ?> </label>
                                                <input type="text" class="form-control" id="student-father-occupation" name="student-father-occupation"placeholder="<?= lang('App.father'); ?> <?= lang('App.occupation'); ?>" value=""required>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-mother-occupation" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.occupation'); ?> </label>
                                                <input type="text" class="form-control" id="student-mother-occupation" name="student-mother-occupation"placeholder="<?= lang('App.mother'); ?> <?= lang('App.occupation'); ?>" value=""required>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="student-family-income" class="form-label"><?= lang('App.family'); ?> <?= lang('App.income'); ?> </label>
                                                <input type="text" class="form-control" id="student-family-income" name="student-family-income"placeholder="<?= lang('App.family'); ?> <?= lang('App.income'); ?>" value=""required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade p-0 border-0" id="educational-tab-pane"
                                         role="tabpanel" aria-labelledby="educational-tab" tabindex="0">


                                        <div class="p-4">

                                            <div class="table-responsive">
                                                <table class="table text-nowrap table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">I</th>
                                                            <th scope="col">College Name</th>
                                                            <th scope="col">University Name</th>
                                                            <th scope="col">Course Name</th>
                                                            <th scope="col">Year Of Passing</th>
                                                            <th scope="col">Month Of Passing</th>
                                                            <th scope="col">Date Of Passing</th>
                                                            <th scope="col">Seat No</th>
                                                            <th scope="col">Total Mark</th>
                                                            <th scope="col">Obtained Mark</th>
                                                            <th scope="col">Percentage</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>ABC College of Science</td>
                                                            <td>XYZ University</td>
                                                            <td>12th Sci</td>
                                                            <td>2022</td>
                                                            <td>May</td>
                                                            <td>15</td>
                                                            <td>CS2022101</td>
                                                            <td>600</td>
                                                            <td>510</td>
                                                            <td>85.00%</td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>ABC College of Science</td>
                                                            <td>XYZ University</td>
                                                            <td>10Th</td>
                                                            <td>2020</td>
                                                            <td>June</td>
                                                            <td>20</td>
                                                            <td>ME2021098</td>
                                                            <td>800</td>
                                                            <td>640</td>
                                                            <td>80.00%</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0 border-0" id="document-tab-pane"
                                         role="tabpanel" aria-labelledby="document-tab" tabindex="0">

                                        <div class="p-4">
                                            <p class="mb-1 fw-semibold text-muted op-5 fs-20">05</p>
                                            <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                                <div><?= lang('App.document'); ?> <?= lang('App.details'); ?> :</div>
                                                <div class="mt-sm-0 mt-2">
                                                    <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modal-new-document"><i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i><?= lang('App.add'); ?>  <?= lang('App.document'); ?> <?= lang('App.details'); ?> </button>
                                                    <div class="modal fade"  id="modal-new-document" tabindex="-1" aria-labelledby="modal-new-document" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="staticBackdropLabel"><?= lang('App.add'); ?> <?= lang('App.document'); ?> <?= lang('App.details'); ?>
                                                                    </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row gy-3">
                                                                        <div class="col-xl-6">
                                                                            <label for="student-gender" class="form-label"><?= lang('App.document'); ?> <?= lang('App.name'); ?></label>
                                                                            <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                                                <option value="1">Student Photo</option>
                                                                                <option value="2">Student Sign</option>
                                                                                <option value="3">Student Aadharcard</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <label for="fullname-new" class="form-label">Document Name</label>
                                                                            <input type="file" class="form-control" id="fullname-new" placeholder="School/College Name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-success">Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table text-nowrap table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Document Name</th>
                                                            <th scope="col">Document Image</th>
                                                            <!--<th scope="col">Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Student Photo</td>
                                                            <td> <img src="<?php echo base_url('assets/images/faces/images.png'); ?>"height="80"width="80" alt=""></td>
        <!--                                                    <td>
                                                                <div class="hstack gap-2 flex-wrap">
                                                                    <a href="javascript:void(0);" class="text-info fs-14 lh-1"><i
                                                                            class="ri-edit-line"></i></a>
                                                                    <a href="javascript:void(0);" class="text-danger fs-14 lh-1"><i
                                                                            class="ri-delete-bin-5-line"></i></a>
                                                                </div>
                                                            </td>-->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>



                                    </div>
                                    <div class="tab-pane fade p-0 border-0" id="subject-tab-pane"
                                         role="tabpanel" aria-labelledby="subject-tab" tabindex="0">
                                        <!--subject Details START-->


                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--End::row-1 -->
<div class="container-fluid">
<!-- Start::row-1 -->
<div class="row">
    <div class="col-xxl-7 col-xl-7 col-lg-12">
        <div class="row">

            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Attendance Details</div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm btn-wave">1M</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">6M</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">1Y</button>
                            <button type="button" class="btn btn-primary-light btn-sm btn-wave">All</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="courses-earnings"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-5 col-xl-5 col-lg-12">

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Upcoming Events
                        </div>
                        <div>
                            <button type="button" class="btn btn-light btn-sm">View All</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 personal-upcoming-events">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded bg-light">
                                            <i class="bi bi-calendar2-heart fs-16 text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Freshers  <span class="text-primary fw-semibold">2024-2025</span></span>
                                        <span class="d-block text-muted fs-12">2 Hours</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary-transparent">11-06-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/2.jpg'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span><span class="text-primary fw-semibold"> </span>National Seminar on AI & Global Governance</span>
                                        <span class="d-block text-muted fs-12">5 Hours</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-success-transparent">15-07-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded bg-light">
                                            <i class="bi bi-compass fs-16 text-pink"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Holiday Trip To Italy</span>
                                        <span class="d-block text-muted fs-12">1 Week</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-danger-transparent">20-08-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded bg-light">
                                            <i class="bi bi-balloon-heart fs-16 text-success"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>AR-VR Bootcamp Workshop</span>
                                        <span class="d-block text-muted fs-12">1 Day</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-secondary-transparent">1-09-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/7.jpg'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Sports meets & competitions <span class="text-primary fw-semibold"></span></span>
                                        <span class="d-block text-muted fs-12">6 days</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning-transparent">15-10-2024</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/7.jpg'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <span>Online Workshop on Research Writing <span class="text-primary fw-semibold"></span></span>
                                        <span class="d-block text-muted fs-12">1 hour</span>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning-transparent">01-11-2024</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--End::row-1 -->
<!-- Start::row-3 -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Academic Details
                </div>
                <div class="d-flex flex-wrap">
                    <div class="me-3 my-1">
                        <input class="form-control form-control-sm" type="text" placeholder="Search Here" aria-label=".form-control-sm example">
                    </div>
                    <!--                        <div class="dropdown m-1">
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);">New</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li>
                                                </ul>
                                            </div>-->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Course</th>
                                <th scope="col">Year</th>
                                <th scope="col">Academic Year</th>
                                <th scope="col">Total Fee</th>
                                <th scope="col">Paid Fee</th>
                                <th scope="col">Pending Fee</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <div class="d-flex align-items-center lh-1">

                                        <div>B.com</div>
                                    </div>
                                </td>
                                <td>
                                    First Year
                                </td>
                                <td>
                                    2022-2023
                                </td>
                                <td>
                                    15000
                                </td>
                                <td>
                                    15000
                                </td>
                                <td>
                                    0
                                </td>
                                <td><span class="badge bg-outline-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    <div class="d-flex align-items-center lh-1">

                                        <div>B.com</div>
                                    </div>
                                </td>
                                <td>
                                    Second Year
                                </td>
                                <td>
                                    2023-2024
                                </td>
                                <td>
                                    15000
                                </td>
                                <td>
                                    14000
                                </td>
                                <td>
                                    1000
                                </td>
                                <td class="border-bottom-0"><span class="badge bg-outline-danger">Pending</span></td>

                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    <div class="d-flex align-items-center lh-1">

                                        <div>B.com</div>
                                    </div>
                                </td>
                                <td>Third Year

                                </td>
                                <td>
                                    2024-2025
                                </td>
                                <td>
                                    17000
                                </td>
                                <td>
                                    15000
                                </td>
                                <td>
                                    2000
                                </td>
                                <td class="border-bottom-0"><span class="badge bg-outline-danger">Pending</span></td>

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End::row-3 -->


</div>      