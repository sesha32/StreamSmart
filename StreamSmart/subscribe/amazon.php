<?php include('auth_check.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Prime Subscription Plans - India</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #232F3E; /* Amazon's dark blue color */
            color: #FFFFFF;
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
            background-color: #FFFFFF;
            color: #232F3E;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
        }
        h1 {
            color: #FF9900; /* Amazon's orange color */
        }
        .plan {
            border-bottom: 1px solid #444;
            padding: 20px 0;
        }
        .plan:last-child {
            border-bottom: none;
        }
        .plan h2 {
            margin: 10px 0;
        }
        .plan p, .plan ul {
            margin: 5px 0;
            padding: 0;
            list-style-type: none;
        }
        .plan ul li {
            margin: 5px 0;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #FFFFFF;
            background-color: #FF9900;
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
            background-color: #FFA733;
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
            color: #FFFFFF;
            background-color: #FF9900;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 20px;
            text-align: center;
        }
        .subscribe-button:hover {
            background-color: #FFA733;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="../home.php" class="back-button">Back</a>
    <div class="content-wrapper">
        <!-- First Container -->
        <div class="container">
            <h1>Prime Subscription Plans</h1>
            <!-- Monthly Plan -->
            <div class="plan">
                <h2>Monthly Plan</h2>
                <p>Price: ₹299</p>
                <p>Features:</p>
                <ul>
                    <li>Unlimited streaming of movies and TV shows</li>
                    <li>Free delivery on eligible orders</li>
                    <li>Ad-free music with Prime Music</li>
                    <li>Access to exclusive deals and early product launches</li>
                    <li>Three screens at a time</li>
                </ul>
            </div>
            <!-- Annual Plan -->
            <div class="plan">
                <h2>Annual Plan</h2>
                <p>Price: ₹1499</p>
                <p>Features:</p>
                <ul>
                    <li>Unlimited streaming of movies and TV shows</li>
                    <li>Free delivery on eligible orders</li>
                    <li>Ad-free music with Prime Music</li>
                    <li>Access to exclusive deals and early product launches</li>
                    <li>Three screens at a time</li>
                </ul>
            </div>
        </div>

        <!-- Second Container -->
        <div class="container">
            <h1>Our Prime Subscription Plans</h1>
            <!-- Monthly Plan -->
            <div class="plan">
                <h2>Monthly Plan</h2>
                <p>Price: ₹120</p>
                <p>Features:</p>
                <ul>
                    <li>Unlimited streaming of movies and TV shows</li>
                    <li>Free delivery on eligible orders</li>
                    <li>Ad-free music with Prime Music</li>
                    <li>Access to exclusive deals and early product launches</li>
                    <li>One screen at a time</li>
                </ul>
                <a href="amazon_subscribe.php" class="subscribe-button">Subscribe</a>
            </div>
            <!-- Annual Plan -->
            <div class="plan">
                <h2>Annual Plan</h2>
                <p>Price: ₹530</p>
                <p>Features:</p>
                <ul>
                    <li>Unlimited streaming of movies and TV shows</li>
                    <li>Free delivery on eligible orders</li>
                    <li>Ad-free music with Prime Music</li>
                    <li>Access to exclusive deals and early product launches</li>
                    <li>One screen at a time</li>
                </ul>
                <a href="amazon_subscribe.php" class="subscribe-button">Subscribe</a>
            </div>
        </div>
    </div>
</body>
</html>
