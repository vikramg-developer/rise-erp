$(document).ready(function () {

    $('#manageTable').DataTable({
        processing: true,
        serverSide: true, // ✅ IMPORTANT

        ajax: {
            url: 'fetch-head',
            type: "POST"
        }
    });

});