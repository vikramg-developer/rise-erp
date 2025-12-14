let table;

$(document).ready(function () {

    table = $('#role-table').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: "roles/fetch-role",
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

$(document).on("click", ".delete", function () {
    let role_id = $(this).data("role_id");
    let role_name = $(this).data("role_name");

    confirmDelete(role_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: "roles/delete-role",
                type: "POST",
                data: {role_id: role_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successDelete(role_name);
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
            cancelDelete(role_name);
        }
    });
});

$(document).on("click", ".revert", function () {
    let role_id = $(this).data("role_id");
    let role_name = $(this).data("role_name");

    confirmRevert(role_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: "roles/revert-role",
                type: "POST",
                data: {role_id: role_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successRevert(role_name);
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
            cancelRevert(role_name);
        }
    });
});