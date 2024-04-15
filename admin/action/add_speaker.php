<?php
// Include your database connection file
require '../../db/dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = strtoupper(mysqli_real_escape_string($con, $_POST['first_name']));
    $mid_name = strtoupper(mysqli_real_escape_string($con, $_POST['mid_name']));
    $last_name = strtoupper(mysqli_real_escape_string($con, $_POST['last_name']));
    $ext_name = strtoupper(mysqli_real_escape_string($con, $_POST['ext_name']));
    $organization = strtoupper(mysqli_real_escape_string($con, $_POST['organization']));

    // Handle file upload
    $file1 = $_FILES['profile'];
    $file_extension1 = pathinfo($file1['name'], PATHINFO_EXTENSION);
    $current_datetime1 = date('YmdHis'); // Generate current datetime
    $file_name1 = $last_name . $first_name . '_' . $current_datetime1 . '.' . $file_extension1;
    $file_tmp1 = $file1['tmp_name'];

    // Move uploaded file to desired location
    $file_destination1 = "../../img/speakers/" . $file_name1;
    move_uploaded_file($file_tmp1, $file_destination1);


    
    // Handle file upload
    $file = $_FILES['sign'];
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $current_datetime = date('YmdHis'); // Generate current datetime
    $file_name = $last_name . $first_name . '_' . $current_datetime . '.' . $file_extension;
    $file_tmp = $file['tmp_name'];

    // Move uploaded file to desired location
    $file_destination = "../upload/" . $file_name;
    move_uploaded_file($file_tmp, $file_destination);


    // SQL query to insert new event
    $sql = "INSERT INTO speakers (first_name, mid_name, last_name, ext_name, organization, profile, sign)
            VALUES ('$first_name', '$mid_name', '$last_name', '$ext_name', '$organization', '$file_name1', '$file_name')";

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
