
//const inputs = document.querySelectorAll('.required-input');
//const createBtn = document.getElementById('createBtn');
//
//function validateInputs() {
//    let allFilled = true;
//
//    inputs.forEach(input => {
//        if (input.value.trim() === '') {
//            allFilled = false;
//        }
//    });
//
//    createBtn.disabled = !allFilled;
//}
function isValidPassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
    return passwordRegex.test(password);
}


// Run validation whenever the user types
inputs.forEach(input => {
    input.addEventListener('input', validateInputs);
});
function isNumber(evt)
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

//function checkPasswordMatch() {
//        var signup-password = $("signup-password").val();
//        var signup-confirmpassword = $("#signup-confirmpassword").val();
//        if (signup-password != confirmPassword)
//            $("#CheckPasswordMatch").html("Password does not match!");
//        else
//            $("#CheckPasswordMatch").html("Password match.");
//    }
//    $(document).ready(function () {
//       $("signup-confirmpassword").keyup(checkPasswordMatch);
//    });
function isAlphaKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
        return true;
    return false;
}

function check() {
    const password = document.getElementById('student_password').value;
    const confirmPassword = document.getElementById('signup-confirmpassword').value;
    const msg = document.getElementById('password-message');
    const submitBtn = document.getElementById('signup-submit');

    // Empty fields
    if (password === "" || confirmPassword === "") {
        msg.innerHTML = "";
        submitBtn.disabled = true;
        return;
    }

    // Password format validation
    if (!isValidPassword(password)) {
        msg.style.color = "red";
        msg.innerHTML = "Password must be at least 8 characters, include uppercase, lowercase, number & special character.";
        submitBtn.disabled = true;
        return;
    }

    // Match check
    if (password === confirmPassword) {
        msg.style.color = "green";
        msg.innerHTML = "✓ Passwords match";
        submitBtn.disabled = false;
    } else {
        msg.style.color = "red";
        msg.innerHTML = "✗ Passwords do not match";
        submitBtn.disabled = true;
    }
}


function forceUppercase(el) {
    el.value = el.value.toUpperCase();
}


history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1);
};

















