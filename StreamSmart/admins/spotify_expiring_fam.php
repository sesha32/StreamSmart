<?php
include('auth_check.php');
include('../db_connection.php');

// Get the current date
$currentDate = date('Y-m-d');

// Query to get teams with monthly plan expiring in 2 days or less, but not expired, and fetch additional fields
$query = "SELECT team_id, subscription_id, first_name, email, mobile, issued_date, expire_date 
          FROM spotify_subscriptions 
          WHERE plan = 'Family' 
          AND expire_date >= '$currentDate' 
          AND DATEDIFF(expire_date, '$currentDate') <= 2";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expiring Soon - Monthly Family Plan (Spotify)</title>
    <style>
        /* Spotify-inspired styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #191414; /* Dark Spotify theme background */
            color: #FFF;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
            text-align: center; /* Center-align text in the body */
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #FFF;
            background-color: #1DB954; /* Spotify green */
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
            background-color: #14833B; /* Darker green on hover */
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #282828; /* Slightly lighter background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center; /* Center-align text inside container */
        }
        h1 {
            color: #1DB954; /* Spotify green */
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #444;
            text-align: center; /* Center-align table cells */
        }
        th {
            background-color: #1DB954; /* Spotify green */
            color: #000; /* Black text */
        }
        tr:nth-child(even) {
            background-color: #333333; /* Even row color */
        }
        tr:nth-child(odd) {
            background-color: #454545; /* Odd row color */
        }
        .delete-icon {
            cursor: pointer;
            color: #1DB954; /* Spotify green */
            font-size: 1.2em;
            border: none;
            background: none;
        }
        .team-heading {
            color: #1DB954; /* Spotify green */
            font-size: 1.5em;
            margin: 20px 0 10px 0;
            text-align: center;
        }
        .issue-checkbox {
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="admin_spotify.php" class="back-button">Back</a>
    <div class="container">
        <h1>Expiring Soon - Monthly Family Plan (Spotify)</h1>
        <h3>Teams with subscriptions expiring in 2 days or less:</h3>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Team ID</th>
                        <th>Subscription ID</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Issued Date</th>
                        <th>Expire Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['team_id']; ?></td>
                            <td><?php echo $row['subscription_id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['issued_date']; ?></td>
                            <td><?php echo $row['expire_date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No teams have subscriptions expiring in 2 days or less.</p>
        <?php endif; ?>

    </div>
</body>
</html>
