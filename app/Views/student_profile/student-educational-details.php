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
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label for="fullname-new" class="form-label">School/College Name</label>
                                        <input type="text" class="form-control" id="fullname-new" placeholder="School/College Name">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="email-new" class="form-label">University Name</label>
                                        <input type="email" class="form-control" id="email-new" placeholder="University Name">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="email-new" class="form-label">Date Of Passing</label>
                                        <input type="email" class="form-control" id="email-new" placeholder="Date Of Passing">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="email-new" class="form-label">Month Of Passing</label>
                                        <input type="email" class="form-control" id="email-new" placeholder="Month Of Passing">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="email-new" class="form-label">Seat No</label>
                                        <input type="email" class="form-control" id="email-new" placeholder="Seat No">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="email-new" class="form-label">Total Marks</label>
                                        <input type="email" class="form-control" id="email-new" placeholder="Total Marks">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="email-new" class="form-label">Obtained Marks</label>
                                        <input type="email" class="form-control" id="email-new" placeholder="Obtained Marks">
                                    </div>

                                    <div class="col-xl-6">
                                        <label for="email-new" class="form-label">Percentage </label>
                                        <input type="email" class="form-control" id="email-new" placeholder="Percentage">
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
                        <th scope="col">I</th>
                        <th scope="col">College Name</th>
                        <th scope="col">University Name</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Year Of Passing</th>
                        <th scope="col">Month Of Passing</th>
                        <th scope="col">Date Of Passing</th>
                        <th scope="col">Seat No</th>
                        <th scope="col">Total Mark</th>
                        <th scope="col">Obtained Mark</th>
                        <th scope="col">Percentage</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ABC College of Science</td>
                        <td>XYZ University</td>
                        <td>12th Sci</td>
                        <td>2022</td>
                        <td>May</td>
                        <td>15</td>
                        <td>CS2022101</td>
                        <td>600</td>
                        <td>510</td>
                        <td>85.00%</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>ABC College of Science</td>
                        <td>XYZ University</td>
                        <td>10Th</td>
                        <td>2020</td>
                        <td>June</td>
                        <td>20</td>
                        <td>ME2021098</td>
                        <td>800</td>
                        <td>640</td>
                        <td>80.00%</td>
                    </tr>

                </tbody>
            </table>
        </div>


    </div>

</div>