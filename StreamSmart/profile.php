<?php
include('auth_check.php');

// Database configuration
$servername = "localhost";
$username = "root"; // Update with your DB username
$password = ""; // Update with your DB password
$dbname = "streamsmart"; // Update with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the user's details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name, middle_name, last_name, email, dob, gender FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // If user is not found, log them out
    header("Location: logout.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #000;
            color: #fff;
        }
        .profile-container {
            width: 80%;
            max-width: 800px;
            padding: 40px;
            background-color: #222;
            border-radius: 10px;
            position: relative;
        }
        .profile-container div {
            margin-bottom: 20px;
        }
        .profile-container label {
            font-weight: bold;
        }
        .profile-container span {
            display: block;
            margin-top: 5px;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #CD1818;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .back-button:hover {
            background-color: #F2613F;
        }
        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #CD1818;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .logout-button:hover {
            background-color: #F2613F;
        }
    </style>
</head>
<body>
    <?php if ($user_id == 1): ?>
        <a href="admin_home.php" class="back-button">Back</a>
    <?php else: ?>
        <a href="home.php" class="back-button">Back</a>
    <?php endif; ?>
    <div class="profile-container">
        <h2>View Profile</h2>
        <div>
            <label for="first-name">First Name:</label>
            <span id="first-name"><?php echo htmlspecialchars($user['first_name']); ?></span>
        </div>
        <div>
            <label for="middle-name">Middle Name:</label>
            <span id="middle-name"><?php echo htmlspecialchars($user['middle_name']); ?></span>
        </div>
        <div>
            <label for="last-name">Last Name:</label>
            <span id="last-name"><?php echo htmlspecialchars($user['last_name']); ?></span>
        </div>
        <div>
            <label for="email">Email:</label>
            <span id="email"><?php echo htmlspecialchars($user['email']); ?></span>
        </div>
        <div>
            <label for="dob">Date of Birth:</label>
            <span id="dob"><?php echo htmlspecialchars($user['dob']); ?></span>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <span id="gender"><?php echo htmlspecialchars($user['gender']); ?></span>
        </div>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
