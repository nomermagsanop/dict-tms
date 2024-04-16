<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $speaker_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Edit Speaker</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mr-1">
                                    <input type="hidden" class="form-control" name="speaker_id" value="<?php echo $speaker_id; ?>">
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label modal-label">First Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>" required>
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
                                            <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label for="ext_name">Ext. Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control custom-select" id="" name="ext_name">
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
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label for="organization">Organization</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="organization" value="<?php echo $organization; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <p class="">Profile Picture</p>
                                <div class="row mb-3">
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <div class="image-preview-container" style="width: 160px; height: 160px; border-radius: 50%; overflow: hidden;">
                                            <img class="img-fluid rounded" id="profilePreview_<?php echo $speaker_id; ?>" src="./upload/profile/<?php echo $profile; ?>" alt="Profile Picture Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="profileUpload_<?php echo $speaker_id; ?>" name="profile" aria-describedby="inputuploadAddon" accept="image/png, image/gif, image/jpeg" required>
                                            <label class="custom-file-label" id="profileLabel_<?php echo $speaker_id; ?>" for="profileUpload_<?php echo $speaker_id; ?>"><?php echo $profile; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row form-group">
                            <div class="col-lg-6 mx-0 px-0">
                                <div class="col-12">
                                    <label class="control-label">Digital Signature</label>
                                </div>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="signUpload_<?php echo $speaker_id; ?>" name="sign" aria-describedby="inputuploadAddon" accept="image/png, image/gif, image/jpeg" required>
                                        <label class="custom-file-label" id="signLabel_<?php echo $speaker_id; ?>" for="signUpload_<?php echo $speaker_id; ?>"><?php echo $sign; ?></label>
                                        <small class="font-italic">* Digital Signature is use to electronically sign digital certificates for every events.</small>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-6 mx-0 px-0">
                                <div class="col-12">
                                    <p class="control-label text-center">Digital Signature Preview</p>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <div class="image-preview-container rounded" style="width: 140px; height: 140px; overflow: hidden;">
                                        <img class="img-fluid" id="signPreview_<?php echo $speaker_id; ?>" src="./upload/sign/<?php echo $sign; ?>" alt="Digital Sign Preview"style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="edit" class="btn btn-success" id="updateSpeaker_<?php echo $speaker_id; ?>"></i>Save</a>
                </form>
            </div>
        </div>
    </div>
</div>


