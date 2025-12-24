  <div class="tab-pane fade  border-0 p-0" id="order-tab-pane" role="tabpanel"aria-labelledby="order-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">02</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div><?= lang('App.address'); ?> <?= lang('App.details'); ?> :</div>
                                        <div class="mt-sm-0 mt-2">

                                        </div>
                                    </div>
                                    <div class="row gy-4">
                                        <div class="col-xl-10">
                                            <label for="student-permanant-address" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.address'); ?></label>
                                            <textarea class="form-control" aria-label="With textarea"id="student-permanant-address" name="student-permanant-address"></textarea>                                       
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-permanent-pincode" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?></label>
                                            <input type="text" class="form-control" id="student-permanent-pincode" name="student-permanent-pincode"placeholder="<?= lang('App.permanent'); ?> <?= lang('App.pincode'); ?>" value="">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-permanent-country" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.country'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-country"name="student-permanent-country"required>
                                                <option value="1">India</option>
                                                <option value="2">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-permanent-state" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.state'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-state"name="student-permanent-state"required>
                                                <option value="1">Maharashtra</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-permanent-taluka" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.taluka'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-taluka"name="student-permanent-taluka"required>
                                                <option value="1">Satara</option>
                                                <option value="1">Wai</option>

                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-permanent-district" class="form-label"><?= lang('App.permanent'); ?> <?= lang('App.district'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-permanent-district"name="student-permanent-district"required>
                                                <option value="1">Satara</option>
                                            </select>
                                        </div>


                                        <span><p class="mb-3 px-0 text-muted">Same as Permanant Address</p>
                                            <input class="form-check-input ms-2" type="checkbox" value="" checked=""></span>

                                        <div class="col-xl-10">
                                            <label for="student-current-address" class="form-label"><?= lang('App.current'); ?> <?= lang('App.address'); ?></label>
                                            <textarea class="form-control" aria-label="With textarea"id="student-current-address" name="student-current-address"></textarea>                                       
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-current-pincode" class="form-label"><?= lang('App.current'); ?> <?= lang('App.pincode'); ?></label>
                                            <input type="text" class="form-control" id="student-current-pincode" name="student-current-pincode"placeholder="<?= lang('App.current'); ?> <?= lang('App.pincode'); ?>" value="">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-current-country" class="form-label"><?= lang('App.current'); ?> <?= lang('App.country'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-current-country"name="student-current-country"required>
                                                <option value="1">India</option>
                                                <option value="2">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-current-state" class="form-label"><?= lang('App.current'); ?> <?= lang('App.state'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-current-state"name="student-current-state"required>
                                                <option value="1">Maharashtra</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-current-taluka" class="form-label"><?= lang('App.current'); ?> <?= lang('App.taluka'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-current-taluka"name="student-current-taluka"required>
                                                <option value="1">Satara</option>
                                                <option value="1">Wai</option>

                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student-current-district" class="form-label"><?= lang('App.current'); ?> <?= lang('App.district'); ?></label>
                                            <select class="form-control" data-trigger name="choices-single-default" id="student-current-district"name="student-current-district"required>
                                                <option value="1">Satara</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                                                    <button type="button" class="btn btn-success-light" id="personal-details-trigger">Personal Details<i class="ri-user-3-line ms-2 align-middle d-inline-block"></i></button>
                                                                </div>-->
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-success" id="personal-details-trigger">Submit</button>
                                </div>
                            </div>