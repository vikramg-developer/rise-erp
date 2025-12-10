<?= form_open('faculty-journals', ['class' => 'needs-validation', 'novalidate' => true]); ?>

<h5 class="mb-3">
    <p class="mb-1 fw-semibold text-muted op-5 fs-20">05</p>
    <b><?= lang('App.journal'); ?> <?= lang('App.information'); ?></b>
</h5>

<div class="row gy-4">

    <!-- Title of Paper -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.paper'); ?> <span class="text-danger">*</span>
        </label>

        <input type="text" class="form-control" name="title_paper" required
            placeholder="<?= lang('App.title'); ?> <?= lang('App.of'); ?> <?= lang('App.paper'); ?>">

        <div class="invalid-feedback"><?= lang('App.error_title_paper'); ?></div>
    </div>

    <!-- Number of Authors -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.number'); ?> <?= lang('App.of'); ?> <?= lang('App.authors'); ?> <span class="text-danger">*</span>
        </label>

        <input type="number" class="form-control" name="number_authors" required
            placeholder="<?= lang('App.number'); ?> <?= lang('App.of'); ?> <?= lang('App.authors'); ?>">

        <div class="invalid-feedback"><?= lang('App.error_number_authors'); ?></div>
    </div>

    <!-- Whether First Author -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.whether'); ?> <?= lang('App.first'); ?> <?= lang('App.author'); ?> <span class="text-danger">*</span>
        </label>

        <select class="form-select" name="first_author" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <div class="invalid-feedback"><?= lang('App.error_first_author'); ?></div>
    </div>

    <!-- Name of Journal -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.journal'); ?> <span class="text-danger">*</span>
        </label>

        <input type="text" class="form-control" name="journal_name" required
            placeholder="<?= lang('App.name'); ?> <?= lang('App.of'); ?> <?= lang('App.journal'); ?>">

        <div class="invalid-feedback"><?= lang('App.error_name_of_journal'); ?></div>
    </div>

    <!-- Type of Journal -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.type'); ?> <?= lang('App.of'); ?> <?= lang('App.journal'); ?> <span class="text-danger">*</span>
        </label>

        <select class="form-select" name="journal_type" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="National">National</option>
            <option value="International">International</option>
        </select>

        <div class="invalid-feedback"><?= lang('App.error_type_of_journal'); ?></div>
    </div>

    <!-- Affiliation of Author -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.affiliation'); ?>  <?= lang('App.author'); ?><span class="text-danger">*</span>
        </label>

        <input class="form-control" name="affiliation" required
            placeholder="<?= lang('App.affiliation'); ?>  <?= lang('App.author'); ?>">

        <div class="invalid-feedback"><?= lang('App.error_affiliation_author'); ?></div>
    </div>

    <!-- Month of Publication -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.month'); ?> <?= lang('App.of'); ?> <?= lang('App.publication'); ?> <span class="text-danger">*</span>
        </label>

        <select class="form-select" name="month_publication" required>
            <option value=""><?= lang('App.month'); ?> <?= lang('App.select'); ?></option>
            <?php foreach ([
                "January","February","March","April","May","June",
                "July","August","September","October","November","December"
            ] as $m): ?>
                <option value="<?= $m ?>"><?= $m ?></option>
            <?php endforeach; ?>
        </select>

        <div class="invalid-feedback"><?= lang('App.error_month_publication'); ?></div>
    </div>

    <!-- Year of Publication -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.year'); ?> <?= lang('App.of'); ?> <?= lang('App.publication'); ?> <span class="text-danger">*</span>
        </label>

        <select class="form-select" name="year_publication" required>
            <option value=""><?= lang('App.year'); ?> <?= lang('App.select'); ?></option>
            <?php for ($y = date('Y'); $y >= 1980; $y--): ?>
                <option value="<?= $y ?>"><?= $y ?></option>
            <?php endfor; ?>
        </select>

        <div class="invalid-feedback"><?= lang('App.error_year_publication'); ?></div>
    </div>

    <!-- Volume and Issue -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.volume'); ?>  <?= lang('App.issue'); ?> <span class="text-danger">*</span>
        </label>
        <input class="form-control" name="volume_issue" required
            placeholder=" <?= lang('App.volume'); ?>  <?= lang('App.issue'); ?>">
        <div class="invalid-feedback"><?= lang('App.error_volume_issue'); ?></div>
    </div>

    <!-- Page Number From -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.page'); ?> <?= lang('App.number'); ?> <?= lang('App.from_date'); ?> <span class="text-danger">*</span>
        </label>

        <input class="form-control" name="page_from" required
            placeholder="<?= lang('App.page'); ?> <?= lang('App.number'); ?> <?= lang('App.from_date'); ?>">

        <div class="invalid-feedback"><?= lang('App.error_page_from'); ?></div>
    </div>

    <!-- Page Number To -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.page'); ?> <?= lang('App.number'); ?> <?= lang('App.to_date'); ?> <span class="text-danger">*</span>
        </label>

        <input class="form-control" name="page_to" required
            placeholder="<?= lang('App.page'); ?> <?= lang('App.number'); ?> <?= lang('App.to_date'); ?>">

        <div class="invalid-feedback"><?= lang('App.error_page_to'); ?></div>
    </div>

    <!-- Listed In -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label">
            <?= lang('App.listed'); ?> <?= lang('App.in'); ?><span class="text-danger">*</span>
        </label>

        <select class="form-select" name="listed_in" required>
            <option value=""><?= lang('App.select'); ?></option>
            <option value="UGC">UGC</option>
            <option value="SCI">SCI</option>
            <option value="Scopus">Scopus</option>
        </select>

        <div class="invalid-feedback"><?= lang('App.error_listed_in'); ?></div>
    </div>

    <!-- Impact Factor -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label"><?= lang('App.impact'); ?> <?= lang('App.factor'); ?></label>
        <input class="form-control" name="impact_factor"
            placeholder="<?= lang('App.impact'); ?> <?= lang('App.factor'); ?>">
    </div>

    <!-- Citations -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label"><?= lang('App.number'); ?> <?= lang('App.citation'); ?></label>
        <input class="form-control" name="citation"
            placeholder="<?= lang('App.number'); ?> <?= lang('App.citation'); ?>">
    </div>

    <!-- Citations Excluding Self -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <label class="form-label"><?= lang('App.number'); ?> <?= lang('App.of'); ?> <?= lang('App.citation'); ?> <?= lang('App.excluding'); ?> <?= lang('App.self'); ?> <?= lang('App.citation'); ?></label>
        <input class="form-control" name="citation_excluding"
            placeholder="<?= lang('App.number'); ?> <?= lang('App.of'); ?> <?= lang('App.citation'); ?> <?= lang('App.excluding'); ?> <?= lang('App.self'); ?> <?= lang('App.citation'); ?>">
    </div>

    <!-- Link of Publication -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.link'); ?> <?= lang('App.of'); ?> <?= lang('App.paper'); ?> <?= lang('App.publication'); ?> <span class="text-danger">*</span>
        </label>

        <input class="form-control" name="publication_link" required
            placeholder="<?= lang('App.link'); ?> <?= lang('App.of'); ?> <?= lang('App.paper'); ?> <?= lang('App.publication'); ?>">

        <div class="invalid-feedback"><?= lang('App.error_publication_link'); ?></div>
    </div>

    <!-- Upload First Page -->
    <div class="col-xl-4 col-lg-6 col-md-6">

        <label class="form-label">
            <?= lang('App.upload'); ?> <?= lang('App.paper'); ?> <?= lang('App.first'); ?> <?= lang('App.page'); ?> <span class="text-danger">*</span>
        </label>

        <input type="file" class="form-control" name="first_page" required accept="application/pdf">

        <small class="text-danger"><?= lang('App.note'); ?>: <?= lang('App.pdf_condition'); ?></small>

        <div class="invalid-feedback"><?= lang('App.error_first_page'); ?></div>
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
    <table class="table ">
        <thead class="table-success">
            <tr>
                <th>Action</th>
                <th>Sr.<br>No.</th>
                <th>Title of<br>Paper</th>
                <th>Number of<br>Author/s</th>
                <th>Whether First<br>Author</th>
                <th>Name of<br>Journal</th>
                <th>Type of<br>Journal</th>
                <th>Mentioned College<br>Name in Journal</th>
                <th>Month of<br>Publication</th>
                <th>Year of<br>Publication</th>
                <th>Volume and<br>Issue</th>
                <th>Page Number<br>From</th>
                <th>Page Number<br>To</th>
                <th>Listed<br>in</th>
                <th>Journal<br>Name</th>
                <th>Impact<br>Factor</th>
                <th>Citation<br>Index</th>
                <th>Number of<br>Citation</th>
                <th>Number of Citation<br>Excluding Self Citation</th>
                <th>Link of Paper<br>Publication</th>
                <th>Show On<br>Resume</th>
                <th>File</th>
            </tr>
        </thead>

        <tbody>

            <!-- Example row (you will loop here dynamically) -->
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

                <th scope="row">1</th>
                <td>Study of Effective Utilization of WTP Sludge and Fly Ash in Brick Manufacturing</td>
                <td>2</td>
                <td>Yes</td>
                <td>Journal of Advances and Scholarly Researches in Allied Education</td>
                <td>International</td>
                <td>Other</td>
                <td>April</td>
                <td>2021</td>
                <td>Vol-18 Issue-3</td>
                <td>222</td>
                <td>225</td>
                <td>UGC Care List II</td>
                <td>Journal Name Example</td>
                <td>3.46</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>

                <!-- Link -->
                <td>
                    <a href="https://ignited.in/..." target="_blank">
                        https://ignited.in/...
                    </a>
                </td>

                <!-- Show on Resume -->
                <td>Yes</td>

                <!-- File Download -->
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="#" class="btn btn-icon btn-sm btn-success" title="Download PDF">
                            <i class="ri-download-2-line"></i>
                        </a>
                    </div>
                </td>

            </tr>

        </tbody>
    </table>
</div>
