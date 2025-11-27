<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Leaving Certificate</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Rise</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Leaving Certificate</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
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
                                                <label for="product-category-add" class="form-label">Course</label>
                                                <select class="form-control" data-trigger name="product-category-add" id="product-category-add">
                                                    <option value="">Select Course</option>
                                                    <option value="1">Computer Science & Engineering</option>
                                                    <option value="2">Civil Engineering</option>
                                                    <option value="3">Mechanical Engineering</option>
                                                    <option value="4">E & TC Engineering</option>

                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="product-gender-add" class="form-label">Year</label>
                                                <select class="form-control" data-trigger name="product-gender-add" id="product-gender-add">
                                                    <option value="">Select Year</option>
                                                    <option value="1">First Year</option>
                                                    <option value="2">Second Year</option>
                                                    <option value="3">Third Year</option>
                                                    <option value="4">Fourth Year</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="product-size-add" class="form-label">Academic Year</label>
                                                <select class="form-control" data-trigger name="product-size-add" id="product-size-add">
                                                    <option value="">Select Academic Year</option>
                                                    <option value="Extra Small">2024-2025</option>
                                                    <option value="Small">2023-2024</option>
                                                    <option value="Medium">2022-2023</option>
                                                    <option value="Large">2021-2022</option>
                                                    <option value="Extra Large">2020-2021</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button class="btn btn-primary-light m-1">Search</button>
                    </div>
                    <?php
                    print_r($lc_data);
                    ?>
                    <div class="p-4 border-top ">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Rise No</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Mobile No.</th>
                                        <th scope="col">Academic Year</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Print</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>R11120250001</td>
                                        <td>Nagesh Tukaram Shinde</td>
                                        <td>9876543210</td>
                                        <td>2024-2025</td>
                                        <td>Civil Engineering</td>
                                        <td>Third Year</td>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-wave">
                                                <i class="ri-download-2-line align-middle me-2 d-inline-block"></i>Leaving Certificate
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>R11120250002</td>
                                        <td>Raj Ajay Kale</td>
                                        <td>9876656560</td>
                                        <td>2024-2025</td>
                                        <td>Civil Engineering</td>
                                        <td>Third Year</td>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-wave">
                                                <i class="ri-download-2-line align-middle me-2 d-inline-block"></i>Leaving Certificate
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>R11120250003</td>
                                        <td>Anil Shankar Patil</td>
                                        <td>9876543210</td>
                                        <td>2024-2025</td>
                                        <td>Civil Engineering</td>
                                        <td>Third Year</td>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-wave">
                                                <i class="ri-download-2-line align-middle me-2 d-inline-block"></i>Leaving Certificate
                                            </button>
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
    <!--End::row-1 -->


</div>
