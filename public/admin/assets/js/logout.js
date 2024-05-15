window.addEventListener('beforeunload', function (event) {
    event.preventDefault();
    
    // Send an AJAX request to the logout endpoint
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/logout', false);
    xhr.send();
});
