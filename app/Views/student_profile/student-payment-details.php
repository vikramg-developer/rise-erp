<div class="tab-pane fade border-0 p-0" id="payment-tab-pane" role="tabpanel"
     aria-labelledby="payment-tab-pane" tabindex="0">
    <div class="p-4">
        <p class="mb-1 fw-semibold text-muted op-5 fs-20">07</p>
        <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
            <div><?= lang('App.payment'); ?>  <?= lang('App.details'); ?> :</div>
            <div class="mt-sm-0 mt-2">
                <div class="modal fade" id="modal-new-payment" tabindex="-1"aria-labelledby="modal-new-payment" data-bs-keyboard="false"aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h6 class="modal-title" id="modal-new-payment">Scan to pay
                                </h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <h6>STATE BANK OF INDIA</h6>
                                <img src="<?php echo base_url('assets/images/ecommerce/png/qr_code.png'); ?>" height="20%" width="40%"alt="">

                                <p>Scan to Pay</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                                            <div class="modal fade"  id="modal-new-payment" tabindex="-1" aria-labelledby="modal-new-payment" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title" id="staticBackdropLabel">Scan to pay    
                                                                            </h6>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body d-flex justify-content-center align-items-center" >
                                                                            <div class="row gy-3 justify-content-center text-center">
                                                                                <div class="mb-3">
                
                                                                                    <h6 class="fw-bold mb-1">STATE BANK OF INDIA</h6>
                
                                                                                    <img src="<?php echo base_url('assets/images/ecommerce/png/qr_code.png'); ?>" 
                                                                                         height="20%" width="40%" 
                                                                                         alt="" class="img-fluid my-2">
                
                                                                                    <p class="mb-0 fw-semibold">Scan to Pay</p>
                                                                                </div>
                
                                                                            </div>
                                                                        </div>
                
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-success">Proceed
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>-->
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Year Name</th>
                        <th scope="col">Fees</th>
                        <th scope="col">Pay</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>1</td>
                        <td>B.com</td>
                        <td>First Year</td>
                        <td>10000</td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-new-payment"class="btn btn-success">Pay
                            </button>

                        </td>
                    </tr>



                </tbody>
            </table>
        </div>


    </div>

</div>