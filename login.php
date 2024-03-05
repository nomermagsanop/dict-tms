<?php
require_once "function/check_session.php";
// Check if user_id and role sessions are already set
redirectToDashboard();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>DICT - TMS - Login</title>
      <!-- CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <link href="css/style.css" rel="stylesheet">
      <!-- FONT -->

      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

      <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<!-- Your existing HTML code here -->

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   </head>
   <body class="">
      <?php displaySessionErrorMessage(); ?>
      <!-- CONTAINER -->
      <div class="container d-flex align-items-center min-vh-100">
         <div class="row g-0 justify-content-center">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
               <div id="title-container">
                  <img class="covid-image" src="./img/sidebar_logo.png">
                  <h2>TMS</h2>
                  <h3>Training Management System</h3>
                  <p>"Welcome to the DICT Training Management System! Get ready to embark on a journey of growth and learning. Explore our diverse range of courses tailored to enhance your skills and expertise. Let's shape a brighter future together!"</p>
               </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
               <div id="qbox-container" class="">
                  <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="" method="POST">
                     <div id="steps-container">
                        <div class="step col-12">
                           <h4>Provide us with your account information:</h4>
                           <div class="mt-4">
                              <label class="form-label">Username:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="username" type="text" required>
                           </div>
                           <div class="mt-4">
                              <label class="form-label">Password:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="password" type="password" required>
                           </div>
                        </div>
                     </div>
                     <div id="q-box__buttons">
                        <button id="login-btn" type="submit">Login</button>
                     </div>
                  </form>
                  <hr>
                  <p class="text-center">No account? <span><a href="register.php">Register!</a></span></p>
               </div>
            </div>
         </div>
      </div>

      <div id="preloader-wrapper">
         <div id="preloader"></div>
         <div class="preloader-section section-left"></div>
         <div class="preloader-section section-right"></div>
      </div>

      <script src="js/script_login.js"></script>
   </body>
</html>