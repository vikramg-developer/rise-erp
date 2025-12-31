//---------- Fetch Table  ----------//
let table;
$(document).ready(function () {

    table = $('#feedback-master-table').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: BASE_URL +"feedback/fetch-feedback-master",
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

//---------- Submit form ----------//
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
                $.each(response.errors, function (field, message) {
                    $("#" + field + "_error").text(message).show();
                });
                return;
            }

            
            
             // ---------- SUCCESS TOAST ----------
            if (response.action === 'UPDATE') {
                showToast('success', 'Feedback Master updated successfully');
            } else {
//             showToast('success', response.message);
                showToast('success', 'Feedback Master Added successfully');
            }

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

//---------- Delete  ----------//

$(document).on("click", ".delete", function () {
    let feedback_master_id = $(this).data("feedback_master_id");
    let feedback_master_name = $(this).data("feedback_name");

    confirmDelete(feedback_master_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL +"feedback/delete-feedback-master",
                type: "POST",
                data: {feedback_master_id: feedback_master_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successDelete(feedback_master_name);
                    table.settings()[0].ajax.data = d => {
                        d[csrfName] = csrfHash
                    };
                    table.ajax.reload(null, false);
                },
                error: () => {
                    errorDelete();
                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelDelete(feedback_master_name);
        }
    });
});
//---------- Revert  ----------//
$(document).on("click", ".revert", function () {
    let feedback_master_id = $(this).data("feedback_master_id");
    let feedback_master_name = $(this).data("feedback_name");

    confirmRevert(feedback_master_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL +"feedback/revert-feedback-master",
                type: "POST",
                data: {feedback_master_id: feedback_master_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successRevert(feedback_master_name);
                    table.settings()[0].ajax.data = d => {
                        d[csrfName] = csrfHash
                    };
                    table.ajax.reload(null, false);
                },
                error: () => {
                    errorRevert();
                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelRevert(feedback_master_name);
        }
    });
});

//---------- Edit Modal  ----------//
$(document).on('click', '.edit', function () {

    let id = $(this).data('id');
    console.log('Edit ID:', id); 

    $.ajax({
        url: BASE_URL + "feedback/get-feedback-master",
        type: "POST",
        dataType: "json",
        data: {
            feedback_master_id: id,
            [csrfName]: csrfHash
        },
        success: function (res) {

            csrfHash = res.csrfHash;

            if (res.status === 'success') {

                $('#feedback_master_id').val(res.data.feedback_master_id);
                $('#feedback_name').val(res.data.feedback_name);
                $('#type_id').val(res.data.type_id);
                $('#semester_id').val(res.data.semester_id);
                $('#part_id').val(res.data.part_id);
                $('#academic_year_id').val(res.data.academic_year_id);

                $('.modal-title').text('Edit Feedback Master');
                $('#submit_btn').text('Update');

                $('#add_feedback_master_modal').modal('show'); 
                
            }
        }
    });
});

// ================= MODAL RESET  =================
$('#add_feedback_master_modal').on('hidden.bs.modal', function () {
    $('#feedback-master-form')[0].reset();
    $('#feedback_master_id').val('');
    $('.modal-title').text('Feedback Master');
    $('#submit_btn').text('Save');
    $("small.text-danger").text('').hide();
});