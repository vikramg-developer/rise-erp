$(document).ready(function () {

    $('#head-group-table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true, // ✅ IMPORTANT

        ajax: {
            url: 'fetch-head-group',
            type: "POST"
        }
    });

});