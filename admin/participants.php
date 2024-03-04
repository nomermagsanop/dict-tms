<?php
$event_id = urldecode($_GET['event_id']);
$event_name = urldecode($_GET['event_name']);
?>
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
                        <h1 class="h3 mb-0 text-gray-800">
                            <?php 
                            // Limiting the character length of $event_name to, for example, 15 characters
                            $limited_event_name = strlen($event_name) > 20 ? substr($event_name, 0, 15) . '...' : $event_name;
                            echo $limited_event_name; 
                            ?> 
                            <i class="fa-solid fa-chevron-right fa-sm"></i> Participants
                        </h1>
                        <div>
                            <a class="btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-gears fa-sm text-white-50 mr-1"></i>Generate Cert</a>
                            <a class="btn btn-sm btn-info shadow-sm" href="deleted_participants.php?event_id=<?php echo $event_id; ?>&event_name=<?php echo $event_name; ?>"><i
                                class="fas fa-trash fa-sm text-white-50 mr-1"></i>Archive</a>
                            <a href="events.php" class="btn btn-sm btn-secondary shadow-sm"><i
                                class="fas fa-circle-chevron-left text-white-50"></i> Back</a>
                        </div>

                    </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of Participants</h6>

                   
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll" class="form-check"></th>
                                        <th scope="col">Full Name</th>                                        
                                        <th scope="col">Email</th>                                        
                                                                             
                                        <th scope="col">Address</th>                                                                                      
                                        <th scope="col">Date Registered</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <?php

                                    require '../db/dbconn.php';
                                    $display_events = "
                                                        SELECT pt.participant_id, pt.user_id, pt.date_registered, ut.first_name, ut.mid_name, ut.last_name, ut.ext_name, ut.email, ut.contact, ut.barangay, ut.municipality, ut.province
                                                        FROM participants pt
                                                        INNER JOIN events et ON et.event_id = pt.event_id
                                                        INNER JOIN users ut ON ut.user_id = pt.user_id
                                                        WHERE pt.event_id = '$event_id' AND pt.deleted != 1
                                                    ";
                                    $sqlQuery = mysqli_query($con, $display_events) or die( mysqli_error($con));
                                    
                                    while($row = mysqli_fetch_array($sqlQuery)){
                                        $participant_id = $row['participant_id'];

                                        $user_id = $row['user_id'];
                                        $full_name = $row['first_name'].' '.$row['mid_name'].' '.$row['last_name'].' '.$row['ext_name'];
                                        $email = $row['email']; 
                                        $contact = $row['contact'];
                                        $address = $row['barangay'].', '.$row['municipality'].', '.$row['province'];
                                        $date_registered = $row['date_registered'];
                                        // $status = $row['status'];
                                    ?>
                                    <tr> 
                                        <td><input type="checkbox" value="<?php echo $user_id; ?>" name=""></td>
                                        <td class=""><?php echo $full_name; ?></td>
                                        <td class=""><?php echo $email; ?></td>
                                        
                                        <td class=""><?php echo $address; ?></td>
                                        <td class=""><?php echo date('F d, Y', strtotime($date_registered)); ?></td>
                                        
                                        <td>
                                            <a href="#" class="btn btn-sm btn-danger remove-participant-btn  shadow-sm"
                                               data-toggle="tooltip" data-placement="right" title="Delete <?php echo $full_name; ?>"
                                               data-participant-id="<?php echo $participant_id; ?>"
                                               data-event-name="<?php echo htmlspecialchars($event_name); ?>"
                                               data-email="<?php echo htmlspecialchars($email); ?>"
                                               data-full-name="<?php echo htmlspecialchars($full_name); ?>"><i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
    // Function to handle check/uncheck all checkboxes
    function checkAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    // Get the checkAll checkbox
    var checkAllCheckbox = document.getElementById('checkAll');

    // Add an event listener to the checkAll checkbox
    checkAllCheckbox.addEventListener('change', function () {
        checkAll(this);
    });
</script>
<script>
    $(document).ready(function() {
// Function for deleting event
        $('.remove-participant-btn').on('click', function(e) {
            e.preventDefault();
            var deleteBtn = $(this);
            var participantId = deleteBtn.data('participant-id');
            var fullName = decodeURIComponent(deleteBtn.data('full-name'));
            var eventName = decodeURIComponent(deleteBtn.data('event-name'));
            var email = decodeURIComponent(deleteBtn.data('email'));

            Swal.fire({
                title: 'Remove Participant',
                html: "You are about to remove:<br><br>" +
                      "<strong>Full Name:</strong> " + fullName + "<br>" +
                      "<strong>Event:</strong> " + eventName + "<br>" +
                      "<strong>Email:</strong> " + email + "<br>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'action/delete_participant.php', // Adjust the URL to your PHP script for deleting the event
                        type: 'POST',
                        data: {
                            participant_id: participantId
                        },
                        success: function(response) {
                            if (response.trim() === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Participant has been removed.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to remove participant.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'Failed to remove participant.',
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