// Reuse common password validation
passwordValidation(
        '#faculty_password',
        '#confirm_password',
        '#faculty_password_error',
        '#password-message',
        '#faculty-registration-form button[type="submit"]'
        );

// Disable new password until old password is verified
$('#faculty_password, #confirm_password').prop('disabled', true);

// Old password live check
$('#old_password').on('keyup', function () {

    let oldPass = this.value;
    if (oldPass.length < 4)
        return;

    $.ajax({
        url: BASE_URL + 'change-password/check-old',
        type: 'POST',
        data: {
            old_password: oldPass,
            [csrfName]: csrfHash
        },
        dataType: 'json',

        success: function (res) {
            csrfHash = res.csrfHash;

            if (res.status) {
                $('#old_password_error')
                        .removeClass('text-danger')
                        .addClass('text-success')
                        .text('✓ Old password matched')
                        .show();


                $('#faculty_password, #confirm_password').prop('disabled', false);
            } else {
                $('#old_password_error')
                        .text('✗ Incorrect old password')
                        .css('color', 'red')
                        .show();

                $('#faculty_password, #confirm_password').prop('disabled', true);
                $('#faculty-registration-form button[type="submit"]').prop('disabled', true);
            }
        }
    });
});

// Submit password
$('#faculty-registration-form').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: BASE_URL + 'change-password/update',
        type: 'POST',
        data: {
            old_password: $('#old_password').val(),
            password: $('#faculty_password').val(),
            confirm_password: $('#confirm_password').val(),
            [csrfName]: csrfHash
        },
        dataType: 'json',

        success: function (res) {
            csrfHash = res.csrfHash;

            if (res.status === 'error') {
                showErrorMessage(res.message);
                return;
            }

            showToast('success', res.message);
            $('#faculty-registration-form')[0].reset();
            $('#faculty-registration-form button[type="submit"]').prop('disabled', true);
            $('#faculty_password, #confirm_password').prop('disabled', true);
        }
    });
});
