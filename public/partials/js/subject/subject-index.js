let table;

$(document).ready(function () {
    $('#subject_name').on('keyup', function () {
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
                    html += `<li class="list-group-item">${row.subject_name}</li>`;
                });
                $('#searchResult').html(html);
            }
        });
    });

    // Select value
    $(document).on('mousedown', '#searchResult li', function () {
        $('#subject_name').val($(this).text());
        $('#searchResult').empty();
    });
    
    $(document).on('click', function () {
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

    $("#subject_id").val(subject_id);
    $("#subject_name").val(subject_name);

    $("#submit_btn").html('Update <i class="bi bi-save2 ms-2"></i>'); // change button text
});

$(document).on("click", ".delete", function () {
    let subject_id = $(this).data("subject_id");
    let subject_name = $(this).data("subject_name");

    confirmDelete(subject_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "subject/delete-subject",
                type: "POST",
                data: {subject_id: subject_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successDelete(subject_name);
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
            cancelDelete(subject_name);
        }
    });
});

$(document).on("click", ".revert", function () {
    let subject_id = $(this).data("subject_id");
    let subject_name = $(this).data("subject_name");

    confirmRevert(subject_name).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: BASE_URL + "subject/revert-subject",
                type: "POST",
                data: {subject_id: subject_id, [csrfName]: csrfHash},
                dataType: "json",

                success: res => {
                    csrfHash = res.csrfHash;
                    successRevert(subject_name);
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
            cancelRevert(subject_name);
        }
    });
});