<?php
include('auth_check.php');
include('../db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subscription_id = $conn->real_escape_string($_POST['subscription_id']);

    $sql = "DELETE FROM netflix_subscriptions WHERE subscription_id = '$subscription_id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: netflix_havetoissue_yearly.php?success=Subscription deleted successfully");
    } else {
        header("Location: netflix_havetoissue_yearly.php?error=Error deleting subscription: " . $conn->error);
    }

    $conn->close();
}
?>
