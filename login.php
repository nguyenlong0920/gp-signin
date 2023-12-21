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

// Retrieve data from the form
$username = $_POST['username'];
$password = $_POST['password'];
$rememberMe = isset($_POST['rememberMe']) ? $_POST['rememberMe'] : '';

// Perform SQL query to check user credentials
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Check if the query returns a row (valid user)
if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();

    // Set session variables
    session_start();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    // Remember Me: Set a cookie with user credentials if checked
    if ($rememberMe == 'on') {
        setcookie('username', $row['username'], time() + (86400 * 30), "/");
        setcookie('password', $row['password'], time() + (86400 * 30), "/");
    }

    // Redirect based on the user's role
    if ($row['role'] === 'admin') {
        header("Location: admin_page.php");
    } elseif ($row['role'] === 'teacher') {
        header("Location: teacher_page.php");
    } elseif ($row['role'] === 'student') {
        header("Location: student_page.php");
    }
} else {
    // Invalid credentials, redirect to login page
    header("Location: index.html");
}

$conn->close();
?>