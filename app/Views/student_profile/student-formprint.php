<div class="tab-pane fade border-0 p-0" id="formprint-tab-pane" role="tabpanel"
     aria-labelledby="formprint-tab" tabindex="0">
    <div class="p-4" id="print-area">

        <!-- HEADER -->
        <div class="text-center mb-4">
            <h3 class="mb-1"><?= lang('App.student'); ?> <?= lang('App.registration'); ?> <?= lang('App.form'); ?></h3>
            <p class="mb-0"><?= lang('App.student'); ?> <?= lang('App.profile'); ?></p>
            <hr>
        </div>

        <!-- PERSONAL DETAILS -->
        <h5 class="mb-2"><?= lang('App.personal'); ?> <?= lang('App.details'); ?></h5>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th style="width: 25%;"><?= lang('App.first'); ?> <?= lang('App.name'); ?></th>
                    <td><?= 'NAGESH'; // replace with dynamic value                  ?></td>
                    <th style="width: 25%;"><?= lang('App.middle'); ?> <?= lang('App.name'); ?></th>
                    <td><?= 'TUKARAM'; // replace                  ?></td>
                </tr>
                <tr>
                    <th><?= lang('App.last'); ?> <?= lang('App.name'); ?></th>
                    <td><?= 'SHINDE'; // replace                  ?></td>
                    <th><?= lang('App.rise'); ?> <?= lang('App.number'); ?></th>
                    <td><?= 'S202610100001'; // replace                  ?></td>
                </tr>
                <tr>
                    <th><?= lang('App.aadhar'); ?> <?= lang('App.no'); ?></th>
                    <td><?= '123456789112'; // replace                  ?></td>
                    <th><?= lang('App.email'); ?></th>
                    <td><?= ''; // email                  ?></td>
                </tr>
                <tr>
                    <th><?= lang('App.gender'); ?></th>
                    <td><!-- Male/Female/Transgender --></td>
                    <th><?= lang('App.blood'); ?> <?= lang('App.group'); ?></th>
                    <td><!-- Blood Group --></td>
                </tr>
                <tr>
                    <th><?= lang('App.birth'); ?> <?= lang('App.place'); ?></th>
                    <td><!-- Birth Place --></td>
                    <th><?= lang('App.birth'); ?> <?= lang('App.date'); ?></th>
                    <td><!-- Birth Date --></td>
                </tr>
                <tr>
                    <th><?= lang('App.religion'); ?></th>
                    <td><!-- Religion --></td>
                    <th><?= lang('App.caste'); ?></th>
                    <td><!-- Caste --></td>
                </tr>
                <tr>
                    <th><?= lang('App.subcaste'); ?></th>
                    <td><!-- Sub Caste --></td>
                    <th><?= lang('App.nationality'); ?></th>
                    <td><!-- Nationality --></td>
                </tr>
                <tr>
                    <th><?= lang('App.marital'); ?> <?= lang('App.status'); ?></th>
                    <td><!-- Marital Status --></td>
                    <th><?= lang('App.minority'); ?></th>
                    <td><!-- Yes/No --></td>
                </tr>
                <tr>
                    <th><?= lang('App.physical'); ?> <?= lang('App.handicap'); ?></th>
                    <td><!-- Yes/No --></td>
                    <th><?= lang('App.category'); ?></th>
                    <td><!-- OPEN/OBC/SC/ST --></td>
                </tr>
            </tbody>
        </table>

        <!-- ADDRESS DETAILS -->
        <h5 class="mt-4 mb-2"><?= lang('App.address'); ?> <?= lang('App.details'); ?></h5>
        <h6 class="mb-1"><?= lang('App.permanent'); ?> <?= lang('App.address'); ?></h6>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th style="width: 25%;"><?= lang('App.address'); ?></th>
                    <td><!-- Permanent Address --></td>
                </tr>
                <tr>
                    <th><?= lang('App.pincode'); ?></th>
                    <td><!-- Permanent Pincode --></td>
                </tr>
                <tr>
                    <th><?= lang('App.country'); ?></th>
                    <td><!-- Permanent Country --></td>
                </tr>
                <tr>
                    <th><?= lang('App.state'); ?></th>
                    <td><!-- Permanent State --></td>
                </tr>
                <tr>
                    <th><?= lang('App.taluka'); ?></th>
                    <td><!-- Permanent Taluka --></td>
                </tr>
                <tr>
                    <th><?= lang('App.district'); ?></th>
                    <td><!-- Permanent District --></td>
                </tr>
            </tbody>
        </table>

        <h6 class="mb-1 mt-3"><?= lang('App.current'); ?> <?= lang('App.address'); ?></h6>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th style="width: 25%;"><?= lang('App.address'); ?></th>
                    <td><!-- Current Address --></td>
                </tr>
                <tr>
                    <th><?= lang('App.pincode'); ?></th>
                    <td><!-- Current Pincode --></td>
                </tr>
                <tr>
                    <th><?= lang('App.country'); ?></th>
                    <td><!-- Current Country --></td>
                </tr>
                <tr>
                    <th><?= lang('App.state'); ?></th>
                    <td><!-- Current State --></td>
                </tr>
                <tr>
                    <th><?= lang('App.taluka'); ?></th>
                    <td><!-- Current Taluka --></td>
                </tr>
                <tr>
                    <th><?= lang('App.district'); ?></th>
                    <td><!-- Current District --></td>
                </tr>
            </tbody>
        </table>

        <!-- PARENT DETAILS -->
        <h5 class="mt-4 mb-2"><?= lang('App.parent'); ?> <?= lang('App.details'); ?></h5>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th style="width: 25%;"><?= lang('App.father'); ?> <?= lang('App.name'); ?></th>
                    <td><?= 'TUKARAM'; // replace                  ?></td>
                    <th><?= lang('App.father'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></th>
                    <td><!-- Father Contact --></td>
                </tr>
                <tr>
                    <th><?= lang('App.mother'); ?> <?= lang('App.name'); ?></th>
                    <td><!-- Mother Name --></td>
                    <th><?= lang('App.mother'); ?> <?= lang('App.contact'); ?> <?= lang('App.no'); ?></th>
                    <td><!-- Mother Contact --></td>
                </tr>
                <tr>
                    <th><?= lang('App.father'); ?> <?= lang('App.occupation'); ?></th>
                    <td><!-- Father Occupation --></td>
                    <th><?= lang('App.mother'); ?> <?= lang('App.occupation'); ?></th>
                    <td><!-- Mother Occupation --></td>
                </tr>
                <tr>
                    <th><?= lang('App.family'); ?> <?= lang('App.income'); ?></th>
                    <td colspan="3"><!-- Family Income --></td>
                </tr>
            </tbody>
        </table>

        <!-- EDUCATIONAL DETAILS -->
        <h5 class="mt-4 mb-2"><?= lang('App.educational'); ?> <?= lang('App.details'); ?></h5>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>College Name</th>
                    <th>University Name</th>
                    <th>Course Name</th>
                    <th>Year Of Passing</th>
                    <th>Month Of Passing</th>
                    <th>Date Of Passing</th>
                    <th>Seat No</th>
                    <th>Total Marks</th>
                    <th>Obtained Marks</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through your education records here -->
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
                    <td>10th</td>
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

        <!-- DOCUMENT DETAILS -->
        <h5 class="mt-4 mb-2"><?= lang('App.document'); ?> <?= lang('App.details'); ?></h5>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th><?= lang('App.document'); ?> <?= lang('App.name'); ?></th>
                    <th><?= lang('App.document'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Student Photo</td>
                    <td><!-- You can show file name or small image if needed --></td>
                </tr>
            </tbody>
        </table>

        <!-- COURSE APPLY DETAILS -->
        <h5 class="mt-4 mb-2"><?= lang('App.apply'); ?> for <?= lang('App.course'); ?></h5>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                    <th><?= lang('App.year'); ?> <?= lang('App.name'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>B.com</td>
                    <td>First Year</td>
                </tr>
            </tbody>
        </table>

        <!-- PAYMENT DETAILS -->
        <h5 class="mt-4 mb-2"><?= lang('App.payment'); ?> <?= lang('App.details'); ?></h5>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th><?= lang('App.course'); ?> <?= lang('App.name'); ?></th>
                    <th><?= lang('App.year'); ?> <?= lang('App.name'); ?></th>
                    <th><?= lang('App.fees'); ?></th>
                    <th><?= lang('App.payment'); ?> <?= lang('App.status'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>B.com</td>
                    <td>First Year</td>
                    <td>10000</td>
                    <td><!-- Paid / Unpaid / Partially Paid --></td>
                </tr>
            </tbody>
        </table>

        <!-- DECLARATION -->
        <h5 class="mt-4 mb-2"><?= lang('App.declaration'); ?></h5>
        <p>
            I hereby declare that all the information provided by me in this registration form is true,
            complete, and accurate to the best of my knowledge. I understand that providing any false or
            misleading information may result in the cancellation of my registration and may lead to
            disciplinary action as per the rules and regulations of the institution.
        </p>
        <p>
            I also agree to abide by all the policies, rules, and code of conduct of the institution
            throughout the duration of my study.
        </p>

        <div class="row mt-4">
            <div class="col-md-6">
                <p><strong><?= lang('App.student'); ?> <?= lang('App.name'); ?> :</strong> NAGESH TUKARAM SHINDE</p>
                <p><strong><?= lang('App.date'); ?> :</strong> 09-12-2025</p>
                <p><strong><?= lang('App.place'); ?> :</strong> Satara</p>
            </div>
            <div class="col-md-6 text-end">
                <p><strong><?= lang('App.student'); ?> <?= lang('App.signature'); ?> :</strong></p>
                <br><br>
                <hr class="mt-0" style="width: 60%; margin-left: auto;">
            </div>
        </div>

    </div>

    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
        <button type="button" class="btn btn-secondary me-2" onclick="window.print();">
            <i class="ri-printer-line me-1 align-middle"></i> <?= lang('App.print'); ?>
        </button>
    </div>
</div>