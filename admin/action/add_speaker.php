<?php
// Include your database connection file
require '../../db/dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = strtoupper(mysqli_real_escape_string($con, $_POST['first_name']));
    $mid_name = strtoupper(mysqli_real_escape_string($con, $_POST['mid_name']));
    $last_name = strtoupper(mysqli_real_escape_string($con, $_POST['last_name']));
    $ext_name = strtoupper(mysqli_real_escape_string($con, $_POST['ext_name']));
    
    // Handle file upload
    $file = $_FILES['inputupload'];
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $current_datetime = date('YmdHis'); // Generate current datetime
    $file_name = $last_name . $first_name . '_' . $current_datetime . '.' . $file_extension;
    $file_tmp = $file['tmp_name'];

    // Move uploaded file to desired location
    $file_destination = "../upload/" . $file_name;
    move_uploaded_file($file_tmp, $file_destination);

    // SQL query to insert new event
    $sql = "INSERT INTO speakers (first_name, mid_name, last_name, ext_name, upload_url)
            VALUES ('$first_name', '$mid_name', '$last_name', '$ext_name', '$file_name')";

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
