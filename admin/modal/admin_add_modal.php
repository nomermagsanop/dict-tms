<!-- Edit -->
<div class="modal fade" id="addnewAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Add New </h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mr-1">
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label modal-label">First Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="first_name" value="" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label modal-label">Middle Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="mid_name" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label modal-label">Last Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="last_name" value="" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label for="ext_name">Ext. Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control custom-select" name="ext_name">
                                                <option value="" disabled selected>Extension Name</option>
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
                                            <label for="ext_name">Role</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control custom-select" name="role">
                                                <option value="" disabled selected>Select role..</option>
                                                <option value="1">ADMINISTRATOR</option>
                                                <option value="2">OFFICE STAFF</option>
                                    
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <p class="">Profile Picture</p>
                                <div class="row mb-3">
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <div class="image-preview-container" style="width: 160px; height: 160px; border-radius: 50%; overflow: hidden;">
                                            <img class="img-fluid rounded" id="profilePreview2" src="../img/profile.jpg" alt="Profile Picture Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="profileUpload2" name="profile" aria-describedby="inputuploadAddon" accept="image/png, image/gif, image/jpeg" required>
                                            <label class="custom-file-label" id="profileLabel2" for="profileUpload1">Choose an image</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-lg-12">
                            <div class="row form-group">
                             <div class="col-sm-4">
                                <label for="age">Age</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control custom-select"  name="age">
                                        <option disabled selected>Choose..</option>
                                          <option value="17below">17 or younger</option>
                                          <option value="18-20">18-20</option>
                                          <option value="21-29">21-29</option>
                                          <option value="30-39">30-39</option>
                                          <option value="40-49">40-49</option>
                                          <option value="50-59">50-59</option>
                                          <option value="60above">60above</option>  
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                             <div class="col-sm-4">
                                <label for="sex">Sex</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control custom-select" name="sex">
                                        <option disabled selected>Choose..</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label modal-label">Email</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" value="" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Contact</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="contact" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Province</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="province" value="" required>
                                </div>
                            </div>
                            <div class="row form-group">
                             <div class="col-sm-4">
                                <label for="host_id">Field office</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control custom-select" name="host_id">
                                        <option value="" disabled selected>Select field office</option>

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
                                    <input type="text" class="form-control" name="username" value="" required>
                                </div>
                            </div>
                               <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Confirm Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="confirm_password" required>
                                </div>
                            </div>                           
                                    
                        </div>     
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                   <button type="submit" name="edit" class="btn btn-success" id="addAdmin">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
