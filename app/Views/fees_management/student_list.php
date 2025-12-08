<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.student'); ?> <?= lang('App.list'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.student'); ?> <?= lang('App.list'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.student'); ?>  <?= lang('App.list'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php // if (!empty($head_group_datas)): ?>
                    <table id="feesTable" class="table table-bordered text-nowrap table-primary table-striped w-100">
                        <thead>
                            <tr>
                                <th><?= lang('App.sr'); ?> <?= lang('App.no'); ?></th>
                                <th><?= lang('App.rise'); ?> <?= lang('App.no'); ?></th>
                                <th><?= lang('App.student'); ?> <?= lang('App.name'); ?></th>
                                <th><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                                <th><?= lang('App.year'); ?></th>
                                <th><?= lang('App.academic'); ?> <?= lang('App.year'); ?></th>
                                <th><?= lang('App.payment'); ?> <?= lang('App.category'); ?></th>
                                <th><?= lang('App.fees'); ?></th>
                                <th><?= lang('App.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>202610100001</td>
                                <td>Amar Jadhav</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>5123</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>202610100002</td>
                                <td>Ashwini Shinde</td>
                                <td>B.A.</td>
                                <td>Second Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>6487</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>202610100003</td>
                                <td>Priyanka Solanki</td>
                                <td>B.A.</td>
                                <td>Second Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>7458</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>202610100004</td>
                                <td>Avinash Shinde</td>
                                <td>B.A.</td>
                                <td>Third Year</td>
                                <td>2025-2026</td>
                                <td>EBC</td>
                                <td>6574</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>202610100005</td>
                                <td>Shivendra Salunkhe</td>
                                <td>B.A.</td>
                                <td>First Year</td>
                                <td>2025-2026</td>
                                <td>Paying</td>
                                <td>5000</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>202610100006</td>
                                <td>Aditya Bhosale</td>
                                <td>B.A.</td>
                                <td>Third Year</td>
                                <td>2025-2026</td>
                                <td>Scholarship</td>
                                <td>2145</td>
                                <td><button class="btn btn-purple shadow-purple btn-wave">Pay</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>