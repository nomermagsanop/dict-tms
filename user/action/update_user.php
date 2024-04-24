<?php
// Include your database connection file
require '../../db/dbconn.php';

// Check if user_id is provided and is numeric
if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
    // Sanitize the input to prevent SQL injection
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $first_name = strtoupper(mysqli_real_escape_string($con, $_POST['first_name']));
    $mid_name = strtoupper(mysqli_real_escape_string($con, $_POST['mid_name']));
    $last_name = strtoupper(mysqli_real_escape_string($con, $_POST['last_name']));
    $ext_name = strtoupper(mysqli_real_escape_string($con, $_POST['ext_name']));
    $age = strtoupper(mysqli_real_escape_string($con, $_POST['age']));
    $sex = strtoupper(mysqli_real_escape_string($con, $_POST['sex']));
    $email = strtoupper(mysqli_real_escape_string($con, $_POST['email']));
    $contact = strtoupper(mysqli_real_escape_string($con, $_POST['contact']));
    $province = strtoupper(mysqli_real_escape_string($con, $_POST['province']));
    $host_id = strtoupper(mysqli_real_escape_string($con, $_POST['host_id']));
    $username = strtoupper(mysqli_real_escape_string($con, $_POST['username']));
    $password = strtoupper(mysqli_real_escape_string($con, $_POST['password'])); // Don't forget to hash this
    $confirm_password = strtoupper(mysqli_real_escape_string($con, $_POST['confirm_password']));

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Initialize variables for file upload
    $file_destination1 = '';

    // Check if profile image is uploaded
    if (!empty($_FILES['profile']['name'])) {
        // Handle file upload for profile image
        $file1 = $_FILES['profile'];
        $file_extension1 = pathinfo($file1['name'], PATHINFO_EXTENSION);
        $file_name1 = $last_name . '_' . $user_id . '.' . $file_extension1;
        $file_tmp1 = $file1['tmp_name'];

        // Move uploaded file to desired location
        $file_destination1 = "../../admin/upload/users/" . $file_name1;
        move_uploaded_file($file_tmp1, $file_destination1);
    }

    // Construct the SQL query
    $sql = "UPDATE users SET first_name='$first_name', mid_name='$mid_name', last_name='$last_name', ext_name='$ext_name', age='$age', sex='$sex', email='$email', contact='$contact', province='$province', host_id='$host_id', username='$username'";

    // Add password and profile image update to SQL query
    if (!empty($hashed_password)) {
        $sql .= ", password='$hashed_password'";
    }

    if (!empty($file_name1)) {
        $sql .= ", profile='$file_name1'";
    }

    $sql .= " WHERE user_id='$user_id'";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // If the query is successful, return success
        echo 'success';
    } else {
        // If the query fails, return error with specific MySQL error message
        echo 'error: ' . mysqli_error($con);
    }
} else {
    // If user_id is not provided or is not numeric, return error
    echo 'error: Invalid user ID';
}

// Close the database connection
mysqli_close($con);
?>
