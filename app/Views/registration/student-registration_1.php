<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.registration'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.rise'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.registration'); ?></li>
                </ol>
            </nav>                   
        </div>
    </div>                  
    <!-- Page Header Close -->
    
   
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
                                            <div class="col-xl-4">
                                                <label for="first-name" class="form-label"><?= lang('App.first'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="first-name" placeholder=" <?= lang('App.first'); ?> <?= lang('App.name'); ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="middle-name" class="form-label"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="middle-name" placeholder="<?= lang('App.middle'); ?> <?= lang('App.name'); ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="last-name" class="form-label"><?= lang('App.last'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="last-name" placeholder="<?= lang('App.last'); ?> <?= lang('App.name'); ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="mobile-no" class="form-label"><?= lang('App.mobile'); ?> <?= lang('App.number'); ?></label>
                                                <input type="number" class="form-control" id="mobile-no" placeholder="<?= lang('App.mobile'); ?> <?= lang('App.number'); ?>">
                                                <!--<label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Mobile Number must be 10 digits.</label>-->
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="aadhar-no" class="form-label"><?= lang('App.aadhar'); ?> <?= lang('App.number'); ?></label>
                                                <input type="number" class="form-control" id="aadhar-no" placeholder="<?= lang('App.aadhar'); ?> <?= lang('App.number'); ?>">
                                            </div>
                                             <div class="col-xl-4">
                                                <label for="emai" class="form-label"><?= lang('App.email'); ?></label>
                                                <input type="email" class="form-control" id="email" placeholder="Email@xyz.com">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="course-id" class="form-label"><?= lang('App.course'); ?> </label>
                                                <select class="form-control" data-trigger name="course-id" id="course-id">
                                                    <option value=""><?= lang('App.select'); ?> <?= lang('App.course'); ?></option>
                                                    <option value="1">B.A</option>
                                                    <option value="2">B.com</option>
                                                    <option value="3">BSC</option>
                                                </select>
                                            </div>
                                              <div class="col-xl-4">
                                                <label for="year-id" class="form-label"><?= lang('App.year'); ?></label>
                                                <select class="form-control" data-trigger name="year-id" id="year-id">
                                                    <option value=""><?= lang('App.select'); ?> <?= lang('App.year'); ?></option>
                                                    <option value="1">First Year</option>
                                                    <option value="2">Second Year</option>
                                                    <option value="3">Third Year</option>
                                                    <option value="4">Fourth Year</option>
                                                </select>
                                            </div>
                                             <div class="col-xl-4">
                                                <label for="academic-year" class="form-label"><?= lang('App.academic'); ?> <?= lang('App.year'); ?></label>
                                                <select class="form-control" data-trigger name="academic-year" id="academic-year">
                                                    <option value=""><?= lang('App.select'); ?> <?= lang('App.academic'); ?> <?= lang('App.year'); ?></option>
                                                    <option value="2025-2026">2025-2026</option>
                                                    <option value="2024-2025">2024-2025</option>
                                                    <option value="2023-2024">2023-2024</option>
                                                    <option value="2022-2023">2022-2023</option>
                                                </select>
                                            </div>
                                             <div class="col-xl-4">
                                                <label for="password" class="form-label"><?= lang('App.password'); ?></label>
                                                <input type="password" class="form-control" id="password" placeholder="<?= lang('App.password'); ?>">                                          
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="confirm-password" class="form-label"><?= lang('App.confirm'); ?> <?= lang('App.password'); ?></label>
                                                <input type="password" class="form-control" id="confirm-password" placeholder="<?= lang('App.confirm'); ?> <?= lang('App.password'); ?>">                                          
                                            </div>
                                            
                                            <div class="col-xl-4">
                                                <label for="college-code" class="form-label"><?= lang('App.college'); ?> <?= lang('App.code'); ?></label>
                                                <input type="text" class="form-control" id="college-code" placeholder=" <?= lang('App.college'); ?> <?= lang('App.code'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          </div>
                        </div>  
                    </div>  
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button class="btn btn-primary-light m-1"><?= lang('App.submit'); ?></button>
                    </div>
                </div>
                 
            </div>
        </div>
   </div>

