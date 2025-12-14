let table;

$(document).ready(function () {

    table = $('#head-group-table').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: "fetch-head-group",
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


$("#head-group-form").on("submit", function (e) {
    e.preventDefault();

    // clear errors
    $("#head_group_name_error").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    let head_group_id = $('#head_group_id').val();

    let url = (head_group_id === "") ? 'add-head-group' : 'update-head-group'

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        dataType: "json",

        success: function (response) {

            // 1️⃣ Update CSRF token
            csrfHash = response.csrfHash;

            // handle validation errors
            if (response.status === 'error' && response.errors) {
                if (response.errors.head_group_name) {
                    $("#head_group_name_error").text(response.errors.head_group_name).show();
                }
                return;
            }
            
            showToast('success', response.message);

            // 2️⃣ Update DataTable token handler
            table.settings()[0].ajax.data = function (d) {
                d[csrfName] = csrfHash;
            };

            // 3️⃣ Reload DataTable
            table.ajax.reload(null, false);

            // Optional: Reset form
            $("#head-group-form")[0].reset();

            $("#submit_btn").html('Save <i class="bi bi-save2 ms-2"></i>');

            // OPTIONAL: Clear hidden ID so next submit becomes 'add'
            $("#head_group_id").val("");
        }
    });
});

$(document).on("click", ".edit", function () {
    let head_group_id = $(this).data("head_group_id");
    let head_group_name = $(this).data("head_group_name");

    $("#head_group_id").val(head_group_id);
    $("#head_group_name").val(head_group_name);

    $("#submit_btn").html('Update <i class="bi bi-save2 ms-2"></i>'); // change button text
});

$(document).on("click", ".delete", function () {
    let head_group_id = $(this).data("head_group_id");
    let head_group_name = $(this).data("head_group_name");

    confirmDelete(head_group_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: "delete-head-group",
                type: "POST",
                data: {head_group_id: head_group_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successDelete(head_group_name);
                    table.settings()[0].ajax.data = d => {
                        d[csrfName] = csrfHash
                    };
                    table.ajax.reload(null, false);
                },                
                error: () =>{
                    errorDelete();
                }
            });
            
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelDelete(head_group_name);
        }
    });
});

$(document).on("click", ".revert", function () {
    let head_group_id = $(this).data("head_group_id");
    let head_group_name = $(this).data("head_group_name");

    confirmRevert(head_group_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: "revert-head-group",
                type: "POST",
                data: {head_group_id: head_group_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successRevert(head_group_name);
                    table.settings()[0].ajax.data = d => {
                        d[csrfName] = csrfHash
                    };
                    table.ajax.reload(null, false);
                },                
                error: () =>{
                    errorRevert();
                }
            });
            
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelRevert(head_group_name);
        }
    });
});