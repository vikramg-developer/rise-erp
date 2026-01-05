<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Change Password (First Login)</h5>
            </div>

            <form id="changePasswordForm">

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <div class="input-group">
                            <input type="password"
                                   class="form-control"
                                   id="new_password"
                                   required>
                            <span class="input-group-text toggle-password">
                                <i class="ri-eye-line"></i>
                            </span>
                        </div>
                        <small class="text-danger" id="password_error"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password"
                               class="form-control"
                               id="confirm_password"
                               required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        Update Password
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
