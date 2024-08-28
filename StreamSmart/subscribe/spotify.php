<?php include('auth_check.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Subscription Plans - India</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
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
            width: 45%;
            padding: 40px;
            background-color: #1DB954;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
        }
        h1 {
            color: #fff;
        }
        .plan {
            border-bottom: 1px solid #333;
            padding: 20px 0;
        }
        .plan:last-child {
            border-bottom: none;
        }
        .plan h2 {
            margin: 10px 0;
            color: #fff;
        }
        .plan p, .plan ul {
            margin: 5px 0;
            padding: 0;
            list-style-type: none;
            color: #fff;
        }
        .plan ul li {
            margin: 5px 0;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #1DB954;
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
            background-color: #1AA34A;
        }
        .content-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
            gap: 2%;
        }
        .subscribe-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #121212;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 20px;
            text-align: center;
        }
        .subscribe-button:hover {
            background-color: #1AA34A;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="../home.php" class="back-button">Back</a>
    <div class="content-wrapper">
        <!-- First Container -->
        <div class="container">
            <h1>Spotify Individual Plan</h1>
            <div class="plan">
                <h2>Monthly Plan</h2>
                <p>Price: ₹119</p>
                <p>Features:</p>
                <ul>
                    <li>Ad-free music listening</li>
                    <li>Offline playback</li>
                    <li>Unlimited skips</li>
                    <li>High-quality audio</li>
                </ul>
            </div>
        </div>

        <!-- Second Container -->
        <div class="container">
            <h1>Our Spotify Subscription Plans</h1>
            <!-- Duo Plan -->
            <div class="plan">
                <h2>Monthly Plan 1</h2>
                <p>Monthly Price: ₹95</p>
                <p>Features:</p>
                <ul>
                    <li>Ad-free music listening</li>
                    <li>Offline playback</li>
                    <li>Unlimited skips</li>
                </ul>
                <a href="spotify_subscribe.php" class="subscribe-button">Subscribe</a>
            </div>
            <!-- Family Plan -->
            <div class="plan">
                <h2>Monthly Plan 2</h2>
                <p>Monthly Price: ₹40</p>
                <p>Features:</p>
                <ul>
                    <li>Ad-free music listening</li>
                    <li>Offline playback</li>
                    <li>Unlimited skips</li>
                </ul>
                <a href="spotify_subscribe.php" class="subscribe-button">Subscribe</a>
            </div>
        </div>
    </div>
</body>
</html>
