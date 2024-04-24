  <?php 
require './function/check_session.php';

checkSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICT Training Management System</title>
    <link rel="icon" type="image/x-icon" href="../img/dict_logo.png">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Saira+Stencil+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" integrity="sha256-h2Gkn+H33lnKlQTNntQyLXMWq7/9XI2rlPCsLsVcUBs=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js" integrity="sha256-+0Qf8IHMJWuYlZ2lQDBrF1+2aigIRZXEdSvegtELo2I=" crossorigin="anonymous"></script>


 <style>
       body {
           
        }

        .card {
            border: 2px solid white;
            box-shadow: 0px 0px 5px rgba(255, 255, 255, 0.5); /* Added box shadow */
            background: linear-gradient(to bottom right, #16166B, #003262); /* Adjusted gradient */
        }

        .form-control {
        border: 1px solid #0056b3; /* Changed border color to dark blue */
        color: white; /* Set text color to white */
        background-color: #002147; /* Set background color to match card background */
          }

          .form-control:focus {
              background-color: #002147; /* Set background color to dark blue when focused */
              color: white; /* Set text color to white */
          }

          .form-select {
              border: 1px solid #0056b3;
              color: white;
              background-color: #002147;
          }
    </style>

</head>
<body style="background-color:#002147">
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-lg-12">
        <div class="card"  id="profileform">
          <div class="card-body">
            <h5 class="card-title mb-5 mb-sm-3 text-light">Special title treatment</h5>
           <p class="card-text text-light"  text-light style="margin-bottom: 50px;">With supporting text below as a natural lead-in to additional content.</p>
           <?php

            require '../db/dbconn.php';
            $user=$_SESSION['user_id'];
            $display_users = "SELECT * FROM `users` WHERE user_id = $user";
            $sqlQuery = mysqli_query($con, $display_users) or die(mysqli_error($con));

            $counter = 1;

            while($row = mysqli_fetch_array($sqlQuery)){
                $user_id = $row['user_id'];
                $first_name = $row['first_name'];
                $mid_name = $row['mid_name'];
                $last_name = $row['last_name'];
                $ext_name = $row['ext_name'];
                $age = $row['age'];
                $sex = $row['sex'];
                $email = $row['email'];
                $contact = $row['contact'];
                $province = $row['province'];
                $host_id = $row['host_id'];
                $username = $row['username'];
                $password = $row['password'];
                $profile = $row['profile'];
               
                $user_name = $row['first_name'] . ' ' . $row['mid_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'];
            ?>
           <div class="row">
            <div class="row col-md-10 col-sm-12">
              <div class="form-floating col-md-4 col-sm-12 mb-3">
                <form action="" method="POST">
                <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
                <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                <label for="First" class=" text-secondary">First Name</label>
              </div>
              <div class="form-floating col-md-3 col-sm-12 mb-3">
                  <input type="text" class="form-control" name="mid_name" value="<?php echo $mid_name; ?>">
                <label for="Middle"class=" text-secondary">Middle Name</label>
              </div>
              <div class="form-floating col-md-4 col-sm-12 mb-3">
                 <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
                <label for="Last"class=" text-secondary">Last Name</label>
              </div>
             <div class="form-floating col-md-1 col-sm-12 mb-3">
                <select class="form-control custom-select" name="ext_name">
                    <option value="JR" <?php echo $ext_name == 'JR' ? 'selected' : ''; ?>>Jr.</option>
                    <option value="SR" <?php echo $ext_name == 'SR' ? 'selected' : ''; ?>>Sr.</option>
                    <option value="I" <?php echo $ext_name == 'I' ? 'selected' : ''; ?>>I</option>
                    <option value="II" <?php echo $ext_name == 'II' ? 'selected' : ''; ?>>II</option>
                    <option value="III" <?php echo $ext_name == 'III' ? 'selected' : ''; ?>>III</option>
                    <option value="IV" <?php echo $ext_name == 'IV' ? 'selected' : ''; ?>>IV</option>
                    <option value="V" <?php echo $ext_name == 'V' ? 'selected' : ''; ?>>V</option>
                </select>
                <label for="Ext"class=" text-secondary">Ext.</label>
              </div>
               <div class="form-floating col-md-6 col-sm-12 mb-3">
               <select class="form-control custom-select"  name="age">
                  <option value="17below" <?php echo $age == '17below' ? 'selected' : ''; ?>>17 or younger</option>
                  <option value="18-20" <?php echo $age == '18-20' ? 'selected' : ''; ?>>18-20</option>
                  <option value="21-29" <?php echo $age == '21-29' ? 'selected' : ''; ?>>21-29</option>
                  <option value="30-39" <?php echo $age == '30-39' ? 'selected' : ''; ?>>30-39</option>
                  <option value="40-49" <?php echo $age == '40-49' ? 'selected' : ''; ?>>40-49</option>
                  <option value="50-59" <?php echo $age == '50-59' ? 'selected' : ''; ?>>50-59</option>
                  <option value="60above" <?php echo $age == '60above' ? 'selected' : ''; ?>>60above</option>
              </select>
                <label for="Age"class=" text-secondary">Age</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
               <select class="form-control custom-select" id="" name="sex">
                 <option value="Male" <?php echo $sex == 'Male' ? 'selected' : ''; ?>>Male</option>
                  <option value="Female" <?php echo $sex == 'Female' ? 'selected' : ''; ?>>Female</option>
              </select>
                <label for="Sex"class=" text-secondary">Sex</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                <label for="Email"class=" text-secondary">Email Address</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
               <input type="number" class="form-control" name="contact" value="<?php echo $contact; ?>">
                <label for="Contact"class=" text-secondary">Contact Number</label>
              </div>  
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                  <input type="text" class="form-control" name="province" value="<?php echo $province; ?>">
                <label for="Province"class=" text-secondary">Province</label>
              </div>  
              <div class="form-floating col-md-6 col-sm-12 mb-3">
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
                <label for="Organization"class=" text-secondary">Office Under</label>
              </div>
               <div class="form-floating col-md-4 col-sm-12 mb-3">
                 <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                <label for="Username"class=" text-secondary">Username</label>
              </div>
               <div class="form-floating col-md-4 col-sm-12 mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword"class=" text-secondary">Password</label>
              </div>
               <div class="form-floating col-md-4 col-sm-12 mb-3">
                <input type="password" class="form-control" id="floatingPassword2" placeholder="Confirm Password">
                <label for="floatingPassword2"class=" text-secondary">Confirm Password</label>
              </div>                     
           </div>

          
         <div class="col-md-2 col-sm-12">                               
              <div class="row mb-3">
                  <div class="col-12 d-flex justify-content-center align-items-center">
                      <div class="image-preview-container" style="width: 160px; height: 160px; border-radius: 50%; overflow: hidden;">
                          <img class="img-fluid rounded" id="profilePreview1_<?php echo $user_id; ?>" src="../admin/upload/users/<?php echo $profile; ?>" alt="Profile Picture Preview" style="width: 100%; height: 100%; object-fit: cover;">
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
      <?php }  ?>
        <div class="col-12 mt-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label text-light" for="invalidCheck2">
              Please TICK the checkbox.
            </label>
          </div>
        </div>
        <div class="col-12 mb-3">
          <button type="button" name="edit" class="btn btn-success" id="updateUser_<?php echo $user_id; ?>">Save</button>
           <a class="btn btn-secondary" href="index.php">Back</a>
        </div>
          </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




<script>
    $(document).ready(function() {
        // Variable to track if the profile picture is changed
        let profileValid = false;
    

        // Function to show SweetAlert2 warning message
        const showWarningMessage = (message) => {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: message
            });
        };

        // Function to handle file input change event for profile picture
        $('#profileUpload').on('change', function() {
            const fileInput = $(this)[0];
            const file = fileInput.files[0];

            // Update the label text with the selected file name
            $(this).next('#profileLabel').text(file.name);

            // Set profileValid to true when a new profile picture is selected
            profileValid = true;

            // Check if the file type is allowed
            const allowedTypes = ['image/png', 'image/jpeg', 'image/webp'];
            if (allowedTypes.includes(file.type)) {
                // Read the selected file and display the preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#profilePreview').attr('src', e.target.result); // Set image source to preview element
                    $('input[name="profile"]').removeClass('input-error');
                    $('.custom-file-label[for="profileUpload"]').removeClass('input-error'); // Add input-error class to the label as well
                };
                reader.readAsDataURL(file);
            } else {
                // Show warning message for invalid file type
                showWarningMessage('Please select a valid image file (PNG, JPG, WEBP).');
                profileValid = false;
                $('#profileUpload').val(''); // Clear the file input
                $('input[name="profile"]').addClass('input-error');
                $('.custom-file-label[for="profileUpload"]').addClass('input-error'); // Add input-error class to the label as well
            }
        });
    });
</script>



<script>
   $(document).on('change', '#inputupload', function() {
    console.log('File input changed'); // Debug output
    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();

    if (filesCount === 1) {
        var fileName = $(this).val().split('\\').pop();
        textbox.text(fileName);
    } else {
        textbox.text(filesCount + ' files selected');
    }

    if (typeof FileReader != "undefined") {
        var dvPreview = $("#divImageMediaPreview");
        dvPreview.html("");            
        $(this)[0].files.forEach(function(file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = $("<img />");
                img.attr("style", "width: 100%;");
                img.attr("class", "rounded");
                img.attr("src", e.target.result);
                dvPreview.append(img);
            }
            reader.readAsDatafile(file);                
        });
    } else {
        console.log("This browser does not support HTML5 FileReader.");
    }
});

</script>
<script>
$(document).ready(function() {
    // Variable to track if the profile picture is changed
    let profileValid = true;

    // Function to show SweetAlert2 warning message
    const showWarningMessage = (message) => {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: message
        });
    };

    // Function to handle file input change event for profile picture
    $('[id^="profileUpload1_"]').on('change', function() {
        var userId = $(this).attr('id').split('_')[1]; // Extract event ID
        const fileInput = $(this)[0];
        const file = fileInput.files[0];

        // Update the label text with the selected file name
        $(this).next('#profileLabel1_' + userId).text(file.name);

        // Check if the file type is allowed
        const allowedTypes = ['image/png', 'image/jpeg', 'image/webp'];
        if (allowedTypes.includes(file.type)) {
            // Read the selected file and display the preview
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profilePreview1_' + userId).attr('src', e.target.result); // Set image source to preview element
            };
            reader.readAsDataURL(file);
            profileValid = true; // Reset profileValid if file type is valid
        } else {
            // Show warning message for invalid file type
            showWarningMessage('Please select a valid image file (PNG, JPG, WEBP).');
            profileValid = false;
        }

        // Toggle input-error class based on profileValid
        $(this).toggleClass('input-error', !profileValid);
        $(this).next('#profileLabel1_' + userId).toggleClass('input-error', !profileValid);
    });

    // For dynamically rendered modals
    $(document).on('click', '[id^="updateUser_"]', function(e) {
        e.preventDefault(); // Prevent default form submission
        var userId = $(this).attr('id').split('_')[1]; // Extract event ID
         var formData = new FormData($('#profileform form')[0]); // Create FormData object with form data
        // Check if profile picture is changed
        if (!profileValid) {
            showWarningMessage('Please upload a valid profile picture.');
            $('[id^="profileUpload1_"]').addClass('input-error');
            $('[id^="profileLabel1_"]').addClass('input-error');
            return; // Stop form submission
        }

        $.ajax({
            url: 'action/update_user.php', // file to submit the form data
            type: 'POST',
            data: formData, // Form data to be submitted
            contentType: false, // Important: Prevent jQuery from setting contentType
            processData: false, // Important: Prevent jQuery from processing data
            success: function(response) {
                // Handle the success response
                console.log(response); // Output response to console (for debugging)
                Swal.fire({
                    icon: 'success',
                    title: 'User updated successfully',
                    showConfirmButton: true, // Show OK button
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.error(xhr.responseText); // Output error response to console (for debugging)
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to update User',
                    text: 'Please try again later.',
                    showConfirmButton: true, // Show OK button
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            }
        });
    });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>