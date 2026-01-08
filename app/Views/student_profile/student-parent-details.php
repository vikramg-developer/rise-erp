<div class="tab-pane fade border-0 p-0" id="parentdetails-tab-pane" role="tabpanel"
     aria-labelledby="parentdetails-tab-pane" tabindex="0">
    <div class="p-4">
        <p class="mb-1 fw-semibold text-muted op-5 fs-20">03</p>
        <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
            <div><?= lang('App.parent'); ?> <?= lang('App.details'); ?> :</div>
        </div>
        <form id="student-parentdetails-form">
            <div class="row gy-4">
                <!--Student Father Name-->
                <div class="col-xl-4">
                    <label for="student_father_name" class="form-label"><?= lang('App.father'); ?> <?= lang('App.name'); ?></label>
                    <input type="text" class="form-control" id="student_father_name" placeholder="<?= lang('App.father'); ?> <?= lang('App.name'); ?>" name="student_first_name"onkeypress="return isAlphaKey(event)"value="TUKARAM"readonly>
                    <small class="text-danger" id="student_father_name_error" style="display:none;"></small>

                </div>
                <!--Student Mother Name-->
                <div class="col-xl-4">
                    <label for="student_mother_name" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.name'); ?></label>
                    <input type="text" class="form-control" id="student_mother_name" name="student_mother_name"placeholder="<?= lang('App.mother'); ?> <?= lang('App.name'); ?>" onkeypress="return isAlphaKey(event)"value="">
                    <small class="text-danger" id="student_mother_name_error" style="display:none;"></small>

                </div>
                <!--Student Mother Contact-->
                <div class="col-xl-4">
                    <label for="student_mother_contact_no" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></label>
                    <input type="text" class="form-control" id="student_mother_contact_no" name="student_mother_contact_no"placeholder="<?= lang('App.contact'); ?> <?= lang('App.number'); ?>" value=""required>
                    <small class="text-danger" id="student_mother_contact_no_error" style="display:none;"></small>

                </div>
                <!--Student Father Contact-->
                <div class="col-xl-4">
                    <label for="student_father_contact_no" class="form-label"><?= lang('App.father'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></label>
                    <input type="text" class="form-control" id="student_father_contact_no" name="student_father_contact_no"placeholder="<?= lang('App.contact'); ?> <?= lang('App.number'); ?>" value=""required>
                    <small class="text-danger" id="student_father_contact_no_error" style="display:none;"></small>

                </div>
                <!--Student Father Occupation-->
                <div class="col-xl-4">
                    <label for="student_father_occupation" class="form-label"><?= lang('App.father'); ?> <?= lang('App.occupation'); ?> </label>
                    <input type="text" class="form-control" id="student_father_occupation" name="student_father_occupation"placeholder="<?= lang('App.father'); ?> <?= lang('App.occupation'); ?>" value=""required>
                    <small class="text-danger" id="student_father_occupation_error" style="display:none;"></small>

                </div>
                <!--Student Mother Occupation-->
                <div class="col-xl-4">
                    <label for="student_mother_occupation" class="form-label"><?= lang('App.mother'); ?> <?= lang('App.occupation'); ?> </label>
                    <input type="text" class="form-control" id="student_mother_occupation" name="student_mother_occupation"placeholder="<?= lang('App.mother'); ?> <?= lang('App.occupation'); ?>" value=""required>
                    <small class="text-danger" id="student_mother_occupation_error" style="display:none;"></small>

                </div>
                <!--Student Family Income-->
                <div class="col-xl-4">
                    <label for="student_family_income" class="form-label"><?= lang('App.family'); ?> <?= lang('App.income'); ?> </label>
                    <input type="text" class="form-control" id="student_family_income" name="student_family_income"placeholder="<?= lang('App.family'); ?> <?= lang('App.income'); ?>" value=""required>
                    <small class="text-danger" id="student_family_income_error" style="display:none;"></small>

                </div>
            </div>


    </div>
    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
        <button type="button" class="btn btn-success" id="personal-details-trigger">Submit</button>
    </div>
</form>

</div>