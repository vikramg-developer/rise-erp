let table;

$(document).ready(function () {
    
    table = $('#approveRegistrationList').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: BASE_URL + "fetch-registrationstudent",
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



//$(document).on("click", ".revert", function () {
//    let head_id = $(this).data("head_id");
//    let head_name = $(this).data("head_name");
//
//    confirmRevert(head_name).then(result => {
//        if (result.isConfirmed) {
//            $.ajax({
//                url: BASE_URL + "head/revert-head",
//                type: "POST",
//                data: {head_id: head_id, [csrfName]: csrfHash},
//                dataType: "json",
//
//                success: res => {
//                    csrfHash = res.csrfHash;
//                    successRevert(head_name);
//                    table.settings()[0].ajax.data = d => {
//                        d[csrfName] = csrfHash
//                    };
//                    table.ajax.reload(null, false);
//                },
//                error: () => {
//                    errorRevert();
//                }
//            });
//
//        } else if (result.dismiss === Swal.DismissReason.cancel) {
//            cancelRevert(head_name);
//        }
//    });
//});