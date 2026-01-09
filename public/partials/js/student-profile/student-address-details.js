// Function to load localities for a given pincode
function loadLocalities(pincode, localitySelectId) {
    return new Promise((resolve, reject) => {
        const $select = $(localitySelectId);
        const savedValue = $select.data('selected'); // For edit mode

        // Reset if invalid pincode
        if (!pincode || pincode.length !== 6) {
            $select.html('<option value="">Select Locality</option>');
            return resolve();
        }

        $.ajax({
            url: BASE_URL + "studentprofile/fetch-pincode/" + pincode,
            type: "GET",
            dataType: "json",
            success: function(response) {
                let options = '<option value="">Select Locality</option>';

                if (response.status && response.data.length > 0) {
                    response.data.forEach(item => {
                        const selected = String(item.locality_id) === String(savedValue) ? 'selected' : '';
                        options += `
                            <option value="${item.locality_id}" ${selected}
                                data-country="${item.country_name}"
                                data-state="${item.state_name}"
                                data-district="${item.district_name}"
                                data-taluka="${item.taluka_name}">
                                ${item.locality_name}
                            </option>`;
                    });
                } else {
                    options += '<option value="">No Locality Found</option>';
                }

                $select.html(options);

                // Auto-select saved value if any
                if (savedValue) {
                    $select.val(savedValue).trigger('change');
                }

                resolve();
            },
            error: reject
        });
    });
}

// --- Permanent Address ---
$('#student_permanent_pincode').on('change', function () {
    loadLocalities(this.value, '#student_permanent_locality_id');
});

$('#student_permanent_locality_id').on('change', function () {
    const selected = $(this).find(':selected');
    $('#student_permanent_country').val(selected.data('country') || '');
    $('#student_permanent_state_id').val(selected.data('state') || '');
    $('#student_permanent_district_id').val(selected.data('district') || '');
    $('#student_permanent_taluka_id').val(selected.data('taluka') || '');
});

// --- Correspondence Address ---
$('#student_correspondence_pincode').on('change', function () {
    loadLocalities(this.value, '#student_correspondence_locality_id');
});

$('#student_correspondence_locality_id').on('change', function () {
    const selected = $(this).find(':selected');
    $('#student_correspondence_country').val(selected.data('country') || '');
    $('#student_correspondence_state_id').val(selected.data('state') || '');
    $('#student_correspondence_district_id').val(selected.data('district') || '');
    $('#student_correspondence_taluka_id').val(selected.data('taluka') || '');
});

// --- Same As Permanent Checkbox ---
document.addEventListener('DOMContentLoaded', () => {
    const checkbox = document.getElementById('sameAsPermanentAddress');

    async function copyToCorrespondence() {
        $('#student_correspondence_address').val($('#student_permanent_address').val());
        $('#student_correspondence_pincode').val($('#student_permanent_pincode').val());

        const pincode = $('#student_permanent_pincode').val();
        await loadLocalities(pincode, '#student_correspondence_locality_id');

        $('#student_correspondence_locality_id')
            .val($('#student_permanent_locality_id').val())
            .trigger('change');

        $('#student_correspondence_country').val($('#student_permanent_country').val());
        $('#student_correspondence_state_id').val($('#student_permanent_state_id').val());
        $('#student_correspondence_district_id').val($('#student_permanent_district_id').val());
        $('#student_correspondence_taluka_id').val($('#student_permanent_taluka_id').val());
    }

    function unlockCorrespondence() {
        $('#student_correspondence_address, #student_correspondence_pincode, #student_correspondence_country, #student_correspondence_state_id, #student_correspondence_district_id, #student_correspondence_taluka_id')
            .val('');
        $('#student_correspondence_locality_id')
            .html('<option value="">Select Locality</option>')
            .trigger('change');
    }

    checkbox.addEventListener('change', () => {
        checkbox.checked ? copyToCorrespondence() : unlockCorrespondence();
    });
});

// --- Load saved permanent locality on page load (edit mode) ---
$(document).ready(function () {
    const permPincode = $('#student_permanent_pincode').val();
    if (permPincode && permPincode.length === 6) {
        loadLocalities(permPincode, '#student_permanent_locality_id');
    }

    const corrPincode = $('#student_correspondence_pincode').val();
    if (corrPincode && corrPincode.length === 6) {
        loadLocalities(corrPincode, '#student_correspondence_locality_id');
    }
});

// --- Form Submission ---
$("#student-addressdetails-form").on("submit", function (e) {
    e.preventDefault();
    $("small.text-danger").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: BASE_URL + "studentprofile/add-address-details",
        type: "POST",
        data: formData,
        dataType: "json",
        success: function(res) {
            csrfHash = res.csrfHash;

            if (res.status === 'error') {
                $.each(res.errors, function (field, message) {
                    $("#" + field + "_error").text(message).show();
                });
                return;
            }

            showToast('success', res.message);
        }
    });
});
