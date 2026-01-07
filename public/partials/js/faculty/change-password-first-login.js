/**
 * =====================================
 * FIRST LOGIN PASSWORD HANDLER
 * =====================================
 */

document.addEventListener('DOMContentLoaded', function () {

    if (typeof FIRST_LOGIN === 'undefined' || FIRST_LOGIN !== true) {
        return;
    }

    // 🔒 Force modal open
    const modal = document.getElementById('firstLoginModal');
    if (modal) {
        new bootstrap.Modal(modal, {
            backdrop: 'static',
            keyboard: false
        }).show();
    }

    // common validation
    passwordValidation(
        '#first_login_password',
        '#first_login_confirm_password',
        '#first_login_password_error',
        '#first_login_password_match',
        '#SaveBtn'
    );
});

let oldPasswordOk = false;

/**
 * OLD PASSWORD CHECK (AJAX)
 */
$(document).on('input', '#old_password', function () {
    matchOldPassword();
});

function matchOldPassword() {

    const oldPassword = $('#old_password').val();
    const msg = $('#old_password_error');

    if (!oldPassword) {
        msg.text('');
        oldPasswordOk = false;
        disableSave();
        return;
    }

    $.ajax({
        url: BASE_URL + '/check-old-password',
        type: 'POST',
        dataType: 'json',
        data: {
            old_password: oldPassword,
            [csrfName]: csrfHash
        },
        success: function (res) {

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
            disableSave();
        }
    });
}

/**
 * LISTEN NEW & CONFIRM PASSWORD
 */
$(document).on(
    'input',
    '#first_login_password, #first_login_confirm_password',
    finalPasswordCheck
);

/**
 * FINAL VALIDATION
 */
function finalPasswordCheck() {

    const oldPassword = $('#old_password').val();
    const newPassword = $('#first_login_password').val();
    const confirmPassword = $('#first_login_confirm_password').val();
    const saveBtn = $('#SaveBtn');
    const newPassErr = $('#first_login_password_error');

    // ❌ old password not verified
    if (!oldPasswordOk) {
        saveBtn.prop('disabled', true);
        return;
    }

    // ❌ length
    if (newPassword.length < 8) {
        newPassErr.text('Password must be at least 8 characters').show();
        saveBtn.prop('disabled', true);
        return;
    }

    // ❌ same as old
    if (oldPassword === newPassword) {
        newPassErr.text('New password must be different from old password').show();
        saveBtn.prop('disabled', true);
        return;
    }

    // ❌ mismatch
    if (newPassword !== confirmPassword) {
        saveBtn.prop('disabled', true);
        return;
    }

    // ✅ all good
    newPassErr.text('');
    saveBtn.prop('disabled', false);
}

function disableSave() {
    $('#SaveBtn').prop('disabled', true);
}
