//permanant_pincode
$(document).ready(function () {

    $('#student_permanent_pincode').on('keyup', function () {

        let pincode = $(this).val().trim();

        if (pincode.length === 6) {

            $.ajax({
                url: "get-pincode/" + pincode,
                type: "GET",
                dataType: "json",

                success: function (res) {

                    if (res.status) {

                        // Set all values first
                        $('#student_permanent_country').val(res.data.country_id);
                        $('#student_permanent_state_id').val(res.data.state_id);
                        $('#student_permanent_district_id').val(res.data.district_id);
                        $('#student_permanent_taluka_id').val(res.data.taluka_id);

                        // Refresh Select2 after values are set

                        $('#student_permanent_country').trigger('change.select2');
                        $('#student_permanent_state_id').trigger('change.select2');
                        $('#student_permanent_district_id').trigger('change.select2');
                        $('#student_permanent_taluka_id').trigger('change.select2');

                        $('#student_permanent_pincode_error').hide();

                    } else {
                        $('#student_permanent_pincode_error')
                                .text(res.message)
                                .show();
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
//correspondence_pincode
$(document).ready(function () {

    $('#student_correspondence_pincode').on('keyup', function () {

        let pincode = $(this).val().trim();

        if (pincode.length === 6) {

            $.ajax({
                url: "get-pincode/" + pincode,
                type: "GET",
                dataType: "json",

                success: function (res) {

                    if (res.status) {

                        // Set all values first
                        $('#student_correspondence_country').val(res.data.country_id);
                        $('#student_correspondence_state_id').val(res.data.state_id);
                        $('#student_correspondence_district_id').val(res.data.district_id);
                        $('#student_correspondence_taluka_id').val(res.data.taluka_id);

                        // Refresh Select2 after values are set

                        $('#student_correspondence_country').trigger('change.select2');
                        $('#student_correspondence_state_id').trigger('change.select2');
                        $('#student_correspondence_district_id').trigger('change.select2');
                        $('#student_correspondence_taluka_id').trigger('change.select2');

                        $('#student_correspondence_pincode_error').hide();

                    } else {
                        $('#student_correspondence_pincode_error')
                                .text(res.message)
                                .show();
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});

//same_as_permanent_address
document.addEventListener('DOMContentLoaded', () => {

    const fields = [
        { perm: 'student_permanent_address', corr: 'student_correspondence_address' },
        { perm: 'student_permanent_pincode', corr: 'student_correspondence_pincode' },
        { perm: 'student_permanent_country', corr: 'student_correspondence_country' },
        { perm: 'student_permanent_state_id', corr: 'student_correspondence_state_id' },
        { perm: 'student_permanent_taluka_id', corr: 'student_correspondence_taluka_id' },
        { perm: 'student_permanent_district_id', corr: 'student_correspondence_district_id' },
    ];

    const checkbox = document.getElementById('sameAsPermanentAddress');

    const copyToCorrespondence = () => {
        fields.forEach(f => {
            const permField = document.getElementById(f.perm);
            const corrField = document.getElementById(f.corr);
            if (!permField || !corrField) return;

            corrField.value = permField.value;

            // keep selects enabled so select2 works
            if (corrField.tagName === 'SELECT') {
                $(corrField).trigger('change');
            }
        });
    };

    const unlockCorrespondence = () => {
        fields.forEach(f => {
            const corrField = document.getElementById(f.corr);
            if (!corrField) return;
            corrField.value = '';

            // trigger change if select
            if (corrField.tagName === 'SELECT') {
                $(corrField).trigger('change');
            }
        });
    };

    // Run once on load
    if (checkbox.checked) {
        copyToCorrespondence();
    }

    // When user toggles the checkbox
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            copyToCorrespondence();
        } else {
            unlockCorrespondence();
        }
    });

    // Auto‑update correspondence while checkbox is checked
    fields.forEach(f => {
        const permField = document.getElementById(f.perm);
        if (!permField) return;

        ['input', 'change'].forEach(evt => {
            permField.addEventListener(evt, () => {
                if (checkbox.checked) {
                    copyToCorrespondence();
                }
            });
        });
    });

});


//submit
$("#student-addressdetails-form").on("submit", function (e) {
    e.preventDefault();


    // Hide all validation errors
    $("small.text-danger").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: "add-address-details",
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

