<?php
// Include your database connection file
require 'db/dbconn.php';

// Check if the username parameter is set in the POST request
if (isset($_POST['username'])) {
    // Sanitize the username input to prevent SQL injection
    $username = mysqli_real_escape_string($con, $_POST['username']);

    // Query to check if the username already exists in the database
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = $con->query($sql);

    if ($result) {
        // If the query is successful, check if the username already exists
        if ($result->num_rows > 0) {
            // Username exists, send response as JSON indicating that the username exists
            echo json_encode(array('exists' => true));
        } else {
            // Username does not exist, send response as JSON indicating that the username does not exist
            echo json_encode(array('exists' => false));
        }
    } else {
        // If the query fails, send an error response
        echo json_encode(array('error' => 'Failed to execute query'));
    }
} else {
    // If the username parameter is not set, send an error response
    echo json_encode(array('error' => 'Username parameter is not set'));
}
?>
