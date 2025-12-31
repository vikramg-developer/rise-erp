let table;

$(document).ready(function () {
    $('#department_name').on('keyup', function () {
        let query = $(this).val();

        if (query.length < 1) {
            $('#searchResult').empty();
            return;
        }

        $.ajax({
            url: BASE_URL + 'department/search-department',
            method: "GET",
            data: {q: query},
            success: function (data) {
                console.log(data);
                let html = '';
                data.forEach(row => {
                    html += `<li class="list-group-item">${row.department_name}</li>`;
                });
                $('#searchResult').html(html);
            }
        });
    });

    // Select value
    $(document).on('mousedown', '#searchResult li', function () {
        $('#department_name').val($(this).text());
        $('#searchResult').empty();
    });
    
    $(document).on('click', function () {
        $('#searchResult').empty();
    });

    table = $('#department-table').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: BASE_URL + "department/fetch-department",
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


$("#department-form").on("submit", function (e) {
    e.preventDefault();

    // clear errors
    $("#department_name_error").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    let department_id = $('#department_id').val();

    let url = (department_id === "") ? BASE_URL + 'department/save-department' : BASE_URL + 'department/update-department'

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
                if (response.errors.department_name) {
                    $("#department_name_error").text(response.errors.department_name).show();
                }
                return;
            }

            showToast('success', response.message);

            // 2️⃣ Update DataTable token handler
            table.settings()[0].ajax.data = function (d) {
                d[csrfName] = csrfHash;
            };

            // 3️⃣ Reload DataTable
            table.ajax.reload(null, false);

            // Optional: Reset form
            $("#department-form")[0].reset();

            $("#submit_btn").html('Save <i class="bi bi-save2 ms-2"></i>');

            // OPTIONAL: Clear hidden ID so next submit becomes 'add'
            $("#department_id").val("");
        }
    });
});

$(document).on("click", ".edit", function () {
    let department_id = $(this).data("department_id");
    let department_name = $(this).data("department_name");

    $("#department_id").val(department_id);
    $("#department_name").val(department_name);

    $("#submit_btn").html('Update <i class="bi bi-save2 ms-2"></i>'); // change button text
});

$(document).on("click", ".delete", function () {
    let department_id = $(this).data("department_id");
    let department_name = $(this).data("department_name");

    confirmDelete(department_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "department/delete-department",
                type: "POST",
                data: {department_id: department_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successDelete(department_name);
                    table.settings()[0].ajax.data = d => {
                        d[csrfName] = csrfHash
                    };
                    table.ajax.reload(null, false);
                },
                error: () => {
                    errorDelete();
                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelDelete(department_name);
        }
    });
});

$(document).on("click", ".revert", function () {
    let department_id = $(this).data("department_id");
    let department_name = $(this).data("department_name");

    confirmRevert(department_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "department/revert-department",
                type: "POST",
                data: {department_id: department_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successRevert(department_name);
                    table.settings()[0].ajax.data = d => {
                        d[csrfName] = csrfHash
                    };
                    table.ajax.reload(null, false);
                },
                error: () => {
                    errorRevert();
                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancelRevert(department_name);
        }
    });
});