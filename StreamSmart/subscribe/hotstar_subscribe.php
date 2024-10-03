<?php include('auth_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotstar Subscription Plans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; /* Hotstar dark theme */
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 60px; /* Space for back button */
        }
        .container {
            background-color: #1a1a1a;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 20px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        h1 {
            color: #00aaff; /* Hotstar theme color */
        }
        .plan ul {
            list-style-type: none;
            padding: 0;
        }
        .plan ul li {
            margin: 5px 0;
        }
        .subscribe-button {
            background-color: #00aaff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            font-size: 1rem;
        }
        .subscribe-button:hover {
            background-color: #009ae0;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #00aaff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
        }
        .back-button:hover {
            background-color: #009ae0;
        }
        #mobileInput form {
            margin-top: 20px;
            text-align: center;
        }
        #mobileInput label {
            display: block;
            margin-bottom: 10px;
        }
        #mobileInput input[type="text"] {
            padding: 10px;
            border: 1px solid #00aaff;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            width: 80%;
            max-width: 300px;
            margin-bottom: 10px;
        }
        #mobileInput button {
            background-color: #00aaff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        #mobileInput button:hover {
            background-color: #009ae0;
        }
    </style>
    <script>
        function showMobileInput(planType) {
            // Display the mobile input form
            var formHtml = `
                <form id="mobileForm" action="hot_subscribe.php" method="POST">
                    <label for="mobile">Enter your mobile number:</label>
                    <input type="text" id="mobile" name="mobile" required>
                    <input type="hidden" name="plan" value="` + planType + `">
                    <button type="submit">Submit</button>
                </form>
            `;
            document.getElementById('mobileInput').innerHTML = formHtml;
        }
    </script>
</head>
<body>
    <a href="hotstar.php" class="back-button">Back</a>
    <div class="container">
        <h1>Hotstar Subscription Plans</h1>
        <div class="plan">
            <h2>Premium Plans</h2>
            <ul>
                <li>Monthly Plan: ₹170</li>
                <li>Quarterly Plan: ₹470</li>
                <li>Yearly Plan: ₹780</li>
            </ul>
            <button class="subscribe-button" onclick="showMobileInput('Monthly')">Subscribe Monthly</button>
            <button class="subscribe-button" onclick="showMobileInput('Quarterly')">Subscribe Quarterly</button>
            <button class="subscribe-button" onclick="showMobileInput('Yearly')">Subscribe Yearly</button>
            <div id="mobileInput"></div>
        </div>
    </div>
</body>
</html>
