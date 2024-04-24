<?php
// Include your database connection file
require '../../db/dbconn.php';

// Check if event_id is provided and is numeric
if (isset($_POST['event_id']) && is_numeric($_POST['event_id'])) {
    // Sanitize the input to prevent SQL injection
    $event_id = mysqli_real_escape_string($con, $_POST['event_id']);
    $event_name = strtoupper(mysqli_real_escape_string($con, $_POST['event_name']));
    $event_description = strtoupper(mysqli_real_escape_string($con, $_POST['event_description']));
    $speaker_id = mysqli_real_escape_string($con, $_POST['speaker_id']);
    $event_start = mysqli_real_escape_string($con, $_POST['event_start']);
    $event_end = mysqli_real_escape_string($con, $_POST['event_end']);
    $host_id = mysqli_real_escape_string($con, $_POST['host_id']);
    $location = strtoupper(mysqli_real_escape_string($con, $_POST['location']));

    // SQL query to update the event
    $sql = "UPDATE events SET 
            event_name='$event_name', 
            event_description='$event_description', 
            speaker_id='$speaker_id', 
            event_start='$event_start', 
            event_end='$event_end', 
            host_id='$host_id',
            location='$location'
            WHERE event_id='$event_id'";

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
