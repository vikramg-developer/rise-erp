/**
 * =====================================================
 * DASHBOARD COMMON JS
 * Runs on ALL dashboards
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
});
