<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.update'); ?> <?= lang('App.profile'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="#"><?= lang('App.faculty'); ?> <?= lang('App.profile'); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= lang('App.update'); ?> <?= lang('App.profile'); ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.update'); ?> <?= lang('App.profile'); ?>
                    </div>
                </div>

                <div class="card-body">

                    <!-- CHECKOUT-STYLE TABS (Only this part changed) -->
                    <ul class="nav nav-tabs tab-style-2 d-sm-flex d-block border-bottom border-block-end-dashed" id="profileTabs" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-personal" type="button">
                                <i class="ri-user-line me-2"></i>
                                <?= lang('App.personal'); ?> <?= lang('App.information'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-residential" type="button">
                                <i class="ri-home-line me-2"></i>
                                <?= lang('App.residential'); ?> <?= lang('App.information'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-education" type="button">
                                <i class="ri-book-2-line me-2"></i>
                                <?= lang('App.educational'); ?> <?= lang('App.qualification'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-experience" type="button">
                                <i class="ri-briefcase-line me-2"></i>
                                <?= lang('App.experience'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-journals" type="button">
                                <i class="ri-article-line me-2"></i>
                                <?= lang('App.journals'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-books" type="button">
                                <i class="ri-book-open-line me-2"></i>
                                <?= lang('App.book'); ?> &   <?= lang('App.book'); ?> <?= lang('App.chapter'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-conference" type="button">
                                <i class="ri-slideshow-line me-2"></i>
                                <?= lang('App.conference'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-consultancy" type="button">
                                <i class="ri-customer-service-2-line me-2"></i>
                                <?= lang('App.consultancy'); ?> <?= lang('App.activities'); ?>
                            </button>
                        </li>

<!--                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-courses" type="button">
                         <i class="ri-booklet-line me-2"></i>
                                <?= lang('App.courses'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-attended" type="button">
                                <i class="ri-user-star-line me-2"></i>
                                <?= lang('App.program'); ?> <?= lang('App.attended'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-conducted" type="button">
                                <i class="ri-team-line me-2"></i>
                                <?= lang('App.program'); ?> <?= lang('App.conducted'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-resource" type="button">
                                <i class="ri-user-follow-line me-2"></i>
                                <?= lang('App.resource'); ?> <?= lang('App.person'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-patent" type="button">
                                <i class="ri-lightbulb-line me-2"></i>
                                <?= lang('App.patent'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-copyright" type="button">
                                <i class="ri-copyright-line me-2"></i>
                                <?= lang('App.copyright'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-awards" type="button">
                                <i class="ri-award-line me-2"></i>
                                <?= lang('App.award'); ?> / <?= lang('App.recognitions'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-bio" type="button">
                                <i class="ri-profile-line me-2"></i>
                                <?= lang('App.one'); ?> <?= lang('App.page'); ?> <?= lang('App.biodata'); ?>
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-resume" type="button">
                                <i class="ri-file-list-line me-2"></i>
                                <?= lang('App.full'); ?> <?= lang('App.resume'); ?>
                            </button>
                        </li>-->

                    </ul>

                    <hr class="border-warning border-3 opacity-75">

                    <!-- TAB CONTENT -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tab-personal">
                            <?= view('faculty-profile/faculty-personal-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-residential">
                            <?= view('faculty-profile/faculty-residential-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-education">
                            <?= view('faculty-profile/faculty-educational-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-books">
                            <?= view('faculty-profile/faculty-book-chapter-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-journals">
                            <?= view('faculty-profile/faculty-journals-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-conference">
                            <?= view('faculty-profile/faculty-conference-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-experience">
                            <?= view('faculty-profile/faculty-experience-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-patent">
                            <?= view('faculty-profile/faculty-patent-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-copyright">
                            <?= view('faculty-profile/faculty-copyright-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-attended">
                            <?= view('faculty-profile/faculty-program-attended-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-conducted">
                            <?= view('faculty-profile/faculty-program-conducted'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-resource">
                            <?= view('faculty-profile/faculty-resource-person-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-courses">
                            <?= view('faculty-profile/faculty-courses-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-awards">
                            <?= view('faculty-profile/faculty-award-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-consultancy">
                            <?= view('faculty-profile/faculty-consultancy-info'); ?>
                        </div>

                        <div class="tab-pane fade" id="tab-bio">
                            <a class="btn btn-primary btn-lg" href="<?= base_url('Faculty_Profile/print_biodata'); ?>" target="_blank">
                                <i class="fa fa-print"></i> One Page Biodata Print
                            </a>
                        </div>

                        <div class="tab-pane fade" id="tab-resume">
                            <a class="btn btn-primary btn-lg" href="<?= base_url('Faculty_Profile/print_resume'); ?>" target="_blank">
                                <i class="fa fa-print"></i> Print Full Resume
                            </a>
                        </div>

                    </div> <!-- tab-content -->

                </div> <!-- card-body -->

            </div> <!-- card -->
        </div>
    </div>
</div>
