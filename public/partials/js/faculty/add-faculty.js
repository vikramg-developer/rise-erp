
$(document).on('input', 'input[name="faculty_pan_number"]', function () {
    this.value = this.value.toUpperCase();
});

$(document).on(
    'input',
    'input[name="faculty_first_name"], input[name="faculty_middle_name"], input[name="faculty_last_name"]',
    function () {
       this.value = this.value
            .replace(/[^a-zA-Z\s]/g, '') // remove numbers & special chars
            .toUpperCase();              // convert to uppercase
    }
);

$(document).on(
    'input',
    'input[name="faculty_mobile_number"]',
    function () {
        this.value = this.value
            .replace(/[^0-9]/g, '')
            .slice(0, 10);
    }
);

$(document).on('input', 'input[name="faculty_password"]', function () {
    const password = this.value;

    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!regex.test(password)) {
        $('#faculty_password_error')
            .text('Password must be at least 8 characters and include at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character')
            .show();
    } else {
        $('#faculty_password_error').text('').hide();
    }
});


$(document).on('input', '#faculty_password, #confirm_password', function () {

    const password = $('#faculty_password').val();
    const confirmPassword = $('#confirm_password').val();
    const msg = $('#password-message');
    const saveBtn = $('#faculty-registration-form button[type="submit"]');


    // Both empty → no message
    if (password === '' && confirmPassword === '') {
        msg.text('');
        return;
    }

    // Passwords match
    if (password === confirmPassword) {
        msg.text('✓ Passwords match').css('color', 'green');
        saveBtn.prop('disabled', false);
    }
    // Passwords do not match
    else {
        msg.text('✗ Passwords do not match').css('color', 'red');
        saveBtn.prop('disabled', true);
    }
});

$("#faculty-registration-form").on("submit", function (e) {
    e.preventDefault();

  
    // Hide all validation errors
    $("small.text-danger").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({ name: csrfName, value: csrfHash });

    $.ajax({
        url: "faculty/add-faculty",
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

            // Reset form
            $("#faculty-registration-form")[0].reset();

            // Reset button + message
            $('#faculty-registration-form button[type="submit"]').prop('disabled', true);
            $('#password-message').text('');
        }
    });
});


let table;

$(document).ready(function () {
    if ($('#faculty-table').length) {
        table = $('#faculty-table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: {
                url: BASE_URL + "faculty/fetch-faculty-data",
                type: "POST",
                data: function (d) {
                    d[csrfName] = csrfHash;
                },
                complete: function (res) {
                    if (res.responseJSON?.csrfHash) {
                        csrfHash = res.responseJSON.csrfHash;
                    }
                }
            }
        });
    }
});


// ================================
// DELETE FACULTY (Manage Faculty)
// ================================
$(document).on("click", ".delete", function () {

    let faculty_registration_id = $(this).data("id");
    

    if (!faculty_registration_id) {
        return;
    }

    confirmDelete(faculty_registration_id).then(result => {
        if (result.isConfirmed) {

            $.ajax({
                url: BASE_URL + "faculty/delete-faculty",
                type: "POST",
                data: {
                    faculty_registration_id: faculty_registration_id,
                    [csrfName]: csrfHash
                },
                dataType: "json",

                success: function (res) {
                    csrfHash = res.csrfHash;

                    successDelete(faculty_registration_id);

                    table.ajax.reload(null, false);
                },

                error: function () {
                    errorDelete();
                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelDelete(faculty_registration_id);
        }
    });
});

// ================================
// REVERT FACULTY
// ================================
$(document).on("click", ".revert", function () {

    let faculty_registration_id = $(this).data("id");

    confirmRevert(faculty_registration_id).then(result => {
        if (result.isConfirmed) {

            $.ajax({
                url: BASE_URL + "faculty/revert-faculty",
                type: "POST",
                data: {
                    faculty_registration_id: faculty_registration_id,
                    [csrfName]: csrfHash
                },
                dataType: "json",

                success: function (res) {
                    csrfHash = res.csrfHash;
                    successRevert(faculty_registration_id);
                    table.ajax.reload(null, false);
                },

                error: function () {
                    errorRevert();
                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelRevert(faculty_registration_id);
        }
    });
});







