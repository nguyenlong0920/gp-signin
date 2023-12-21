document.getElementById('loginForm').addEventListener('submit', function(event) {
    // Perform client-side validation if needed

    // Example: Check if username and password are not empty
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if (username.trim() === '' || password.trim() === '') {
        alert('Username and password are required!');
        event.preventDefault();
    }
});