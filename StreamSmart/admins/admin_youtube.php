<<<<<<< HEAD
<?php include('auth_check.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Subscription Plans - India</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #181818; /* YouTube dark theme */
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
            width: 45%; /* Same width as in Netflix example */
            padding: 40px; /* Same padding */
            background-color: #202020;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px; /* Margin for spacing */
            text-align: center;
        }
        h1, h3 {
            color: #FF0000; /* YouTube red color */
        }
        .button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #FF0000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin: 10px;
        }
        .button:hover {
            background-color: #cc0000;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #FF0000;
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
            background-color: #cc0000;
        }
        .flex-container {
            display: flex; /* Flexbox for side-by-side layout */
            justify-content: space-around; /* Space around containers */
            width: 90%; /* Adjust width as necessary */
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="../admin_home.php" class="back-button">Back</a>
    <div class="flex-container">
        <!-- Main Subscription Container -->
        <div class="container">
            <h1>Have to Issue</h1>
            <h3>Select a Plan</h3>
            <p>5 per team</p>
            <a href="youtube_havetoissue_monthly.php" class="button">Monthly Plan</a>
        </div>

        <!-- Expiring Soon Container -->
        <div class="container">
            <h1>Expiring Soon</h1>
            <h3>Select a Plan</h3>
            <p>5 per team</p>
            <a href="youtube_expiring_monthly.php" class="button">Monthly Plan</a>
        </div>
    </div>
</body>
</html>
=======
<?php include('auth_check.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Subscription Plans - India</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #181818; /* YouTube dark theme */
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
            width: 45%; /* Same width as in Netflix example */
            padding: 40px; /* Same padding */
            background-color: #202020;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px; /* Margin for spacing */
            text-align: center;
        }
        h1, h3 {
            color: #FF0000; /* YouTube red color */
        }
        .button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #FF0000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin: 10px;
        }
        .button:hover {
            background-color: #cc0000;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #FF0000;
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
            background-color: #cc0000;
        }
        .flex-container {
            display: flex; /* Flexbox for side-by-side layout */
            justify-content: space-around; /* Space around containers */
            width: 90%; /* Adjust width as necessary */
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="../admin_home.php" class="back-button">Back</a>
    <div class="flex-container">
        <!-- Main Subscription Container -->
        <div class="container">
            <h1>Have to Issue</h1>
            <h3>Select a Plan</h3>
            <p>5 per team</p>
            <a href="youtube_havetoissue_monthly.php" class="button">Monthly Plan</a>
        </div>

        <!-- Expiring Soon Container -->
        <div class="container">
            <h1>Expiring Soon</h1>
            <h3>Select a Plan</h3>
            <p>5 per team</p>
            <a href="youtube_expiring_monthly.php" class="button">Monthly Plan</a>
        </div>
    </div>
</body>
</html>
>>>>>>> ee9c263fccfb400879b1a5128634a4b8fbbbccfa
