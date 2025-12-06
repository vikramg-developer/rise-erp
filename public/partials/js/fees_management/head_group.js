$(document).ready(function () {

    $('#manageTable').DataTable({
        processing: true,
        serverSide: true, // ✅ IMPORTANT

        ajax: {
            url: 'show-head-group',
            type: "POST"
        }
    });

});