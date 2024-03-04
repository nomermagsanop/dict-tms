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
                        <h1 class="h3 mb-0 text-gray-800">admins</h1>
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
                     
                        <a class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#addnew"><i class="fas fa-plus fa-sm text-white-50"></i> Add admin</a>
                   
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="myTable" width="100%" cellspacing="0">
                                <thead class="">
                                    <tr>
                                      
                                                                           
                                        <th scope="col">Name</th> 
                                        <th scope="col">Contact</th>
                                        <th scope="col">Address</th>                                                       
                                        <th scope="col">Action</th>                             
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>

                                  <?php

                            require '../db/dbconn.php';
                            $display_admin = "SELECT * FROM `users` WHERE role = 1";
                            $sqlQuery = mysqli_query($con, $display_admin) or die(mysqli_error($con));

                           
                            while($row = mysqli_fetch_array($sqlQuery)){
                                $user_id = $row['user_id'];
                                $first_name = $row['first_name'];
                                $mid_name = $row['mid_name'];
                                $last_name = $row['last_name'];
                                $ext_name = $row['ext_name'];
                                $contact = $row['contact'];
                                $municipality = $row['municipality'];
                                $province = $row['province'];
                                $admin_address = $row['municipality'] . ' ' . $row['province'];
                                $admin_name = $row['first_name'] . ' ' . $row['mid_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'];
                            ?>
                            <tr>         
                               
                                <td class=""><?php echo $admin_name; ?></td>
                                <td class=""><?php echo $contact; ?></td>
                                <td class=""><?php echo $admin_address; ?></td>   
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_<?php echo $user_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                 
                                    <a href="#" class="btn btn-sm btn-danger delete-admin-btn" 
                                       data-admin-id="<?php echo $user_id; ?>" 
                                       data-admin-name="<?php echo htmlspecialchars($admin_name); ?>">
                                       <i class="fa-solid fa-trash"></i>
                                    
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
            <?php include('modal/user_add_modal.php'); ?>     
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
        $('.delete-admin-btn').on('click', function(e) {
            e.preventDefault();
            var deleteBtn = $(this);
            var adminId = deleteBtn.data('admin-id');
            var adminName = decodeURIComponent(deleteBtn.data('admin-name'));
            Swal.fire({
                title: 'Delete admin',
                html: "You are about to delete the following admin:<br><br>" +
                      "<strong>admin Name:</strong> " + adminName + "<br>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'action/delete_admin.php', 
                        type: 'POST',
                        data: {
                            user_id: adminId
                        },
                        success: function(response) {
                            if (response.trim() === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'admin has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete admin.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'Failed to delete admin.',
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
        $('#addadmin').on('click', function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = $('#addnew form').serialize(); // Serialize form data

            $.ajax({
                url: 'action/add_admin.php', // URL to submit the form data
                type: 'POST',
                data: formData, // Form data to be submitted
                success: function(response) {
                    // Handle the success response
                    console.log(response); // Output response to console (for debugging)
                    Swal.fire({
                        icon: 'success',
                        title: 'admin added successfully',
                        showConfirmButton: true, // Show OK button
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // location.reload();
                    });   
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText); // Output error response to console (for debugging)
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to add admin',
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
<script>
    $(document).ready(function() {
        // For dynamically rendered modals
        $(document).on('click', '[id^="updateadmin_"]', function(e) {
            e.preventDefault(); // Prevent default form submission
            var adminId = $(this).attr('id').split('_')[1]; // Extract event ID
            var formData = $('#edit_' + adminId + ' form').serialize(); // Serialize form data

            $.ajax({
                url: 'action/update_admin.php', // URL to submit the form data
                type: 'POST',
                data: formData, // Form data to be submitted
                success: function(response) {
                    // Handle the success response
                    console.log(response); // Output response to console (for debugging)
                    Swal.fire({
                        icon: 'success',
                        title: 'admin updated successfully',
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
                        title: 'Failed to update admin',
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