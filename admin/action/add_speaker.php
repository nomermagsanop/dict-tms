<?php
// Include your database connection file
require '../../db/dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $mid_name = mysqli_real_escape_string($con, $_POST['mid_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $ext_name = mysqli_real_escape_string($con, $_POST['ext_name']);
   
    $upload_url = $_FILES['inputupload']['name'];
    $temp = explode(".", $_FILES["inputupload"]["name"]);
    if ($upload_url != "") {
        $newfilename = rand(10000, 10000000) . '.' . end($temp);
    } else {
        $newfilename = "";
    }

    $target = "action/" . $newfilename;

    if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
        echo "Image uploaded successfully";
    } else {
        echo "Failed to upload image";
    }

     
    $sql = "INSERT INTO speakers (first_name, mid_name, last_name, event_start, event_end, ext_name, status)
            VALUES ('$first_name', '$mid_name', '$last_name', '$ext_name', '$newfilename')";

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
