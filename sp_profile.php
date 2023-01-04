<?php 

// include_once 'database2.php';
include_once 'database.php';


if(empty($_SESSION)) {
    session_start();
  }


  // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include_once 'sp_profile_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>HSS: MY PROFILE</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleProfile.css"/>

   

</head>
<body>

<!-- header section starts  -->

<section class="header">

      <a href="home.php" class="logo">HSS</a>

      <nav class="navbar">
         <a href="homeAdmin.php">home</a>
         <a href="about.php">profile</a>
         <a href="admin_establish.php">services</a>
         <a href="#">Validate Account</a>
         <a style="color:black"></a>
         <a href="logout.php" class='fas fa-sign-out-alt'></a>
      </nav>

  <div id="menu-btn" class="fas fa-bars"></div>
</section>


<!--pROFILE PAGE start-->
<section>

    <!-- ?php
      $select = mysqli_query($conn, "SELECT * FROM 'tbl_sp' WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }value="<?php echo $fetch['name']; ?>
   ? >-->
   <div class="wrapper">
    <div class="left">
        <img src="images/jomcuci.jpg" 
        alt="user" width="100">
        <h4>Lawn Care</h4>
         <p>Service Provider</p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                  <div class="data">
                    <h4>Service Name</h4>
                    <p>Sofa and Mattress Cleaning</p>
                 </div>
                    <h4>Email</h4>
                    <p>alex@gmail.com</p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p>0001-213-998761</p>
              </div>
            </div>
        </div>
      
      <div class="projects">
            <h3>Projects</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Recent</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                 </div>
                 <div class="data">
                   <h4>Most Viewed</h4>
                    <p>dolor sit amet.</p>
              </div>
            </div>
        </div>
      
        
    </div>
</div>
   


</section>
<section></section>
<section></section>

<section></section>


<section class="footer">

   <div class="box-container">



      <div class="box">
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

   




