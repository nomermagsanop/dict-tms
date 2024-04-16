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
    $organization = strtoupper(mysqli_real_escape_string($con, $_POST['organization']));

    // Initialize variables for file upload
    $file_destination1 = '';
    $file_destination = '';

    // Check if profile image is uploaded
    if (!empty($_FILES['profile']['name'])) {
        // Handle file upload for profile image
        $file1 = $_FILES['profile'];
        $file_extension1 = pathinfo($file1['name'], PATHINFO_EXTENSION);
        $file_name1 = $last_name . $first_name . '_' . $speaker_id . '.' . $file_extension1;
        $file_tmp1 = $file1['tmp_name'];

        // Move uploaded file to desired location
        $file_destination1 = "../../img/speakers/" . $file_name1;
        move_uploaded_file($file_tmp1, $file_destination1);
    }

    // Check if sign image is uploaded
    if (!empty($_FILES['sign']['name'])) {
        // Handle file upload for sign image
        $file = $_FILES['sign'];
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_name = $last_name . $first_name . '_' . $speaker_id . '.' . $file_extension;
        $file_tmp = $file['tmp_name'];

        // Move uploaded file to desired location
        $file_destination = "../upload/" . $file_name;
        move_uploaded_file($file_tmp, $file_destination);
    }

    // Construct the SQL query
    $sql = "UPDATE speakers SET 
            first_name='$first_name', 
            mid_name='$mid_name', 
            last_name='$last_name', 
            ext_name='$ext_name',
            organization='$organization'";

    // Add profile image update to SQL query if profile image is uploaded
    if (!empty($file_destination1)) {
        $sql .= ", profile='$file_name1'";
    }

    // Add sign image update to SQL query if sign image is uploaded
    if (!empty($file_destination)) {
        $sql .= ", sign='$file_name'";
    }

    $sql .= " WHERE speaker_id='$speaker_id'";

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
