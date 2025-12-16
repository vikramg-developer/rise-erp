// PAN → auto uppercase
$(document).on('input', 'input[name="faculty_pan_number"]', function () {
    this.value = this.value.toUpperCase();
});
// First, Middle, Last name → First letter capital
$(document).on('input',
        'input[name="faculty_first_name"], input[name="faculty_middle_name"], input[name="faculty_last_name"]',
        function () {
            let value = this.value.toLowerCase();
            this.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
);


$("#faculty-registration-form").on("submit", function (e) {
    e.preventDefault();

    // hide all errors (HEAD GROUP STYLE)
    $("small.text-danger").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: "faculty/add-faculty",
        type: "POST",
        data: formData,
        dataType: "json",

        success: function (res) {

            csrfHash = res.csrfHash;

            // VALIDATION ERRORS
            if (res.status === 'error') {
                $.each(res.errors, function (field, message) {
                    $("#" + field + "_error").text(message).show();
                });
                return;
            }

            // SUCCESS TOAST
            showToast('success', res.message);

            $("#faculty-registration-form")[0].reset();
        }
    });
});
