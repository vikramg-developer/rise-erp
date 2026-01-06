/**
 * =====================================================
 * DASHBOARD COMMON JS
 * Runs on ALL dashboards ()
 * =====================================================
 */

$(document).ready(function () {

    /* =====================================================
     * 1. PREVENT BACK BUTTON AFTER LOGIN
     * ===================================================== */
    history.pushState(null, null, location.href);

    window.onpopstate = function () {
        history.go(1);
    };


    /* =====================================================
     * 2. FIRST LOGIN PASSWORD FORCE (FACULTY – ANY ROLE)
     * ===================================================== */
    if (typeof IS_FIRST_LOGIN !== 'undefined' && IS_FIRST_LOGIN === 1) {

        // Safety check: modal must exist
        if ($('#changePasswordModal').length) {

            $('#changePasswordModal').modal({
                backdrop: 'static', // disable outside click
                keyboard: false     // disable ESC
            });

            $('#changePasswordModal').modal('show');
        }
    }


    /* =====================================================
     * 3. OPTIONAL: BLOCK DASHBOARD INTERACTION
     * (menu, links) UNTIL PASSWORD IS CHANGED
     * ===================================================== */
    if (typeof IS_FIRST_LOGIN !== 'undefined' && IS_FIRST_LOGIN === 1) {

        // Disable all links except modal buttons
        $(document).on('click', 'a', function (e) {
            if (!$(this).closest('#changePasswordModal').length) {
                e.preventDefault();
            }
        });
    }

});
