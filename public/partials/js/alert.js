const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success ms-2',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
});

function confirmDelete(message) {
    return swalWithBootstrapButtons.fire({
        title: 'Are you sure you want to delete ' + message + " ?",
        text: "You will be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    });
}

function successDelete(message) {
    swalWithBootstrapButtons.fire(
            message + ' Deleted!',
            'Your record has been deleted.',
            'success'
            );
}

function cancelDelete(message) {
    swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your record is safe :)',
            'error'
            );
}

function errorDelete() {
    swalWithBootstrapButtons.fire(
            'Error',
            'Delete failed',
            'error'
            );
}

function confirmRevert(message) {
    return swalWithBootstrapButtons.fire({
        title: 'Are you sure you want to Revert ' + message + " ?",
        text: "You will be able to delete this again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Revert it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    });
}

function successRevert(message) {
    swalWithBootstrapButtons.fire(
            message + ' Reverted!',
            'Your record has been Reverted.',
            'success'
            );
}

function cancelRevert(message) {
    swalWithBootstrapButtons.fire(
            'Cancelled',
            'You denied to revert :(',
            'error'
            );
}

function errorRevert() {
    swalWithBootstrapButtons.fire(
            'Error',
            'Revert failed',
            'error'
            );
}

function confirmApprove(message) {
    return swalWithBootstrapButtons.fire({
        title: 'Are you sure you want to Approve ' + message + " ?",
        text: "You will be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approve it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    });
}
function successApprove(message) {
    swalWithBootstrapButtons.fire(
            message + ' Approved!',
            'Your record has been Approved.',
            'success'
            );
}
function cancelApprove(message) {
    swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your record is safe :)',
            'error'
            );
}

function confirmReject(message) {
    return swalWithBootstrapButtons.fire({
        title: 'Are you sure you want to Reject ' + message + " ?",
        text: "You will be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reject it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    });

}
function successReject(message) {
    swalWithBootstrapButtons.fire(
            message + ' Rejected!',
            'Your record has been Rejected.',
            'success'
            );
}
function errorReject() {
    swalWithBootstrapButtons.fire(
            'Error',
            'Reject failed',
            'error'
            );
}
function cancelReject(message) {
    swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your record is safe :)',
            'error'
            );
}


// ================================
// GENERIC MESSAGE HELPERS          Tejas
// ================================

function showErrorMessage(message, title = 'Error') {
    swalWithBootstrapButtons.fire({
        icon: 'error',
        title: title,
        text: message
    });
}

function showSuccessMessage(message, title = 'Success') {
    swalWithBootstrapButtons.fire({
        icon: 'success',
        title: title,
        text: message
    });
}

function showWarningMessage(message, title = 'Warning') {
    swalWithBootstrapButtons.fire({
        icon: 'warning',
        title: title,
        text: message
    });
}

