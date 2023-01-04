<?php 
session_start();
include "database.php";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
  $stmt = $conn->prepare("SELECT * FROM tbl_customer WHERE fld_cust_username = 'Far'");
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
            <a href="logout.php" class='fas fa-sign-out-alt'></a>
         </nav>

     <div id="menu-btn" class="fas fa-bars"></div>
   </section>

       <center>
<!-- header -->

<div class="container-fluid bg-success text-center">
 <br>
  <h1 class="margin">CUSTOMER PROFILE</h1><br>
  <img src="img/harrypic.jpeg" width="20%" height="20%" class="img-responsive img-circle margin" style="display:inline">
  <!-- <h2>Harry Potter</h2> --> 
  <br><br>
  <h2>  <a style="color:black"><?php echo "{$_SESSION['username']}" ?></a> </h2>
   

   <!-- call semua data customer -->

  <h2>  
    <div class="form-group">
                <!-- <label class="mb-2 text-muted" for="name">Name :</label> -->
              </div>
<!--     <a style="color:black"><?php echo "{$_SESSION['phone']}" ?></a>   -->

  <?php
foreach($result as $row) {
 
  echo "Username : ".$row["fld_cust_username"]."<br>";
  echo "Name : ".$row["fld_cust_name"]."<br>";
  echo "Phone Number : ".$row["fld_cust_phone"]."<br>";
  echo "Email : ".$row["fld_cust_email"]."<br>";
  echo "Address : ".$row["fld_cust_addr"]."<br>";
  // echo "Action : <a href=edit.php?id=".$row["id"].">Edit</a> / <a href=delete.php?id=".$row["id"].">Delete</a>";
  
  echo "<hr>";
}
?>
<!-- 
    <div class="form-group">
     <label class="mb-2 text-muted" for="phone">Phone :</label>
     </div>

    <div class="form-group">
     <label class="mb-2 text-muted" for="Email">Email :</label>
     </div>

    <div class="form-group">
     <label class="mb-2 text-muted" for="Address">Address :</label>
     </div> -->

  </h2>

                        </div>
               

                     <button class="btn btn-block btn-primary" type="submit" name="create" onclick="window.location.href='editcustProfile.php';"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Edit Profile</button>
                    <!--  </form> -->
</div></center>
  <br>
<!-- Edit Form -->
<div class="container-fluid text-center">
<!-- footer section starts  -->

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