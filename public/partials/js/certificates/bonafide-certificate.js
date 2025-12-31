let table;
//let reloadAfterLC = false;
$("#fetch_bonafide_student").on("submit", function (e) {

    e.preventDefault();
    if (!table) {
        table = $('#bonafide-student-list').DataTable({
            processing: true,
            serverSide: true,
//        destroy: true,

            ajax: {
                url: BASE_URL + "bonafidecertificate/fetch-bonafide-student-list",
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

$(document).on('click', '.bonafide_btn', function () {

    let ysd_id = $(this).data('yearwise-student-data-id');

    Swal.fire({
        title: "Generate Bonafide Certificate?",
        text: "Do you want Bonafide Certificate?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No"
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: BASE_URL + "bonafidecertificate/add-bonafide-certificate",
                type: "POST",
                dataType: "json",
                data: {
                    ysd_id: ysd_id,
                    [csrfName]: csrfHash
                },
                success: function (response) {

                    csrfHash = response.csrfHash;

                    if (response.status === 'success') {
                        // success
//                      
                        window.open(
                                BASE_URL + "bonafidecertificate/print-bonafide-certificate?bonafide_id=" + response.bonafide_id,
                                "_blank"
                                );
                        // reload DataTable
                        $('#bonafide-student-list').DataTable().ajax.reload(null, false);
                    } 
                },
                error: function () {
                    Swal.fire("Error", "Something went wrong", "error");
                }
            });
        }
    });
});