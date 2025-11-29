<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Create Ticket</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Ticket</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">

                                            <!-- FORM START -->
                                            <form action="<?= base_url('tickets/store') ?>" method="post" enctype="multipart/form-data">

                                                <div class="row">

                                                    <!-- College -->
                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label"><?= lang('App.college')?></label>
                                                        <input type="text" class="form-control" value="KBP COLLEGE" readonly>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label"><?= lang('App.category')?> <span class="text-danger">*</span></label>
                                                        <select name="category" class="form-control" data-trigger id="product-category-add"  required>
                                                            <option value="">Select category</option>
                                                            <option value="registration">Admission / Registration</option>
                                                            <option value="fees">Fees / Payment</option>
                                                            <option value="attendance">Attendance</option>
                                                            <option value="exam">Examination</option>
                                                            <option value="technical">Technical / System Error</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>

                                                    <!-- Issue Title -->
                                                    <div class="col-xl-12 mb-3">
                                                        <label class="form-label"><?= lang('App.issue') ?> <?= lang('App.title') ?><span class="text-danger">*</span></label>
                                                        <input type="text" name="title" class="form-control"
                                                               placeholder="Example: Unable to submit registration form"
                                                               required>
                                                    </div>

                                                    <!-- Description -->
                                                    <div class="col-xl-12 mb-3">
                                                        <label class="form-label"><?= lang('App.description') ?><span class="text-danger">*</span></label>
                                                        <textarea name="description" class="form-control" rows="5"
                                                                  placeholder="Explain the issue in detail..." required></textarea>
                                                    </div>

                                                    <!-- Priority -->
                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label"><?= lang('App.priority') ?><span class="text-danger">*</span></label>
                                                        <select name="priority" class="form-control" data-trigger id="priority" required>
                                                            <option value="">Select priority</option>
                                                            <option value="medium">🟠 Medium – Normal issue</option>
                                                            <option value="high">🟧 High – Affects work</option>
                                                            <option value="urgent">🔴 Urgent – System not usable</option>
                                                            <option value="low">🟢 Low – Minor issue</option>
                                                        </select>
                                                    </div>

                                                    <!-- Mobile (added here) -->
                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label"><?= lang('App.mobile')?> <?= lang('App.number')?> <span class="text-danger">*</span></label>
                                                        <input type="text" name="mobile" class="form-control"
                                                               placeholder="Enter mobile number" maxlength="10" required>
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label"><?= lang('App.your')?> <?= lang('App.email')?> <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control"
                                                               placeholder="teacher@gmail.com" required>
                                                    </div>


                                                    <!-- File attachment -->
                                                    <div class="col-xl-12 mb-3">
                                                        <label class="form-label">Attach <?= lang('App.screenshot')?> / <?= lang('App.file')?> (optional)</label>
                                                        <input type="file" name="attachment" class="form-control">
                                                        <small class="text-muted">Attach screenshot if required.</small>
                                                    </div>

                                                </div>

                                                <!-- Submit Button -->
                                                <div class="float-end mb-3">
                                                    <button type="submit" class="btn btn-primary">Submit Ticket</button>
                                                </div>

                                            </form>
                                            <!-- FORM END -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- row gx-5 -->
                    </div> <!-- p-4 -->
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-xl-12 -->
    </div> <!-- row -->
</div>
