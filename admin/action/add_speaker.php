<?php
// Include your database connection file
require '../../db/dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $mid_name = mysqli_real_escape_string($con, $_POST['mid_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $ext_name = mysqli_real_escape_string($con, $_POST['ext_name']);
   
    // SQL query to insert new event
    $sql = "INSERT INTO events (first_name, mid_name, last_name, ext_name)
            VALUES ('$first_name', '$mid_name', '$last_name', '$ext_name')";

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
