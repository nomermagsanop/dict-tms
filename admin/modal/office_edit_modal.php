<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $host_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Edit Event</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST">
				<input type="hidden" class="form-control" name="host_id" value="<?php echo $host_id; ?>">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Office Name</label>
					</div>
					<div class="col-sm-8">
						<textarea class="form-control" name="office" rows="4" required><?php echo $office; ?></textarea>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="edit" class="btn btn-primary" id="updateOffice_<?php echo $host_id; ?>"></i>Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

