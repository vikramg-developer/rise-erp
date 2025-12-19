let table;
$("#fetch_lc_student").on("submit", function (e) {

    e.preventDefault();
    table = $('#lc-student-list').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: BASE_URL + "leavingcertificate/fetch_lc_student_list",
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
//            complete: function (res) {
////                console.log(res);
//                if (res.responseJSON && res.responseJSON.csrfHash) {
//                    csrfHash = res.responseJSON.csrfHash; // UPDATE for next request
//                }
//            }
        }
    });

});

$(document).on('click', '.lc_btn', function () {

    $('#yearwise_student_data_id').val($(this).data('yearwise_student_data_id'));

    // 🔑 keep CSRF in sync
    $('#lc_modal_form input[name="' + csrfName + '"]').val(csrfHash);
});

$("#lc_modal_form").on("submit", function (e) {
    e.preventDefault();

    $(".field-error").text("").hide();

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
            $("#lc_modal").modal('hide');
            window.open(
                BASE_URL + "leavingcertificate/print-leaving-certificate/" + response.lc_id,
                "_blank"
            );
        }
    });
});
