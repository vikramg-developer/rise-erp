let table;
//let reloadAfterLC = false;
$("#lc_report").on("submit", function (e) {

    e.preventDefault();
    if (!table) {
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

            }
        });
    } else {
        // 🔁 Subsequent searches → reload data only
        table.ajax.reload();
    }

});

$(document).on('click', '.lc_btn', function () {

    let lcId = $(this).data('leaving-certificate-id');


    let url = BASE_URL + "leavingcertificate/print-lc?lc_id=" + lcId;

    window.open(url, '_blank'); // ✅ opens PDF in new tab
});

$(document).on('click', '.cancel_lc_btn', function () {

    let lc_id = $(this).data('leaving-certificate-id');

    Swal.fire({
        title: "Cancel Leaving Certificate?",
        text: "This action cannot be undone!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Cancel",
        cancelButtonText: "No"
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: BASE_URL + "leavingcertificate/cancel-lc",
                type: "POST",
                dataType: "json",
                data: {
                    lc_id: lc_id,
                    [csrfName]: csrfHash
                },
                success: function (response) {

                    csrfHash = response.csrfHash;

                    if (response.status === 'success') {
                        Swal.fire("Cancelled!", response.message, "success");

                        // reload DataTable
                        $('#lc-student-list').DataTable().ajax.reload(null, false);
                    } else {
                        Swal.fire("Error", response.message, "error");
                    }
                },
                error: function () {
                    Swal.fire("Error", "Something went wrong", "error");
                }
            });
        }
    });
});

let fromPicker = flatpickr("#from_date", {
    dateFormat: "Y-m-d",
    maxDate: "today",
    onChange: function(selectedDates, dateStr) {
        if (dateStr) {
            toPicker.set("minDate", dateStr);
            toPicker.set("maxDate", new Date(new Date(dateStr).setMonth(new Date(dateStr).getMonth() + 1)));
        }
    }
});

let toPicker = flatpickr("#to_date", {
    dateFormat: "Y-m-d",
    maxDate: "today"
});