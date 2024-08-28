<?php
include('auth_check.php');
include('../db_connection.php');

$subscriptionSuccessful = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = $_POST['mobile'];
    $plan = $_POST['plan'];

    // Fetch user details from the session or database
    $userId = $_SESSION['user_id'];
    $query = "SELECT first_name, middle_name, last_name, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $stmt->bind_result($firstName, $middleName, $lastName, $email);
    $stmt->fetch();
    $stmt->close();

    // Insert subscription details into the Spotify subscriptions database
    $insertQuery = "INSERT INTO spotify_subscriptions (user_id, first_name, middle_name, last_name, email, mobile, plan) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param('issssss', $userId, $firstName, $middleName, $lastName, $email, $mobile, $plan);

    if ($insertStmt->execute()) {
        $subscriptionSuccessful = true;
    } else {
        echo "Error: " . $insertStmt->error;
    }

    $insertStmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Subscription Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212; /* Spotify dark theme */
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 80px;
            position: relative;
        }
        .container {
            width: 45%;
            padding: 40px;
            background-color: #1DB954; /* Spotify green */
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
            text-align: center;
        }
        h1 {
            color: #fff; /* White text */
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #1DB954; /* Spotify green */
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #1AA34A;
        }
    </style>
</head>
<body>
    <a href="spotify.php" class="back-button">Back</a>
    <div class="container">
        <?php if ($subscriptionSuccessful): ?>
            <h1>Subscription Successful!</h1>
            <p>Thank you for subscribing to Spotify. Your subscription details have been successfully recorded.</p>
            <p>This premium plan may require a team setup to comeplete the plan, and we will notify you once everything is set. Please wait patiently. We will contact you via the mobile number you provided.</p>
            <p>You can enjoy all the benefits of your Spotify subscription!</p>
        <?php else: ?>
            <h1>Subscription Failed</h1>
            <p>There was an issue with your subscription. Please try again later.</p>
        <?php endif; ?>
    </div>
</body>
</html>
