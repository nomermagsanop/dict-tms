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


    <!-- CSS STYLING -->
    <link href="./assets/style.css" rel="stylesheet">
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
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

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
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">         
            <div class="row schedule-item">
              <div class="col-md-2"><time>April 16, 2024</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="../img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Title: <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore, illum?</span></h4>
                <p> <span>Resource Speaker:</span>Brenden Legros</p>
               <button class="btn btn-warning">Register Now!</button>
              </div>
            </div>
            <div class="row schedule-item">
              <div class="col-md-2"><time>April 16, 2024</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="../img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Title: <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore, illum?</span></h4>
                <p> <span>Resource Speaker:</span>Brenden Legros</p>
                <button class="btn btn-warning">Register Now!</button>
              </div>
            </div>            
          </div>
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
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="../img/speakers/1.jpg" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Brenden Legros</a></h3>
                <p>Region III DICT Zambales</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="200">
              <img src="../img/speakers/2.jpg" alt="Speaker 2" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Hubert Hirthe</a></h3>
               <p>Region III DICT Zambales</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="300">
              <img src="../img/speakers/3.jpg" alt="Speaker 3" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Cole Emmerich</a></h3>
                <p>Region III DICT Zambales</p>
              </div>
            </div>
          </div>
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
</body>
</html>