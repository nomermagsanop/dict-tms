<!-- Edit -->
<div class="modal fade" id="edit1_<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Add New User</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mr-1">
                                     <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
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
                                            <select class="form-control custom-select" name="ext_name">
                                                <option value="JR" <?php echo $ext_name == 'JR' ? 'selected' : ''; ?>>Jr.</option>
                                                <option value="SR" <?php echo $ext_name == 'SR' ? 'selected' : ''; ?>>Sr.</option>
                                                <option value="I" <?php echo $ext_name == 'I' ? 'selected' : ''; ?>>I</option>
                                                <option value="II" <?php echo $ext_name == 'II' ? 'selected' : ''; ?>>II</option>
                                                <option value="III" <?php echo $ext_name == 'III' ? 'selected' : ''; ?>>III</option>
                                                <option value="IV" <?php echo $ext_name == 'IV' ? 'selected' : ''; ?>>IV</option>
                                                <option value="V" <?php echo $ext_name == 'V' ? 'selected' : ''; ?>>V</option>
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
                                            <img class="img-fluid rounded" id="profilePreview1_<?php echo $user_id; ?>" src="./upload/users/<?php echo $profile; ?>" alt="Profile Picture Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="profileUpload1_<?php echo $user_id; ?>" name="profile" aria-describedby="inputuploadAddon" accept="image/png, image/gif, image/jpeg">
                                            <label class="custom-file-label" id="profileLabel1_<?php echo $user_id; ?>" for="profileUpload1_<?php echo $user_id; ?>">Choose an image</label>
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
                                        <option value="17below" <?php echo $age == '17below' ? 'selected' : ''; ?>>17 or younger</option>
                                        <option value="18-20" <?php echo $age == '18-20' ? 'selected' : ''; ?>>18-20</option>
                                        <option value="21-29" <?php echo $age == '21-29' ? 'selected' : ''; ?>>21-29</option>
                                        <option value="30-39" <?php echo $age == '30-39' ? 'selected' : ''; ?>>30-39</option>
                                        <option value="40-49" <?php echo $age == '40-49' ? 'selected' : ''; ?>>40-49</option>
                                        <option value="50-59" <?php echo $age == '50-59' ? 'selected' : ''; ?>>50-59</option>
                                        <option value="60above" <?php echo $age == '60above' ? 'selected' : ''; ?>>60above</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                             <div class="col-sm-4">
                                <label for="sex">Sex</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control custom-select" id="" name="sex">
                                       <option value="Male" <?php echo $sex == 'Male' ? 'selected' : ''; ?>>Male</option>
                                        <option value="Female" <?php echo $sex == 'Female' ? 'selected' : ''; ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label modal-label">Email</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Contact</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" value="<?php echo $contact; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Province</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="province" value="<?php echo $province; ?>">
                                </div>
                            </div>
                           <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="host_id">Field office</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="hidden" id="selected_host_id" name="selected_host_id" value="<?php echo $host_id; ?>">
                                    <select class="form-control custom-select" name="host_id">
                                        <option value="" disabled selected>Select field office</option>

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
                                    <label class="control-label modal-label">Username</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <!-- Confirm Password -->
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label modal-label">Confirm Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="confirm_password">
                                </div>
                            </div>                            
                                    
                        </div>     
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" name="edit" class="btn btn-success" id="updateUser_<?php echo $user_id; ?>">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
