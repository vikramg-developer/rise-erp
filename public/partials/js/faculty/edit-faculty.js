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

        // Clear previous errors
        $('small.text-danger').text('').hide();

        let formData = $(this).serializeArray();
        formData.push({ name: csrfName, value: csrfHash });

        $.ajax({
            url: BASE_URL + 'faculty/update-faculty',
            type: 'POST',
            data: formData,
            dataType: 'json',

            success: function (res) {

                // Update CSRF token
                csrfHash = res.csrfHash;
                
                
                // Validation errors
                if (res.status === 'error') {
                    $.each(res.errors, function (field, message) {
                        $('#edit_' + field + '_error')
                            .text(message)
                            .show();
                    });
                    return;
                }

                // Success message
                showToast('success', res.message);

                // Redirect to manage faculty page
                setTimeout(function () {
                    window.location.href = BASE_URL + 'faculty/fetch-faculty';
                }, 1200);
            },

        });
    });

});
