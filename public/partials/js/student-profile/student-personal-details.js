//age calculation
function calculateAge() {
    var dob = document.getElementById('dob').value;
    var ageField = document.getElementById('age');

    if (dob === '') {
        ageField.value = '';
        return;
    }

    var birthDate = new Date(dob);
    var today = new Date();

    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();

    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    ageField.value = age >= 0 ? age : '';
}
//Sport Reserved div
document.getElementById('sport_reserv').addEventListener('change', function () {
    const sportLevelDiv = document.getElementById('Display_sport_level');
    const sportLevel = document.getElementById('sport_level');

    if (this.value === 'yes') {
        sportLevelDiv.style.display = 'block';
        sportLevel.required = true;
    } else {
        sportLevelDiv.style.display = 'none';
        sportLevel.value = '';
        sportLevel.required = false;
    }
});
//handicap type div
document.addEventListener('DOMContentLoaded', function () {

    const handicapSelect = document.getElementById('student_physically_handicap');
    const handicapTypeDiv = document.getElementById('handicap_type_div');
    const handicapTypeSelect = document.getElementById('student_physically_handicap_type');

    function toggleHandicapType() {
        if (handicapSelect.value === 'yes') {
            handicapTypeDiv.style.display = 'block';
            handicapTypeSelect.required = true; // set required on the select
        } else {
            handicapTypeDiv.style.display = 'none';
            handicapTypeSelect.value = ''; // reset value
            handicapTypeSelect.required = false; // remove required
        }
    }

    // On page load
    toggleHandicapType();

    // On change
    handicapSelect.addEventListener('change', toggleHandicapType);
});


//submit
$("#student-personalinfo-form").on("submit", function (e) {
    e.preventDefault();


    // Hide all validation errors
    $("small.text-danger").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: "add-personal-details",
        type: "POST",
        data: formData,
        dataType: "json",

        success: function (res) {

            csrfHash = res.csrfHash;

            // Validation errors
            if (res.status === 'error') {
                $.each(res.errors, function (field, message) {
                    $("#" + field + "_error").text(message).show();
                });
                return;
            }

            // Success toast
            showToast('success', res.message);

        }
    });
});

