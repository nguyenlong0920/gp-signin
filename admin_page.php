<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <?php
        // Retrieve user_id from the session
        session_start();
        $user_id = $_SESSION['user_id'];
        echo "<p>User ID: $user_id</p>";
    ?>
    <!-- Admin page content goes here -->
</body>
</html>