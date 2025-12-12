<?php header("Content-Type: application/javascript"); ?>

var csrfName = '<?= csrf_token() ?>';
var csrfHash = '<?= csrf_hash() ?>';
$(document).ready(function () {
    console.log(csrfName);
    console.log(csrfHash);
    $('#head-group-table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true, // ✅ IMPORTANT

        ajax: {
            url: 'fetch-head-group',
            type: "POST",
            data: function (d) {
                d[csrfName] = csrfHash; // send token
                return d;
            }
        }
    });

});