<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0"><?= lang('App.add'); ?> <?= lang('App.role'); ?></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><?= lang('App.dashboard'); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('App.add'); ?> <?= lang('App.role'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <?= form_open('roles/update-role/'.$role_data['role_id']) ?>
                <div class="card-body add-role p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="role_name" class="form-label"><?= lang('App.role'); ?> <?= lang('App.name'); ?></label>
                                                <input type="text" class="form-control" id="role_name" name="role_name" value="<?= esc($role_data['role_name'])?>" placeholder="<?= lang('App.role'); ?> <?= lang('App.name'); ?>">
                                                <?php if(session('errors')): ?>
                                                <small class="text-danger"><?= esc(session('errors.role_name'))?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-header">
                    <div class="card-title">
                        <?= lang('App.permission'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php $user_permissions = json_decode($role_data['permissions'],true) ?>
                    <table id="manageTable" class="table table-bordered table-primary text-nowrap w-100">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?= lang('App.create'); ?></th>
                                <th><?= lang('App.update'); ?></th>
                                <th><?= lang('App.view'); ?></th>
                                <th><?= lang('App.delete'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--faculty_registration-->
<!--                            <tr>
                                <td><?= lang('App.faculty'); ?></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="createFaculty"<?php if(in_array('createFaculty', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="updateFaculty"<?php if(in_array('updateFaculty', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="viewFaculty"<?php if(in_array('viewFaculty', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="deleteFaculty"<?php if(in_array('deleteFaculty', $permissions)){echo "checked";} ?>></td>
                            </tr>
                              Student_Profile
                            <tr>
                                <td><?= lang('App.student'); ?> <?= lang('App.profile'); ?></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="createStudentProfile"<?php if(in_array('createStudentProfile', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="updateStudentProfile"<?php if(in_array('updateStudentProfile', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="viewStudentProfile"  <?php if(in_array('viewStudentProfile', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="deleteStudentProfile"<?php if(in_array('deleteStudentProfile', $permissions)){echo "checked";} ?>></td>
                            </tr>
                              Feedback
                            <tr>
                                <td><?= lang('App.feedback'); ?></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="createFeedback"<?php if(in_array('createFeedback', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="updateFeedback"<?php if(in_array('updateFeedback', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="viewFeedback"  <?php if(in_array('viewFeedback',   $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="deleteFeedback"<?php if(in_array('deleteFeedback', $permissions)){echo "checked";} ?>></td>
                            </tr>
                              certificate
                            <tr>
                                <td><?= lang('App.feedback'); ?></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="createcertificate"<?php if(in_array('createCertificate', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="updateCertificate"<?php if(in_array('updateCertificate', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="viewCertificate"  <?php if(in_array('viewCertificate',   $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="deleteCertificate"<?php if(in_array('deleteCertificate', $permissions)){echo "checked";} ?>></td>
                            </tr>
                              Faculty Profile
                            <tr>
                                <td><?= lang('App.faculty'); ?> <?= lang('App.profile'); ?></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="createFacultyProfile"<?php if(in_array('createFacultyProfile', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="updateFacultyProfile"<?php if(in_array('updateFacultyProfile', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="viewFacultyProfile"  <?php if(in_array('viewFacultyProfile',   $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="deleteFacultyProfile"<?php if(in_array('deleteFacultyProfile', $permissions)){echo "checked";} ?>></td>
                            </tr>
                            
                             Fee_Management
                            <tr>
                                <td><?= lang('App.fees'); ?> <?= lang('App.management'); ?></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="createFeesManagement" <?php if(in_array('createFeesManagement', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="updateFeesManagement" <?php if(in_array('updateFeesManagement', $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="viewFeesManagement" <?php if(in_array('viewFeesManagement',     $permissions)){echo "checked";} ?>></td>
                                <td><input class="form-check-input" type="checkbox" id="permission" name="permission[]" value="deleteFeesManagement" <?php if(in_array('deleteFeesManagement', $permissions)){echo "checked";} ?>></td>
                            </tr>-->
                            <?php foreach ($permissions as $module): ?>
                                    <tr>
                                        
                                        <td><?= $module['label'] ?></td>

                                        <?php foreach ($module['actions'] as $action): ?>
                                            <td>
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="permission[]"
                                                    id="permission"
                                                    value="<?= esc($action) ?>"
                                                    <?php if(in_array(esc($action), $user_permissions)){echo "checked";} ?>
                                                    >
                                            </td>
                                        <?php endforeach; ?>

                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                    
                    <div class="px-4 py-3 border-top border-block-start d-sm-flex justify-content-start">
                        <a href="<?= esc($backUrl); ?>" class="btn btn-info m-1"><?= lang('App.back'); ?><i class="bi bi-skip-backward ms-2"></i></a>
                        <button class="btn btn-success m-1"><?= lang('App.save'); ?><i class="bi bi-save2 ms-2"></i></button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
</div>