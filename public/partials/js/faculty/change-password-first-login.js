document.addEventListener('DOMContentLoaded', function () {

    // Only run for first login
    if (typeof FIRST_LOGIN === 'undefined' || FIRST_LOGIN !== true) {
        return;
    }

    // 🔐 Reuse common password validation
    passwordValidation(
        '#first_login_password',
        '#first_login_confirm_password',
        '#first_login_password_error',
        '#first_login_password_match',
        '#firstLoginSaveBtn'
    );

    // 🔒 Force modal open
    const modal = document.getElementById('firstLoginModal');
    if (!modal) return;

    new bootstrap.Modal(modal, { 
        backdrop: 'static',
        keyboard: false
    }).show();
});
