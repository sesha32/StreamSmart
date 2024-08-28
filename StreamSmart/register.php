<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $first_name = $conn->real_escape_string($_POST['first-name']);
    $middle_name = $conn->real_escape_string($_POST['middle-name']);
    $last_name = $conn->real_escape_string($_POST['last-name']);
    $email = $conn->real_escape_string($_POST['email']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Password validation
    $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/";
    if (!preg_match($passwordRegex, $password)) {
        echo "Password must be at least 8 characters long, contain numbers, alphabets, special characters, and capital letters.";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into database
    $sql = "INSERT INTO users (first_name, middle_name, last_name, email, dob, gender, password) VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$dob', '$gender', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page
        header("Location: loginpage.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
