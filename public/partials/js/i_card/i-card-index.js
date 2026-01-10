let table;
//let reloadAfterLC = false;
$("#fetch_icard_student").on("submit", function (e) {

    e.preventDefault();
    if (!table) {
        table = $('#icard-student-list').DataTable({
            processing: true,
            serverSide: true,
//        destroy: true,

            ajax: {
                url: BASE_URL + "icard/fetch-icard-student-list",
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

            }
        });
    } else {
        // 🔁 Subsequent searches → reload data only
        table.ajax.reload();
    }

});

$(document).on('click', '.icard_btn', function () {

    let ysd_id = $(this).data('yearwise-student-data-id');
    
    window.open(BASE_URL + 'icard/print-i-card?ysd_id=' + ysd_id, '_blank');

});