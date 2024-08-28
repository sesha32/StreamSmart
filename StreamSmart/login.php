<?php
session_start();

// Database configuration
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = trim($_POST['password']);

    // Fetch the user data from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start the session
            session_regenerate_id(true); // Regenerate session ID for security
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Check if the user is the admin
            if ($user['id'] == 1) {
                header("Location: admin_home.php"); // Redirect to the admin home page
            } else {
                header("Location: home.php"); // Redirect to the home page or dashboard
            }
            exit;
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "Invalid email or password.";
    }
}

$conn->close();

// Redirect back to the login page with an error message
if (isset($error_message)) {
    header("Location: loginpage.php?error=" . urlencode($error_message));
    exit;
}
?>