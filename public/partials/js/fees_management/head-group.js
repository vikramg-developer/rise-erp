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

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    $.ajax({
        url: "add-head-group",
        type: "POST",
        data: formData,
        dataType: "json",

        success: function (response) {

            // 1️⃣ Update CSRF token
            csrfHash = response.csrfHash;

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
        }
    });
});