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
