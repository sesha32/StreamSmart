<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamSmart Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: url('images/loginbg.jpg') no-repeat center center fixed; /* Background image */
            background-size: cover;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6); /* Overlay color */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .login-block {
            background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
            padding: 2rem;
            border-radius: 8px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h2 {
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: #CD1818;
        }
        .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            max-width: 300px; /* Adjust as needed */
        }
        .btn {
            display: block;
            width: 100%;
            max-width: 300px; /* Adjust as needed */
            padding: 0.75rem;
            font-size: 1.2rem;
            color: #fff;
            background-color: #CD1818;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 1rem 0;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #F2613F;
        }
        .google-btn {
            background-color: #DB4437;
            margin-bottom: 1rem;
        }
        .register-link {
            color: #CD1818;
            text-decoration: none;
            font-size: 1rem;
        }
        .register-link:hover {
            text-decoration: underline;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem;
            font-size: 1.2rem;
            color: #fff;
            background-color: #CD1818;
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
            background-color: #F2613F;
        }
    </style>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        function handleCredentialResponse(response) {
            console.log('Encoded JWT ID token: ' + response.credential);
            // Send the token to your server for verification and sign-in
        }

        window.onload = function () {
            google.accounts.id.initialize({
                client_id: 'YOUR_GOOGLE_CLIENT_ID',
                callback: handleCredentialResponse
            });
            google.accounts.id.renderButton(
                document.getElementById('google-signin-btn'),
                { theme: 'outline', size: 'large' }  // customization attributes
            );
        }
    </script>
</head>
<body>
    <div class="overlay"></div>
    <a href="index.html" class="back-button">Back</a>
    <div class="login-block">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="input-container">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">Login</button>
                <div id="google-signin-btn"></div>
            </div>
        </form>
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <p>Don't have an account? <a href="register.html" class="register-link">Register here</a></p>
    </div>
</body>
</html>
