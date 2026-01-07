function loadJS(url) {
    const script = document.createElement('script');
    script.src = url;
    script.defer = true;
    document.head.appendChild(script);
}

// load other JS files
loadJS('/partials/js/student-profile/student-personal-details.js');
loadJS('/partials/js/student-profile/student-address-details.js');
