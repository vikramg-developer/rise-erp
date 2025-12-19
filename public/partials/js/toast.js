let toast;
function showToast(type, message) {
    const toastEl = document.getElementById('appToast');

    toastEl.className = `toast colored-toast bg-${type}-transparent`;

    toastEl.querySelector('.toast-header').className =
        `toast-header bg-${type} text-fixed-white`;

    toastEl.querySelector('.toast-body').innerText = message;

    const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
    toast.show();
}