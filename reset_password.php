<?php
// reset_password.php

// Check if the token is provided in the URL
if (!isset($_GET['token'])) {
    echo "Invalid reset link.";
    exit;
}

$token = $_GET['token'];

// Display a form to reset the password
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="update_password.php" method="post">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
<?php
// update_password.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST['newPassword'];
    $token = $_POST['token'];

    // Update the user's password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password='$hashedPassword', reset_token=null, reset_token_expiration=null WHERE reset_token='$token'";
    $conn->query($sql);

    echo "Password updated successfully. You can now log in with your new password.";
    header("Refresh: 3; url=http://localhost/SignIn/index.html");
    exit;
}
?>