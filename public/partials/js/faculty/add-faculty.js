document.addEventListener("DOMContentLoaded", function () {

    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm_password");

    confirmPassword.addEventListener("input", function () {
        if (confirmPassword.value !== password.value) {
            confirmPassword.setCustomValidity("Passwords do not match.");
        } else {
            confirmPassword.setCustomValidity("");
        }
    });

    password.addEventListener("input", function () {
        if (confirmPassword.value.length > 0) {
            confirmPassword.dispatchEvent(new Event("input"));
        }
    });

});
