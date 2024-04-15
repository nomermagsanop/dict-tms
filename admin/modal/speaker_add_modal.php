<!-- Edit -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Add New Speaker</h4></div>
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
                                            <select class="form-control custom-select" id="" name="ext_name">
                                                <option value="" selected disabled>Extension Name</option>
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
                                            <label for="organization">Organization</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="organization" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <p class="">Profile Picture</p>
                                <div class="row mb-3">
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <div class="image-preview-container" style="width: 160px; height: 160px; border-radius: 50%; overflow: hidden;">
                                            <img class="img-fluid rounded" id="profilePreview" src="../img/flatDark261.png" alt="Profile Picture Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="profileUpload" name="profile" aria-describedby="inputuploadAddon" required>
                                            <label class="custom-file-label" id="profileLabel" for="profileUpload">Choose an image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row form-group">
                            <div class="col-lg-6 mx-0 px-0">
                                <div class="col-12">
                                    <label class="control-label">Digital Sign</label>
                                </div>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="signUpload" name="sign" aria-describedby="inputuploadAddon" required>
                                        <label class="custom-file-label" id="signLabel" for="signUpload">Choose an image</label>
                                        <small class="font-italic">* Digital Sign is use to electronically sign digital certificates for every events.</small>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-6 mx-0 px-0">
                                <div class="col-12">
                                    <p class="control-label text-center">Digital Sign Preview</p>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <div class="image-preview-container" style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden;">
                                        <img class="img-fluid" id="signPreview" src="../img/flatDark261.png" alt="Digital Sign Preview"style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
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
