<?php 
session_start()

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <title>Home Service System</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="BootstrapBay">

    <link href="assets/img/logoo.png" rel="icon" type="image/png">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleHome.css">

</head>
<body>

<!-- header section starts  -->

   <section class="header">

      <a href="home.php" class="logo">HSS</a>

      <nav class="navbar">
         <a href="homeAdmin.php">home</a>
        <!--  <a href="about.php">about</a> -->
         <a href="service_form.php">services</a>
         <a href="admin_validateRegister.php">Validate Account</a>
         <a style="color:black"><?php echo "Hi, {$_SESSION['username']}!" ?></a>
         <a href="logout.php" class='fas fa-sign-out-alt'></a>
      </nav>

  <div id="menu-btn" class="fas fa-bars"></div>
</section>

<!--banner section start-->

<section class="home">

   <div class="swiper home-slider">
   
      <div class="swiper-wrapper">
         
         <div class="swiper-slide slide" style="background:url(images/home1.jpg) no-repeat">
            <div class="content">
               <span>easy, fast, clean</span>
               <h3>fulfill all your request</h3>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home2.jpg) no-repeat">
            <div class="content">
               <span>easy, fast, clean</span>
               <h3>fulfill all your request</h3>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/laundry.jpg) no-repeat">
            <div class="content">
               <span>easy, fast, clean</span>
               <h3>fulfill all your request</h3>
            </div>
         </div>

      </div>


      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>
</section>
<!--SERVICE section start-->

<section id="service" class="services">
   
   <h1 class="heading-title">our services</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/home1.jpg" alt="">
         <h3>Basic Cleaning</h3>
      </div>

      <div class="box">
         <img src="images/sanitize.jpg" alt="">
         <h3>sanitization and disinfection</h3>
      </div>

       <div class="box">
         <img src="images/laundry.jpg" alt="">
         <h3>Laundry Service</h3>
      </div>


      <div class="box">
         <img src="images/lawnmowing.jpg" alt="">
         <h3>Lawn Mowing</h3>
      </div>

      <div class="box">
         <img src="images/pondcleaning.jpg" alt="">
         <h3>Pond Cleaning</h3>
      </div>

   </div>
</section>

<!-- about section starts  -->

<section class="home-about">

   <div class="image">
      <img src="images/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3>about us</h3>
      <p>We are an online platform that offers customers a wide range of home services that suits your need, from a bunch of companies and freelancers out there. </p>
      <!-- <button id="openBtn" type="button" data-target="#myModal" data-href="about.php" class="btn" >read more</button> -->
      <!-- <button id= openBtn type="button" data-target="#myModal" data-href  href="about.php" class="btn">read more</a> -->
      <a href="readmore.php" class='btn'>read more</a>
   </div>

</section>

<!-- home about section ends -->


<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <!-- <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
         <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right">
         </i> terms of use</a>
      </div> -->

      <div class="box" style="text-align: center;">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> 03-56212121 </a>
         <a href="#"> <i class="fas fa-phone"></i> 019-1112221 </a>
         <a href="#"> <i class="fas fa-envelope"></i> admin@servicezillion.com </a>
         <a href="https://www.google.com/maps/place/Universiti+Kebangsaan+Malaysia/@3.0116948,101.5057449,11z/data=!4m19!1m13!4m12!1m4!2m2!1d101.5119872!2d3.0900224!4e1!1m6!1m2!1s0x31cdc9f6e881cbf7:0xb06402ffc0884bd7!2sukm+location!2m2!1d101.7800233!2d2.9289226!3m4!1s0x31cdc9f6e881cbf7:0xb06402ffc0884bd7!8m2!3d2.9289226!4d101.7800233" target="_blank"> <i class="fas fa-map"></i> Bandar Baru Bangi, Selangor </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.facebook.com/computing.ftsmukm" target="_blank"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="https://www.instagram.com/fareenamf/?hl=en" target="_blank"> <i class="fab fa-instagram"></i> instagram </a>
      </div>

   </div>

   <div class="credit"> created by <span>CyberFox Team</span> | 2022 </div>

</section>

<!-- footer section ends -->


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
