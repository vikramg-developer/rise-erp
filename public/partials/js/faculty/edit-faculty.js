// PAN Number
panUppercase('input[name="edit_faculty_pan_number"]');

// First, Middle, Last Name (NO SPACE)
nameUppercaseOnly(
        'input[name="edit_faculty_first_name"], ' +
        'input[name="edit_faculty_middle_name"], ' +
        'input[name="edit_faculty_last_name"]'
        );

// Mobile Number
mobileNumberOnly('input[name="edit_faculty_contact_number"]');

/**
 * ================================
 * EDIT FACULTY (AJAX UPDATE)
 * ================================
 * This file is loaded ONLY on edit faculty page
 */

$(document).ready(function () {

    // Safety check: run only if edit form exists
    if (!$('#edit-faculty-registration-form').length) {
        return;
    }

    // Uppercase PAN number
    $(document).on('input', '#edit_faculty_pan_number', function () {
        this.value = this.value.toUpperCase();
    });

    // Allow only letters for names
    $(document).on(
            'input',
            '#edit_faculty_first_name, #edit_faculty_middle_name, #edit_faculty_last_name',
            function () {
                this.value = this.value
                        .replace(/[^a-zA-Z\s]/g, '')
                        .toUpperCase();
            }
    );

    // Submit edit form
    $(document).on('submit', '#edit-faculty-registration-form', function (e) {
        e.preventDefault();

        $('small.text-danger').text('').hide();

        let formData = $(this).serialize(); // CSRF included automatically 

        $.ajax({
            url: BASE_URL + 'faculty/update-faculty',
            type: 'POST',
            data: formData,
            dataType: 'json',

            success: function (res) {

                // update CSRF token in form
//            $('input[name="<?= csrf_token() ?>"]').val(res.csrfHash);
                $('input[name]').filter(function () {
                    return this.name.indexOf('csrf') !== -1;
                }).val(res.csrfHash);

                if (res.status === 'error') {
                    $.each(res.errors, function (field, message) {
                        $('#edit_' + field + '_error').text(message).show();
                    });
                    return;
                }

                showToast('success', res.message);

                setTimeout(function () {
                    window.location.href = BASE_URL + 'faculty/fetch-faculty';
                }, 1200);
            }
        });
    });


});

;

