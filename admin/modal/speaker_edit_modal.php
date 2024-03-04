<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $speaker_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Edit Event</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST">
                <input type="hidden" class="form-control" name="speaker_id" value="<?php echo $speaker_id; ?>">
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">First Name</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Middle Name</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mid_name" value="<?php echo $mid_name; ?>">
                    </div>
                </div>
                  <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Last Name</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
                    </div>
                </div>
                  <div class="row form-group">
                     <div class="col-sm-4">
                    <label for="ext_name">Ext. Name</label>
                </div>
                 <div class="col-sm-8">
                    <select class="form-control" id="" name="ext_name" >
                        <option value="">Extension Name</option>
                        <option value="jr">Jr.</option>
                        <option value="i">I</option>
                        <option value="ii">II</option>
                        <option value="iii">III</option>
                        <option value="iv">IV</option>
                        <option value="v">V</option>
                    </select>
                </div>
                </div>
                 <div class="row form-group">
                     <div class="col-sm-4">
                        <label class="control-label modal-label">Digital Sign</label>
                    </div>
                   <div class="col-sm-8">
                    <div class="custom-file">
                     <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputuploadAddon">

                    <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
              </div>   
            </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="edit" class="btn btn-primary" id="updateSpeaker_<?php echo $speaker_id; ?>"></i>Update</a>
            </form>
            </div>

        </div>
    </div>
</div>

