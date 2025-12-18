let table;

$(document).ready(function () {

    table = $('#feedback-master-table').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: "feedback/fetch-feedback-master",
            type: "POST",
            data: function (d) {
                d[csrfName] = csrfHash; // ALWAYS send current token
            },
            complete: function (res) {
                if (res.responseJSON && res.responseJSON.csrfHash) {
                    csrfHash = res.responseJSON.csrfHash; // UPDATE for next request
                }
            }
        }
    });
});



$("#feedback-master-form").on("submit", function (e) {
    e.preventDefault();
    // clear errors
    $("small.text-danger").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: "feedback/save-feedback-master",
        type: "POST",
        data: formData,
        dataType: "json",

        success: function (response) {

            // 1️⃣ Update CSRF token
            csrfHash = response.csrfHash;

            // handle validation errors
            if (response.status === 'error' && response.errors) {
                $("#feedback_name_error").text(response.errors.feedback_name).show();
                $("#type_id_error").text(response.errors.type_id).show();
                $("#semester_id_error").text(response.errors.semester_id).show();
                $("#part_id_error").text(response.errors.part_id).show();
                $("#academic_year_id_error").text(response.errors.academic_year_id).show();

                return;
            }

            showToast('success', response.message);
            //  Close modal
            $("#add_feedback_master_modal").modal('hide');
            //Reset form
            $("#add_feedback_master_modal").on('hidden.bs.modal', function ()
            {
                $("#feedback-master-form")[0].reset();
            });

            $("#submit_btn").html('Save <i class="bi bi-save2 ms-2"></i>');

            // 2️⃣ Update DataTable token handler
            table.settings()[0].ajax.data = function (d)
            {
                d[csrfName] = csrfHash;
            };
            // 3️⃣ Reload DataTable
            table.ajax.reload(null, false);
        }
    });
});