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
 * - Min 8 characters
 * - 1 uppercase
 * - 1 lowercase
 * - 1 number
 * - 1 special character
 * - Match confirm password
 */
function passwordValidation(passwordSelector, confirmSelector, messageSelector, submitBtnSelector) {

    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Password strength check
    $(document).on('input', passwordSelector, function () {
        const password = $(this).val();

        if (!regex.test(password)) {
            $(messageSelector)
                .text('Password must be 8+ chars with uppercase, lowercase, number & special character')
                .css('color', 'red')
                .show();

            $(submitBtnSelector).prop('disabled', true);
        } else {
            $(messageSelector).text('').hide();
        }
    });

    // Match password & confirm password
    $(document).on('input', passwordSelector + ', ' + confirmSelector, function () {

        const password = $(passwordSelector).val();
        const confirmPassword = $(confirmSelector).val();

        if (password === '' && confirmPassword === '') {
            $(messageSelector).text('');
            return;
        }

        if (password === confirmPassword) {
            $(messageSelector).text('✓ Passwords match').css('color', 'green');
            $(submitBtnSelector).prop('disabled', false);
        } else {
            $(messageSelector).text('✗ Passwords do not match').css('color', 'red');
            $(submitBtnSelector).prop('disabled', true);
        }
    });
}
