<?php if (session('logged_in') && session('is_first_login') == 1): ?>
    <div class="modal fade" id="firstLoginModal">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Change Password (First Login)</h5>
                </div>

                <div class="modal-body">
                    <form method="post" action="<?= base_url('change-password-first-login') ?>">

                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Old Password</label>

                            <div class="input-group">
                                <input type="password"id="old_password"name="old_password"class="form-control"required onkeyup="match_old_password();">
                                <span class="input-group-text bg-white"role="button"onclick="createpassword('old_password', this)"><i class="ri-eye-off-line align-middle"></i></span>
                            </div>
                            <small id="old_password_error" class="text-danger"></small>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password"id="first_login_password"name="password"class="form-control"required>
                                <span class="input-group-text bg-white"role="button"onclick="createpassword('first_login_password', this)"><i class="ri-eye-off-line align-middle"></i>
                                </span>
                            </div>
                            <small id="first_login_password_error" class="text-danger"></small>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password"id="first_login_confirm_password"name="confirm_password"class="form-control"required>
                                <span class="input-group-text bg-white"role="button"onclick="createpassword('first_login_confirm_password', this)"><i class="ri-eye-off-line align-middle"></i></span>
                            </div>

                            <small id="first_login_password_match"></small>
                        </div>

                        <div class="d-grid gap-2 mt-3">
                            <button type="submit"id="SaveBtn"class="btn btn-primary"disabled>Update Password</button>
                            <a href="<?= base_url('logout') ?>"class="btn btn-outline-primary">← Back</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>

