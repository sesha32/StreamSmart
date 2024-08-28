<?php
include('auth_check.php');

// Database configuration
include('db_connection.php');

// Fetch the user's first name from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $first_name = $user['first_name'];
} else {
    // If user is not found, log them out
    header("Location: logout.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamSmart</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1;
        }
        .user-menu {
            display: inline-block;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }
        .user-menu:hover {
            background-color: #575757;
            color: #fff;
        }
        .user-menu .user-name {
            display: block;
        }
        .user-menu .user-icon {
            display: block;
        }
        .content {
            padding: 20px;
        }
        .ott-options {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .ott-option {
            cursor: pointer;
            text-align: center;
        }
        .ott-option img {
            width: 100px;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to StreamSmart</h1>
    <p>Your Destination for Affordable Subscriptions</p>
</header>

<nav>
    <a href="#" onclick="loadContent('home')">Home</a>
    <a href="#" onclick="loadContent('about')">About</a>
    <a href="#" onclick="loadContent('faqs')">FAQs</a>
    <a href="#" onclick="loadContent('support')">Support</a>
    <a href="#" onclick="loadContent('contact')">Contact Us</a>
    <div class="user-menu" onclick="location.href='profile.php'">
        <div class="user-icon">
            <img src="images/accounticon.png" alt="Account">
        </div>
        <span class="user-name"><?php echo htmlspecialchars($first_name); ?></span>
    </div>
</nav>

<main>
    <div class="content" id="content">
        <h2>Select Your Preferred Platform</h2>
        <div class="ott-options">
            <div class="ott-option" onclick="location.href='admins/admin_netflix.php'">
                <img src="images/netflix-logo.png" alt="Netflix">
                <h3>Netflix</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_amazon.php'">
                <img src="images/prime-logo.png" alt="Prime Video">
                <h3>Prime Video</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_hotstar.php'">
                <img src="images/hotstar-logo.png" alt="Hotstar">
                <h3>Hotstar</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_youtube.php'">
                <img src="images/youtube-logo.png" alt="Youtube">
                <h3>Youtube Premium</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_spotify.php'">
                <img src="images/spotify-logo.png" alt="Spotify">
                <h3>Spotify</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/underconstruction.php'">
                <img src="images/lionsgate-logo.png" alt="Lionsgate Play">
                <h3>Lionsgate</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/underconstruction.php'">
                <img src="images/zee5-logo.png" alt="Zee5">
                <h3>Zee5</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/underconstruction.php'">
                <img src="images/sonyliv-logo.png" alt="SonyLiv">
                <h3>SonyLiv</h3>
            </div>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 StreamSmart. All rights reserved.</p>
</footer>

<script>
    function loadContent(page) {
        let content = '';
        switch(page) {
            case 'home':
                content = `
                    <h2>Select Your Preferred Platform</h2>
        <div class="ott-options">
            <div class="ott-option" onclick="location.href='admins/admin_netflix.php'">
                <img src="images/netflix-logo.png" alt="Netflix">
                <h3>Netflix</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_amazon.php'">
                <img src="images/prime-logo.png" alt="Prime Video">
                <h3>Prime Video</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_hotstar.php'">
                <img src="images/hotstar-logo.png" alt="Hotstar">
                <h3>Hotstar</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_youtube.php'">
                <img src="images/youtube-logo.png" alt="Youtube">
                <h3>Youtube Premium</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/admin_spotify.php'">
                <img src="images/spotify-logo.png" alt="Spotify">
                <h3>Spotify</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/underconstruction.php'">
                <img src="images/lionsgate-logo.png" alt="Lionsgate Play">
                <h3>Lionsgate</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/underconstruction.php'">
                <img src="images/zee5-logo.png" alt="Zee5">
                <h3>Zee5</h3>
            </div>
            <div class="ott-option" onclick="location.href='admins/underconstruction.php'">
                <img src="images/sonyliv-logo.png" alt="SonyLiv">
                <h3>SonyLiv</h3>
            </div>
        </div>`;
                break;
            case 'about':
                content = '<h2>About Us</h2><p>About StreamSmart content...</p>';
                break;
            case 'faqs':
                content = '<h2>FAQs</h2><p>FAQs content...</p>';
                break;
            case 'support':
                content = '<h2>Support</h2><p>Support content...</p>';
                break;
            case 'contact':
                content = '<h2>Contact Us</h2><p>Contact us content...</p>';
                break;
        }
        document.getElementById('content').innerHTML = content;
    }
</script>

</body>
</html>