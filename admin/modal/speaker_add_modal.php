<!-- Edit -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Add New Speaker</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">First Name</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="first_name" value="" placeholder="Input First name.." required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Middle Name</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mid_name" value="" placeholder="Input Middle name..">
                    </div>
                </div>
                  <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Last Name</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="last_name" value="" placeholder="Input Last name.." required>
                    </div>
                </div>
                  <div class="row form-group">
                     <div class="col-sm-4">
                    <label for="ext_name">Ext. Name</label>
                </div>
                 <div class="col-sm-8">
                    <select class="form-control" id="" name="ext_name">
                        <option value="" selected disabled>--Extension Name--</option>
                        <option value="JR">Jr.</option>
                        <option value="SR">Sr.</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                    </select>
                </div>
                </div>
                 <div class="row form-group">
                     <div class="col-sm-4">
                        <label class="control-label modal-label">Digital Sign</label>
                    </div>
                   <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputupload" name="inputupload" aria-describedby="inputuploadAddon" required>
                        <label class="custom-file-label" for="inputupload">Choose file</label>
                    </div>
                  </div>
              </div>       
            </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="edit" class="btn btn-success" id="addSpeaker"></i>Save</a>
            </form>
            </div>

        </div>
    </div>
</div>
