<!DOCTYPE html>
<html lang="en">

<?php include './include/head.php'; ?>

<body id="page-top">
    <div class="d-none" id="speakers"></div>

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
                        <h1 class="h3 mb-0 text-gray-800">Speakers</h1>
                        <a href="speakers.php" class="btn btn-sm btn-secondary shadow-sm"><i
                                class="fas fa-circle-chevron-left text-white-50"></i> Back</a>
                    </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of Speakers</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="myTable" width="100%" cellspacing="0">
                                <thead class="">
                                    <tr>
                                      
                                        <th scope="col">#</th>                                        
                                        <th scope="col">Profile Picture</th>                                        
                                        <th scope="col">Name</th>                                               
                                        <th scope="col">Organization</th>                                               
                                        <th scope="col">Action</th>                             
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>

                                  <?php

                            require '../db/dbconn.php';
                            $display_speakers = "SELECT * FROM `speakers` WHERE deleted = 1";
                            $sqlQuery = mysqli_query($con, $display_speakers) or die(mysqli_error($con));

                            $counter = 1;

                            while($row = mysqli_fetch_array($sqlQuery)){
                                $speaker_id = $row['speaker_id'];
                                $first_name = $row['first_name'];
                                $mid_name = $row['mid_name'];
                                $last_name = $row['last_name'];
                                $ext_name = $row['ext_name'];
                                $organization = $row['organization'];
                                $profile = $row['profile'];
                                $sign = $row['sign'];

                                $speaker_name = $row['first_name'] . ' ' . $row['mid_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'];
                            ?>
                            <tr>         
                                <td class=""><?php echo $counter; ?></td>
                                <td class="d-flex">
                                    <img class="mx-auto rounded" src="./upload/profile/<?php echo $profile; ?>" alt="Profile Picture" style="width: 60px; height: 60px; object-fit: cover;">
                                </td>
                                <td class=""><?php echo $speaker_name; ?></td>
                                <td class=""><?php echo $organization; ?></td>
                               
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info restore-speaker-btn" 
                                       data-speaker-id="<?php echo $speaker_id; ?>" 
                                       data-speaker-name="<?php echo htmlspecialchars($speaker_name); ?>">
                                       <i class="fa-solid fa-rotate-left"></i>
                                    
                                    </a>
                                </td>
                            </tr>
                            <?php
                                $counter++;
                                include('modal/speaker_edit_modal.php');
                            } 
                            ?>
                            </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('modal/speaker_add_modal.php'); ?>     
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
        $('.restore-speaker-btn').on('click', function(e) {
            e.preventDefault();
            var deleteBtn = $(this);
            var speakerId = deleteBtn.data('speaker-id');
            var speakerName = decodeURIComponent(deleteBtn.data('speaker-name'));

            Swal.fire({
                title: 'Restore Speaker',
                html: "You are about to restore the following speaker:<br><br>" +
                      "<strong>Speaker Name:</strong> " + speakerName + "<br>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, restore it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'action/restore_speaker.php', // Adjust the URL to your PHP script for deleting the event
                        type: 'POST',
                        data: {
                            speaker_id: speakerId
                        },
                        success: function(response) {
                            if (response.trim() === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Speaker has been restored.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to restore speaker.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'Failed to restore speaker.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

</body>

</html>