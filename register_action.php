<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    require 'db/dbconn.php';

    // Function to sanitize input
    function sanitizeInput($input) {
        global $con;
        return mysqli_real_escape_string($con, $input);
    }

    // Check if keys exist in $_POST array before accessing them
    $first_name = isset($_POST['first_name']) ? sanitizeInput($_POST['first_name']) : '';
    $mid_name = isset($_POST['mid_name']) ? sanitizeInput($_POST['mid_name']) : '';
    $last_name = isset($_POST['last_name']) ? sanitizeInput($_POST['last_name']) : '';
    $ext_name = isset($_POST['ext_name']) ? sanitizeInput($_POST['ext_name']) : '';
    $age = isset($_POST['age']) ? sanitizeInput($_POST['age']) : '';
    $sex = isset($_POST['sex']) ? sanitizeInput($_POST['sex']) : '';
    $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
    $contact = isset($_POST['contact']) ? sanitizeInput($_POST['contact']) : '';
    $barangay = isset($_POST['barangay']) ? sanitizeInput($_POST['barangay']) : '';
    $municipality = isset($_POST['municipality']) ? sanitizeInput($_POST['municipality']) : '';
    $province = isset($_POST['province']) ? sanitizeInput($_POST['province']) : '';
    $host_id = isset($_POST['host_id']) ? sanitizeInput($_POST['host_id']) : '';
    $username = isset($_POST['username']) ? sanitizeInput($_POST['username']) : '';
    $password = isset($_POST['password']) ? password_hash(sanitizeInput($_POST['password']), PASSWORD_DEFAULT) : '';

    // Construct the SQL query
    $sql = "INSERT INTO users (first_name, mid_name, last_name, ext_name, age, sex, email, contact, barangay, municipality, province, host_id, username, password, role, status) VALUES ('$first_name', '$mid_name', '$last_name', '$ext_name', '$age', '$sex', '$email', '$contact', '$barangay', '$municipality', '$province', '$host_id', '$username', '$password', 3, 'active')";

    // Execute the SQL statement
    if ($con->query($sql) === TRUE) {
        echo "success"; // Echo 'success' upon successful insertion
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>
