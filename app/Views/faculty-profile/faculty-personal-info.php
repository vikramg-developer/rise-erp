<?= form_open('faculty-personal-info', ['class' => 'needs-validation', 'novalidate' => true]); ?>
<div class="row gy-4">
    
     <h5 class="mb-3">
         <p class="mb-1 fw-semibold text-muted op-5 fs-25">01</p>
         <b><?= lang('App.personal'); ?> <?= lang('App.information'); ?></b>
     </h5>

    <!-- Title -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.title'); ?> <span class="text-danger">*</span></label>
        <select class="form-select" name="title" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="Dr.">Dr.</option>
            <option value="Mr.">Mr.</option>
            <option value="Mrs.">Mrs.</option>
            <option value="Prof.">Prof.</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_title'); ?></div>
    </div>

    <!-- First Name -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.first'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="first_name" required pattern="[A-Za-z ]+"
               placeholder="<?= lang('App.first'); ?> <?= lang('App.name'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_first_name'); ?></div>
    </div>

    <!-- Middle Name -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="middle_name" required pattern="[A-Za-z ]+"
               placeholder="<?= lang('App.middle'); ?> <?= lang('App.name'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_middle_name'); ?></div>
    </div>

    <!-- Last Name -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="last_name" required pattern="[A-Za-z ]+"
               placeholder="<?= lang('App.last'); ?> <?= lang('App.name'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_last_name'); ?></div>
    </div>

    <!-- Date of Birth -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.birth'); ?> <span class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-text text-muted"><i class="ri-calendar-line"></i></div>
            <input type="text" class="form-control" id="dob" name="dob" required placeholder="Choose date">
            <div class="invalid-feedback"><?= lang('App.error_dob'); ?></div>
        </div>
    </div>

    <!-- Mobile -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.mobile'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span></label>
        <input type="tel" class="form-control" name="mobile" required pattern="[0-9]{10}"
               placeholder="0000000000">
        <div class="invalid-feedback"><?= lang('App.error_mobile'); ?></div>
    </div>

    <!-- Email -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.email'); ?> <span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="email" required
               placeholder="email@example.com">
        <div class="invalid-feedback"><?= lang('App.error_email'); ?></div>
    </div>

    <!-- Joining Date -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.joining'); ?> <span class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-text text-muted"><i class="ri-calendar-line"></i></div>
            <input type="text" class="form-control" id="date" name="joining" required placeholder="Choose joining date">
            <div class="invalid-feedback"><?= lang('App.error_joining'); ?></div>
        </div>
    </div>

    <!-- Aadhar -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.number'); ?> <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="aadhar" required pattern="[0-9]{12}"
               placeholder="000000000000">
        <div class="invalid-feedback"><?= lang('App.error_aadhar'); ?></div>
    </div>

    <!-- Specialization -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.area'); ?> <?= lang('App.of'); ?> <?= lang('App.specialization'); ?> <span class="text-danger">*</span></label>
        <textarea class="form-control" name="specialization" required placeholder="<?= lang('App.specialization'); ?>"></textarea>
        <div class="invalid-feedback"><?= lang('App.error_specialization'); ?></div>
    </div>

    <!-- Membership -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.professional'); ?> <?= lang('App.society'); ?> <?= lang('App.membership'); ?></label>
        <textarea class="form-control" name="membership" placeholder="<?= lang('App.membership'); ?>"></textarea>
    </div>

    <!-- B.Tech Guided -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.btech'); ?> <?= lang('App.project'); ?> <?= lang('App.guided'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="btech_guided" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- B.Tech Awarded -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.degree'); ?> <?= lang('App.awarded'); ?> <?= lang('App.btech'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="btech_awarded" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- B.Tech Thesis Submitted -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.thesis'); ?> <?= lang('App.submitted'); ?> <?= lang('App.btech'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="btech_thesis" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- M.Tech Guided -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.mtech'); ?> <?= lang('App.project'); ?> <?= lang('App.guided'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="mtech_guided" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- M.Tech Awarded -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.degree'); ?> <?= lang('App.awarded'); ?> <?= lang('App.mtech'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="mtech_awarded" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- M.Tech Thesis Submitted -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.thesis'); ?> <?= lang('App.submitted'); ?> <?= lang('App.mtech'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="mtech_thesis" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- PhD Guided -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.phd'); ?> <?= lang('App.project'); ?> <?= lang('App.guided'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="phd_guided" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- PhD Awarded -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.degree'); ?> <?= lang('App.awarded'); ?> <?= lang('App.phd'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="phd_awarded" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- PhD Thesis Submitted -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.thesis'); ?> <?= lang('App.submitted'); ?> <?= lang('App.phd'); ?> <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="phd_thesis" required min="0" value="0">
        <div class="invalid-feedback"><?= lang('App.error_number'); ?></div>
    </div>

    <!-- Google Scholar -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.google'); ?> <?= lang('App.scholar'); ?> <?= lang('App.link'); ?> <span class="text-danger">*</span></label>
        <input type="url" class="form-control" name="google_scholar" required
               placeholder="https://scholar.google.com/">
        <div class="invalid-feedback"><?= lang('App.error_google_scholar'); ?></div>
    </div>

    <!-- Personal Website -->
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <label class="form-label"><?= lang('App.google'); ?> <?= lang('App.site'); ?> / <?= lang('App.website'); ?> <?= lang('App.link'); ?> <span class="text-danger">*</span></label>
        <input type="url" class="form-control" name="personal_site" required
               placeholder="https://example.com">
        <div class="invalid-feedback"><?= lang('App.error_personal_site'); ?></div>
    </div>

    <!-- Photo -->
    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.upload'); ?> <?= lang('App.photo'); ?> <span class="text-danger">*</span></label>
        <input type="file" class="form-control" name="photo" required accept="image/*">
        <small class="text-danger"><?= lang('App.note'); ?>: <?= lang('App.image_upload_condition'); ?></small>
        <div class="invalid-feedback"><?= lang('App.error_photo'); ?></div>
    </div>

    <!-- Submit -->
    <div class="col-12 text-end mt-3">
        <button type="submit" class="btn btn-success btn-lg">
            <i class="fe fe-save"></i> <?= lang('App.save'); ?>
        </button>
    </div>

</div>
<?= form_close(); ?>
