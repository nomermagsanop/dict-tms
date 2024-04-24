
<?php
// Include your database connection file
require '../../db/dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
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
    $password = strtoupper(mysqli_real_escape_string($con, $_POST['password']));
    $confirm_password = strtoupper(mysqli_real_escape_string($con, $_POST['confirm_password']));
    $role = strtoupper(mysqli_real_escape_string($con, $_POST['role']));

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo 'Passwords do not match';
        exit(); // Exit script if passwords do not match
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Handle file upload
    $file1 = $_FILES['profile'];
    $file_extension1 = pathinfo($file1['name'], PATHINFO_EXTENSION);
    $current_datetime1 = date('YmdHis'); // Generate current datetime
    $file_name1 = $last_name . '_' . $current_datetime1 . '.' . $file_extension1;
    $file_tmp1 = $file1['tmp_name'];

    // Move uploaded file to desired location
    $file_destination1 = "../upload/users/" . $file_name1;
    move_uploaded_file($file_tmp1, $file_destination1);

    // SQL query to insert new user
    $sql = "INSERT INTO users (first_name, mid_name, last_name, ext_name, age, sex, email, contact, province, host_id, username, password, role, profile)
            VALUES ('$first_name', '$mid_name', '$last_name', '$ext_name', '$age', '$sex', '$email', '$contact', '$province', '$host_id ', '$username', '$hashed_password', '$role', '$file_name1')";

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
