<?php
// Include your database connection file
require '../../db/dbconn.php';

// SQL query to get the sum of completed events for each month in the year 2024
$sql = "SELECT h.office, COUNT(*) as event_count
        FROM events e
        INNER JOIN host_office h ON h.host_id = e.host_id
        WHERE e.status = 'closed' AND MONTH(e.event_start) = MONTH(CURRENT_DATE()) AND YEAR(e.event_start) = YEAR(CURRENT_DATE())
        GROUP BY h.office";

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
