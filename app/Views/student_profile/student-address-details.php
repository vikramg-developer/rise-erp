<div class="tab-pane fade  border-0 p-0" id="addresss-tab-pane" role="tabpanel"aria-labelledby="addresss-tab-pane" tabindex="0">
    <div class="p-4">
        <p class="mb-1 fw-semibold text-muted op-5 fs-20">02</p>
        <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
            <div><?= lang('App.address'); ?> <?= lang('App.details'); ?> :</div>
        </div>
        <form id="student-addressdetails-form">
            <div class="row gy-4">
                <div class="col-xl-10">
                    <label for="student_permanent_address" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.address'); ?> <span class="text-danger">*</span></label>
                    <textarea class="form-control" aria-label="With textarea"id="student_permanent_address" name="student_permanent_address"></textarea>                                       
                    <small class="text-danger" id="student_permanent_address_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_permanent_pincode" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_permanent_pincode" name="student_permanent_pincode"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?>" value="">
                    <small class="text-danger" id="student_permanent_pincode_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_permanent_country" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.country'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control" id="student_permanent_country"name="student_permanent_country"required>
                        <option value="1">India</option>
                        <option value="2">Other</option>

                    </select>
                    <small class="text-danger" id="student_permanent_country_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_permanent_state" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.state'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control" id="student_permanent_state"name="student_permanent_state"required>
                        <option value="1">Maharashtra</option>
                    </select>
                    <small class="text-danger" id="student_permanent_state_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_permanent_taluka" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.taluka'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control"id="student_permanent_taluka"name="student_permanent_taluka"required>
                        <option value="1">Satara</option>
                        <option value="1">Wai</option>

                    </select>
                    <small class="text-danger" id="student_permanent_country_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_permanent_district" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.district'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control"id="student_permanent_district"name="student_permanent_district"required>
                        <option value="1">Satara</option>
                    </select>
                    <small class="text-danger" id="student_permanent_district_error" style="display:none;"></small>

                </div>


                <span><p class="mb-3 px-0 text-muted">Same as permanent Address</p>
                    <input class="form-check-input ms-2" type="checkbox" value="" checked=""></span>

                <div class="col-xl-10">
                    <label for="student_correspondence_address" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.address'); ?> <span class="text-danger">*</span></label>
                    <textarea class="form-control" aria-label="With textarea"id="student_correspondence_address" name="student_correspondence_address"></textarea>                                       
                    <small class="text-danger" id="student_correspondence_address_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_correspondence_pincode" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.pincode'); ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_correspondence_pincode" name="student_correspondence_pincode"placeholder="<?= lang('App.correspondence'); ?> <?= lang('App.pincode'); ?>" value="">
                    <small class="text-danger" id="student_correspondence_pincode_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_correspondence_country" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.country'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control"id="student_correspondence_country"name="student_correspondence_country"required>
                        <option value="1">India</option>
                        <option value="2">Other</option>
                    </select>
                    <small class="text-danger" id="student_correspondence_country_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_correspondence_state" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.state'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control"id="student_correspondence_state"name="student_correspondence_state"required>
                        <option value="1">Maharashtra</option>
                    </select>
                    <small class="text-danger" id="student_correspondence_state_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_correspondence_taluka" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.taluka'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control"id="student_correspondence_taluka"name="student_correspondence_taluka"required>
                        <option value="1">Satara</option>
                        <option value="1">Wai</option>

                    </select>
                    <small class="text-danger" id="student_correspondence_taluka_error" style="display:none;"></small>

                </div>
                <div class="col-xl-4">
                    <label for="student_correspondence_district" class="form-label"><?= lang('App.correspondence'); ?> <?= lang('App.district'); ?> <span class="text-danger">*</span></label>
                    <select class="form-control"id="student_correspondence_district"name="student_correspondence_district"required>
                        <option value="1">Satara</option>
                    </select>
                    <small class="text-danger" id="student_correspondence_district_error" style="display:none;"></small>

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