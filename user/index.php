  <!DOCTYPE html>
<html lang="en">
<head>
  <?php 
require './function/check_session.php';
require '../db/dbconn.php';
// Call the checkSession function to perform session validation
checkSession();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICT Training Management System</title>
    <link rel="icon" type="image/x-icon" href="../img/dict_logo.png">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Saira+Stencil+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- CSS STYLING -->
    <link href="./assets/style.css" rel="stylesheet">


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" integrity="sha256-h2Gkn+H33lnKlQTNntQyLXMWq7/9XI2rlPCsLsVcUBs=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js" integrity="sha256-+0Qf8IHMJWuYlZ2lQDBrF1+2aigIRZXEdSvegtELo2I=" crossorigin="anonymous"></script>




</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top px-lg-5 px-md-3">
  <div class="container-fluid">
  <img src="../img/flatDark261.png"  class="col-lg-ms-2 nav-logo">
  <div class="nav-title text-light">DICT -  <span class="nav-title d-none d-md-inline">Training Management System</span><span class="nav-title d-md-none">TMS</span></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#schedule">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="#" id="logoutBtn">Logout</a>
      </div>
    </div>
  </div>
</div>


<section class="home" id="home">
 <div class="container-fluid">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-7 text-center home-img">
      <img src="../img/hero1.svg" alt="" style="max-width: 70%; height: auto;">
    </div>
    <div class="col-lg-5 home-text">
     <div class="h4 text-white mb-3">Welcome to DICT - TMS!</div>
    <div class="p text-white" style="text-align: justify;">The DICT Training Management System efficiently organizes and promotes upcoming webinars while managing all training activities within the Department of Information and Communications Technology (DICT).</div>

     <button class="btn btn-outline-primary mt-4">Upcoming Events</button>
    </div>
  </div>
 </div>
</section>
    <!-- ======= Schedule Section ======= -->
 


    <section id="schedule" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Event Schedule</h2>
          <p>Here is our event schedule</p>
        </div>
        <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
          necessitatibus voluptatem quis labore perspiciatis quia.</h3>
        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <!-- Schdule -->
           <?php
            $display_query = "SELECT e.event_id, e.event_name, e.event_description, e.event_start, e.event_end, e.status, h.office, s.first_name, s.mid_name, s.last_name, s.ext_name, s.organization, s.profile 
          FROM events AS e 
          INNER JOIN host_office AS h ON e.host_id = h.host_id 
          INNER JOIN speakers AS s ON e.speaker_id = s.speaker_id";

          $sqlQuery = mysqli_query($con, $display_query) or die(mysqli_error($con));

          while ($row = mysqli_fetch_array($sqlQuery)) {
              $event_id = $row['event_id'];
              $event_name = $row['event_name']; // Replaced 'event_name' with 'prog_name'
              $event_description = $row['event_description'];
              $event_start = date('F j, Y', strtotime($row['event_start']));
              $event_end = date('F j, Y', strtotime($row['event_end']));
              $status = $row['status'];
              $office = $row['office'];
              $speaker_name = $row['first_name'] . ' ' . $row['mid_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'];
              $organization = $row['organization'];
              $profile = $row['profile'];
            ?>
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">         
            <div class="row schedule-item">
              <div class="col-md-2"><time><?php echo $event_start; ?></time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="../admin/upload/profile/<?php echo $profile; ?>" alt="Brenden Legros">
                </div>
                <h4>Title: <span><?php echo $event_name; ?></span></h4>
                <p> <span>Resource Speaker:</span><?php echo $speaker_name; ?></p>
               <button class="btn btn-warning">Register Now!</button>
              </div>
            </div>            
          </div>
          <?php } ?>
          <!-- End Schdule-->
        </div>
      </div>
   <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container position-relative" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2>About The Event</h2>
            <p>Sed nam ut dolor qui repellendus iusto odit. Possimus inventore eveniet accusamus error amet eius aut
              accusantium et. Non odit consequatur repudiandae sequi ea odio molestiae. Enim possimus sunt inventore in
              est ut optio sequi unde.</p>
          </div>
          <div class="col-lg-3">
            <h3>Where</h3>
            <p>Downtown Conference Center, New York</p>
          </div>
          <div class="col-lg-3">
            <h3>When</h3>
            <p>Monday to Wednesday<br>10-12 December</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Event Speakers</h2>
          <p>Here are some of our speakers</p>
        </div>
        <div class="row">
            <?php
            $display_query = "SELECT e.event_id, e.event_name, e.event_description, e.event_start, e.event_end, e.status, h.office, s.first_name, s.mid_name, s.last_name, s.ext_name, s.organization, s.profile 
          FROM events AS e 
          INNER JOIN host_office AS h ON e.host_id = h.host_id 
          INNER JOIN speakers AS s ON e.speaker_id = s.speaker_id";

          $sqlQuery = mysqli_query($con, $display_query) or die(mysqli_error($con));

          while ($row = mysqli_fetch_array($sqlQuery)) {
              $event_id = $row['event_id'];
              $event_name = $row['event_name']; // Replaced 'event_name' with 'prog_name'
              $event_description = $row['event_description'];
              $event_start = date('F j, Y', strtotime($row['event_start']));
              $event_end = date('F j, Y', strtotime($row['event_end']));
              $status = $row['status'];
              $office = $row['office'];
              $speaker_name = $row['first_name'] . ' ' . $row['mid_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'];
              $organization = $row['organization'];
              $profile = $row['profile'];
            ?>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="../admin/upload/profile/<?php echo $profile; ?>" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html"><?php echo $speaker_name; ?></a></h3>
                <p><?php echo $office; ?></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Speakers Section -->

    </section><!-- End Schedule Section -->
     <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>DICT-TMS 2024</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End  Footer -->








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
<script>// JavaScript for navbar scroll effect
window.addEventListener('scroll', function() {
var navbar = document.querySelector('.navbar');
navbar.classList.toggle('navbar-scroll', window.scrollY > 0);
});

</script>
<script>
        $(document).ready(function(){
            $("#logoutBtn").click(function(e){
                e.preventDefault(); // Prevent default action of the link

                $.ajax({
                    url: "../function/logout_action.php",
                    type: "POST",
                    success: function(response){
                        // Show SweetAlert2 notification with confirm button
                        Swal.fire({
                            icon: 'success',
                            title: 'Logout Successful',
                            text: 'You have been logged out successfully!',
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to login page after clicking "OK"
                                window.location.href = "../login.php";
                            }
                        });
                        // Redirect to login page after successful logout
                        setTimeout(function(){
                        window.location.href = "../login.php";
                        }, 1500); // Redirect after 1.5 seconds
                    },
                    error: function(xhr, status, error){
                        // Handle error if any
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>