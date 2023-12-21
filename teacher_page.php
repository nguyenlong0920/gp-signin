<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Page</title>
</head>
<body>
    <h1>Welcome, Teacher!</h1>
    <?php
        // Retrieve user_id from the session
        session_start();
        $user_id = $_SESSION['user_id'];
        echo "<p>User ID: $user_id</p>";
    ?>
    <!-- Teacher page content goes here -->
</body>
</html>