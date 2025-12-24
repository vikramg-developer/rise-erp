<div class="tab-pane fade border-0 p-0" id="applycourse-tab-pane" role="tabpanel"
     aria-labelledby="applycourse-tab-pane" tabindex="0">
    <div class="p-4">
        <p class="mb-1 fw-semibold text-muted op-5 fs-20">06</p>
        <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
            <div><?= lang('App.apply'); ?> for <?= lang('App.course'); ?> :</div>
            <div class="mt-sm-0 mt-2">
                <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modal-new-applycourse"><i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i><?= lang('App.add'); ?>  <?= lang('App.course'); ?> <?= lang('App.details'); ?> </button>
                <div class="modal fade"  id="modal-new-applycourse" tabindex="-1" aria-labelledby="modal-new-address" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="staticBackdropLabel"><?= lang('App.add'); ?> <?= lang('App.course'); ?> <?= lang('App.details'); ?>
                                </h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label for="student-gender" class="form-label"><?= lang('App.course'); ?> <?= lang('App.name'); ?></label>
                                        <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                            <option value="1">B.com</option>
                                            <option value="2">B.sc</option>
                                            <option value="3">M.com</option>
                                            <option value="4">M.sc</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="student-gender" class="form-label"><?= lang('App.year'); ?> <?= lang('App.name'); ?></label>
                                        <select class="form-control" data-trigger name="choices-single-default" id="student-gender"name="student-gender"required>
                                            <option value="1">First Year</option>
                                            <option value="2">Second Year</option>
                                            <option value="3">Third Year</option>
                                        </select>
                                    </div>



                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Year Name</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>1</td>
                        <td>B.com</td>
                        <td>First Year</td>
                        <td>
                            <div class="hstack gap-2 flex-wrap">
                                <a href="javascript:void(0);" class="text-info fs-14 lh-1"><i
                                        class="ri-edit-line"></i></a>
                                <a href="javascript:void(0);" class="text-danger fs-14 lh-1"><i
                                        class="ri-delete-bin-5-line"></i></a>
                            </div>
                        </td>
                    </tr>



                </tbody>
            </table>
        </div>


    </div>

</div>