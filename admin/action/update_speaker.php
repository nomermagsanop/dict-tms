<?php
// Include your database connection file
require '../../db/dbconn.php';

// Check if speaker_id is provided and is numeric
if (isset($_POST['speaker_id']) && is_numeric($_POST['speaker_id'])) {
    // Sanitize the input to prevent SQL injection
    $speaker_id = mysqli_real_escape_string($con, $_POST['speaker_id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $mid_name = mysqli_real_escape_string($con, $_POST['mid_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $ext_name = mysqli_real_escape_string($con, $_POST['ext_name']);
   

    // SQL query to update the event
    $sql = "UPDATE speakers SET 
            first_name='$first_name', 
            mid_name='$mid_name', 
            last_name='$last_name', 
            ext_name='$ext_name'        
            WHERE speaker_id='$speaker_id'";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // If the query is successful, return success
        echo 'success';
    } else {
        // If the query fails, return error
        echo 'error';
    }
} else {
    // If speaker_id is not provided or is not numeric, return error
    echo 'error';
}

// Close the database connection
mysqli_close($con);
?>
