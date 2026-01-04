<div class="container mt-5">
    <div class="card col-md-5 mx-auto">
        <div class="card-header text-center">
            <h5>Change Password (First Login)</h5>
        </div>

        <div class="card-body">
            <form method="post" action="<?= base_url('faculty/update-password') ?>">

                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100">Update Password</button>
            </form>
        </div>
    </div>
</div>
