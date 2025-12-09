<?= form_open('faculty-consultancy', ['class' => 'needs-validation', 'novalidate' => true]); ?>

<h5 class="mb-3">
    <p class="mb-1 fw-semibold text-muted op-5 fs-20">08</p>
    <b><?= lang('App.consultancy'); ?> <?= lang('App.activities'); ?></b>
</h5>

<div class="row gy-4">

    <!-- Title of Consultancy -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.consultancy'); ?>  <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="title_consultancy" required
               placeholder="<?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.consultancy'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_title_consultancy'); ?></div>
    </div>

    <!-- Month -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.month'); ?>  <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="month" required>
            <option value="">--Select Month--</option>
            <?php
            foreach ([
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
            ] as $m):
                ?>
                <option value="<?= $m ?>"><?= $m ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_month'); ?></div>
    </div>

    <!-- Year -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.year'); ?>  <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="year" required>
            <option value="">--Select Year--</option>
            <?php for ($y = date('Y'); $y >= 1980; $y--): ?>
                <option value="<?= $y ?>"><?= $y ?></option>
            <?php endfor; ?>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_year'); ?></div>
    </div>

    <!-- Agency Name -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.agency'); ?> <?= lang('App.name'); ?>  <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="agency_name" required
               placeholder="<?= lang('App.agency'); ?> <?= lang('App.name'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_agency_name'); ?></div>
    </div>

    <!-- Consultancy Description -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.consultancy'); ?> <?= lang('App.description'); ?>
        </label>
        <textarea class="form-control" name="description" placeholder="<?= lang('App.consultancy'); ?> <?= lang('App.description'); ?>"></textarea>
    </div>

    <!-- Cost -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label"><?= lang('App.cost'); ?>  <span class="text-danger">*</span></label>
        <input class="form-control" name="cost" required placeholder="<?= lang('App.cost'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_cost'); ?></div>
    </div>

    <!-- Show on Resume -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label"><?= lang('App.show_on_resume'); ?>  <span class="text-danger">*</span></label>
        <select class="form-select" name="show_resume" required>
            <option value="">--Select--</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_show_on_resume'); ?></div>
    </div>

    <!-- Upload Certificate -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.upload'); ?> <?= lang('App.certificate'); ?>  <span class="text-danger">*</span>
        </label>
        <input type="file" class="form-control" name="certificate" required accept="application/pdf">
        <small class="text-danger"><?= lang('App.note'); ?>: <?= lang('App.pdf_condition'); ?></small>
        <div class="invalid-feedback"><?= lang('App.error_certificate'); ?></div>
    </div>

    <!-- SAVE BUTTON -->
    <div class="col-12 text-end mt-3">
        <button type="submit" class="btn btn-success btn-lg">
            <i class="fe fe-save"></i> <?= lang('App.save'); ?>
        </button>
    </div>

</div>

<?= form_close(); ?>

<div class="table-responsive mt-4">
    <table class="table">
        <thead class="table-success">
            <tr>
                <th>Action</th>
                <th>Sr. No.</th>
                <th>Title of Consultancy</th>
                <th>Month</th>
                <th>Year</th>
                <th>Agency</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Show On Resume</th>
                <th>File</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="#" class="btn btn-icon btn-sm btn-info">
                            <i class="ri-edit-line"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-sm btn-danger">
                            <i class="ri-delete-bin-line"></i>
                        </a>
                    </div>
                </td>

                <td>1</td>
                <td>Consultancy for Skill Development</td>
                <td>January</td>
                <td>2025</td>
                <td>ABC Agency</td>
                <td>Training and development consultancy service.</td>
                <td>₹ 50,000</td>
                <td>Yes</td>

                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="#" class="btn btn-icon btn-sm btn-success">
                            <i class="ri-download-2-line"></i>
                        </a>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
</div>
