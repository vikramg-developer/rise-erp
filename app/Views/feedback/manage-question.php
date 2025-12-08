<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.manage') ?> <?= lang('App.question') ?> </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Rise</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.manage') ?> <?= lang('App.question') ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <!--=====================================================================-->
                            <div class="card-header">
                                <!------------------------back Button-------------------------------------------------------->
                                <a href="<?php echo base_url('feedback'); ?>" 
                                   class="btn btn-primary  btn-wave me-2">
                                    <i class="ri-arrow-go-back-line align-middle me-2 d-inline-block"></i>
                                    <?= lang('App.back') ?>
                                </a>
                                <!------------------------Add Question Button-------------------------------------------------------->
                                <button class="btn  btn-success btn-wave me-2" data-bs-toggle="modal" data-bs-target="#create-task">
                                    <i class="ri-add-line align-middle me-2 d-inline-block"></i> <?= lang('App.add') ?> <?= lang('App.question') ?> 
                                </button>
                                <!-- Start::add Question modal -->
                                <div class="modal fade" id="create-task" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <?= form_open('feedback/save_question'); ?>  
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title"><?= lang('App.add') ?> <?= lang('App.question') ?></h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-4">
                                                <div class="row gy-2">   
                                                    <div class="col-xl-12">
                                                        <label for="feedback_question" class="form-label"><?= lang('App.feedback') ?> <?= lang('App.question') ?></label>
                                                        <input type="text" class="form-control" id="feedback_question" name="feedback_question" placeholder=" <?= lang('App.feedback') ?> <?= lang('App.question') ?>" required>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="feedback_option1" class="form-label"><?= lang('App.option') ?> 1</label>
                                                        <input type="text" class="form-control" id="feedback_option1" name="feedback_option1" placeholder="<?= lang('App.option') ?> 1" required>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="feedback_option2" class="form-label"><?= lang('App.option') ?> 2</label>
                                                        <input type="text" class="form-control" id="feedback_option2" name="feedback_option2" placeholder="<?= lang('App.option') ?> 2" required>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="feedback_option3" class="form-label"><?= lang('App.option') ?> 3</label>
                                                        <input type="text" class="form-control" id="feedback_option3" name="feedback_option3" placeholder="<?= lang('App.option') ?> 3" required>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="feedback_option4" class="form-label"><?= lang('App.option') ?> 4</label>
                                                        <input type="text" class="form-control" id="feedback_option4" name="feedback_option4" placeholder="<?= lang('App.option') ?> 4" required>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="feedback_option5" class="form-label"><?= lang('App.option') ?> 5</label>
                                                        <input type="text" class="form-control" id="feedback_option5" name="feedback_option5" placeholder="<?= lang('App.option') ?> 5" required>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="feedback_weightage" class="form-label"><?= lang('App.weightage') ?> </label>
                                                        <input type="text" class="form-control" id="feedback_weightage" name="feedback_weightage" placeholder="<?= lang('App.weightage') ?> " required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary"><?= lang('App.add') ?> <?= lang('App.question') ?></button>
                                            </div>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                                <!-- End::add Question modal --> 
                                <!------------------------export excel Button-------------------------------------------------------->
                                <a href="<?php echo base_url('sample_excel_file'); ?>" 
                                   class="btn btn-warning  btn-wave me-2">
                                    <i class="ri-download-line align-middle me-2 d-inline-block"></i>
                                    <?= lang('App.export') ?> <?= lang('App.excel') ?> 
                                </a>
                                <!------------------------upload excel Button-------------------------------------------------------->
                                <button class="btn  btn-secondary btn-wave me-2" data-bs-toggle="modal" data-bs-target="#upload_excel">
                                    <i class="ri-upload-line align-middle me-2 d-inline-block"></i> <?= lang('App.upload') ?> <?= lang('App.excel') ?> 
                                </button>
                                <!-- Start::Upload modal -->
                                <div class="modal fade" id="upload_excel" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <?= form_open('feedback/upload_'); ?>  
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title"><?= lang('App.upload') ?> <?= lang('App.excel') ?></h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-4">
                                                <div class="row gy-2">
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="excel_file" class="form-label"><?= lang('App.upload') ?> <?= lang('App.excel') ?></label>
                                                        <input type="file" class="form-control" id="excel_file" name="excel_file"
                                                        accesskey=""accept=".xlsx, .xls" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary"><?= lang('App.upload') ?> <?= lang('App.file') ?></button>
                                            </div>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                                <!-- End::upload modal --> 
                            </div>
                        <!--=====================================================================-->
                                        <div class="card-body">
                                            <table id="responsiveDataTable" class="table table-bordered w-100">
                                                <thead>
                                                    <tr>
                                                        <th><?= lang('App.sr') ?> <?= lang('App.no') ?></th>
                                                        <th> <?= lang('App.question')?> </th>
                                                        <th><?= lang('App.option')?>1 </th>
                                                        <th><?= lang('App.option')?>2 </th>
                                                        <th><?= lang('App.option') ?>3 </th>
                                                        <th><?= lang('App.option') ?>4 </th>
                                                        <th><?= lang('App.option') ?>5 </th>
                                                        <th><?= lang('App.weightage') ?>  </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-----------------------------1------------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">1</span></td>
                                                        <td><span class="fw-semibold">The teacher has given teaching plan, course objectives and course outcomes before starting the course and it is implemented satisfactorily.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!-------------------------------2----------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">2</span></td>
                                                        <td><span class="fw-semibold">The teacher delivered the course contents in simple language with practical examples and creating interest in the course.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!-------------------------------3----------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">3</span></td>
                                                        <td><span class="fw-semibold">Usage of active learning / innovative tools.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!-------------------------------4----------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">4</span></td>
                                                        <td><span class="fw-semibold">The teacher was regular and covered all units from syllabus.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!-------------------------------5----------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">5</span></td>
                                                        <td><span class="fw-semibold">The teacher clears the doubts raised by students within and outside class-room.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!------------------------------6------------------------------>
                                                    <tr>
                                                        <td><span class="fw-semibold">6</span></td>
                                                        <td><span class="fw-semibold">The teacher has good communication skill, effective class control, overall course teaching and learning is enjoyable and satisfactory.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!------------------------------7------------------------------>
                                                    <tr>
                                                        <td><span class="fw-semibold">7</span></td>
                                                        <td><span class="fw-semibold">The teacher taught the entire course with adequate knowledge about the course content.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!-----------------------------8------------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">8</span></td>
                                                        <td><span class="fw-semibold">The teacher provided references like notes, ppt, links, model answers, videos, NPTEL/SWAYAM links to students for the course content. (online/offline).</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!--------------------------9---------------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">9</span></td>
                                                        <td><span class="fw-semibold">Fairness in the continuous Internal Evaluation Process.</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!--------------------------10---------------------------------->
                                                    <tr>
                                                        <td><span class="fw-semibold">10</span></td>
                                                        <td><span class="fw-semibold">Your satisfaction with quality of teaching of teacher. (Please give a rating on a five-point scale)</span></td>
                                                        <td>Below Average</td>
                                                        <td>Average</td>
                                                        <td>Good</td>
                                                        <td>Very Good </td>
                                                        <td>Excellent</td>
                                                        <td>0.10</td>
                                                        <td> 
                                                            <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->
            </div>

            <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


            <!-- Datatables Cdn -->
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

            <!-- Internal Datatables JS -->
            <script src="<?php echo base_url('assets/js/datatables.js'); ?>"></script>
