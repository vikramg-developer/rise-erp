let table;
let reloadAfterLC = false;
$("#fetch_lc_student").on("submit", function (e) {

    e.preventDefault();
    if (!table) {
        table = $('#lc-student-list').DataTable({
            processing: true,
            serverSide: true,
//        destroy: true,

            ajax: {
                url: BASE_URL + "leavingcertificate/fetch-lc-student-list",
                type: "POST",
                data: function (d) {
                    d[csrfName] = csrfHash; // ALWAYS send current token
                    d.department_id = $('#department_id').val();
                    d.year_id = $('#year_id').val();
                    d.academic_year_id = $('#academic_year_id').val();
                },
                dataSrc: function (json) {
                    csrfHash = json.csrfHash;

                    // clear old errors
                    $('.field-error').text('').hide();

                    // handle validation errors
                    if (json.status === 'error') {

                        for (let field in json.errors) {
                            $('#' + field + '_error')
                                    .text(json.errors[field])
                                    .show();
                        }

                        return [];
                    }

                    return json.data;
                }

            }
        });
    } else {
        // 🔁 Subsequent searches → reload data only
        table.ajax.reload();
    }

});

//$(document).on('click', '.lc_btn', function () {
//
//    $('#yearwise_student_data_id').val($(this).data('yearwise_student_data_id'));
//
//    // 🔑 keep CSRF in sync
//    $('#lc_modal_form input[name="' + csrfName + '"]').val(csrfHash);
//});

$(document).on('click', '.lc_btn', function () {

    let ysd_id = $(this).data('yearwise_student_data_id');

    // set hidden field for modal submit
    $('#yearwise_student_data_id').val(ysd_id);

    // ✅ ALWAYS set preview URL (no condition)
    let previewUrl = BASE_URL +
            "leavingcertificate/print-leaving-certificate?ysd_id=" + ysd_id;

//    $('#lc_preview_btn').attr('href', previewUrl)
//            .attr('target', '_blank');

    $.ajax({
        url: BASE_URL + "leavingcertificate/check-lc-exists",
        type: "POST",
        dataType: "json",
        data: {
            yearwise_student_data_id: ysd_id,
            [csrfName]: csrfHash
        },
        success: function (response) {

            csrfHash = response.csrfHash;

            // ✅ FIRST TIME → directly open modal
            if (!response.exist_lc) {
                $('#lc_modal').modal('show');
                return;
            }
            // ⚠️ ALREADY GENERATED → SweetAlert
            Swal.fire({
                title: "LC Already Generated !!",
                text: "Leaving Certificate has already been generated. Do you want Duplicate?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Duplicate",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    if (response.lc_data) {
                        $('#examination').val(response.lc_data.examination).prop('readonly', true);
                        $('#exam_period').val(response.lc_data.exam_period).prop('readonly', true);
                        $('#date_of_leaving').val(response.lc_data.date_of_leaving).prop('readonly', true);
                    }
                    $('#lc_modal').modal('show');
                }
            });
        }
    });
});

/* ===================== PREVIEW (POST) ===================== */
$('#lc_preview_btn').off('click').on('click', function (e) {
    e.preventDefault();

    let form = $('#lc_modal_form');

    // create temp form
    let previewForm = $('<form>', {
        action: BASE_URL + 'leavingcertificate/print-leaving-certificate',
        method: 'POST',
        target: '_blank'
    });

    // copy modal inputs
    form.serializeArray().forEach(function (item) {
        previewForm.append(
                $('<input>', {type: 'hidden', name: item.name, value: item.value})
                );
    });

    // CSRF
    previewForm.append(
            $('<input>', {type: 'hidden', name: csrfName, value: csrfHash})
            );

    $('body').append(previewForm);
    previewForm.submit();
    previewForm.remove();
});

//=================== Submit LC ======================
$("#lc_modal_form").on("submit", function (e) {
    e.preventDefault();

    $(".field-error").text("").hide();
//    $('input[name="' + csrfName + '"]').val(csrfHash);

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: BASE_URL + "leavingcertificate/add-leaving-certificate-data",
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {

            csrfHash = response.csrfHash;

            if (response.status === "error") {
                $.each(response.errors, function (field, message) {
                    $("#" + field + "_error").text(message).show();
                });
                return;
            }

            // success
            reloadAfterLC = true;   // flag
            $("#lc_modal").modal('hide');
            window.open(
                    BASE_URL + "leavingcertificate/print-leaving-certificate?lc_id=" + response.lc_id,
                    "_blank"
                    );
        }
    });
});
$('#lc_modal').on('hidden.bs.modal', function () {

    // reset the form
    $('#lc_modal_form')[0].reset();

    // clear hidden id also (VERY IMPORTANT)
    $('#yearwise_student_data_id').val('');
    // 🔴 REMOVE readonly
    $('#examination, #exam_period, #date_of_leaving')
            .prop('readonly', false);

    // clear validation errors
    $('.field-error').text('').hide();

    // 🔥 reload ONLY when LC was generated
    if (reloadAfterLC) {
        reloadAfterLC = false;
        if (table) {
            table.ajax.reload(null, false); // 🔥 THIS IS THE KEY
        }
    }
});
//cant select date greater than today
let leavingDatePicker;

$('#lc_modal').on('shown.bs.modal', function () {

    leavingDatePicker?.destroy();

    leavingDatePicker = flatpickr("#date_of_leaving", {
        dateFormat: "Y-m-d",
        maxDate: new Date(),
        allowInput: false,
        disableMobile: true,
        onChange: (_, __, fp) => fp.selectedDates[0] > new Date().setHours(0, 0, 0, 0) && fp.clear()
    });
});