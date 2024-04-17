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
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-5 mb-sm-3 text-light">Special title treatment</h5>
           <p class="card-text text-light"  text-light style="margin-bottom: 50px;">With supporting text below as a natural lead-in to additional content.</p>
           <div class="row">
            <div class="row col-md-10 col-sm-12">
              <div class="form-floating col-md-4 col-sm-12 mb-3">
                <input type="text" class="form-control" id="First" placeholder="First Name">
                <label for="First" class=" text-secondary">First Name</label>
              </div>
              <div class="form-floating col-md-3 col-sm-12 mb-3">
                <input type="text" class="form-control" id="Middle" placeholder="Middle Name">
                <label for="Middle"class=" text-secondary">Middle Name</label>
              </div>
              <div class="form-floating col-md-4 col-sm-12 mb-3">
                <input type="text" class="form-control" id="Last" placeholder="Last Name">
                <label for="Last"class=" text-secondary">Last Name</label>
              </div>
             <div class="form-floating col-md-1 col-sm-12 mb-3">
                <select class="form-select" id="Ext" aria-label="Floating label select example">
                  <option selected>Choose..</option>
                  <option value="jr">JR</option>
                  <option value="i">I</option>
                  <option value="ii">II</option>
                  <option value="iii">III</option>
                  <option value="iv">IV</option>
                  <option value="v">V</option>          
                </select>
                <label for="Ext"class=" text-secondary">Ext.</label>
              </div>
               <div class="form-floating col-md-6 col-sm-12 mb-3">
                <select class="form-select" id="Age" aria-label="Floating label select example">
                  <option selected>Choose..</option>
                  <option value="17below">17 or younger</option>
                  <option value="18-20">18-20</option>
                  <option value="21-29">21-29</option>
                  <option value="30-39">30-39</option>
                  <option value="40-49">40-49</option>
                  <option value="50-59">50-59</option>
                  <option value="60above">60above</option>          
                </select>
                <label for="Age"class=" text-secondary">Age</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <select class="form-select" id="Sex" aria-label="Floating label select example">
                  <option selected >Choose..</option>                 
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>        
                </select>
                <label for="Sex"class=" text-secondary">Sex</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <input type="email" class="form-control" id="Email" placeholder="Email">
                <label for="Email"class=" text-secondary">Email Address</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <input type="number" class="form-control" id="Contact" placeholder="Contact Number">
                <label for="Contact"class=" text-secondary">Contact Number</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <input type="text" class="form-control" id="Barangay" placeholder="Barangay">
                <label for="Barangay"class=" text-secondary">Barangay</label>
              </div>
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <input type="text" class="form-control" id="Municipality" placeholder="Municipality">
                <label for="Municipality"class=" text-secondary">Municipality</label>
              </div>   
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <input type="text" class="form-control" id="Province" placeholder="Province">
                <label for="Province"class=" text-secondary">Province</label>
              </div>  
              <div class="form-floating col-md-6 col-sm-12 mb-3">
                <input type="text" class="form-control" id="Organization" placeholder="Organization">
                <label for="Organization"class=" text-secondary">Organization</label>
              </div>
               <div class="form-floating col-md-4 col-sm-12 mb-3">
                <input type="text" class="form-control" id="Username" placeholder="Username">
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
                          <img class="img-fluid rounded" id="profilePreview" src="../img/flatDark261.png" alt="Profile Picture Preview" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                  </div>
              </div> 
              <div class="row">
                  <div class="col-12">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="profileUpload" name="profile" aria-describedby="inputuploadAddon" required>                    
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <div class="col-12 mt-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label text-light" for="invalidCheck2">
              Please TICK the checkbox.
            </label>
          </div>
        </div>
        <div class="col-12 mb-3">
          <button class="btn btn-primary" type="submit">Save</button>
           <a class="btn btn-secondary" href="index.php">Back</a>
        </div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>