$("#fetch_lc_student").on("submit", function (e) {
    
    e.preventDefault();
    $("#lc_index").text('').hide();
    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});
    let department_id = $('#department_id').val();
    let year_id = $('#year_id').val();
    let aca_year_id = $('#academic_year_id').val();
//    console.log(aca_year_id);
    $.ajax({
        url: 'leavingcertificate/fetch_lc_student_list',
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
            console.log(response);
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
            $("#fetch_student")[0].reset();
        }

    });

});
