<?php
include('auth_check.php');
include('../db_connection.php');

// Get the maximum team_id currently in the database to start from the next one
$team_id_query = "SELECT MAX(team_id) AS max_team_id FROM netflix_subscriptions";
$team_id_result = $conn->query($team_id_query);
if ($team_id_result->num_rows > 0) {
    $team_id_row = $team_id_result->fetch_assoc();
    $team_id = $team_id_row['max_team_id'] + 1;
} else {
    $team_id = 1; // Start from 1 if no teams are found
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['team_issue'])) {
    $issued_date = date('Y-m-d H:i:s');
    $subscription_ids = explode(',', $_POST['subscription_ids']);

    foreach ($subscription_ids as $subscription_id) {
        // Calculate the expiration date by adding 1 year to the issued_date
        $expire_date = date('Y-m-d H:i:s', strtotime('+1 year', strtotime($issued_date)));

        // Update the netflix_subscriptions table
        $update_query = "UPDATE netflix_subscriptions 
                         SET issued='yes', team_id='$team_id', issued_date='$issued_date', expire_date='$expire_date' 
                         WHERE subscription_id='$subscription_id'";
        if ($conn->query($update_query) === TRUE) {
            error_log("Record updated successfully for subscription_id: $subscription_id");

            // Get the user_id for the current subscription
            $user_query = "SELECT user_id FROM netflix_subscriptions WHERE subscription_id='$subscription_id'";
            $user_result = $conn->query($user_query);
            if ($user_result->num_rows > 0) {
                $user_row = $user_result->fetch_assoc();
                $user_id = $user_row['user_id'];

                // Update the users table
                $update_user_query = "UPDATE users SET subscriptions = subscriptions + 1 WHERE id='$user_id'";
                if ($conn->query($update_user_query) === TRUE) {
                    error_log("Subscription count updated successfully for user_id: $user_id");
                } else {
                    error_log("Error updating subscription count for user_id: $user_id - " . $conn->error);
                }
            }
        } else {
            error_log("Error updating record for subscription_id: $subscription_id - " . $conn->error);
        }
    }

    $team_id++; // Increment team_id for the next team
}

// Query to select subscriptions with the yearly plan
$query = "SELECT subscription_id, user_id, first_name, email, mobile, subscription_date FROM netflix_subscriptions WHERE plan='yearly' AND issued='no'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content as before -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Subscriptions - Yearly Plan</title>
    <style>
        /* Styling as in your original code */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414; /* Netflix dark theme */
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
        }
        .back-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #e50914; /* Netflix red color */
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
            background-color: #b00611;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #282828;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        h1 {
            color: #e50914; /* Netflix red color */
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
            text-align: left;
        }
        th {
            background-color: #e50914; /* Netflix red color */
        }
        tr:nth-child(even) {
            background-color: #333;
        }
        tr:nth-child(odd) {
            background-color: #282828;
        }
        .delete-icon {
            cursor: pointer;
            color: #e50914; /* Netflix red color */
            font-size: 1.2em;
            border: none;
            background: none;
        }
        .team-heading {
            color: #fff;
            font-size: 1.5em;
            margin: 20px 0 10px 0;
            text-align: center;
        }
        .issue-checkbox {
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
    <script>
        function confirmDelete(form) {
            if (confirm("Are you sure you want to delete this subscription?")) {
                form.submit();
            }
        }

        function handleIssueSubmit(form) {
            if (confirm("Are you sure you want to mark this team as issued?")) {
                form.submit();
            }
        }
    </script>
</head>
<body>
    <a href="admin_netflix.php" class="back-button">Back</a>
    <div class="container">
        <h1>Netflix Subscriptions - Yearly Plan</h1>
        <?php
        if ($result->num_rows > 0) {
            $count = 0;
            $subscription_ids = [];
            while ($row = $result->fetch_assoc()) {
                if ($count % 4 == 0) {
                    if ($count > 0) {
                        echo "</tbody></table>
                              <form action='' method='POST' class='issue-form' onsubmit='event.preventDefault(); handleIssueSubmit(this);'>
                                <input type='hidden' name='team_id' value='$team_id'>
                                <input type='hidden' name='subscription_ids' value='" . implode(',', $subscription_ids) . "'>
                                <label class='issue-checkbox'>
                                    <input type='checkbox' name='team_issue' onchange='this.form.submit()'> Issued
                                </label>
                              </form>";
                        $team_id++; // Increment team_id for the next team
                        $subscription_ids = [];
                    }
                    echo "<div class='team-heading'>Team " . (int)($count / 4 + 1) . "</div>";
                    echo "<table><thead><tr>
                            <th>Subscription ID</th>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Subscription Date</th>
                            <th>Action</th>
                          </tr></thead><tbody>";
                }
                $subscription_ids[] = $row['subscription_id'];
                echo "<tr>
                        <td>{$row['subscription_id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['mobile']}</td>
                        <td>{$row['subscription_date']}</td>
                        <td>
                            <form action='delete_netyeasubscription.php' method='POST' style='display:inline;' onsubmit='event.preventDefault(); confirmDelete(this);'>
                                <input type='hidden' name='subscription_id' value='{$row['subscription_id']}'>
                                <button type='submit' class='delete-icon'>&#x1F5D1;</button>
                            </form>
                        </td>
                      </tr>";
                $count++;
            }
            echo "</tbody></table>
                  <form action='' method='POST' class='issue-form' onsubmit='event.preventDefault(); handleIssueSubmit(this);'>
                    <input type='hidden' name='team_id' value='$team_id'>
                    <input type='hidden' name='subscription_ids' value='" . implode(',', $subscription_ids) . "'>
                    <label class='issue-checkbox'>
                        <input type='checkbox' name='team_issue' onchange='this.form.submit()'> Issued
                    </label>
                  </form>";
            $team_id++; // Increment for the last team
        } else {
            echo "<p>No subscriptions found</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
