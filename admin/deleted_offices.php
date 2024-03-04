<?php
require './function/encrypt_decrypt.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Archived Offices</h1>
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
                        <h6 class="m-0 font-weight-bold text-primary">List of Archived Offices</h6>
                        <a href="offices.php" class="btn btn-sm btn-secondary shadow-sm"><i
                                class="fas fa-circle-chevron-left text-white-50"></i> Back</a>
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
                                                        WHERE deleted = 1
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
                                            <a href="#" class="btn btn-sm btn-info restore-office-btn shadow-sm"
                                               data-toggle="tooltip" data-placement="right" title="Restore <?php echo $office; ?>"
                                               data-host-id="<?php echo $host_id; ?>" 
                                               data-office-name="<?php echo htmlspecialchars($office); ?>"><i class="fa-solid fa-rotate-left"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        $num++;
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
    $(document).ready(function() {
        // Function for deleting event
        $('.restore-office-btn').on('click', function(e) {
            e.preventDefault();
            var restoreBtn = $(this);
            var hostId = restoreBtn.data('host-id');
            var office = decodeURIComponent(restoreBtn.data('office-name'));

            Swal.fire({
                title: 'Restore Office',
                html: "You are about to restore the following office:<br><br>" +
                      "<strong>Office Name:</strong> " + office + "<br>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, restore it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'action/restore_office.php', // Adjust the URL to your PHP script for deleting the event
                        type: 'POST',
                        data: {
                            host_id: hostId
                        },
                        success: function(response) {
                            if (response.trim() === 'success') {
                                Swal.fire(
                                    'Restored!',
                                    'Office has been restored.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to restore office.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'Failed to restore office.',
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