<?= form_open('faculty-conference-info', ['class' => 'needs-validation', 'novalidate' => true]); ?>

<div class="row gy-4">

    <h5 class="mb-3">
        <p class="mb-1 fw-semibold text-muted op-5 fs-25">07</p>
        <b><?= lang('App.conference'); ?> <?= lang('App.information'); ?></b>
    </h5>

    <!-- Title of Paper -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.paper'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="paper_title" required
               placeholder="<?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.paper'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_paperTitle'); ?></div>
    </div>

    <!-- Title of Proceeding -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.proceeding'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="proceeding_title" required
               placeholder="<?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.proceeding'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_proceedingTitle'); ?></div>
    </div>

    <!-- Name of Conference -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.conference'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="conference_name" required
               placeholder="<?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.conference'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_conferenceName'); ?></div>
    </div>

    <!-- Type of Conference -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.type'); ?> <?= lang('App.of'); ?> <?= lang('App.conference'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="conference_type" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="National">National</option>
            <option value="International">International</option>
            <option value="Workshop">Workshop</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_conferenceType'); ?></div>
    </div>

    <!-- College Name -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.college'); ?> <?= lang('App.name'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="college_name" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="KBP College of Engineering">KBP College of Engineering</option>
            <option value="MIT Pune">MIT Pune</option>
            <option value="COEP">COEP</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_collegeMentioned'); ?></div>
    </div>

    <!-- Indexed In -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.indexed'); ?> <?= lang('App.in'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="indexed_in" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="Scopus">Scopus</option>
            <option value="Web of Science">Web of Science</option>
            <option value="UGC Care">UGC Care</option>
            <option value="Google Scholar">Google Scholar</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_indexedIn'); ?></div>
    </div>

    <!-- Year of Publication -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.year'); ?> <?= lang('App.of'); ?> <?= lang('App.publication'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="year" required>
            <option value=""> <?= lang('App.select'); ?> <?= lang('App.year'); ?> <?= lang('App.of'); ?> <?= lang('App.publication'); ?></option>
            <?php for ($y = date('Y'); $y >= 1985; $y--): ?>
                <option value="<?= $y ?>"><?= $y ?></option>
            <?php endfor; ?>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_publicationYear'); ?></div>
    </div>

    <!-- Month of Publication -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.month'); ?> <?= lang('App.of'); ?> <?= lang('App.publication'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="month" required>
            <option value=""><?= lang('App.select'); ?></option>
            <?php
            $months = [
                'January','February','March','April','May','June',
                'July','August','September','October','November','December'
            ];
            foreach ($months as $m): ?>
                <option value="<?= $m ?>"><?= $m ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_publicationMonth'); ?></div>
    </div>

    <!-- Publisher (Name of Publisher) -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.publisher'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="publisher" required
               placeholder="<?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.publisher'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_publisherName'); ?></div>
    </div>

    <!-- ISSN Number -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.issn'); ?> <?= lang('App.number'); ?>
        </label>
        <input type="text" class="form-control" name="issn" pattern="[0-9]{8}"
               placeholder="<?= lang('App.issn'); ?> <?= lang('App.number'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_issnNumber'); ?></div>
    </div>

    <!-- ISBN Number -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.isbn'); ?> <?= lang('App.number'); ?>
        </label>
        <input type="text" class="form-control" name="isbn" pattern="[0-9]{10,13}"
               placeholder="<?= lang('App.isbn'); ?> <?= lang('App.number'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_isbnNumber'); ?></div>
    </div>

    <!-- Show on Resume -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <label class="form-label">
            <?= lang('App.show'); ?> <?= lang('App.on'); ?> <?= lang('App.resume'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="show_resume" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_showResume'); ?></div>
    </div>

    <!-- Upload Certificate -->
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <label class="form-label">
            <?= lang('App.upload'); ?> <?= lang('App.certificate'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="file" class="form-control" name="certificate" required accept="application/pdf">
        <small class="text-danger"><?= lang('App.pdf_condition'); ?></small>
        <div class="invalid-feedback"><?= lang('App.error_uploadCertificate'); ?></div>
    </div>

    <!-- Submit -->
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
                <th>Title of<br>Paper</th>
                <th>Title of Proceeding<br>of Conference</th>
                <th>Name of<br>Conference</th>
                <th>Type of<br>Conference</th>
                <th>Mentioned College<br>Name in Conference</th>
                <th>Indexed<br>In</th>
                <th>Month of<br>Publication</th>
                <th>Year of<br>Publication</th>
                <th>Name of<br>Publisher</th>
                <th>ISSN<br>Number</th>
                <th>ISBN<br>Number</th>
                <th>Show on<br>Resume</th>
                <th>File</th>
                <th>View</th>
            </tr>
        </thead>

        <tbody>

            <tr>

                <!-- Action Buttons -->
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

                <!-- Sr. No -->
                <th scope="row">1</th>

                <!-- Table Data -->
                <td>Artificial Intelligence to Enhance Students Skills</td>
                <td>International Conference on Engineering & Science Research</td>
                <td>International Conference on Research Trends</td>
                <td>International</td>
                <td>KBP College of Engineering</td>
                <td>Scopus</td>
                <td>December</td>
                <td>2025</td>
                <td>Taylor and Francis</td>
                <td>12345678</td>
                <td>9781234567890</td>
                <td>Yes</td>

                <!-- File Download -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="#" class="btn btn-icon btn-sm btn-success" title="Download Certificate PDF">
                            <i class="ri-download-2-line"></i>
                        </a>
                    </div>
                </td>

                <!-- View -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="#" class="btn btn-icon btn-sm btn-primary" title="View Details">
                            <i class="ri-eye-line"></i>
                        </a>
                    </div>
                </td>

            </tr>

        </tbody>
    </table>
</div>
