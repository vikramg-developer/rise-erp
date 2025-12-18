// MUST be defined once (top of JS file)
//let csrfName = $('meta[name="csrf-name"]').attr('content');
//let csrfHash = $('meta[name="csrf-hash"]').attr('content');
let table;

$("#fetch_lc_student").on("submit", function (e) {
    
    e.preventDefault();
    $("#lc_index").text('').hide();
    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});
    let department_id = $('#department_id').val();
    let year_id = $('#year_id').val();
    let aca_year_id = $('#academic_year_id').val();
//    console.log(aca_year_id);

    
    table = $('#lc-student-list').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: "leavingcertificate/fetch_lc_student_list",
            type: "POST",
            data: function (d) {
                d[csrfName] = csrfHash; // ALWAYS send current token
            },
            complete: function (res) {
                console.log(res);
                if (res.responseJSON && res.responseJSON.csrfHash) {
                    csrfHash = res.responseJSON.csrfHash; // UPDATE for next request
                }
            }
        }
    });

});
