<?php
include('auth_check.php');
include('../db_connection.php');

// Get the current date
$currentDate = date('Y-m-d');

// Query to get teams with yearly plan expiring in 2 days or less, but not expired, and fetch additional fields
$query = "SELECT team_id, subscription_id, first_name, email, mobile, issued_date, expire_date 
          FROM netflix_subscriptions 
          WHERE plan = 'yearly' 
          AND expire_date >= '$currentDate' 
          AND DATEDIFF(expire_date, '$currentDate') <= 2";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expiring Soon - Yearly Plan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: #fff;
            min-height: 100vh;
            position: relative;
            padding-top: 80px;
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
            width: 80%;
            padding: 40px;
            background-color: #222;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 20px;
            text-align: center;
        }
        h1, h3 {
            color: #e50914;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #282828;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #444;
        }
        th {
            background-color: #e50914;
            color: #fff;
            font-weight: bold;
            font-size: 1.1em;
        }
        td {
            color: #fff;
            background-color: #333;
        }
        tr:nth-child(even) td {
            background-color: #282828;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #e50914;
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
            background-color: #f40612;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="admin_netflix.php" class="back-button">Back</a>
    <div class="container">
        <h1>Expiring Soon - Yearly Plan</h1>
        <h3>Teams with yearly subscriptions expiring in 2 days or less:</h3>

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
