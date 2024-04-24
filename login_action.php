<?php
// Start session
session_start();

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
    $username = isset($_POST['username']) ? sanitizeInput($_POST['username']) : '';
    $password = isset($_POST['password']) ? sanitizeInput($_POST['password']) : '';

    // Construct the SQL query
    $sql = "SELECT * FROM users WHERE username = '$username'";

    // Execute the SQL statement
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password matches, user authenticated
            // Set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['host_id'] = $row['host_id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['full_name'] = $row['first_name'] . ' ' . $row['last_name'];

            // Return role value as part of the response
            echo json_encode(['success' => true, 'role' => $row['role']]);
            exit();
        } else {
            // Password does not match
            echo json_encode(['success' => false, 'message' => 'Incorrect password.']);
            exit();
        }
    } else {
        // User not found
        echo json_encode(['success' => false, 'message' => 'Username does not exist.']);
        exit();
    }

    // Close connection
    $con->close();
}
?>
