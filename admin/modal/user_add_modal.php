<!-- Edit -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Add New User</h4></div>
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
                    <label for="sex">Sex</label>
                </div>
                 <div class="col-sm-8">
                    <select class="form-control" id="" name="sex" >
                        <option value="">Select sex</option>
                        <option value="male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                </div>
                 <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Email</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" value="" placeholder="Input Last email.." required>
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Contact</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contact" value="" placeholder="Input contact.." required>
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Barangay</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="barangay" value="" placeholder="Input brgy.." required>
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Municipality</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="municipality" value="" placeholder="Inputm municipality.." required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Province</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="province" value="" placeholder="Inputm province.." required>
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Office</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control" name="host_id" required>
                            <option value="" selected disabled>-- Select  Office --</option>
                            <?php
                            
                                    $sqlFetchHost = "SELECT * FROM host_office";
                                    $resultFetchHost = $con->query($sqlFetchHost);

                                    if ($resultFetchHost->num_rows > 0) {
                                        
                                        while ($rowFetchHost = $resultFetchHost->fetch_assoc()) {

                                            $host_id = $rowFetchHost['host_id'];
                                            $office = $rowFetchHost['office'];
                                            echo "<option value='$host_id'>$office</option>";
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
                        <label class="control-label modal-label">Username</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" value="" placeholder="Input username.." required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label modal-label">Password</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="passwrod" value="" placeholder="Input passwrod.." required>
                    </div>
                </div>
                <div class="row form-group">
                     <div class="col-sm-4">
                    <label for="role">Role</label>
                </div>
                 <div class="col-sm-8">
                    <select class="form-control" id="" name="role" >
                        <option value="">Select role</option>
                        <option value="1">Admin</option>
                        <option value="2">Office Staff</option>
                    </select>
                </div>
                </div>
                 <div class="row form-group">
                     <div class="col-sm-4">
                        <label class="control-label modal-label">Image</label>
                    </div>
                   <div class="col-sm-8">
                    <div class="custom-file">
                     <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputuploadAddon">

                    <label class="custom-file-label" for="image">Choose file</label>

                    </div>
                  </div>
              </div>  
              <div class="row form-group">
                     <div class="col-sm-4">
                    <label for="role">Status</label>
                </div>
                 <div class="col-sm-8">
                    <select class="form-control" id="" name="status" >
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
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
