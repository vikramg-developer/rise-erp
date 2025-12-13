//let table;
//
//$(document).ready(function () {
//
//    table = $('#head-group-table').DataTable({
//        processing: true,
//        serverSide: true,
//        destroy: true,
//
//        ajax: {
//            url: "fetch-head-group",
//            type: "POST",
//            data: function (d) {
//                d[csrfName] = csrfHash; // ALWAYS send current token
//            },
//            complete: function (res) {
//                if (res.responseJSON && res.responseJSON.csrfHash) {
//                    csrfHash = res.responseJSON.csrfHash; // UPDATE for next request
//                }
//            }
//        }
//    });
//});


$("#feedback-master-form").on("submit", function (e) {
    e.preventDefault();

    // clear errors
    $("#feedback_error").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

//    let head_group_id = $('#head_group_id').val();

//    let url = (head_group_id === "") ? 'add-head-group' : 'update-head-group';

    $.ajax({
        url: "save-feedback-master",
        type: "POST",
        data: formData,
        dataType: "json",

        success: function (response) {

            // 1️⃣ Update CSRF token
            csrfHash = response.csrfHash;

            // handle validation errors
            if (response.status === 'error' && response.errors) {
                if (response.errors.feedback_name) {
                    $("#feedback_error").text(response.errors.feedback_name).show();
                }
                return;
            }

            $("#successToast .toast-body").text(response.message);

            let toast = new bootstrap.Toast(document.getElementById('successToast'));
            toast.show();

            // 2️⃣ Update DataTable token handler
            table.settings()[0].ajax.data = function (d) {
                d[csrfName] = csrfHash;
            };

            // 3️⃣ Reload DataTable
//            table.ajax.reload(null, false);

            // Optional: Reset form
//            $("#head-group-form")[0].reset();

            $("#submit_btn").html('Save <i class="bi bi-save2 ms-2"></i>');

            // OPTIONAL: Clear hidden ID so next submit becomes 'add'
//            $("#head_group_id").val("");
        }
    });
});


