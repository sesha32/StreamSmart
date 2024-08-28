<?php
include('../db_connection.php');
include('auth_check.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subscription_id'])) {
    // Sanitize and prepare the input
    $subscription_id = $_POST['subscription_id'];

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM amazon_subscriptions WHERE subscription_id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("s", $subscription_id); // Bind the parameter
        
        if ($stmt->execute()) {
            // Redirect with success message
            header("Location: amazon_havetoissue_yearly.php?success=" . urlencode("Subscription deleted successfully"));
        } else {
            // Redirect with error message
            header("Location: amazon_havetoissue_yearly.php?error=" . urlencode("Error deleting subscription: " . $stmt->error));
        }

        $stmt->close();
    } else {
        // Handle errors in preparing the statement
        header("Location: amazon_havetoissue_yearly.php?error=" . urlencode("Error preparing statement: " . $conn->error));
    }

    $conn->close();
} else {
    // Redirect if POST request or subscription_id is missing
    header("Location: amazon_havetoissue_yearly.php?error=" . urlencode("Invalid request or missing subscription_id"));
}
?>
