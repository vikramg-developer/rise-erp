
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.student'); ?> <?= lang('App.profile'); ?> </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.student'); ?> <?= lang('App.profile'); ?> </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <div class="container">
        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-9">
                <div class="card custom-card">
                    <div class="card-body p-0 product-checkout">
                        <ul class="nav nav-tabs tab-style-2 d-sm-flex d-block border-bottom border-block-end-dashed" id="myTab1" role="tablist">
                            <!--Personal Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="confirmed-tab" data-bs-toggle="tab"
                                        data-bs-target="#confirm-tab-pane" type="button" role="tab"
                                        aria-controls="confirmed-tab" aria-selected="false"><i
                                        class="ri-user-3-line me-2 align-middle"></i><?= lang('App.personal'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Address Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="order-tab" data-bs-toggle="tab"
                                        data-bs-target="#order-tab-pane" type="button" role="tab"
                                        aria-controls="order-tab" aria-selected="true"><i
                                        class="ri-map-pin-line me-2 align-middle"></i><?= lang('App.address'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Parent Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipped-tab" data-bs-toggle="tab"
                                        data-bs-target="#shipped-tab-pane" type="button" role="tab"
                                        aria-controls="shipped-tab" aria-selected="false"><i
                                        class="ri-parent-line me-2 align-middle"></i><?= lang('App.parent'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Educational Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="delivered-tab" data-bs-toggle="tab"
                                        data-bs-target="#delivery-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false"><i
                                        class="ri-book-open-line me-2 align-middle"></i><?= lang('App.educational'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Document Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="document-tab" data-bs-toggle="tab"
                                        data-bs-target="#document-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false"><i
                                        class="ri-upload-2-line me-2 align-middle"></i><?= lang('App.document'); ?> <?= lang('App.details'); ?></button>
                            </li>
                            <!--Course Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="delivered-tab" data-bs-toggle="tab"
                                        data-bs-target="#applycourse-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false"><i
                                        class="ri-file-edit-line me-2 align-middle"></i><?= lang('App.apply'); ?> for <?= lang('App.course'); ?></button>
                            </li>
                            <!--Payment Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab"
                                        data-bs-target="#payment-tab-pane" type="button" role="tab"
                                        aria-controls="delivered-tab" aria-selected="false">
                                    <i class="ri-money-pound-circle-line me-2 align-middle"></i><?= lang('App.payment'); ?>  <?= lang('App.details'); ?></button>
                            </li>

                            <!--Declaration Details TAB-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="declaration-tab" data-bs-toggle="tab"
                                        data-bs-target="#declaration-tab-pane" type="button" role="tab"
                                        aria-controls="declaration-tab" aria-selected="false">
                                    <i class="ri-checkbox-line me-2 align-middle"></i><?= lang('App.declaration'); ?></button>
                            </li>

                            <!--Print  form TAB-->
                            <!--                            <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="formprint-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#formprint-tab-pane" type="button" role="tab"
                                                                    aria-controls="formprint-tab" aria-selected="false">
                                                                <i class="ri-printer-line me-2 align-middle"></i><?= lang('App.form'); ?>  <?= lang('App.print'); ?></button>
                                                        </li>-->
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <!--Personal Details START-->

                            <div class="tab-pane show active fade border-0 p-0" id="confirm-tab-pane"
                                 role="tabpanel" aria-labelledby="confirm-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">01</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.personal'); ?> <?= lang('App.details'); ?> :</div>
                                    </div>
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
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-success" id="personal-details-trigger">Submit</button>
                                </div>
                            </div>
                            <!--Personal Details END-->
                            <!--Address Details START-->
                            <div class="tab-pane fade  border-0 p-0" id="order-tab-pane" role="tabpanel"aria-labelledby="order-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">02</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.address'); ?> <?= lang('App.details'); ?> :</div>
                                        <div class="mt-sm-0 mt-2">

                                        </div>
                                    </div>
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
                                <!--                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                                                    <button type="button" class="btn btn-success-light" id="personal-details-trigger">Personal Details<i class="ri-user-3-line ms-2 align-middle d-inline-block"></i></button>
                                                                </div>-->
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-success" id="personal-details-trigger">Submit</button>
                                </div>
                            </div>
                            <!--Address Details END-->

                            <!--Parent Details START-->
                            <div class="tab-pane fade border-0 p-0" id="shipped-tab-pane" role="tabpanel"
                                 aria-labelledby="shipped-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">03</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.parent'); ?> <?= lang('App.details'); ?> :</div>
                                    </div>
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
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-success" id="personal-details-trigger">Submit</button>
                                </div>
                                <!--                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-between">
                                                                    <button type="button" class="btn btn-danger-light m-1" id="back-personal-trigger"><i class="ri-user-3-line me-2 align-middle d-inline-block"></i>Back To Personal Info</button>
                                                                    <button type="button" class="btn btn-success-light m-1" id="continue-payment-trigger">Continue Payment<i class="bi bi-credit-card-2-front align-middle ms-2 d-inline-block"></i></button>
                                                                </div>-->
                            </div>

                            <!--Parent Details END-->
                            <!--Educational Details START-->
                            <div class="tab-pane fade border-0 p-0" id="delivery-tab-pane" role="tabpanel"
                                 aria-labelledby="delivery-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">04</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.educational'); ?> <?= lang('App.details'); ?> :</div>
                                        <div class="mt-sm-0 mt-2">
                                            <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modal-new-address"><i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i><?= lang('App.add'); ?>  <?= lang('App.educational'); ?> <?= lang('App.details'); ?> </button>
                                            <div class="modal fade"  id="modal-new-address" tabindex="-1" aria-labelledby="modal-new-address" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="staticBackdropLabel"><?= lang('App.add'); ?> <?= lang('App.educational'); ?> <?= lang('App.details'); ?>
                                                            </h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row gy-3">
                                                                <div class="col-xl-6">
                                                                    <label for="fullname-new" class="form-label">School/College Name</label>
                                                                    <input type="text" class="form-control" id="fullname-new" placeholder="School/College Name">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label for="email-new" class="form-label">University Name</label>
                                                                    <input type="email" class="form-control" id="email-new" placeholder="University Name">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label for="email-new" class="form-label">Date Of Passing</label>
                                                                    <input type="email" class="form-control" id="email-new" placeholder="Date Of Passing">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label for="email-new" class="form-label">Month Of Passing</label>
                                                                    <input type="email" class="form-control" id="email-new" placeholder="Month Of Passing">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label for="email-new" class="form-label">Seat No</label>
                                                                    <input type="email" class="form-control" id="email-new" placeholder="Seat No">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label for="email-new" class="form-label">Total Marks</label>
                                                                    <input type="email" class="form-control" id="email-new" placeholder="Total Marks">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label for="email-new" class="form-label">Obtained Marks</label>
                                                                    <input type="email" class="form-control" id="email-new" placeholder="Obtained Marks">
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <label for="email-new" class="form-label">Percentage </label>
                                                                    <input type="email" class="form-control" id="email-new" placeholder="Percentage">
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
                            <!--Educational Details END-->
                            <!--Document Details START-->

                            <div class="tab-pane fade border-0 p-0" id="document-tab-pane" role="tabpanel"
                                 aria-labelledby="document-tab-pane" tabindex="0">
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
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Student Photo</td>
                                                    <td> <img src="<?php echo base_url('assets/images/faces/images.png'); ?>"height="80"width="80" alt=""></td>
                                                    <td>
                                                        <div class="hstack gap-2 flex-wrap">
                                                            <a href="javascript:void(0);" class="text-info fs-14 lh-1"><i
                                                                    class="ri-edit-line"></i></a>
                                                            <a href="javascript:void(0);" class="text-danger fs-14 lh-1"><i
                                                                    class="ri-delete-bin-5-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>
                            <!--Document Details END-->
                            <!--Course Details START-->
                            <div class="tab-pane fade border-0 p-0" id="applycourse-tab-pane" role="tabpanel"
                                 aria-labelledby="applycourse-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">06</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.apply'); ?> for <?= lang('App.course'); ?> :</div>
                                        <div class="mt-sm-0 mt-2">
                                            <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modal-new-applycourse"><i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i><?= lang('App.add'); ?>  <?= lang('App.course'); ?> <?= lang('App.details'); ?> </button>
                                            <div class="modal fade"  id="modal-new-applycourse" tabindex="-1" aria-labelledby="modal-new-address" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="staticBackdropLabel"><?= lang('App.add'); ?> <?= lang('App.course'); ?> <?= lang('App.details'); ?>
                                                            </h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row gy-3">
                                                                <div class="col-xl-6">
                                                                    <label for="student-gender" class="form-label"><?= lang('App.course'); ?> <?= lang('App.name'); ?></label>
                                                                    <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                                        <option value="1">B.com</option>
                                                                        <option value="2">B.sc</option>
                                                                        <option value="3">M.com</option>
                                                                        <option value="4">M.sc</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label for="student-gender" class="form-label"><?= lang('App.year'); ?> <?= lang('App.name'); ?></label>
                                                                    <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                                                        <option value="1">First Year</option>
                                                                        <option value="2">Second Year</option>
                                                                        <option value="3">Third Year</option>
                                                                    </select>
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
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Year Name</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>1</td>
                                                    <td>B.com</td>
                                                    <td>First Year</td>
                                                    <td>
                                                        <div class="hstack gap-2 flex-wrap">
                                                            <a href="javascript:void(0);" class="text-info fs-14 lh-1"><i
                                                                    class="ri-edit-line"></i></a>
                                                            <a href="javascript:void(0);" class="text-danger fs-14 lh-1"><i
                                                                    class="ri-delete-bin-5-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>
                            <!--Course Details END-->
                            <!--Payment Details START-->
                            <div class="tab-pane fade border-0 p-0" id="payment-tab-pane" role="tabpanel"
                                 aria-labelledby="payment-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">07</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.payment'); ?>  <?= lang('App.details'); ?> :</div>
                                        <div class="mt-sm-0 mt-2">
                                            <div class="modal fade" id="modal-new-payment" tabindex="-1"aria-labelledby="modal-new-payment" data-bs-keyboard="false"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content text-center">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-new-payment">Scan to pay
                                                        </h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <h6>STATE BANK OF INDIA</h6>
                                                                        <img src="<?php echo base_url('assets/images/ecommerce/png/qr_code.png'); ?>" height="20%" width="40%"alt="">

                                                            <p>Scan to Pay</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-success">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
<!--                                            <div class="modal fade"  id="modal-new-payment" tabindex="-1" aria-labelledby="modal-new-payment" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="staticBackdropLabel">Scan to pay    
                                                            </h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body d-flex justify-content-center align-items-center" >
                                                            <div class="row gy-3 justify-content-center text-center">
                                                                <div class="mb-3">

                                                                    <h6 class="fw-bold mb-1">STATE BANK OF INDIA</h6>

                                                                    <img src="<?php echo base_url('assets/images/ecommerce/png/qr_code.png'); ?>" 
                                                                         height="20%" width="40%" 
                                                                         alt="" class="img-fluid my-2">

                                                                    <p class="mb-0 fw-semibold">Scan to Pay</p>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-success">Proceed
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Year Name</th>
                                                    <th scope="col">Fees</th>
                                                    <th scope="col">Pay</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>1</td>
                                                    <td>B.com</td>
                                                    <td>First Year</td>
                                                    <td>10000</td>
                                                    <td>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-new-payment"class="btn btn-success">Pay
                                                        </button>

                                                    </td>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>
                            <!--Payment Details END-->

                            <!--Declaration Details START-->
                            <div class="tab-pane fade border-0 p-0" id="declaration-tab-pane" role="tabpanel"
                                 aria-labelledby="declaration-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">07</p>

                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.declaration'); ?>  <?= lang('App.details'); ?> :</div>

                                    </div>
                                    <input class="form-check-input ms-2" type="checkbox" value="" checked=""></span>

                                    <p>I hereby declare that all the information provided by me in this registration form is true, complete, and accurate to the best of my knowledge. I understand that providing any false or misleading information may result in the cancellation of my registration and may lead to disciplinary action as per the rules and regulations of the institution.</p>
                                    <p>I also agree to abide by all the policies, rules, and code of conduct of the institution throughout the duration of my study.</p>
                                    <p><b>Student Name:NAGESH TUKARAM SHINDE.</b></p>
                                    <p><b>Date:9-12-2025</b></p>
                                    <p><b>Place:Satara</b></p>


                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-success" id="personal-details-trigger">Submit</button>
                                </div>

                            </div>
                            <!--Declaration Details END-->
                            <!--Form Print START-->
                            <div class="tab-pane fade border-0 p-0" id="formprint-tab-pane" role="tabpanel"
                                 aria-labelledby="formprint-tab" tabindex="0">
                                <div class="p-4" id="print-area">

                                    <!-- HEADER -->
                                    <div class="text-center mb-4">
                                        <h3 class="mb-1"><?= lang('App.student'); ?> <?= lang('App.registration'); ?> <?= lang('App.form'); ?></h3>
                                        <p class="mb-0"><?= lang('App.student'); ?> <?= lang('App.profile'); ?></p>
                                        <hr>
                                    </div>

                                    <!-- PERSONAL DETAILS -->
                                    <h5 class="mb-2"><?= lang('App.personal'); ?> <?= lang('App.details'); ?></h5>
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <th style="width: 25%;"><?= lang('App.first'); ?> <?= lang('App.name'); ?></th>
                                                <td><?= 'NAGESH'; // replace with dynamic value   ?></td>
                                                <th style="width: 25%;"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></th>
                                                <td><?= 'TUKARAM'; // replace   ?></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.last'); ?> <?= lang('App.name'); ?></th>
                                                <td><?= 'SHINDE'; // replace   ?></td>
                                                <th><?= lang('App.rise'); ?> <?= lang('App.number'); ?></th>
                                                <td><?= 'S202610100001'; // replace   ?></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?></th>
                                                <td><?= '123456789112'; // replace   ?></td>
                                                <th><?= lang('App.email'); ?></th>
                                                <td><?= ''; // email   ?></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.gender'); ?></th>
                                                <td><!-- Male/Female/Transgender --></td>
                                                <th><?= lang('App.blood'); ?> <?= lang('App.group'); ?></th>
                                                <td><!-- Blood Group --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.birth'); ?> <?= lang('App.place'); ?></th>
                                                <td><!-- Birth Place --></td>
                                                <th><?= lang('App.birth'); ?> <?= lang('App.date'); ?></th>
                                                <td><!-- Birth Date --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.religion'); ?></th>
                                                <td><!-- Religion --></td>
                                                <th><?= lang('App.caste'); ?></th>
                                                <td><!-- Caste --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.subcaste'); ?></th>
                                                <td><!-- Sub Caste --></td>
                                                <th><?= lang('App.nationality'); ?></th>
                                                <td><!-- Nationality --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.marital'); ?> <?= lang('App.status'); ?></th>
                                                <td><!-- Marital Status --></td>
                                                <th><?= lang('App.minority'); ?></th>
                                                <td><!-- Yes/No --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.physical'); ?> <?= lang('App.handicap'); ?></th>
                                                <td><!-- Yes/No --></td>
                                                <th><?= lang('App.category'); ?></th>
                                                <td><!-- OPEN/OBC/SC/ST --></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- ADDRESS DETAILS -->
                                    <h5 class="mt-4 mb-2"><?= lang('App.address'); ?> <?= lang('App.details'); ?></h5>
                                    <h6 class="mb-1"><?= lang('App.permanent'); ?> <?= lang('App.address'); ?></h6>
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <th style="width: 25%;"><?= lang('App.address'); ?></th>
                                                <td><!-- Permanent Address --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.pincode'); ?></th>
                                                <td><!-- Permanent Pincode --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.country'); ?></th>
                                                <td><!-- Permanent Country --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.state'); ?></th>
                                                <td><!-- Permanent State --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.taluka'); ?></th>
                                                <td><!-- Permanent Taluka --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.district'); ?></th>
                                                <td><!-- Permanent District --></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h6 class="mb-1 mt-3"><?= lang('App.current'); ?> <?= lang('App.address'); ?></h6>
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <th style="width: 25%;"><?= lang('App.address'); ?></th>
                                                <td><!-- Current Address --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.pincode'); ?></th>
                                                <td><!-- Current Pincode --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.country'); ?></th>
                                                <td><!-- Current Country --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.state'); ?></th>
                                                <td><!-- Current State --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.taluka'); ?></th>
                                                <td><!-- Current Taluka --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.district'); ?></th>
                                                <td><!-- Current District --></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- PARENT DETAILS -->
                                    <h5 class="mt-4 mb-2"><?= lang('App.parent'); ?> <?= lang('App.details'); ?></h5>
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <th style="width: 25%;"><?= lang('App.father'); ?> <?= lang('App.name'); ?></th>
                                                <td><?= 'TUKARAM'; // replace   ?></td>
                                                <th><?= lang('App.father'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></th>
                                                <td><!-- Father Contact --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.mother'); ?> <?= lang('App.name'); ?></th>
                                                <td><!-- Mother Name --></td>
                                                <th><?= lang('App.mother'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></th>
                                                <td><!-- Mother Contact --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.father'); ?> <?= lang('App.occupation'); ?></th>
                                                <td><!-- Father Occupation --></td>
                                                <th><?= lang('App.mother'); ?> <?= lang('App.occupation'); ?></th>
                                                <td><!-- Mother Occupation --></td>
                                            </tr>
                                            <tr>
                                                <th><?= lang('App.family'); ?> <?= lang('App.income'); ?></th>
                                                <td colspan="3"><!-- Family Income --></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- EDUCATIONAL DETAILS -->
                                    <h5 class="mt-4 mb-2"><?= lang('App.educational'); ?> <?= lang('App.details'); ?></h5>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>College Name</th>
                                                <th>University Name</th>
                                                <th>Course Name</th>
                                                <th>Year Of Passing</th>
                                                <th>Month Of Passing</th>
                                                <th>Date Of Passing</th>
                                                <th>Seat No</th>
                                                <th>Total Marks</th>
                                                <th>Obtained Marks</th>
                                                <th>%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Loop through your education records here -->
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
                                                <td>10th</td>
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

                                    <!-- DOCUMENT DETAILS -->
                                    <h5 class="mt-4 mb-2"><?= lang('App.document'); ?> <?= lang('App.details'); ?></h5>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th><?= lang('App.document'); ?> <?= lang('App.name'); ?></th>
                                                <th><?= lang('App.document'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Student Photo</td>
                                                <td><!-- You can show file name or small image if needed --></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- COURSE APPLY DETAILS -->
                                    <h5 class="mt-4 mb-2"><?= lang('App.apply'); ?> for <?= lang('App.course'); ?></h5>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                                                <th><?= lang('App.year'); ?> <?= lang('App.name'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>B.com</td>
                                                <td>First Year</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- PAYMENT DETAILS -->
                                    <h5 class="mt-4 mb-2"><?= lang('App.payment'); ?> <?= lang('App.details'); ?></h5>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                                                <th><?= lang('App.year'); ?> <?= lang('App.name'); ?></th>
                                                <th><?= lang('App.fees'); ?></th>
                                                <th><?= lang('App.payment'); ?> <?= lang('App.status'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>B.com</td>
                                                <td>First Year</td>
                                                <td>10000</td>
                                                <td><!-- Paid / Unpaid / Partially Paid --></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- DECLARATION -->
                                    <h5 class="mt-4 mb-2"><?= lang('App.declaration'); ?></h5>
                                    <p>
                                        I hereby declare that all the information provided by me in this registration form is true,
                                        complete, and accurate to the best of my knowledge. I understand that providing any false or
                                        misleading information may result in the cancellation of my registration and may lead to
                                        disciplinary action as per the rules and regulations of the institution.
                                    </p>
                                    <p>
                                        I also agree to abide by all the policies, rules, and code of conduct of the institution
                                        throughout the duration of my study.
                                    </p>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <p><strong><?= lang('App.student'); ?> <?= lang('App.name'); ?> :</strong> NAGESH TUKARAM SHINDE</p>
                                            <p><strong><?= lang('App.date'); ?> :</strong> 09-12-2025</p>
                                            <p><strong><?= lang('App.place'); ?> :</strong> Satara</p>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <p><strong><?= lang('App.student'); ?> <?= lang('App.signature'); ?> :</strong></p>
                                            <br><br>
                                            <hr class="mt-0" style="width: 60%; margin-left: auto;">
                                        </div>
                                    </div>

                                </div>

                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2" onclick="window.print();">
                                        <i class="ri-printer-line me-1 align-middle"></i> <?= lang('App.print'); ?>
                                    </button>
                                </div>
                            </div>
                            <!--Form Print END-->

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?= lang('App.student'); ?> <?= lang('App.details'); ?> 
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center border-bottom border-block-end-dashed p-3 flex-wrap">
                                    <div class="me-2">
                                        <span class="avatar avatar-lg avatar-rounded">
                                            <img src="<?php echo base_url('assets/images/faces/images.png'); ?>" alt="">
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-0">SHINDE NAGESH</p>
                                        <p class="mb-0 text-muted fs-12">nageshsinde2135@gmail.com</p>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary-transparent">Student</span>
                                    </div>
                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="fs-14 fw-semibold">Student Address :</span>
                                        <button class="btn btn-icon btn-wave btn-primary btn-sm"><i class="ri-pencil-line"></i></button>
                                    </div>
                                    <p class="mb-2 text-muted"><span class="fw-semibold text-default">City : </span>SATARA</p>
                                    <p class="mb-2 text-muted"><span class="fw-semibold text-default">State : </span>MAHARASHTRA</p>
                                    <p class="mb-2 text-muted"><span class="fw-semibold text-default">Country : </span>INDIA</p>
                                    <p class="mb-0 text-muted"><span class="fw-semibold text-default">Pincode    : </span>415001</p>
                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="mb-3">
                                        <span class="fs-14 fw-semibold">Contact Details :</span>
                                    </div>    
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default">Phone : </span>
                                        9748124632
                                    </p>

                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="mb-3">
                                        <span class="fs-14 fw-semibold">Academic  Details : </span>
                                    </div>    
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default"> Course -</span>
                                        B.COM
                                    </p>
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default"> Year -</span>
                                        FIRST YEAR
                                    </p>
                                    <p class="mb-0 text-muted">
                                        <span class="fw-semibold text-default">Academic Year :</span>
                                        2025-2026
                                    </p>
                                </div>
                                <div class="p-3 border-bottom border-block-end-dashed">
                                    <div class="mb-3">
                                        <span class="fs-14 fw-semibold">Fees  Details : </span>
                                    </div>    
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default">  </span>

                                    </p>
                                    <p class="mb-2 text-muted">
                                        <span class="fw-semibold text-default">  </span>

                                    </p>
                                    <p class="mb-0 text-muted">
                                        <span class="fw-semibold text-default"></span>

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


