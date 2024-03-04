<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $event_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Edit Event</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST">
				<input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Event Name</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="event_name" value="<?php echo $event_name; ?>">
					</div>
				</div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Event Description</label>
                    </div>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="event_description" rows="4"><?php echo $event_description; ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Host Office</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control" name="host_id">
                            <?php

                                    $sqlFetchHost = "SELECT * FROM host_office";
                                    $resultFetchHost = $con->query($sqlFetchHost);

                                    if ($resultFetchHost->num_rows > 0) {
                                        
                                        while ($rowFetchHost = $resultFetchHost->fetch_assoc()) {

                                            $host_ids = $rowFetchHost['host_id'];
                                            $office = $rowFetchHost['office'];
                                            $selected = ($host_ids == $host_id) ? 'selected' : '';
                                            echo "<option value='$host_ids' $selected>$office</option>";
                                        }
                                        
                                    } else{
                                        echo "<option value='none' selected disabled>No host office available</option>";
                                    }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Speaker</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control" name="speaker_id">
                            <?php

                                    $sqlFetchSpeaker = "SELECT speaker_id, CONCAT(first_name, ' ', last_name) as speaker_name FROM speakers";
                                    $resultFetchSpeaker = $con->query($sqlFetchSpeaker);

                                    if ($resultFetchSpeaker->num_rows > 0) {
                                        
                                        while ($rowFetchSpeaker = $resultFetchSpeaker->fetch_assoc()) {

                                            $speaker_ids = $rowFetchSpeaker['speaker_id'];
                                            $speaker_name = $rowFetchSpeaker['speaker_name'];
                                            $selected = ($speaker_ids == $speaker_id) ? 'selected' : '';
                                            echo "<option value='$speaker_ids' $selected>$speaker_name</option>";
                                        }
                                        
                                    } else{
                                        echo "<option value='none' selected disabled>No speaker available</option>";
                                    }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Event Start Date</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="event_start" value="<?php echo $start_date; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Event End Date</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="event_end" value="<?php echo $end_date; ?>">
                    </div>
                </div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="edit" class="btn btn-primary" id="updateEvent_<?php echo $event_id; ?>"></i>Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

