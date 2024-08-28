<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Under Construction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c2c2c; /* Dark theme background */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            text-align: center;
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
            background: #1c1c1c;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            color: #ff0000; /* Red color for heading */
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
        }
        img {
            width: 100%;
            height: auto;
            max-width: 300px;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #ff0000; /* Red background for button */
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
            background-color: #cc0000; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="../home.php" class="back-button">Back</a>
    <div class="container">
        <h1>Page Under Construction</h1>
        <p>We are working to bring you a new and improved experience. Please check back soon!</p>
        <img src="../images/construction.gif" alt="Under Construction">
    </div>
</body>
</html>
