<?= form_open('faculty-books', ['class' => 'needs-validation', 'novalidate' => true]); ?>

<h5 class="mb-3">
       <p class="mb-1 fw-semibold text-muted op-5 fs-20">06</p>
       <?= lang('App.book'); ?> &   <?= lang('App.book'); ?> <?= lang('App.chapter'); ?>
</h5>

<div class="row gy-4">

    <!-- Type -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.type'); ?> <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="type" required>
            <option value=""><?= lang('App.select'); ?> <?= lang('App.type'); ?></option>
            <option value="Book"><?= lang('App.book'); ?></option>
            <option value="Chapter"><?= lang('App.chapter'); ?></option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_type'); ?></div>
    </div>

    <!-- Title of Book -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.book'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="title_book" required
               placeholder="<?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.book'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_title_of_book'); ?></div>
    </div>

    <!-- Year of Publication -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.year'); ?> <?= lang('App.of'); ?> <?= lang('App.publication'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" name="year_publication" required>

            <option value=""> <?= lang('App.select'); ?>  <?= lang('App.year'); ?>  <?= lang('App.of'); ?>  <?= lang('App.publication'); ?></option>
            <?php for ($y = date('Y'); $y >= 1980; $y--): ?>
                <option value="<?= $y ?>"><?= $y ?></option>
            <?php endfor; ?>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_year_publication'); ?></div>
    </div>

    <!-- Name of Publisher -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.publisher'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="publisher" required
               placeholder="<?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.publisher'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_name_of_publisher'); ?></div>
    </div>

    <!-- ISSN -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.issn'); ?> <?= lang('App.number'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="issn" required
               placeholder="<?= lang('App.issn'); ?> <?= lang('App.number'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_issn_number'); ?></div>
    </div>

    <!-- ISBN -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.isbn'); ?> <?= lang('App.number'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="isbn" required
               placeholder="<?= lang('App.isbn'); ?> <?= lang('App.number'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_isbn_number'); ?></div>
    </div>

    <!-- Reference Link -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.reference'); ?> <?= lang('App.link'); ?>
            <span class="text-danger">*</span>
        </label>
        <input type="url" class="form-control" name="reference_link" required
               placeholder="<?= lang('App.reference'); ?> <?= lang('App.link'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_reference_link'); ?></div>
    </div>

    <!-- Show on Resume -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.show'); ?> <?= lang('App.on'); ?> <?= lang('App.resume'); ?>
            <span class="text-danger">*</span>
        </label>
        <select class="form-control" name="show_resume" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="Yes"><?= lang('App.yes'); ?></option>
            <option value="No"><?= lang('App.no'); ?></option>
        </select>
        <div class="invalid-feedback"><?= lang('App.error_show_on_resume'); ?></div>
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
                <th><?= lang('App.action'); ?></th>
                <th><?= lang('App.sr_no'); ?></th>
                <th><?= lang('App.type'); ?></th>
                <th><?= lang('App.title_of_book'); ?></th>
                <th><?= lang('App.year'); ?>  <?= lang('App.of'); ?>  <?= lang('App.publication'); ?></th>
                <th><?= lang('App.name_of_publisher'); ?></th>
                <th><?= lang('App.issn_number'); ?></th>
                <th><?= lang('App.isbn_number'); ?></th>
                <th><?= lang('App.reference_link'); ?></th>
                <th><?= lang('App.show_on_resume'); ?></th>
            </tr>
        </thead>

        <tbody>

            <!-- Example -->
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
                <td>Chapter</td>
                <td>Microplastics : Impacts and Implications (Volume I)</td>
                <td>2025</td>
                <td>Olympick Publisher India</td>
                <td>-</td>
                <td>978-81-986001-1-0</td>

                <td>
                    <a href="https://olympickpublisher.in/" target="_blank">
                        https://olympickpublisher.in/
                    </a>
                </td>

                <td><?= lang('App.yes'); ?></td>
            </tr>

        </tbody>
    </table>
</div>
