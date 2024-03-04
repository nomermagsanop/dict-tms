<?php
// Include your database connection file
require '../../db/dbconn.php';

// Check if event_id is provided and is numeric
if (isset($_POST['participant_id']) && is_numeric($_POST['participant_id'])) {
    // Sanitize the input to prevent SQL injection
    $participant_id = mysqli_real_escape_string($con, $_POST['participant_id']);

    // SQL query to update the 'deleted' flag
    $sql = "UPDATE participants SET deleted=0 WHERE participant_id='$participant_id'";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // If the query is successful, return success
        echo 'success';
    } else {
        // If the query fails, return error
        echo 'error';
    }
} else {
    // If event_id is not provided or is not numeric, return error
    echo 'error';
}

// Close the database connection
mysqli_close($con);
?>
