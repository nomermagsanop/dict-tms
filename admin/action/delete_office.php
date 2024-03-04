<?php
// Include your database connection file
require '../../db/dbconn.php';

// Check if event_id is provided and is numeric
if (isset($_POST['host_id']) && is_numeric($_POST['host_id'])) {
    // Sanitize the input to prevent SQL injection
    $host_id = mysqli_real_escape_string($con, $_POST['host_id']);

    // SQL query to update the 'deleted' flag
    $sql = "UPDATE host_office SET deleted=1 WHERE host_id='$host_id'";

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
