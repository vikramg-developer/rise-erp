
export function initStudentParentDetails() {

//  (NO SPACE) input
    nameUppercaseOnly(
            'input[name="student_mother_name"], ' +
            'input[name="student_father_occupation"], ' +
            'input[name="student_mother_occupation"]'
            );
//submit
    $("#student-parentdetails-form").on("submit", function (e) {
        e.preventDefault();


        // Hide all validation errors
        $("small.text-danger").text('').hide();

        let formData = $(this).serializeArray();
        formData.push({name: csrfName, value: csrfHash});

        $.ajax({
            url: BASE_URL + "studentprofile/add-parent-details",
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
}
