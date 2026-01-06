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
                        <input type="password"
                               id="old_password"
                               name="old_password"
                               class="form-control"
                               required onkeyup="match_old_password();">
                        <small id="old_password_error" class="text-danger"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password"
                               id="first_login_password"
                               name="password"
                               class="form-control"
                               required>
                        <small id="first_login_password_error" class="text-danger"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password"
                               id="first_login_confirm_password"
                               name="confirm_password"
                               class="form-control"
                               required>
                        <small id="first_login_password_match"></small>
                    </div>

                    <button type="submit"
                            id="firstLoginSaveBtn"
                            class="btn btn-primary w-100"
                            disabled>
                        Update Password
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>

<!--<script>
    function match_old_password(){
        let old_password = document.getElementById('old_password').value;
//        console.log(old_password);
        
        $.ajax({
            url: BASE_URL + 'faculty/check-old-password',
            type:'post',
            data:{
                old_password: old_password,
                [csrfName]: csrfHash
            },
            dataType:'json',
            success:function(response){
                console.log(response.message);
                csrfHash = response.csrfHash;
            }
        });
    }
    </script>-->

<script>
/**
 * =====================================
 * FIRST LOGIN – PASSWORD LOGIC
 * =====================================
 */

// 🔹 One flag only
let oldPasswordOk = false;

/**
 * OLD PASSWORD CHECK (AJAX)
 */
function match_old_password() {

    const oldPassword = $('#old_password').val();
    const msg = $('#old_password_error');

    if (oldPassword.trim() === '') {
        msgEl.text('');
        oldPasswordOk = false;
        forceDisableSave();
        return;
    }

    $.ajax({
        url: BASE_URL + 'faculty/check-old-password',
        type: 'POST',
        dataType: 'json',
        data: {
            old_password: oldPassword,
            [csrfName]: csrfHash
        },
        success: function (res) {

            // 🔐 update CSRF
            csrfHash = res.csrfHash;
            $('input[name="' + csrfName + '"]').val(csrfHash);

            msg.text(res.message);

            if (res.status === true) {
                msg.removeClass('text-danger').addClass('text-success');
                oldPasswordOk = true;
            } else {
                msg.removeClass('text-success').addClass('text-danger');
                oldPasswordOk = false;
            }

            finalPasswordCheck();
        },
        error: function () {
            msg.text('Something went wrong').addClass('text-danger');
            oldPasswordOk = false;
            forceDisableSave();
        }
    });
}

/**
 * LISTEN TO NEW & CONFIRM PASSWORD INPUT
 */
$(document).on(
    'input',
    '#first_login_password, #first_login_confirm_password',
    function () {
        finalPasswordCheck();
    }
);

/**
 * 🔥 FINAL DECISION – THIS OVERRIDES COMMON JS
 */
function finalPasswordCheck() {

    setTimeout(function () {

        const oldPassword = $('#old_password').val();
        const newPassword = $('#first_login_password').val();
        const confirmPassword = $('#first_login_confirm_password').val();
        const saveBtn = $('#firstLoginSaveBtn');
        const newPassErr = $('#first_login_password_error');

        // ❌ old password not verified
        if (!oldPasswordOk) {
            saveBtn.prop('disabled', true);
            return;
        }

        // ❌ new password same as old password
        if (oldPassword && newPassword && oldPassword === newPassword) {
            newPassErr
                .text('New password must be different from old password')
                .show();
            saveBtn.prop('disabled', true);
            return;
        }

        // ❌ new & confirm mismatch
        if (!newPassword || newPassword !== confirmPassword) {
            saveBtn.prop('disabled', true);
            return;
        }

        // ✅ ALL CONDITIONS PASSED
        saveBtn.prop('disabled', false);

    }, 0);
}



/**
 * FORCE DISABLE SAVE BUTTON
 */
function forceDisableSave() {
    $('#firstLoginSaveBtn').prop('disabled', true);
}
</script>

