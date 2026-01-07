/**
 * ==========================================
 * COMMON INPUT RULES
 * ==========================================
 */

/**
 * PAN NUMBER
 * - Uppercase - Letters & numbers only - No space
 */
function panUppercase(selector) {
    $(document).on('input', selector, function () {
        this.value = this.value
                .toUpperCase()
                .replace(/[^A-Z0-9]/g, '');
    });
}

/**
 * NAME FIELDS
 * - Letters only  - Uppercase - No space
 */
function nameUppercaseOnly(selector) {
    $(document).on('input', selector, function () {
        this.value = this.value
                .toUpperCase()
                .replace(/[^A-Z]/g, '');
    });
}

/**
 * MOBILE NUMBER
 * - Numbers only  - Max 10 digits  - No space
 */
function mobileNumberOnly(selector) {
    $(document).on('input', selector, function () {
        this.value = this.value
                .replace(/[^0-9]/g, '')
                .slice(0, 10);
    });
}

/**
 * ==========================================
 * PASSWORD RULES (COMMON)
 * ==========================================
 */
function passwordValidation(
    passwordSelector,
    confirmSelector,
    strengthErrorSelector, // faculty_password_error
    matchMessageSelector,  // password-message
    submitBtnSelector
) 
{
    const regex =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // PASSWORD STRENGTH
    $(document).on('input', passwordSelector, function () {
        const password = $(this).val();

        if (!regex.test(password)) {
            $(strengthErrorSelector)
                .text('Password must be 8+ chars with uppercase, lowercase, number & special character')
                .show();

            $(submitBtnSelector).prop('disabled', true);
        } else {
            $(strengthErrorSelector).text('').hide();
        }
    });

    // PASSWORD MATCH
    $(document).on('input', passwordSelector + ', ' + confirmSelector, function () {

        const password = $(passwordSelector).val();
        const confirmPassword = $(confirmSelector).val();

        if (!password || !confirmPassword) {
            $(matchMessageSelector).text('');
            return;
        }

        if (password === confirmPassword) {
            $(matchMessageSelector)
                .text('✓ Passwords match')
                .css('color', 'green');

            $(submitBtnSelector).prop('disabled', false);
        } else {
            $(matchMessageSelector)
                .text('✗ Passwords do not match')
                .css('color', 'red');

            $(submitBtnSelector).prop('disabled', true);
        }
    });
}
