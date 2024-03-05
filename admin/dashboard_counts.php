<?php
	
     require '../db/dbconn.php';

	
    $sqlQueryActive_staff = "SELECT COUNT(user_id) AS activestaffcount FROM users WHERE status='active' AND role IN ('2', '1')";
	if ($resultactive_staff = mysqli_query($con, $sqlQueryActive_staff)) {
		$active_staff_count = mysqli_fetch_assoc($resultactive_staff);
	} else {
		echo $con->error;
	}
	    $sqlQueryActive_participants = "SELECT COUNT(user_id) AS activeparticipantscount FROM users WHERE status='active' AND role = '3'";
	if ($resultactive_participants = mysqli_query($con, $sqlQueryActive_participants)) {
		$active_participants_count = mysqli_fetch_assoc($resultactive_participants);
	} else {
		echo $con->error;
	}

	
?>
