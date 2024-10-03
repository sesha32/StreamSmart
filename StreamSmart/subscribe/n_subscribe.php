<<<<<<< HEAD
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

    // Get the current date and time for subscription_date
    $subscriptionDate = date('Y-m-d H:i:s');

    // Insert subscription details into the Netflix subscriptions database
    $insertQuery = "INSERT INTO netflix_subscriptions (user_id, first_name, middle_name, last_name, email, mobile, plan, subscription_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param('isssssss', $userId, $firstName, $middleName, $lastName, $email, $mobile, $plan, $subscriptionDate);

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
    <title>Netflix Subscription Confirmation</title>
    <style>
        /* Styling similar to the previous page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 80px; /* Added space at the top */
            position: relative;
        }
        .container {
            width: 45%;
            padding: 40px;
            background-color: #222;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
            text-align: center;
        }
        h1 {
            color: #e50914;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #e50914;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #f40612;
        }
    </style>
</head>
<body>
    <a href="netflix.php" class="back-button">Back</a>
    <div class="container">
        <?php if ($subscriptionSuccessful): ?>
            <h1>Subscription Successful!</h1>
            <p>Thank you for subscribing to Netflix on our website. Your subscription details have been successfully recorded.</p>
            <p>This Netflix plan requires a combination of some people to take the plan, We'll inform you when we found a team for your subscription. It may take a little while please kindly wait. We'll contact you through you mobile number.</p>
            <p>You can enjoy all the features of the Premium plan.</p>
        <?php else: ?>
            <h1>Subscription Failed</h1>
            <p>There was an issue with your subscription. Please try again later.</p>
        <?php endif; ?>
    </div>
</body>
</html>
=======
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

    // Get the current date and time for subscription_date
    $subscriptionDate = date('Y-m-d H:i:s');

    // Insert subscription details into the Netflix subscriptions database
    $insertQuery = "INSERT INTO netflix_subscriptions (user_id, first_name, middle_name, last_name, email, mobile, plan, subscription_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param('isssssss', $userId, $firstName, $middleName, $lastName, $email, $mobile, $plan, $subscriptionDate);

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
    <title>Netflix Subscription Confirmation</title>
    <style>
        /* Styling similar to the previous page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 80px; /* Added space at the top */
            position: relative;
        }
        .container {
            width: 45%;
            padding: 40px;
            background-color: #222;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
            text-align: center;
        }
        h1 {
            color: #e50914;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #e50914;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #f40612;
        }
    </style>
</head>
<body>
    <a href="netflix.php" class="back-button">Back</a>
    <div class="container">
        <?php if ($subscriptionSuccessful): ?>
            <h1>Subscription Successful!</h1>
            <p>Thank you for subscribing to Netflix on our website. Your subscription details have been successfully recorded.</p>
            <p>This Netflix plan requires a combination of some people to take the plan, We'll inform you when we found a team for your subscription. It may take a little while please kindly wait. We'll contact you through you mobile number.</p>
            <p>You can enjoy all the features of the Premium plan.</p>
        <?php else: ?>
            <h1>Subscription Failed</h1>
            <p>There was an issue with your subscription. Please try again later.</p>
        <?php endif; ?>
    </div>
</body>
</html>
>>>>>>> ee9c263fccfb400879b1a5128634a4b8fbbbccfa
