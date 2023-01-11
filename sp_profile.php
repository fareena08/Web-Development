<?php 
session_start();
include "database.php";
// include_once 'editcustProfile.php';
// include_once 'updatecustProfile.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
  $stmt = $conn->prepare("SELECT * FROM tbl_sp WHERE fld_sp_email = '".$_SESSION['fld_sp_email']."'");
  $stmt->execute();

  $result = $stmt->fetchAll();
}
catch(PDOException $e)
{
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
   <link rel="stylesheet" href="css/profile.css">

   <!-- custom css profile link-->
  <link rel="stylesheet" href="css/profile.css">

  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<style>
img {
  width: 200px;
  height: 200px;
  border-radius: 50%;
}
</style>

</head>
<body>

<!-- header section starts  -->

   <section class="header">

         <a href="home.php" class="logo">HSS</a>

         <nav class="navbar">
            <a href="homeCust.php">home</a>
            <a href="custProfile.php">Profile</a>
            <a href="#">book</a>
            <a style="color:black"><?php echo "Hi, {$_SESSION['fld_sp_name']}!" ?></a>
            <a href="logout.php" class='fas fa-sign-out-alt'></a>
         </nav>

     <div id="menu-btn" class="fas fa-bars"></div>
   </section><br>
   <section></section>
   <section></section>
<section><br>
<div class="wrapper">
    <div class="left">
        <!-- <img src="" 
        alt="user" width="100"> -->

        <!-- <img src="img/harrypic.jpeg" width="20%" height="20%" class="img-responsive img-circle margin" style="display:inline"> -->

      <?php if ($_SESSION['fld_image'] == "" ) { 
        echo '<img src="img/noprofile.jpeg">';
      }
      else { ?>
      <img src="images/<?php echo $_SESSION['fld_image'] ?>" >
      <?php } ?>
    

        <br><br>
        <h1><a style="color:white;text-transform: uppercase;font-family: 'Josefin Sans', sans-serif;"><?php echo "{$_SESSION['fld_sp_name']}" ?></a> </h1>
         <!-- <p>Customer</p> -->
    </div>

    <div class="right">
        <div class="info">
          <center>
            <h1>SERVICE PROVIDER PROFILE</h1></center>
            <br>
            <div class="info_data">
                 <div class="data">
                    <h2>Service Provider Name</h2>
                    <p><?php echo "{$_SESSION['fld_sp_name']}" ?></p>
                    <h2>Service</h2>
                    <p><?php echo "{$_SESSION['fld_service_name']}" ?></p>
                    <h2>Email</h2>
                    <p><?php echo "{$_SESSION['fld_sp_email']}" ?></p>
                    <h2>Phone</h2>
                    <p><?php echo "{$_SESSION['fld_sp_phone']}" ?></p>
                    <h2>Price</h2>
                    <p><?php echo "{$_SESSION['fld_price']}" ?></p>
                    <h2>SSM Number</h2>
                    <p><?php echo "{$_SESSION['fld_sp_ssm']}" ?></p>
                    <h2>Address</h2>
                    <p><?php echo "{$_SESSION['fld_sp_addr']}" ?></p>
                 </div>
            </div><br>
        
            
        <center>
      <button class="btn btn-block btn-primary" type="submit" name="editform" onclick="window.location.href='editSpProfile.php';" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Edit Profile</button></center>
    </div>
</div>
</section>
<section></section><section></section><br><br><br><br><br><br>
<section></section>
<section></section>
<section></section>
<section></section>
<section class="footer">

   <div class="box-container">

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
