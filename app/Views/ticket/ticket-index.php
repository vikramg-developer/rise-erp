<?php
$page_session = \Config\Services::session();
?>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.create') ?> <?= lang('App.ticket') ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard') ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.create') ?> <?= lang('App.ticket') ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if ($page_session->getTempdata('success')): ?>
        <div class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>
    <?php endif; ?>

    <?php if ($page_session->getTempdata('error')): ?>
        <div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">

                                        <?= form_open('create_ticket'); ?>

                                        <div class="row gy-3">

                                            <div class="row">

                                                <!-- College Name -->
                                                <div class="col-xl-6 mb-3">
                                                    <label class="form-label"><?= lang('App.college') ?></label>
                                                    <input type="text" class="form-control" name="college_name" value="KBP COLLEGE" readonly>
                                                </div>

                                                <!-- Category -->
                                                <div class="col-xl-6 mb-3">
                                                    <label class="form-label"><?= lang('App.category') ?> <span class="text-danger">*</span></label>
                                                    <select name="ticket_category" class="form-control" data-trigger>
                                                        <option value="">Select category</option>
                                                        <option value="1" <?= set_value('ticket_category') == 1 ? "selected" : "" ?>>Admission / Registration</option>
                                                        <option value="2" <?= set_value('ticket_category') == 2 ? "selected" : "" ?>>Fees / Payment</option>
                                                        <option value="3" <?= set_value('ticket_category') == 3 ? "selected" : "" ?>>Attendance</option>
                                                        <option value="4" <?= set_value('ticket_category') == 4 ? "selected" : "" ?>>Examination</option>
                                                        <option value="5" <?= set_value('ticket_category') == 5 ? "selected" : "" ?>>Technical / System Error</option>
                                                        <option value="6" <?= set_value('ticket_category') == 6 ? "selected" : "" ?>>Other</option>
                                                    </select>
                                                    <span class="text-danger"><?= isset($validation) ? $validation->getError('ticket_category') : '' ?></span>
                                                </div>

                                                <!-- Issue Title -->
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label"><?= lang('App.issue') ?> <?= lang('App.title') ?> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="issue"
                                                           placeholder="Example: Unable to submit registration form"
                                                           value="<?= set_value('issue') ?>">
                                                    <span class="text-danger"><?= isset($validation) ? $validation->getError('issue') : '' ?></span>
                                                </div>

                                                <!-- Description -->
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label"><?= lang('App.description') ?> <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="description" rows="5"
                                                              placeholder="Explain the issue in detail..."><?= set_value('description') ?></textarea>
                                                    <span class="text-danger"><?= isset($validation) ? $validation->getError('description') : '' ?></span>
                                                </div>

                                                <!-- Priority -->
                                                <div class="col-xl-6 mb-3">
                                                    <label class="form-label"><?= lang('App.priority') ?> <span class="text-danger">*</span></label>
                                                    <select name="priority" class="form-control" data-trigger>
                                                        <option value="">Select priority</option>
                                                        <option value="1" <?= set_value('priority') == 1 ? "selected" : "" ?>>🟠 Medium – Normal issue</option>
                                                        <option value="2" <?= set_value('priority') == 2 ? "selected" : "" ?>>🟧 High – Affects work</option>
                                                        <option value="3" <?= set_value('priority') == 3 ? "selected" : "" ?>>🔴 Urgent – System not usable</option>
                                                        <option value="4" <?= set_value('priority') == 4 ? "selected" : "" ?>>🟢 Low – Minor issue</option>
                                                    </select>
                                                    <span class="text-danger"><?= isset($validation) ? $validation->getError('priority') : '' ?></span>
                                                </div>

                                                <!-- Mobile Number -->
                                                <div class="col-xl-6 mb-3">
                                                    <label class="form-label"><?= lang('App.mobile') ?> <?= lang('App.number') ?> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" maxlength="10"
                                                           name="mobile" placeholder="Enter mobile number"
                                                           value="<?= set_value('mobile') ?>">
                                                    <span class="text-danger"><?= isset($validation) ? $validation->getError('mobile') : '' ?></span>
                                                </div>

                                                <!-- Email -->
                                                <div class="col-xl-6 mb-3">
                                                    <label class="form-label"><?= lang('App.your') ?> <?= lang('App.email') ?> <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control"
                                                           name="email" placeholder="teacher@gmail.com"
                                                           value="<?= set_value('email') ?>">
                                                    <span class="text-danger"><?= isset($validation) ? $validation->getError('email') : '' ?></span>
                                                </div>

                                                <!-- File Attachment -->
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label"><?= lang('App.attach') ?> <?= lang('App.screenshot') ?>/<?= lang('App.file') ?> (<?= lang('App.optional') ?>)</label>
                                                    <input type="file" name="attachment" class="form-control">
                                                </div>

                                            </div>

                                            <!-- Submit Button -->
                                            <div class="float-end mb-3">
                                                <button type="submit" class="btn btn-primary"><?= lang('App.submit') ?> <?= lang('App.ticket') ?></button>
                                            </div>

                                        </div>

                                        <?= form_close(); ?>

                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
