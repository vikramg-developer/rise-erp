let table;

$(document).ready(function () {
    $('#subject_name,#subject_code').on('keyup', function () {
        let query = $(this).val();

        if (query.length < 1) {
            $('#searchResult').empty();
            return;
        }

        $.ajax({
            url: BASE_URL + 'subject/search-subject',
            method: "GET",
            data: {q: query},
            success: function (data) {
                console.log(data);
                let html = '';
                data.forEach(row => {
                    html += `<li class="list-group-item"
                            data-name="${row.subject_name}"
                            data-code="${row.subject_code}">
                            ${row.subject_name} - ${row.subject_code}
                            </li>`;
                });
                $('#searchResult').html(html);
            }
        });
    });

    // Select value
    $(document).on('mousedown', '#searchResult li', function () {
        $('#subject_id').val($(this).data('id'));
        $('#subject_name').val($(this).data('name'));
        $('#subject_code').val($(this).data('code'));
        $('#searchResult').empty();
    });

    $(document).on('click', function (e) {

        $('#searchResult').empty();

    });

    table = $('#subject-table').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,

        ajax: {
            url: BASE_URL + "subject/fetch-subject",
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


$("#subject-form").on("submit", function (e) {
    e.preventDefault();

    // clear errors
    $("#subject_name_error").text('').hide();
    $("#subject_code_error").text('').hide();

    let formData = $(this).serializeArray();
    formData.push({name: csrfName, value: csrfHash});

    let subject_id = $('#subject_id').val();

    let url = (subject_id === "") ? BASE_URL + 'subject/save-subject' : BASE_URL + 'subject/update-subject'

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
                if (response.errors.subject_name) {
                    $("#subject_name_error").text(response.errors.subject_name).show();
                }

                if (response.errors.subject_code) {
                    $("#subject_code_error")
                            .text(response.errors.subject_code)
                            .show();
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
            $("#subject-form")[0].reset();

            $("#submit_btn").html('Save <i class="bi bi-save2 ms-2"></i>');

            // OPTIONAL: Clear hidden ID so next submit becomes 'add'
            $("#subject_id").val("");
        }
    });
});

$(document).on("click", ".edit", function () {
    let subject_id = $(this).data("subject_id");
    let subject_name = $(this).data("subject_name");
    let subject_code = $(this).data("subject_code");

    $("#subject_id").val(subject_id);
    $("#subject_name").val(subject_name);
    $("#subject_code").val(subject_code);

    $("#submit_btn").html('Update <i class="bi bi-save2 ms-2"></i>'); // change button text
});

$(document).on("click", ".delete", function () {
    let subject_id = $(this).data("subject_id");
    let subject_name = $(this).data("subject_name");
    let subject_code = $(this).data("subject_code");
    let label = subject_code
            ? `${subject_name} - ${subject_code}`
            : subject_name;

    confirmDelete(label).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "subject/delete-subject",
                type: "POST",
                data: {subject_id: subject_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successDelete(label);
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
            cancelDelete(label);
        }
    });
});

$(document).on("click", ".revert", function () {
    let subject_id = $(this).data("subject_id");
    let subject_name = $(this).data("subject_name");
    let subject_code = $(this).data("subject_code");
    let label = subject_code
            ? `${subject_name} - ${subject_code}`
            : subject_name;

    confirmRevert(label).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "subject/revert-subject",
                type: "POST",
                data: {subject_id: subject_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successRevert(label);
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
            cancelRevert(label);
        }
    });
});