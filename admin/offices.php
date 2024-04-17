<?php
require './function/encrypt_decrypt.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include './include/head.php'; ?>

<body id="page-top">
    <div class="d-none" id="offices"></div>

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
                        <h1 class="h3 mb-0 text-gray-800">Host Offices</h1>
                        <a href="deleted_offices.php" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-trash fa-sm"></i> Archive</a>
                    </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of Host Offices</h6>
                        <div>
                            <a class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#addnew"><i class="fas fa-plus fa-sm text-white-50"></i> Add Office</a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>                                                                     
                                        <th scope="col">Office</th>                                                                     
                                        <th scope="col">Action</th>                             
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <?php

                                    require '../db/dbconn.php';
                                    $display_office = "
                                                        SELECT *
                                                        FROM host_office
                                                        WHERE deleted != 1
                                                    ";
                                    $sqlQuery = mysqli_query($con, $display_office) or die( mysqli_error($con));

                                    $num = 1;
                                    while($row = mysqli_fetch_array($sqlQuery)){
                                        $host_id = $row['host_id'];
                                        $office = $row['office'];
                                        
                                    ?>
                                    <tr>                                          
                                        <td class=""><?php echo $num; ?></td>
                                        <td class=""><?php echo $office; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#edit_<?php echo $host_id; ?>" data-toggle="tooltip" data-placement="right" title="Edit <?php echo $office; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            
                                            <a href="#" class="btn btn-sm btn-danger delete-office-btn shadow-sm"
                                               data-toggle="tooltip" data-placement="right" title="Delete <?php echo $office; ?>"
                                               data-host-id="<?php echo $host_id; ?>" 
                                               data-office-name="<?php echo htmlspecialchars($office); ?>"><i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        include('modal/office_edit_modal.php');
                                        $num++;
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('modal/office_add_modal.php'); ?>     
        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './include/footer.php'; ?>
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
        $('.delete-office-btn').on('click', function(e) {
            e.preventDefault();
            var deleteBtn = $(this);
            var hostId = deleteBtn.data('host-id');
            var office = decodeURIComponent(deleteBtn.data('office-name'));

            Swal.fire({
                title: 'Delete Office',
                html: "You are about to delete the following office:<br><br>" +
                      "<strong>Office Name:</strong> " + office + "<br>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'action/delete_office.php', // Adjust the URL to your PHP script for deleting the event
                        type: 'POST',
                        data: {
                            host_id: hostId
                        },
                        success: function(response) {
                            if (response.trim() === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Office has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete office.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'Failed to delete office.',
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
        // Function to show SweetAlert2 warning message
        const showWarningMessage = (message) => {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: message
            });
        };

        $('#addOffice').on('click', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $('#addnew form'); // Select the form element

            const requiredFields = formData.find(':input[required]').not('select');
            let fieldsAreValid = true; // Initialize as true

            // Remove existing error classes
            $('.form-control').removeClass('input-error');

            requiredFields.each(function() {
                if ($(this).val().trim() === '') {
                    fieldsAreValid = false; // Set to false if any required field is empty
                    showWarningMessage('Please fill-up the required fields.');
                    $(this).addClass('input-error'); // Add red border to missing field
                } else {
                    $(this).removeClass('input-error'); // Remove red border if field is filled
                }
            });

            if (fieldsAreValid) {
                // If department doesn't exist, proceed with form submission
                $.ajax({
                    url: 'action/add_office.php', // URL to submit the form data
                    type: 'POST',
                    data: formData.serialize(), // Serialize form data
                    success: function(response) {
                        // Handle the success response
                        console.log(response); // Output response to console (for debugging)
                        Swal.fire({
                            icon: 'success',
                            title: 'Office added successfully',
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
                            title: 'Failed to add office',
                            text: 'Please try again later.',
                            showConfirmButton: true, // Show OK button
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // For dynamically rendered modals
        $(document).on('click', '[id^="updateOffice_"]', function(e) {
            e.preventDefault(); // Prevent default form submission
            var hostId = $(this).attr('id').split('_')[1]; // Extract event ID
            var formData = $('#edit_' + hostId + ' form').serialize(); // Serialize form data

            $.ajax({
                url: 'action/update_office.php', // URL to submit the form data
                type: 'POST',
                data: formData, // Form data to be submitted
                success: function(response) {
                    // Handle the success response
                    console.log(response); // Output response to console (for debugging)
                    Swal.fire({
                        icon: 'success',
                        title: 'Office updated successfully',
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
                        title: 'Failed to update office',
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