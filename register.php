<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>DICT - TMS - Registration</title>
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
               <div class="progress">
                  <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%"></div>
               </div>
               <div id="qbox-container" class="">
                  <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="" method="POST">
                     <div id="steps-container">
                        <div class="step col-12">
                           <h4>Provide us with your personal information:</h4>
                           <div class="mt-1">
                              <label class="form-label">First Name:</label><span class="text-danger">*</span>
                              <input class="form-control" name="first_name" type="text" required>
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Middle Name</label><span class="text-danger">*</span> 
                              <input class="form-control" name="mid_name" type="text">
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Last Name:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="last_name" type="text" required>
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Extension Name:</label> 
                              <input class="form-control" name="ext_name" type="text">
                           </div>
                           <div class="row mt-2">
                              <div class="col-lg-5 col-md-5 col-5">
                                 <label class="form-label">Age:</label><span class="text-danger">*</span>
                                 <div class="input-container">
                                    <!-- <input class="form-control" id="age" name="age" type="text"> -->
                                    <select name="age" class="form-select" required>
                                       <option value="" disabled selected>Select age</option>

                                       <option value="17 or Younger">17 or younger</option>
                                       <option value="18-20">18-20</option>
                                       <option value="21-29">21-29</option>
                                       <option value="30-39">30-39</option>
                                       <option value="40-49">40-49</option>
                                       <option value="50-59">50-59</option>
                                       <option value="60 or Older">60 or older</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-7">
                                 <label class="form-label">Sex:</label><span class="text-danger">*</span>
                                 <div id="">
                                    <select name="sex" class="form-select" required>
                                       <option value="" disabled selected>Select a gender</option>

                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                       
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="step col-12">
                           <h4>Provide us with your contact information:</h4>
                           <div class="mt-1">
                              <label class="form-label">Email Address:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="email" type="email" required>
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Phone Number</label><span class="text-danger">*</span> 
                              <input class="form-control" name="contact" type="number" limit="11" required>
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Province:</label><span class="text-danger">*</span> 
                              <!-- <input class="form-control" name="province" type="text" required> -->
                              <select name="province" class="form-select" required>
                                       <option value="" disabled selected>Select a province</option>
                                       <option value="Aurora">Aurora</option>
                                       <option value="Bataan">Bataan</option>
                                       <option value="Bulacan">Bulacan</option>
                                       <option value="Nueva Ecija">Nueva Ecija</option>
                                       <option value="Pampanga">Pampanga</option>
                                       <option value="Tarlac">Tarlac</option>
                                       <option value="Zambales">Zambales</option>
                              </select>
                           </div>
<!--                            <div class="mt-2">
                              <label class="form-label">Municipality:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="municipality" type="text" required>
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Barangay:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="barangay" type="text" required>
                           </div> -->
                           <div class="mt-2">
                              <label class="form-label">Field Office:</label><span class="text-danger">*</span>
                              <div id="">
                                 <select name="host_id" class="form-select" required>
                                    <option value="" disabled selected>Select field office</option>

                                     <?php
                                             require 'db/dbconn.php';
                                             $sqlFetchHost = "SELECT * FROM host_office";
                                             $resultFetchHost = $con->query($sqlFetchHost);

                                             if ($resultFetchHost->num_rows > 0) {
                                                 
                                                 while ($rowFetchHost = $resultFetchHost->fetch_assoc()) {

                                                     $host_id = $rowFetchHost['host_id'];
                                                     $office = $rowFetchHost['office'];
                                                     echo "<option value='$host_id'>$office</option>";
                                                 }
                                                 
                                             } else{
                                                 echo "<option value='none' selected disabled>No host office available</option>";
                                             }

                                     ?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="step col-12">
                           <h4>Provide us with your account information:</h4>
                           <div class="mt-1">
                              <label class="form-label">Username:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="username" type="text" required>
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Password:</label><span class="text-danger">*</span> 
                              <input class="form-control" name="password" type="password" required>
                           </div>
                           <div class="mt-2">
                              <label class="form-label">Confirm Password:</label><span class="text-danger">*</span>
                              <input class="form-control" name="confirm_password" type="password" required>
                           </div>
                        </div>
                        <div class="step col-12">
                           <div class="mt-1">
                              <div class="closing-text">
                                 <h4>That's about it!</h4>
                                 <p>Kindly carefully check your information before proceeding.</p>
                                 <p>Click on the submit button to continue.</p>
                              </div>
                           </div>
                        </div>
                        <div id="success">
                           <div class="mt-5">
                              <h4>Success! You can now login your account!</h4>
                              <!-- <p>Meanwhile, clean your hands often, use soap and water, or an alcohol-based hand rub, maintain a safe distance from anyone who is coughing or sneezing and always wear a mask when physical distancing is not possible.</p> -->
                              <a class="back-link" href="login.php">Go to login page. ➜</a>
                           </div>
                        </div>
                     </div>
                     <div id="q-box__buttons">
                        <button id="prev-btn" type="button">Previous</button> 
                        <button id="next-btn" type="button">Next</button> 
                        <button id="submit-btn" type="submit">Submit</button>
                     </div>
                  </form>
                  <hr>
                  <p class="text-center" id="aoaa">Already own an account? <span><a href="login.php">Login!</a></span></p>
               </div>
            </div>
         </div>
      </div>

      <div id="preloader-wrapper">
         <div id="preloader"></div>
         <div class="preloader-section section-left"></div>
         <div class="preloader-section section-right"></div>
      </div>

      <script src="js/script.js"></script>
   </body>
</html>