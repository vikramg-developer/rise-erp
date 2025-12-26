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
                <input type="text" class="form-control" id="student-father-name" placeholder="<?= lang('App.father'); ?> <?= lang('App.name'); ?>" name="student_first_name"onkeypress="return isAlphaKey(event)"value="TUKARAM"readonly>
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