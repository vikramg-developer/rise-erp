let table;
//let reloadAfterLC = false;
$("#lc_report").on("submit", function (e) {

    e.preventDefault();
    if(!table){
    table = $('#lc-student-list').DataTable({
        processing: true,
        serverSide: true,
//        destroy: true,

        ajax: {
            url: BASE_URL + "leavingcertificate/fetch-lc-report",
            type: "POST",
            data: function (d) {
                d[csrfName] = csrfHash; // ALWAYS send current token
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
                d.department_id = $('#department_id').val();
                
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
}else {
    // 🔁 Subsequent searches → reload data only
    table.ajax.reload();
}

});