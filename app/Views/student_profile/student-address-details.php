<div class="tab-pane fade  border-0 p-0" id="addresssdetails-tab-pane" role="tabpanel"aria-labelledby="addresssdetails-tab-pane" tabindex="0">
    <div class="p-4">
        <p class="mb-1 fw-semibold text-muted op-5 fs-20">02</p>
        <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
            <div><?= lang('App.address'); ?> <?= lang('App.details'); ?> :</div>
        </div>
        <form id="student-addressdetails-form">
            <div class="row gy-4">
                <!--Permanent Address-->
                <div class="col-xl-10">
                    <label for="student_permanent_address" class="form-label"> <?= lang('App.permanent'); ?> <?= lang('App.address'); ?> <span class="text-danger">*</span></label>
                    <textarea class="form-control"aria-label="With textarea"id="student_permanent_address"name="student_permanent_address"><?= esc($student_address_data['student_permanent_address'] ?? '') ?></textarea>
                    <small class="text-danger" id="student_permanent_address_error" style="display:none;"></small>
                </div>
                <!--Permanent Pincode-->
                <div class="col-xl-4">
                    <label for="student_permanent_pincode" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_permanent_pincode"name="student_permanent_pincode"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?>"value="<?= esc($student_address_data['student_permanent_pincode'] ?? '') ?>">
                    <small class="text-danger" id="student_permanent_pincode_error" style="display:none;"></small>
                </div>
                <!--Permanent Locality-->
                <div class="col-xl-4">
                    <label for="student_permanent_locality_id" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.locality'); ?> <span class="text-danger">*</span></label>
                    <select id="student_permanent_locality_id"name="student_permanent_locality_id"class="form-control js-example-basic-single"data-selected="<?= esc($student_address_data['student_permanent_locality_id'] ?? '') ?>">
                        <option value="">Select Locality</option>
                    </select>
                    <small class="text-danger" id="student_permanent_locality_id_error" style="display:none;"></small>
                </div>
                <!--Permanent Country-->
                <div class="col-xl-4">
                    <label for="student_permanent_country" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.country'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_permanent_country"name="student_permanent_country"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.country'); ?>"readonly>
                </div>
                <!--Permanent State-->
                <div class="col-xl-4">
                    <label for="student_permanent_state_id" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.state'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_permanent_state_id"name="student_permanent_state_id"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.state'); ?>"readonly>
                </div>
                <!--Permanent Taluka-->
                <div class="col-xl-4">
                    <label for="student_permanent_taluka_id" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.taluka'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_permanent_taluka_id"name="student_permanent_taluka_id"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.taluka'); ?>"readonly>
                </div>
                <!--Permanent District-->   
                <div class="col-xl-4">
                    <label for="student_permanent_district_id" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.district'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_permanent_district_id"name="student_permanent_district_id"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.district'); ?>"readonly></div>
                <!--Same As Permanent Address-->   
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="sameAsPermanentAddress">
                    <label class="form-check-label text-muted"><?= lang('App.same_as_permanent_address'); ?></label>
                </div>
                <!--Correspondence Address-->
                <div class="col-xl-10">
                    <label for="student_correspondence_address" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.address'); ?> <span class="text-danger">*</span></label>
                    <textarea class="form-control"aria-label="With textarea"id="student_correspondence_address"name="student_correspondence_address"><?= esc($student_address_data['student_correspondence_address'] ?? '') ?></textarea>
                    <small class="text-danger" id="student_correspondence_address_error" style="display:none;"></small>
                </div>
                <!--Correspondence Pincode-->
                <div class="col-xl-4">
                    <label for="student_correspondence_pincode" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.pincode'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_correspondence_pincode" name="student_correspondence_pincode"placeholder="<?= lang('App.correspondence'); ?> <?= lang('App.pincode'); ?>"value="<?= esc($student_address_data['student_correspondence_pincode'] ?? '') ?>">
                    <small class="text-danger" id="student_correspondence_pincode_error" style="display:none;"></small>
                </div>
                <!--Correspondence Locality-->
                <div class="col-xl-4">
                    <label for="student_correspondence_locality_id" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.locality'); ?> <span class="text-danger">*</span></label>
                    <select id="student_correspondence_locality_id"name="student_correspondence_locality_id"class="form-control js-example-basic-single"data-selected="<?= esc($student_address_data['student_correspondence_locality_id'] ?? '') ?>">
                        <option value="">Select Locality</option>
                    </select>
                    <small class="text-danger" id="student_correspondence_locality_id_error" style="display:none;"></small>
                </div>
                <!--correspondence Country-->
                <div class="col-xl-4">
                    <label for="student_correspondence_country" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.country'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_correspondence_country"name="student_correspondence_country"placeholder="<?= lang('App.correspondence'); ?> <?= lang('App.country'); ?>"readonly>
                </div>
                <!--correspondence State-->
                <div class="col-xl-4">
                    <label for="student_correspondence_state_id" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.state'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_correspondence_state_id"name="student_correspondence_state_id"placeholder="<?= lang('App.correspondence'); ?> <?= lang('App.state'); ?>"readonly>
                </div>
                <!--correspondence Taluka-->
                <div class="col-xl-4">
                    <label for="student_correspondence_taluka_id" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.taluka'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_correspondence_taluka_id"name="student_correspondence_taluka_id"placeholder="<?= lang('App.correspondence'); ?> <?= lang('App.taluka'); ?>"readonly>
                </div>
                <!--correspondence District-->   
                <div class="col-xl-4">
                    <label for="student_correspondence_district_id" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.district'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_correspondence_district_id"name="student_correspondence_district_id"placeholder="<?= lang('App.correspondence'); ?> <?= lang('App.district'); ?>"readonly>
                </div>
            </div>
            <hr class=" border-top border-block-start-dashed border-3 opacity-75">
            <div class="col-12 text-end mt-3">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fe fe-save"></i> <?= lang('App.save'); ?>
                </button>
            </div>

        </form>
    </div>
</div>