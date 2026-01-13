<div class="tab-pane fade border-0 p-0" id="delivery-tab-pane" role="tabpanel"
     aria-labelledby="delivery-tab-pane" tabindex="0">
    <div class="p-4">
        <p class="mb-1 fw-semibold text-muted op-5 fs-20">04</p>
        <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
            <div><?= lang('App.educational'); ?> <?= lang('App.details'); ?> :</div>
            <div class="mt-sm-0 mt-2">
                <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modal-new-address"><i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i><?= lang('App.add'); ?>  <?= lang('App.educational'); ?> <?= lang('App.details'); ?> </button>
                <div class="modal fade"  id="modal-new-address" tabindex="-1" aria-labelledby="modal-new-address" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="staticBackdropLabel"><?= lang('App.add'); ?> <?= lang('App.educational'); ?> <?= lang('App.details'); ?>
                                </h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="student-educationaldetails-form">
                                    <div class="row gy-3">
                                        <!--department-->
                                        <div class="col-xl-6">
                                            <label class="form-label"><?= lang('App.department'); ?> <?= lang('App.name'); ?><span class="text-danger">*</span></label>
                                            <select class="form-control" name="student_department_id"id="student_department_id" >
                                                <option value="">Select</option>
                                                <?php foreach ($department as $d): ?> <option value="<?= esc($d['department_id']) ?>" <?= (!empty($student_educational_data['student_department_id']) && $student_educational_data['student_department_id'] == $d['department_id']) ? 'selected' : '' ?>><?= esc($d['department_name']) ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger" id="student_department_id_error" style="display:none;"></small>
                                        </div>
                                        <!--student institution name-->
                                        <div class="col-xl-6">
                                            <label for="student_institution_name" class="form-label"><?= lang('App.institution'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" id="student_institution_name" placeholder="<?= lang('App.institution'); ?> <?= lang('App.name'); ?>" name="student_institution_name"value="">
                                            <small class="text-danger" id="student_institution_name_error" style="display:none;"></small>
                                        </div>
                                        <!--student university name-->
                                        <div class="col-xl-6">
                                            <label for="student_institution_university" class="form-label"><?= lang('App.university'); ?> <?= lang('App.name'); ?> <span class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" id="student_institution_university" placeholder="<?= lang('App.university'); ?> <?= lang('App.name'); ?>" name="student_institution_university"value="">
                                            <small class="text-danger" id="student_institution_university_error" style="display:none;"></small>
                                        </div>
                                        <!--month of passing-->
                                        <div class="col-xl-6">
                                            <label class="form-label"><?= lang('App.month'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?><span class="text-danger">*</span></label>
                                            <select class="form-control" name="student_month_of_passing"id="student_month_of_passing" >
                                                <option value="">Select</option>
                                                <?php foreach ($department as $d): ?> <option value="<?= esc($d['department_id']) ?>" <?= (!empty($student_educational_data['student_month_of_passing']) && $student_educational_data['student_month_of_passing'] == $d['department_id']) ? 'selected' : '' ?>><?= esc($d['department_name']) ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger" id="student_month_of_passing_error" style="display:none;"></small>
                                        </div>
                                        <!--year of passing-->
                                        <div class="col-xl-6">
                                            <label class="form-label"><?= lang('App.year'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?><span class="text-danger">*</span></label>
                                            <select class="form-control " name="student_year_of_passing"id="student_year_of_passing" >
                                                <option value="">Select</option>
                                                <?php foreach ($passing_year as $p): ?> <option value="<?= esc($p['academic_year_id']) ?>" <?= (!empty($student_educational_data['student_year_of_passing']) && $student_educational_data['student_year_of_passing'] == $p['academic_year_id']) ? 'selected' : '' ?>><?= esc($p['academic_year_name']) ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger" id="student_year_of_passing_error" style="display:none;"></small>
                                        </div>
                                        <!--seat no-->
                                        <div class="col-xl-6">
                                            <label for="student_seat_no" class="form-label"><?= lang('App.seat'); ?> <?= lang('App.no'); ?> <span class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" id="student_seat_no" placeholder="<?= lang('App.seat'); ?> <?= lang('App.no'); ?>" name="student_seat_no"value="">
                                            <small class="text-danger" id="student_seat_no_error" style="display:none;"></small>
                                        </div>
                                        <!--marking system-->
                                        <div class="col-xl-6">
                                            <label class="form-label"><?= lang('App.marking'); ?> <?= lang('App.system'); ?><span class="text-danger">*</span></label>
                                            <select class="form-control" name="student_marking_system" id="student_marking_system">
                                                <option value="">Select</option>
                                                <option value="marks"> Marks</option>
                                                <option value="grade"> Grade</option>
                                            </select>
                                            <small class="text-danger" id="student_marking_system_error" style="display:none;"></small>
                                        </div>
                                        <!--total marks-->
                                        <div class="col-xl-6">
                                            <label for="student_total_marks" class="form-label"><?= lang('App.total'); ?> <?= lang('App.marks'); ?> <span class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" id="student_total_marks" placeholder="<?= lang('App.total'); ?> <?= lang('App.marks'); ?>" name="student_total_marks"value="">
                                            <small class="text-danger" id="student_total_marks_error" style="display:none;"></small>
                                        </div>
                                        <!--obtain marks-->
                                        <div class="col-xl-6">
                                            <label for="student_obtain_marks" class="form-label"><?= lang('App.obtain'); ?> <?= lang('App.marks'); ?> <span class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" id="student_obtain_marks" placeholder="<?= lang('App.obtain'); ?> <?= lang('App.marks'); ?>" name="student_obtain_marks"value="">
                                            <small class="text-danger" id="student_obtain_marks_error" style="display:none;"></small>
                                        </div>
                                        <!--percentage-->
                                        <div class="col-xl-6">
                                            <label for="student_percentage" class="form-label"><?= lang('App.percentage'); ?><span class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" id="student_percentage" placeholder="<?= lang('App.percentage'); ?>" name="student_percentage"value="">
                                            <small class="text-danger" id="student_percentage_error" style="display:none;"></small>
                                        </div>
                                        <!--percentage-->
                                        <div class="col-xl-6">
                                            <label for="student_grade" class="form-label"><?= lang('App.grade'); ?><span class="text-danger">*</span></label></label>
                                            <input type="text" class="form-control" id="student_grade" placeholder="<?= lang('App.grade'); ?>" name="student_grade"value="">
                                            <small class="text-danger" id="student_grade_error" style="display:none;"></small>
                                        </div>
                                        <!--date of passing -->
                                        <div class="col-xl-6">
                                            <label class="form-label"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?><span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i></div>
                                                <input type="date"class="form-control"id="dob"name="student_date_of_passing">
                                            </div>
                                            <small class="text-danger" id="student_date_of_passing_error" style="display:none;"></small>
                                        </div>


                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="fetchStudentEducationalDetails"class="table text-nowrap table-bordered">

                <thead>
                    <tr>
                        <th scope="col">I</th>
                        <th scope="col"><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                        <th scope="col"><?= lang('App.institution'); ?> <?= lang('App.name'); ?></th>
                        <th scope="col"><?= lang('App.university'); ?> <?= lang('App.name'); ?></th>
                        <th scope="col"><?= lang('App.year'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?></th>
                        <th scope="col"><?= lang('App.month'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?></th>
                        <th scope="col"><?= lang('App.date'); ?> <?= lang('App.of'); ?> <?= lang('App.passing'); ?></th>
                        <th scope="col"><?= lang('App.seat'); ?> <?= lang('App.no'); ?></th>
                        <th scope="col"><?= lang('App.total'); ?> <?= lang('App.marks'); ?></th>
                        <th scope="col"><?= lang('App.obtain'); ?> <?= lang('App.marks'); ?></th>
                        <th scope="col"><?= lang('App.percentage'); ?></th>
                        <th scope="col"><?= lang('App.grade'); ?> </th>

                    </tr>
                </thead>

            </table>
        </div>


    </div>

</div>