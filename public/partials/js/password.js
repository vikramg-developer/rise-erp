passwordValidation(
    '#faculty_password',
    '#confirm_password',
    '#faculty_password_error',
    '#password-message',
    '#faculty-registration-form button[type="submit"]'
);

$('#faculty_password, #confirm_password').prop('disabled', true);

$('#old_password').on('keyup', function () {
    let val = this.value;
    if (val.length < 4) return;

    $.post(BASE_URL + 'password/check-old', {
        old_password: val,
        [csrfName]: csrfHash
    }, function (res) {
        csrfHash = res.csrfHash;

        if (res.status) {
            $('#old_password_error').text('✓ Password matched').css('color','green').show();
            $('#faculty_password, #confirm_password').prop('disabled', false);
        } else {
            $('#old_password_error').text('✗ Wrong password').css('color','red').show();
            $('#faculty_password, #confirm_password').prop('disabled', true);
        }
    }, 'json');
});

$('#faculty-registration-form').on('submit', function (e) {
    e.preventDefault();

    $.post(BASE_URL + 'password/update', {
        old_password: $('#old_password').val(),
        password: $('#faculty_password').val(),
        confirm_password: $('#confirm_password').val(),
        [csrfName]: csrfHash
    }, function (res) {
        csrfHash = res.csrfHash;

        if (res.status === 'error') {
            showErrorMessage(res.message);
            return;
        }

        showToast('success', res.message);
        location.reload(); // closes modal or refreshes page
    }, 'json');
});
