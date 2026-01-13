let bonafide_table;
//let reloadAfterbonafide = false;
$("#fetch_bonafide_student").on("submit", function (e) {

    e.preventDefault();
    if (!bonafide_table) {
        bonafide_table = $('#bonafide-student-list').DataTable({
            processing: true,
            serverSide: true,
//        destroy: true,

            ajax: {
                url: BASE_URL + "bonafidecertificate/fetch-bonafide-student-list",
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
        bonafide_table.ajax.reload();
    }

});

$(document).on('click', '.bonafide_btn', function () {

    let ysd_id = $(this).data('yearwise-student-data-id');

    // set hidden field for modal submit
    $('#yearwise_student_data_id').val(ysd_id);

    $('#bonafide_modal').modal('show');

});

/* ===================== PREVIEW (POST) ===================== */
$('#bonafide_preview_btn').off('click').on('click', function (e) {
    e.preventDefault();

    let form = $('#bonafide_modal_form');

    // create temp form
    let previewForm = $('<form>', {
        action: BASE_URL + 'bonafidecertificate/print-bonafide-certificate',
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

//=================== Submit Bonafide ======================
$("#bonafide_modal_form").on("submit", function (e) {
    e.preventDefault();

    $(".field-error").text("").hide();
//    $('input[name="' + csrfName + '"]').val(csrfHash);

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: BASE_URL + "bonafidecertificate/add-bonafide-certificate-data",
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
//            reloadAfterbonafide = true;   // flag
            $("#bonafide_modal").modal('hide');
            window.open(
                    BASE_URL + "bonafidecertificate/print-bonafide-certificate?bonafide_id=" + response.bonafide_id,
                    "_blank"
                    );
        }
    });
});

$('#bonafide_modal').on('hidden.bs.modal', function () {

    // reset the form
    $('#bonafide_modal_form')[0].reset();

    // clear hidden id also (VERY IMPORTANT)
    $('#yearwise_student_data_id').val('');

    // clear validation errors
    $('.field-error').text('').hide();

    // 🔥 reload ONLY when LC was generated
//    if (reloadAfterLC) {
//        reloadAfterLC = false;
//        if (bonafide_table) {
//            bonafide_table.ajax.reload(null, false); // 🔥 THIS IS THE KEY
//        }
//    }
});