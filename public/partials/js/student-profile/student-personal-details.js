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
//handicap type div
document.addEventListener('DOMContentLoaded', function () {

    const handicapSelect = document.getElementById('student_physically_handicap');
    const handicapTypeDiv = document.getElementById('handicap_type_div');
    const handicapTypeSelect = document.getElementById('student_physically_handicap_type');

    function toggleHandicapType() {
        if (handicapSelect.value === 'yes') {
            handicapTypeDiv.style.display = 'block';
        } else {
            handicapTypeDiv.style.display = 'none';
            handicapTypeSelect.value = ''; // reset value
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

