<?php
include('auth_check.php');
include('../db_connection.php');

// Get the maximum team_id currently in the database to start from the next one
$team_id_query = "SELECT MAX(team_id) AS max_team_id FROM hotstar_subscriptions";
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
        // Calculate the expiration date by adding 12 months to the issued_date
        $expire_date = date('Y-m-d H:i:s', strtotime('+12 months', strtotime($issued_date)));

        // Update the hotstar_subscriptions table
        $update_query = "UPDATE hotstar_subscriptions 
                         SET issued='yes', team_id='$team_id', issued_date='$issued_date', expire_date='$expire_date' 
                         WHERE subscription_id='$subscription_id'";
        if ($conn->query($update_query) === TRUE) {
            error_log("Record updated successfully for subscription_id: $subscription_id");

            // Get the user_id for the current subscription
            $user_query = "SELECT user_id FROM hotstar_subscriptions WHERE subscription_id='$subscription_id'";
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

// Fetch subscriptions for the Hotstar page
$query = "SELECT subscription_id, user_id, first_name, email, mobile, subscription_date 
          FROM hotstar_subscriptions 
          WHERE plan='yearly' AND issued='no'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotstar Subscriptions</title>
    <style>
        /* Hotstar-inspired styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141b29; /* Hotstar dark blue */
            color: #FFF;
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
            color: #FFF;
            background-color: #00a8e1; /* Hotstar blue */
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
            background-color: #008bb2; /* Darker blue on hover */
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #1f2a3b; /* Lighter Hotstar blue */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        h1 {
            color: #00a8e1; /* Hotstar blue */
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
            background-color: #00a8e1; /* Hotstar blue */
            color: #000; /* Black text */
        }
        tr:nth-child(even) {
            background-color: #1c2a38; /* Even row color */
        }
        tr:nth-child(odd) {
            background-color: #253545; /* Odd row color */
        }
        .delete-icon {
            cursor: pointer;
            color: #00a8e1; /* Hotstar blue */
            font-size: 1.2em;
            border: none;
            background: none;
        }
        .team-heading {
            color: #00a8e1; /* Hotstar blue */
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
    <a href="admin_hotstar.php" class="back-button">Back</a>
    <div class="container">
        <h1>Hotstar Subscriptions - Yearly Plan</h1>
        <?php
        if ($result->num_rows > 0) {
            $count = 0;
            $subscription_ids = [];
            while ($row = $result->fetch_assoc()) {
                if ($count % 2 == 0) { // 2 members per team
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
                    echo "<div class='team-heading'>Team " . (int)($count / 2 + 1) . "</div>"; // Adjusted to 2 per team
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
                            <form action='delete_hotyeasubscription.php' method='POST' style='display:inline;' onsubmit='event.preventDefault(); confirmDelete(this);'>
                                <input type='hidden' name='subscription_id' value='{$row['subscription_id']}'>
                                <input type='hidden' name='service_type' value='hotstar'> <!-- Ensure it's Hotstar -->
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
