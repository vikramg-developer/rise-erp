
const inputs = document.querySelectorAll('.required-input');
const createBtn = document.getElementById('createBtn');

function validateInputs() {
    let allFilled = true;

    inputs.forEach(input => {
        if (input.value.trim() === '') {
            allFilled = false;
        }
    });

    createBtn.disabled = !allFilled;
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
    let password = document.getElementById('signup-password').value;
    let confirmPassword = document.getElementById('signup-confirmpassword').value;
    let msg = document.getElementById('password-message');
    let submitBtn = document.getElementById('signup-submit');

    if (password === "" && confirmPassword === "") {
        msg.innerHTML = "";
        document.getElementById('signup-confirmpassword').style.borderColor = "";
        submitBtn.disabled = true;
        return;
    }

    if (password === confirmPassword) {
        msg.style.color = "green";
        msg.innerHTML = "✓ Passwords match";
        document.getElementById('signup-confirmpassword').style.borderColor = "green";
        submitBtn.disabled = false;  // enable submit
    } else {
        msg.style.color = "red";
        msg.innerHTML = "✗ Passwords do not match";
        document.getElementById('signup-confirmpassword').style.borderColor = "red";
        submitBtn.disabled = true;  // disable submit
    }
}










