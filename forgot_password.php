<?php
// Add your database connection details here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a unique token
    $resetToken = bin2hex(random_bytes(32));

    // Set token expiration time (e.g., 1 hour from now)
    $resetTokenExpiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Update the user's record with the token and its expiration time
    $sql = "UPDATE users SET reset_token='$resetToken', reset_token_expiration='$resetTokenExpiration' WHERE email='$email'";
    $conn->query($sql);

    // Send an email with the reset link
    $resetLink = "http://localhost/SignIn/reset_password.php?token=$resetToken";
    $subject = "Password Reset";
    $message = "To reset your password, click the following link:\n\n$resetLink";
    mail($email, $subject, $message);

    echo "An email with instructions to reset your password has been sent to your email address.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="send_password_reset.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>