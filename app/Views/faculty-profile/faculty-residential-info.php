<?= form_open('faculty-residential-information', ['class' => 'needs-validation', 'novalidate' => true]); ?>
<div class="row gy-4">

    <!-- Heading -->
     <h5 class="mb-3">
         <p class="mb-1 fw-semibold text-muted op-5 fs-25">02</p>
         <b>  <?= lang('App.residential'); ?> <?= lang('App.information'); ?></b>
    </h5>

    <!-- Address -->
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <label class="form-label"><?= lang('App.address'); ?>  <span class="text-danger">*</span></label>
        <textarea class="form-control" name="address" required
                  placeholder="<?= lang('App.enter'); ?> <?= lang('App.full'); ?> <?= lang('App.address'); ?>"></textarea>
        <div class="invalid-feedback"><?= lang('App.error_address'); ?></div>
    </div>

    <!-- District -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.district'); ?>  <span class="text-danger">*</span></label>
        <select class="form-select" name="district"  required>
            <option value="" disabled selected hidden>Select</option>
            <option value="Satara">Satara</option>
            <option value="Pune">Pune</option>
            <option value="Mumbai">Mumbai</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_district'); ?></div>
    </div>

    <!-- Taluka -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.taluka'); ?>  <span class="text-danger">*</span></label>
        <select class="form-select" name="taluka"  required>
            <option value="" disabled selected hidden>Select</option>
            <option value="Satara">Satara</option>
            <option value="Karad">Karad</option>
            <option value="Wai">Wai</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_taluka'); ?></div>
    </div>

    <!-- Pincode -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.pincode'); ?>  <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="pincode" required pattern="[0-9]{6}"
               placeholder="<?= lang('App.enter_pincode'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_pincode'); ?></div>
    </div>

    <!-- Submit -->
    <div class="col-12 text-end mt-3">
        <button type="submit" class="btn btn-success btn-lg">
            <i class="fe fe-save"></i> <?= lang('App.save'); ?>
        </button>
    </div>

</div>
<?= form_close(); ?>
