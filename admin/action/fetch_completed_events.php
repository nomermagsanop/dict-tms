<?php
// Include your database connection file
require '../../db/dbconn.php';

// SQL query to get the sum of completed events for each month in the year 2024
$sql = "SELECT DATE_FORMAT(event_start, '%b') AS month, COUNT(*) AS completed_events
        FROM events
        WHERE status = 'closed'
          AND YEAR(event_start) = 2024
        GROUP BY DATE_FORMAT(event_start, '%b')
        ORDER BY event_end";

// Execute the query
$result = mysqli_query($con, $sql);

// Check if the query is successful
if ($result) {
    // Fetch data as associative array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Return data as JSON
    echo json_encode($data);
} else {
    // If the query fails, return error
    echo json_encode(['error' => 'Unable to fetch data']);
}

// Close the database connection
mysqli_close($con);
?>
