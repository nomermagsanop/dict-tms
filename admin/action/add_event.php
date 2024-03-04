<?php
// Include your database connection file
require '../../db/dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $event_name = mysqli_real_escape_string($con, $_POST['event_name']);
    $event_description = mysqli_real_escape_string($con, $_POST['event_description']);
    $speaker_id = mysqli_real_escape_string($con, $_POST['speaker_id']);
    $host_id = mysqli_real_escape_string($con, $_POST['host_id']);
    $event_start = mysqli_real_escape_string($con, $_POST['event_start']);
    $event_end = mysqli_real_escape_string($con, $_POST['event_end']);
    $status = "closed"; // Default status is closed

    // SQL query to insert new event
    $sql = "INSERT INTO events (event_name, event_description, speaker_id, event_start, event_end, host_id, status)
            VALUES ('$event_name', '$event_description', '$speaker_id', '$event_start', '$event_end', '$host_id', '$status')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // If the query is successful, return success
        echo 'success';
    } else {
        // If the query fails, return error
        echo 'error';
    }
}

// Close the database connection
mysqli_close($con);
?>
