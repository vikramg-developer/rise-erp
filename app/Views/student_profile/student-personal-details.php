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
                    <label class="form-label"><?= lang('App.first'); ?> <?= lang('App.name'); ?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control"name="student_first_name"  class="form-control"value="<?= esc($student_registration_data['student_first_name']) ?>"readonly>
                </div>
                <!-- Middle Name -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control"name="student_middle_name"  class="form-control"value="<?= esc($student_registration_data['student_middle_name']) ?>"readonly>
                </div>
                <!-- Last Name -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control"name="student_last_name"  class="form-control"value="<?= esc($student_registration_data['student_last_name']) ?>"readonly>
                </div>
                <!-- Roll No -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.rise'); ?> <?= lang('App.number'); ?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control"name="student_rise_no"value="<?= esc($student_registration_data['student_rise_no']) ?>"readonly>
                </div>
                <!-- Aadhar -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control"name="student_aadhar_number"value="<?= esc($student_registration_data['student_aadhar_number']) ?>"maxlength="12" readonly>
                </div>
                <!-- MOBILE -->
                <div class="col-xl-4 col-md-6">
                    <label class="form-label">
                        <?= lang('App.mobile'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="student_contact_no" id="student_contact_no" value="<?= esc($student_personalinfo_data['student_contact_no'] ?? '') ?>" maxlength="10" class="form-control" placeholder="9999999999">
                    <small class="text-danger" id="student_contact_no_error" style="display:none;"></small>
                </div>
                <!-- EMAIL -->
                <div class="col-xl-4 col-md-6">
                    <label class="form-label"><?= lang('App.email'); ?> <span class="text-danger">*</span></label>
                    <input type="text"name="student_email"id="student_email"value="<?= esc($student_personalinfo_data['student_email'] ?? '') ?>"class="form-control"placeholder="email@example.com"value="">
                    <small class="text-danger" id="student_email_error" style="display:none;"></small>
                </div>
                <!-- Gender -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.gender'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_gender"id="student_gender" >
                        <?php $gender = $student_personalinfo_data['student_gender'] ?? ''; ?>
                        <option value="">Select</option>
                        <option value="male"<?= $gender === 'male' ? 'selected' : '' ?>>Male</option>
                        <option value="female"<?= $gender === 'female' ? 'selected' : '' ?>>Female</option>
                        <option value="transgender"<?= $gender === 'transgender' ? 'selected' : '' ?>>Transgender</option>
                    </select>
                    <small class="text-danger" id="student_gender_error" style="display:none;"></small>
                </div>
                <!-- Blood Group -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.blood'); ?> <?= lang('App.group'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_bloodgroup_id"id="student_bloodgroup_id" >
                        <option value="">Select</option>
                        <?php foreach ($blood_group as $bg): ?> <option value="<?= esc($bg['blood_group_id']) ?>" <?= (!empty($student_personalinfo_data['student_bloodgroup_id']) && $student_personalinfo_data['student_bloodgroup_id'] == $bg['blood_group_id']) ? 'selected' : '' ?>>             <?= esc($bg['blood_group_name']) ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger" id="student_bloodgroup_id_error" style="display:none;"></small>
                </div>
                <!-- Birth Place -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.birth'); ?> <?= lang('App.place'); ?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control"id="student_birthplace" value="<?= $student_personalinfo_data['student_birthplace'] ?? '' ?>"name="student_birthplace" >
                    <small class="text-danger" id="student_birthplace_error" style="display:none;"></small>
                </div>
                <!-- Birth Date -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.birth'); ?><span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i></div>
                        <input type="date"class="form-control"id="dob"name="dob"value="<?= esc($student_personalinfo_data['student_birthdate'] ?? '') ?>"onclick="calculateAge()"onchange="calculateAge()">
                    </div>
                    <small class="text-danger" id="student_birthdate_error" style="display:none;"></small>
                </div>
                <!-- Age -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.age'); ?> <span class="text-danger">*</span></label>
                    <input type="text"class="form-control"id="age"value="<?= esc($student_personalinfo_data['student_age'] ?? '') ?>"name="age" readonly>
                    <small class="text-danger" id="student_age_error" style="display:none;"></small>
                </div>

                <!-- Religion -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.religion'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_religion_id" id="student_religion_id">
                        <option value="">Select</option>
                        <?php foreach ($religion as $rel): ?> <option value="<?= esc($rel['religion_id']) ?>" <?= (!empty($student_personalinfo_data['student_religion_id']) && $student_personalinfo_data['student_religion_id'] == $rel['religion_id']) ? 'selected' : '' ?>>             <?= esc($rel['religion_name']) ?> </option><?php endforeach; ?>
                    </select>
                    <small class="text-danger" id="student_religion_id_error" style="display:none;"></small>
                </div>
                <!-- Category -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.category'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_category_id" id="student_category_id">
                        <option value="">Select</option>
                        <?php foreach ($caste_category as $category): ?> <option value="<?= esc($category['caste_category_id']) ?>" <?= (!empty($student_personalinfo_data['student_category_id']) && $student_personalinfo_data['student_category_id'] == $category['caste_category_id']) ? 'selected' : '' ?>>             <?= esc($category['caste_category_name']) ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger" id="student_category_id_error" style="display:none;"></small>
                </div>
                <!-- Caste -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.caste'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_caste_id" id="student_caste_id">
                        <option value="">Select</option>
                        <?php foreach ($caste as $c): ?> <option value="<?= esc($c['caste_id']) ?>" <?= (!empty($student_personalinfo_data['student_caste_id']) && $student_personalinfo_data['student_caste_id'] == $c['caste_id']) ? 'selected' : '' ?>>             <?= esc($c['caste_name']) ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger" id="student_caste_id_error" style="display:none;"></small>
                </div>
                <!-- Subcaste -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.subcaste'); ?><span class="text-danger">*</span></label>
                    <input type="text"class="form-control"id="student_subcaste"value="<?= esc($student_personalinfo_data['student_subcaste'] ?? '') ?>" name="student_subcaste" placeholder="<?= lang('App.subcaste'); ?>">
                    <small class="text-danger" id="student_subcaste_error" style="display:none;"></small>
                </div>
                <!-- Nationality -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.nationality'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_nationality" id="student_nationality">
                        <option value="">Select</option>
                        <option value="indian"<?= (!empty($student_personalinfo_data['student_nationality']) && $student_personalinfo_data['student_nationality'] === 'indian') ? 'selected' : '' ?>> Indian</option>
                        <option value="other"<?= (!empty($student_personalinfo_data['student_nationality']) && $student_personalinfo_data['student_nationality'] === 'other') ? 'selected' : '' ?>> Other</option>
                    </select>
                    <small class="text-danger" id="student_nationality_error" style="display:none;"></small>
                </div>
                <!-- Marital Status -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.marital'); ?> <?= lang('App.status'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_marital_status" id="student_marital_status">
                        <option value="">Select</option>
                        <option value="unmarried"<?= (!empty($student_personalinfo_data['student_marital_status']) && $student_personalinfo_data['student_marital_status'] === 'unmarried') ? 'selected' : '' ?>> Unmarried</option>
                        <option value="married"<?= (!empty($student_personalinfo_data['student_marital_status']) && $student_personalinfo_data['student_marital_status'] === 'married') ? 'selected' : '' ?>> Married</option>
                        <option value="divorced"<?= (!empty($student_personalinfo_data['student_marital_status']) && $student_personalinfo_data['student_marital_status'] === 'divorced') ? 'selected' : '' ?>> Divorced</option>
                        <option value="widowed"<?= (!empty($student_personalinfo_data['student_marital_status']) && $student_personalinfo_data['student_marital_status'] === 'widowed') ? 'selected' : '' ?>> Widowed</option>
                    </select>
                    <small class="text-danger" id="student_marital_status_error" style="display:none;"></small>
                </div>

                <!-- Minority -->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.minority'); ?><span class="text-danger">*</span></label>
                    <select class="form-control" name="student_minority" id="student_minority">
                        <option value="">Select</option>
                        <option value="yes"<?= (!empty($student_personalinfo_data['student_minority']) && $student_personalinfo_data['student_minority'] === 'yes') ? 'selected' : '' ?>> Yes</option>
                        <option value="no"<?= (!empty($student_personalinfo_data['student_minority']) && $student_personalinfo_data['student_minority'] === 'no') ? 'selected' : '' ?>> No</option>
                    </select>
                    <small class="text-danger" id="student_minority_error" style="display:none;"></small>
                </div>

                <!-- Physical Handicap -->
                <div class="col-xl-4">
                    <label class="form-label">Physical Handicap <span class="text-danger">*</span></label>
                    <select class="form-control" name="student_physically_handicap" id="student_physically_handicap">
                        <option value="">Select</option>
                        <option value="yes"<?= (($student_personalinfo_data['student_physically_handicap'] ?? '') === 'yes') ? 'selected' : '' ?>> Yes</option>
                        <option value="no"<?= (($student_personalinfo_data['student_physically_handicap'] ?? '') === 'no') ? 'selected' : '' ?>> No</option>
                    </select>
                </div>
                <!-- Handicap Type -->
                <div class="col-xl-4"
                     id="handicap_type_div"
                     style="display: <?= (($student_personalinfo_data['student_physically_handicap'] ?? '') === 'yes') ? 'block' : 'none'; ?>;">
                    <label class="form-label">Handicap Type <span class="text-danger">*</span></label>
                    <select class="form-control" name="student_physically_handicap_type" id="student_physically_handicap_type">
                        <option value="">Select Type</option>
                        <option value="orthopedic"<?= (($student_personalinfo_data['student_physically_handicap_type'] ?? '') === 'orthopedic') ? 'selected' : '' ?>> Orthopedic</option>
                        <option value="visual"<?= (($student_personalinfo_data['student_physically_handicap_type'] ?? '') === 'visual') ? 'selected' : '' ?>> Visual</option>
                        <option value="hearing"<?= (($student_personalinfo_data['student_physically_handicap_type'] ?? '') === 'hearing') ? 'selected' : '' ?>> Hearing</option>
                        <option value="mental"<?= (($student_personalinfo_data['student_physically_handicap_type'] ?? '') === 'mental') ? 'selected' : '' ?>> Mental</option>
                    </select>
                </div>

                <!--Sport Reservation-->
                <div class="col-xl-4">
                    <label class="form-label"><?= lang('App.sports'); ?> <?= lang('App.reservation'); ?> <span class="text-danger">*</span></label>

                    <select class="form-control" name="sport_reserv" id="sport_reserv">
                        <option value="">Select</option>
                        <option value="yes"<?= (($student_personalinfo_data['student_sport_reserved'] ?? '') === 'yes') ? 'selected' : '' ?>> Yes</option>
                        <option value="no"<?= (($student_personalinfo_data['student_sport_reserved'] ?? '') === 'no') ? 'selected' : '' ?>> No</option>
                    </select>
                </div>
                <!-- Sports Level -->
                <div class="col-xl-4"id="Display_sport_level"style="display: <?= (($student_personalinfo_data['student_sport_reserved'] ?? '') === 'yes') ? 'block' : 'none'; ?>;">
                    <label class="form-label"> Level of Sports <span class="text-danger">*</span></label>
                    <select class="form-control" name="sport_level" id="sport_level">
                        <option value="">Select</option>
                        <option value="National"<?= (($student_personalinfo_data['student_sport_level'] ?? '') === 'national') ? 'selected' : '' ?>> National</option>
                        <option value="International"<?= (($student_personalinfo_data['student_sport_level'] ?? '') === 'international') ? 'selected' : '' ?>> International</option>
                        <option value="State"<?= (($student_personalinfo_data['student_sport_level'] ?? '') === 'state') ? 'selected' : '' ?>> State</option>
                    </select>
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