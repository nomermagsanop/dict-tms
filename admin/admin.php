<!DOCTYPE html>
<html lang="en">

<?php include './include/head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include './include/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include './include/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage Admins</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of admins</h6>
                     
                        <a class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#addnewAdmin"><i class="fas fa-plus fa-sm text-white-50"></i> Add admin</a>
                   
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="myTable" width="100%" cellspacing="0">
                                <thead class="">
                                    <tr>
                                      
                                                                           
                                        <th scope="col">Image</th> 
                                        <th scope="col">Name</th> 
                                        <th scope="col">Email</th>
                                        <th scope="col">Office</th>                                                       
                                        <th scope="col">Role</th>                                                       
                                        <th scope="col">Action</th>                             
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>

                                  <?php

                            require '../db/dbconn.php';
                            $display_admin = "SELECT * FROM `users` WHERE role IN (1, 2) AND deleted = 0;
";
                            $sqlQuery = mysqli_query($con, $display_admin) or die(mysqli_error($con));

                           
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
                                $role = $row['role'];
                                $profile = $row['profile'];
                               
                                $user_name = $row['first_name'] . ' ' . $row['mid_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'];
                                // Get the office value based on host_id
                                $get_office_query = "SELECT office FROM host_office WHERE host_id = $host_id";
                                $office_result = mysqli_query($con, $get_office_query);
                                $office_row = mysqli_fetch_array($office_result);
                                $office = $office_row['office'];
                            ?>
                            <tr>         
                               
                                 <td class="d-flex">
                                    <img class="mx-auto rounded" src="./upload/users/<?php echo $profile; ?>" alt="Profile Picture" style="width: 60px; height: 60px; object-fit: cover;">
                                </td>
                                <td class=""><?php echo $user_name; ?></td>
                                <td class=""><?php echo $email; ?></td>   
                                <td class=""><?php echo $office; ?></td>   
                               <td class="">
                                                <?php
                                                if ($role == 1) {
                                                    echo "ADMINISTRATOR";
                                                } elseif ($role == 2) {
                                                    echo "OFFICE STAFF";
                                                } else {
                                                    // Handle other role values if needed
                                                    echo "Unknown Role";
                                                }
                                                ?>
                                            </td>


                                <td class="text-center">
                                     <a class="btn btn-sm btn-info shadow-sm"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editAdmin_<?php echo $user_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                 
                                    <a href="#" class="btn btn-sm btn-danger delete-User-btn" 
                                       data-User-id="<?php echo $user_id; ?>" 
                                       data-User-name="<?php echo htmlspecialchars($user_name); ?>">
                                       <i class="fa-solid fa-trash"></i>
                                    
                                    </a>
                                    
                                    </a>
                                </td>
                            </tr>

                            <?php
                               
                                include('modal/admin_edit_modal.php');
                            } 
                            ?>
                            </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('modal/admin_add_modal.php'); ?>     
        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include './include/logout_modal.php'; ?>

    <?php include './include/script.php'; ?>

<script>
    $(document).ready(function(){
    //inialize datatable
    $('#myTable').DataTable({
        scrollX: true
    })

    });

</script>

<script>
    $(document).ready(function() {
        // Function for deleting event
        $('.delete-User-btn').on('click', function(e) {
            e.preventDefault();
            var deleteBtn = $(this);
            var userId = deleteBtn.data('user-id');
            var userName = decodeURIComponent(deleteBtn.data('user-name'));
            Swal.fire({
                title: 'Delete user',
                html: "You are about to delete the following user:<br><br>" +
                      "<strong>user Name:</strong> " + userName + "<br>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'action/delete_user.php', // Corrected 'file' to 'url'
                        type: 'POST',
                        data: {
                            user_id: userId
                        },
                        success: function(response) {
                            if (response.trim() === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'user has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete user.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'Failed to delete user.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
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

 $('#profileUpload2').on('change', function() {
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
                    $('#profilePreview2').attr('src', e.target.result); // Set image source to preview element
                    $('input[name="profile"]').removeClass('input-error');
                    $('.custom-file-label[for="profileUpload2"]').removeClass('input-error'); // Add input-error class to the label as well
                };
                reader.readAsDataURL(file);
            } else {
                // Show warning message for invalid file type
                showWarningMessage('Please select a valid image file (PNG, JPG, WEBP).');
                profileValid = false;
                $('#profileUpload1').val(''); // Clear the file input
                $('input[name="profile"]').addClass('input-error');
                $('.custom-file-label[for="profileUpload1"]').addClass('input-error'); // Add input-error class to the label as well
            }
        });

    // Function to handle form submission
    $('#addAdmin').on('click', function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData($('#addnewAdmin form')[0]); // Create FormData object with form data

        const requiredFields = $('input[required], select[required]', $('#addnewAdmin   ')); // Select required fields

        let fieldsAreValid = true; // Initialize as true

        // Remove existing error classes
        $('.form-control').removeClass('input-error');

        requiredFields.each(function() {
            const fieldValue = $(this).val().trim(); // Get field value
            if (fieldValue === '') {
                fieldsAreValid = false; // Set to false if any required field is empty
                showWarningMessage('Please fill-up the required fields.');
                $(this).addClass('input-error'); // Add red border to missing field
            }
        });

        if (fieldsAreValid) {
            // Check if profile picture is changed
            if (!profileValid) {
                showWarningMessage('Please upload a valid profile picture.');
                $('input[name="profile"]').addClass('input-error');
                $('.custom-file-label[for="profileUpload"]').addClass('input-error'); // Add input-error class to the label as well
                return; // Stop form submission
            }

            // Perform AJAX form submission
            $.ajax({
                url: 'action/add_admin.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success response
                    if (response.trim() === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'User added successfully',
                            showConfirmButton: true,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        // Show error message if response is not 'success'
                        showWarningMessage('Failed to add user. Please try again later.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    showWarningMessage('Failed to add user. Please try again later.');
                }
            });
        }
    });
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
    $('[id^="profileUpload2_"]').on('change', function() {
        var userId = $(this).attr('id').split('_')[1]; // Extract event ID
        const fileInput = $(this)[0];
        const file = fileInput.files[0];

        // Update the label text with the selected file name
        $(this).next('#profileLabel2_' + userId).text(file.name);

        // Check if the file type is allowed
        const allowedTypes = ['image/png', 'image/jpeg', 'image/webp'];
        if (allowedTypes.includes(file.type)) {
            // Read the selected file and display the preview
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profilePreview2_' + userId).attr('src', e.target.result); // Set image source to preview element
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
        $(this).next('#profileLabel2_' + userId).toggleClass('input-error', !profileValid);
    });

    // For dynamically rendered modals
    $(document).on('click', '[id^="updateAdmin_"]', function(e) {
        e.preventDefault(); // Prevent default form submission
        var userId = $(this).attr('id').split('_')[1]; // Extract event ID
        var formData = new FormData($('#editAdmin_' + userId + ' form')[0]);

        // Check if profile picture is changed
        if (!profileValid) {
            showWarningMessage('Please upload a valid profile picture.');
            $('[id^="profileUpload1_"]').addClass('input-error');
            $('[id^="profileLabel1_"]').addClass('input-error');
            return; // Stop form submission
        }

        $.ajax({
            url: 'action/update_admin.php', // file to submit the form data
            type: 'POST',
            data: formData, // Form data to be submitted
            contentType: false, // Important: Prevent jQuery from setting contentType
            processData: false, // Important: Prevent jQuery from processing data
            success: function(response) {
                // Handle the success response
                console.log(response); // Output response to console (for debugging)
                Swal.fire({
                    icon: 'success',
                    title: ' updated successfully',
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






</body>

</html>