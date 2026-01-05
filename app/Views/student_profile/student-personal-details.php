<div class="tab-pane show active fade border-0 p-0" id="personalinfo-tab-pane"
     role="tabpanel" aria-labelledby="personalinfo-tab-pane" tabindex="0">

    <div class="p-4">
        <p class="mb-1 fw-semibold text-muted op-5 fs-20">01</p>

        <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
            <div><?= lang('App.personal'); ?> <?= lang('App.details'); ?> :</div>
        </div>

        <form id="student-personalinfo-form">
            <div class="row gy-4">
                <!-- First Name -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.first'); ?> <?= lang('App.name'); ?></label>
                    <input type="text" class="form-control"
                           name="student_first_name"  class="form-control"
                           value="<?= esc($student_registration_data['student_first_name']) ?>"
                           readonly>
                </div>
                <!-- Middle Name -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                    <input type="text" class="form-control"
                           name="student_middle_name"  class="form-control"
                           value="<?= esc($student_registration_data['student_middle_name']) ?>"
                           readonly>
                </div>
                <!-- Last Name -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?></label>
                    <input type="text" class="form-control"
                           name="student_last_name"  class="form-control"
                           value="<?= esc($student_registration_data['student_last_name']) ?>"
                           readonly>
                </div>
                <!-- Roll No -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.rise'); ?> <?= lang('App.number'); ?></label>
                    <input type="text" class="form-control"
                           name="student_rise_no"
                           value="<?= esc($student_registration_data['student_rise_no']) ?>"
                           readonly>
                </div>
                <!-- Aadhar -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?></label>
                    <input type="text" class="form-control"
                           name="student_aadhar_number"
                           value="<?= esc($student_registration_data['student_aadhar_number']) ?>"
                           maxlength="12" readonly>
                </div>
                <!-- MOBILE -->
                <div class="col-xl-4 col-md-6">
                    <label class="form-label">
                        <?= lang('App.mobile'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="student_mobile_no" id="student_mobile_no"  maxlength="10" class="form-control" placeholder="9999999999">
                    <small class="text-danger" id="student_mobile_no_error" style="display:none;"></small>
                </div>
                <!-- EMAIL -->
                <div class="col-xl-4 col-md-6">
                    <label class="form-label">
                        <?= lang('App.email'); ?> <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="student_email_id"
                           id="student_email_id"
                           class="form-control"
                           placeholder="email@example.com"value="">
                    <small class="text-danger" id="student_email_id_error" style="display:none;"></small>
                </div>
                <!-- Gender -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.gender'); ?></label>
                    <select class="form-control" name="student_gender"id="student_gender" >
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="transgender">Transgender</option>
                    </select>
                    <small class="text-danger" id="student_gender_error" style="display:none;"></small>
                </div>
                <!-- Blood Group -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.blood'); ?> <?= lang('App.group'); ?></label>
                    <select class="form-control" name="student_bloodgroup"id="student_bloodgroup" >
                        <option value="">Select</option>
                        <?php
                        foreach ($blood_group as $blood_group) {
                            ?>
                            <option value="<?php echo $blood_group['blood_group_id']; ?>"><?php echo $blood_group['blood_group_name']; ?></option>
                        <?php }
                        ?> 
                    </select>
                    <small class="text-danger" id="student_bloodgroup_error" style="display:none;"></small>
                </div>
                <!-- Birth Place -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.birth'); ?> <?= lang('App.place'); ?></label>
                    <input type="text" class="form-control"id="student_birthplace"name="student_birthplace" >
                    <small class="text-danger" id="student_birthplace_error" style="display:none;"></small>

                </div>
                <!-- Birth Date -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.birth'); ?> <?= lang('App.date'); ?></label>
                    <input type="date" class="form-control"
                           name="student_birthdate" id="student_birthdate">
                    <small class="text-danger" id="student_birthdate_error" style="display:none;"></small>
                </div>
                <!-- Religion -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.religion'); ?></label>
                    <select class="form-control" name="student_religion_id" id="student_religion_id">
                        <option value="">Select</option>
                       <?php
                        foreach ($religion as $religion) {
                            ?>
                            <option value="<?php echo $religion['religion_id']; ?>"><?php echo $religion['religion_name']; ?></option>
                        <?php }
                        ?> 
                    </select>
                    <small class="text-danger" id="student_religion_id_error" style="display:none;"></small>
                </div>
                <!-- Category -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.category'); ?></label>
                    <select class="form-control" name="student_category_id" id="student_category_id">
                        <option value="">Select</option>
                        <option value="1">OPEN</option>
                        <option value="2">OBC</option>
                        <option value="3">SC</option>
                        <option value="4">ST</option>
                    </select>
                    <small class="text-danger" id="student_category_id_error" style="display:none;"></small>

                </div>
                <!-- Caste -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.caste'); ?></label>
                    <select class="form-control" name="student_caste_id" id="student_caste_id">
                        <option value="">Select</option>
                        <option value="1">OPEN</option>
                        <option value="2">OBC</option>
                        <option value="3">SC</option>
                        <option value="4">ST</option>
                    </select>
                    <small class="text-danger" id="student_caste_id_error" style="display:none;"></small>

                </div>
                <!-- Subcaste -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.subcaste'); ?></label>
                    <select class="form-control" name="student_subcaste_id" id="student_subcaste_id">
                        <option value="">Select</option>
                        <option value="1">Maratha</option>
                        <option value="2">Muslim</option>
                        <option value="3">Parsi</option>
                    </select>
                    <small class="text-danger" id="student_subcaste_id_error" style="display:none;"></small>

                </div>
                <!-- Nationality -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.nationality'); ?></label>
                    <select class="form-control" name="student_nationality_id" id="student_nationality_id">
                        <option value="">Select</option>
                        <option value="1">Indian</option>
                    </select>
                    <small class="text-danger" id="student_nationality_id_error" style="display:none;"></small>

                </div>
                <!-- Marital Status -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.marital'); ?> <?= lang('App.status'); ?></label>
                    <select class="form-control" name="student_marital_status"id="student_marital_status">
                        <option value="">Select</option>
                        <option value="1">Unmarried</option>
                        <option value="2">Married</option>
                        <option value="3">Divorced</option>
                        <option value="4">Widowed</option>
                    </select>
                    <small class="text-danger" id="student_marital_status_error" style="display:none;"></small>

                </div>

                <!-- Minority -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.minority'); ?></label>
                    <select class="form-control" name="student_minority_id"id="student_minority_id">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    <small class="text-danger" id="student_minority_id_error" style="display:none;"></small>

                </div>

                <!-- Physical Handicap -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.physical'); ?> <?= lang('App.handicap'); ?></label>
                    <select class="form-control" name="student_physically_handicap_id" id="student_physically_handicap_id">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    <small class="text-danger" id="student_physically_handicap_id_error" style="display:none;"></small>

                </div>
            </div>
            <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fe fe-save"></i> <?= lang('App.save'); ?>
                </button>
            </div>
        </form>
    </div>
</div>