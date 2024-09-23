<?php include('auth_check.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotstar Subscription Plans - India</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c2c2c; /* Hotstar dark theme */
            color: #fff;
            min-height: 100vh;
            position: relative;
            padding-top: 80px; /* Added space at the top */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .container {
            width: 45%; /* Adjusted width */
            padding: 40px; /* Adjusted padding */
            background-color: #1c1c1c;
            color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
            text-align: center;
        }
        h1 {
            color: #00aaff; /* Hotstar's blue color */
        }
        h3 {
            color: #00aaff; /* Hotstar's blue color */
        }
        .button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #00aaff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin: 10px;
        }
        .button:hover {
            background-color: #009ae0;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #00aaff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .back-button:hover {
            background-color: #009ae0;
        }
        .flex-container {
            display: flex;
            justify-content: space-around;
            width: 90%; /* Adjust width as necessary */
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="../admin_home.php" class="back-button">Back</a>
    <div class="flex-container">
        <div class="container">
            <h1>Have to Issue</h1>
            <h3>Select a Plan</h3>
            <p>2 per team</p>
            <a href="hotstar_havetoissue_monthly.php" class="button">Monthly Plan</a>
            <a href="hotstar_havetoissue_quarterly.php" class="button">Quarterly Plan</a>
            <a href="hotstar_havetoissue_yearly.php" class="button">Yearly Plan</a>
        </div>

        <div class="container">
            <h1>Expiring Soon</h1>
            <h3>Select a Plan</h3>
            <a href="hotstar_expiring_monthly.php" class="button">Monthly Plan</a>
            <a href="hotstar_expiring_quarterly.php" class="button">Quarterly Plan</a>
            <a href="hotstar_expiring_yearly.php" class="button">Yearly Plan</a>
        </div>
    </div>
</body>
</html>
