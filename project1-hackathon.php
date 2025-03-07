<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project1</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/grid.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>

    <script defer type="module" src="js/main.js"></script>
    <?php 
require_once('includes/connect.php'); 
 
$query = 'SELECT * FROM projects, media WHERE project_id = projects.id AND media.id ='.$_GET['id']; 
 
$results = mysqli_query($connect,$query); 
 
$row = mysqli_fetch_assoc($results); 
 
?>
  </head>
  <body data-page="project-details">
    <!-- Header -->
    <header class="grid-con header">
      <div class="col-span-3 m-col-span-1 l-col-span-1 logo">
        <img src="images/Rebin Reji Vazhavilayil.png" />
      </div>

      <!-- hamburger icon -->
      <div class="hamburger" id="hamburger-icon">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <!-- desktop and tablet Nav Bar -->
      <nav
        class="col-start-4 col-end-5 m-col-span-11 l-col-span-11 desktop navbar"
      >
        <h2 class="hidden">Main Navigation Bar</h2>
        <ul class="nav-list">
          <a class="nav-item" href="index.html">Home</a>
          <a class="nav-item">Product</a>
          <a class="nav-item">Contact</a>
        </ul>
      </nav>

      <!-- mobile navigation bar -->
      <nav id="navbar-mobile" class="mobile navbar-mobile">
        <h2 class="hidden">Mobile Navigation Bar</h2>
        <a class="nav-item" href="index.html">Home</a>
        <a class="nav-item">Product</a>
        <a class="nav-item">Contact</a>
      </nav>
    </header>

    <section class="project-details">
      <div class="container">
        <h2 class="project-title" id="projectTitle">industry Night 2025</h2>
        <!-- Project Item 1 -->
        <div class="project-item">
          <img
            src="images/project1-1.png"
            alt="Project Image 1"
            class="project-image"
          />
          <p class="project-description"> 

          </p>
        </div>
        <!-- Project Item 2 (alternate layout) -->
        <div class="project-item reverse">
          <img
            src="images/project1-2.png"
            alt="Project Image 2"
            class="project-image"
          />
          <p class="project-description">


</p>
        </div>
        <div class="project-item">
          <img
            src="images/project1-3.png"
            alt="Project Image 1"
            class="project-image"
          />
          <p class="project-description"></p>
      </div>
    </section>
    <footer>
      <div class="footer-content">
        <ul class="footer-links">
          <li><a href="https://www.linkedin.com/in/your-profile" target="_blank">LinkedIn</a></li>
          <li><a href="https://github.com/your-profile" target="_blank">GitHub</a></li>
        </ul>
        <p>&copy; 2024 Rebin Reji Vazhavilayil. All rights reserved.</p>
      </div>
    </footer>
  </body>
</html>
