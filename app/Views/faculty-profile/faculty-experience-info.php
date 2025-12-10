<?= form_open('faculty-experience', ['class' => 'needs-validation', 'novalidate' => true]); ?>

<h5 class="mb-3">
       <p class="mb-1 fw-semibold text-muted op-5 fs-20">04</p>
    <?= lang('App.experience'); ?>
 <span class="text-danger">
    <code>* Please fill Experience Details in sequential order of service</code>
</span>

</h5>
<br>
<div class="row gy-4">

    <!-- Organization Name -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.organization'); ?> <?= lang('App.name'); ?> <span class="text-danger"> <span class="text-danger">*</span></span>
        </label>
        <input type="text" class="form-control" name="organization_name"
               placeholder="  <?= lang('App.organization'); ?> <?= lang('App.name'); ?>" required>
        <div class="invalid-feedback"><?= lang('App.error_organization_name'); ?></div>
    </div>

    <!-- Designation -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.designation'); ?> <span class="text-danger"> <span class="text-danger">*</span></span>
        </label>
        <select class="form-select" name="designation" required>
            <option value="">Select</option>
            <option value="Admin">Admin</option>
            <option value="Assistant Professor">Assistant Professor</option>
            <option value="Professor">Professor</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_designation'); ?></div>
    </div>

    <!-- Organization Type -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
              <?= lang('App.organization'); ?> <?= lang('App.type'); ?> <span class="text-danger"> <span class="text-danger">*</span></span>
        </label>
        <select class="form-select" name="organization_type" required>
            <option value="">Select</option>
            <option value="Institute">Institute</option>
            <option value="Industry">Industry</option>
            <option value="Other">Other</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_organization_type'); ?></div>
    </div>

    <!-- From Date -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.from_date'); ?> <span class="text-danger"> <span class="text-danger">*</span></span>
        </label>
        <input type="text" id="from_date" name="from_date" class="form-control"
               placeholder="dd-mm-yyyy" required>
        <div class="invalid-feedback"><?= lang('App.error_from_date'); ?></div>
    </div>

    <!-- To Date -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.to_date'); ?> <span class="text-danger"> <span class="text-danger">*</span></span>
        </label>
        <input type="text" id="to_date" name="to_date" class="form-control"
               placeholder="dd-mm-yyyy" required>
        <div class="invalid-feedback"><?= lang('App.error_to_date'); ?></div>
    </div>

    <!-- Years Months Days -->
    <div class="col-xl-1 col-lg-3 col-md-3">
        <label class="form-label"><?= lang('App.years'); ?></label>
        <input type="text" class="form-control" name="years" placeholder="Years" readonly>
    </div>

    <div class="col-xl-1 col-lg-3 col-md-3">
        <label class="form-label"><?= lang('App.months'); ?></label>
        <input type="text" class="form-control" name="months" placeholder="Months" readonly>
    </div>

    <div class="col-xl-1 col-lg-3 col-md-3">
        <label class="form-label"><?= lang('App.days'); ?></label>
        <input type="text" class="form-control" name="days" placeholder="Days" readonly>
    </div>

    <!-- File Upload -->
    <div class="col-xl-12">
        <label class="form-label">
            <?= lang('App.upload'); ?> <?= lang('App.appointment_order'); ?>
            <span class="text-danger"> <span class="text-danger">*</span></span>
        </label>
        <input type="file" class="form-control" name="appointment_order" required accept="application/pdf">
        <small class="text-danger"><?= lang('App.note'); ?>: <?= lang('App.pdf_condition'); ?></small>
        <div class="invalid-feedback"><?= lang('App.error_appointment_order'); ?></div>
    </div>

    <!-- Save -->
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
                <th>Sr.<br>No.</th>
                <th>Name of<br>Organization</th>
                <th>Designation</th>
                <th>Organization<br>Type</th>
                <th>From<br>Date</th>
                <th>To<br>Date</th>
                <th>Years</th>
                <th>Months</th>
                <th>Days</th>
                <th>File</th>
                <th>View</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                        <a class="btn btn-icon btn-sm btn-danger"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>

                <th scope="row">1</th>
                <td>Karmaveer Bhaurao Patil College of Engineering Satara</td>
                <td>Assistant Professor</td>
                <td>Institute</td>
                <td>27-08-2005</td>
                <td>25-06-2024</td>
                <td>18</td>
                <td>9</td>
                <td>29</td>

                <td>
                    <div class="hstack gap-2 fs-15">
                        <a class="btn btn-icon btn-sm btn-success"><i class="ri-download-2-line"></i></a>
                    </div>
                </td>

                <td>
                    <div class="hstack gap-2 fs-15">
                        <a class="btn btn-icon btn-sm btn-primary"><i class="ri-eye-line"></i></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
