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
    $("#head_group_error").text('').hide();

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
                    $("#head_group_error").text(response.errors.head_group_name).show();
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
    let id = $(this).data("id");
    let name = $(this).data("name");

    $("#head_group_id").val(id);
    $("#head_group").val(name);

    $("#submit_btn").html('Update <i class="bi bi-save2 ms-2"></i>'); // change button text
});

$(document).on("click", ".delete", function () {
    console.log("Delete");
    let id = $(this).data("id");

    Swal.fire({
        title: "Delete this item?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Delete"
    }).then(result => {
        if (result.isConfirmed) {

            $.ajax({
                url: "delete-head-group",
                type: "POST",
                data: {id: id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: "Deleted!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    table.settings()[0].ajax.data = d => {
                        d[csrfName] = csrfHash
                    };
                    table.ajax.reload(null, false);
                }
            });
        }
    });
});