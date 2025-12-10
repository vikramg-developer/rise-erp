<?= form_open('faculty-educational-qualification', ['class' => 'needs-validation', 'novalidate' => true]); ?>
<div class="row gy-4">

     <h5 class="mb-3">
         <p class="mb-1 fw-semibold text-muted op-5 fs-20">03</p>
         <b><?= lang('App.educational'); ?> <?= lang('App.qualification'); ?></b>
    </h5>
    <!-- Degree Type -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.degree'); ?> <?= lang('App.type'); ?>  <span class="text-danger">*</span></label>
        <select class="form-select" name="degree_type"  required>
            <option value="" >--Select Degree Type--</option>
            <option value="UG">UG</option>
            <option value="PG">PG</option>
            <option value="PhD">PhD</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_degree_type'); ?></div>
    </div>

    <!-- Stream -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.stream'); ?>  <span class="text-danger">*</span></label>
        <select class="form-select" name="stream" required>
            <option value="" >--Select Stream--</option>
            <option value="BE/B.Tech">B.E / B.Tech</option>
            <option value="ME/M.Tech">M.E / M.Tech</option>
            <option value="PhD">Ph.D</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_stream'); ?></div>
    </div>

    <!-- Specialization -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.specialization'); ?>  <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="specialization" required placeholder="<?= lang('App.specialization'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_specialization'); ?></div>
    </div>

    <!-- Percentage -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.percentage'); ?>  <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="percentage" required placeholder="<?= lang('App.percentage'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_percentage'); ?></div>
    </div>

    <!-- University -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.university'); ?>  <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="university" required placeholder="<?= lang('App.university'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_university'); ?></div>
    </div>

    <!-- Result Class -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label"><?= lang('App.result'); ?> <?= lang('App.class'); ?>  <span class="text-danger">*</span></label>
        <select class="form-select" name="result_class" required>
            <option value="" disabled selected hidden>--Select Result Class--</option>
            <option value="First Class">First Class</option>
            <option value="Distinction">Distinction</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_result_class'); ?></div>
    </div>

    <!-- Month of Passing -->
   <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <label class="form-label">
        <?= lang('App.month'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?> 
        <span class="text-danger"> <span class="text-danger">*</span></span>
    </label>
    <select class="form-select" name="month_passing"  required>
        <option value="" disabled selected hidden>--Select Month of Passing--</option>
        <?php foreach ([
            "January","February","March","April","May","June",
            "July","August","September","October","November","December"
        ] as $m): ?>
            <option value="<?= $m ?>"><?= $m ?></option>
        <?php endforeach; ?>
    </select>
    <div class="invalid-feedback"><?= lang('App.error_month_passing'); ?></div>
</div>


    <!-- Year of Passing -->
   <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <label class="form-label">
        <?= lang('App.year'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?> 
        <span class="text-danger"> <span class="text-danger">*</span></span>
    </label>
    <select class="form-select" name="year_passing"  required>
        <option value="" >--Select Year of Passing--</option>
        <?php for ($y = date('Y'); $y >= 1980; $y--): ?>
            <option value="<?= $y ?>"><?= $y ?></option>
        <?php endfor; ?>
    </select>
    <div class="invalid-feedback"><?= lang('App.error_year_passing'); ?></div>
</div>


    <!-- Upload Marksheet -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <label class="form-label"><?= lang('App.upload'); ?> <?= lang('App.marksheet'); ?>  <span class="text-danger">*</span></label>
        <input type="file" class="form-control" name="marksheet" required accept="application/pdf">
        <small class="text-danger"><?= lang('App.note'); ?>: <?= lang('App.pdf_condition'); ?></small>
        <div class="invalid-feedback"><?= lang('App.error_marksheet'); ?></div>
    </div>

    <!-- Submit -->
    <div class="col-12 text-end mt-3">
        <button type="submit" class="btn btn-success btn-lg">
            <i class="fe fe-save"></i> <?= lang('App.save'); ?>
        </button>
    </div>

</div>
<?= form_close(); ?>

   <hr class="border-warning border-3 opacity-75">

<div class="table-responsive">
    <table class="table">
        <thead class="table-success">
            <tr>
                <th>Action</th>
                <th>Sr.<br>No.</th>
                <th>Course<br>Type</th>
                <th>Stream</th>
                <th>Specialization</th>
                <th>University</th>
                <th>Percentage</th>
                <th>Month<br>of Passing</th>
                <th>Year<br>of Passing</th>
                <th>Result<br>Class</th>
                <th>File</th>
                <th>View</th>
            </tr>
        </thead>

        <tbody>

            <!-- Example Row 1 -->
            <tr>

                <!-- ACTION BUTTONS -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info">
                            <i class="ri-edit-line"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger">
                            <i class="ri-delete-bin-line"></i>
                        </a>
                    </div>
                </td>

                <th scope="row">1</th>
                <td>UG</td>
                <td>B.E / B.Tech</td>
                <td>Computer Science and Engineering</td>
                <td>DBATU Lonere</td>
                <td>63%</td>
                <td>July</td>
                <td>2005</td>
                <td>First Class</td>

                <!-- FILE DOWNLOAD BUTTON -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success">
                            <i class="ri-download-2-line"></i>
                        </a>
                    </div>
                </td>

                <!-- VIEW BUTTON -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary">
                            <i class="ri-eye-line"></i>
                        </a>
                    </div>
                </td>

            </tr>

            <!-- Example Row 2 -->
            <tr>

                <!-- ACTION BUTTONS -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info">
                            <i class="ri-edit-line"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger">
                            <i class="ri-delete-bin-line"></i>
                        </a>
                    </div>
                </td>

                <th scope="row">2</th>
                <td>PG</td>
                <td>M.E / M.Tech</td>
                <td>Computer Network</td>
                <td>Savitribai Phule Pune University</td>
                <td>6.78%</td>
                <td>May</td>
                <td>2014</td>
                <td>First Class</td>

                <!-- FILE DOWNLOAD -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success">
                            <i class="ri-download-2-line"></i>
                        </a>
                    </div>
                </td>

                <!-- VIEW -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary">
                            <i class="ri-eye-line"></i>
                        </a>
                    </div>
                </td>

            </tr>

        </tbody>
    </table>
</div>
