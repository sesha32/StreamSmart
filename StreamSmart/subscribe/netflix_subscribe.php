<?php
include('auth_check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Subscription Plans - India</title>
    <style>
        /* Styling as previously provided */
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
        .content-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .container {
            width: 45%;
            padding: 40px;
            background-color: #222;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
        }
        h1, h2 {
            color: #e50914;
        }
        .plan p, .plan ul {
            margin: 5px 0;
            padding: 0;
            list-style-type: none;
        }
        .plan ul li {
            margin: 5px 0;
        }
        .button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #e50914;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 10px 5px 20px 0;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #f40612;
        }
        #mobileForm {
            margin-top: 20px;
        }
        #mobileInput {
            width: 100%;
            text-align: center;
        }
        label, input {
            display: block;
            margin: 10px auto;
            width: 80%;
        }
        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #444;
            background-color: #333;
            color: #fff;
        }
        button[type="submit"] {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #e50914;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #f40612;
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
    <script>
        function showMobileInput(planType) {
            var formHtml = `
                <form id="mobileForm" action="n_subscribe.php" method="POST">
                    <label for="mobile">Enter your mobile number:</label>
                    <input type="text" id="mobile" name="mobile" required placeholder="Enter your mobile number">
                    <input type="hidden" name="plan" value="` + planType + `">
                    <button type="submit">Submit</button>
                </form>
            `;
            document.getElementById('mobileInput').innerHTML = formHtml;
        }
    </script>
</head>
<body>
    <a href="netflix.php" class="back-button">Back</a>
    <div class="content-wrapper">
        <div class="container">
            <h1>Netflix Subscription Plans</h1>
            <div class="plan">
                <h2>Premium Plan</h2>
                <p>Monthly Price: ₹183</p>
                <p>Yearly Price: ₹1977</p>
                <p>Features:</p>
                <ul>
                    <li>Watch on any device (mobile, tablet, computer, TV)</li>
                    <li>Ultra HD quality</li>
                </ul>
                <button class="button" onclick="showMobileInput('Monthly')">Subscribe Monthly</button>
                <button class="button" onclick="showMobileInput('Yearly')">Subscribe Yearly</button>
                <div id="mobileInput"></div>
            </div>
        </div>
    </div>
</body>
</html>
