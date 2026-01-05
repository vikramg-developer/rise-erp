$(document).ready(function () {

    // Auto open modal (cannot close)
    $('#changePasswordModal').modal({
        backdrop: 'static',
        keyboard: false
    }).modal('show');

    // Submit password form
    $('#changePasswordForm').on('submit', function (e) {
        e.preventDefault();

        let newPassword = $('#new_password').val();
        let confirmPassword = $('#confirm_password').val();

        if (newPassword !== confirmPassword) {
            $('#password_error').text('Passwords do not match');
            return;
        }

        $.ajax({
            url: BASE_URL + 'faculty/change-password-first-login',
            type: 'POST',
            data: {
                new_password: newPassword,
                csrf_test_name: CSRF_HASH
            },
            success: function (res) {
                if (res.status === 'success') {
                    location.reload();
                } else {
                    $('#password_error').text(res.message);
                }
            }
        });
    });

});
