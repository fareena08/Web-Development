<?php

session_start();
include('database.php');

if (isset($_GET['bid'])) {

//$uid=$_GET['fld_sp_id'];

$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $connect -> prepare("SELECT * FROM tbl_booking WHERE fld_booking_id = ?");
   $stmt -> execute([$_GET['bid']]);

   $service = $stmt->fetch(PDO::FETCH_ASSOC);
   if(!$service) {
      exit('Booking ID is not found');
   } 

} else {
   //exit('Service Provider does not exist');
}



$connect = null;

include_once 'review_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hss Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="BootstrapBay">

    <link href="assets/img/logoo.png" rel="icon" type="image/png">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleReview.css"/>

   

</head>
<body>

<!-- header section starts  -->

   <section class="headernav">

      <a href="home.php" class="logo">HSS</a>

      <nav class="navbar">
         <a href="homeCust.php">home</a>
            <a href="custProfile.php">Profile</a>
            <!-- <a href="about.php">about</a> -->
            <a href="search.php">search</a>
            <a href="booking.php">book</a>
            <a style="color:black"><?php echo "Hi, {$_SESSION['custusername']}!" ?></a>
            <a href="logout.php" class='fas fa-sign-out-alt'></a>
      </nav>

  <div id="menu-btn" class="fas fa-bars"></div>
</section>


<!--SERVICE section start-->



<section id="service" class="services">
   
   <h3 class="heading-title">Review</h3>
   
<section>

   <form action="review.php" method="POST">
      <div class="send">Send us your feedback!</div><br>
   <input class="sp_name"  name="fld_sp_name" value="NAME :  <?php echo $service['fld_sp_name']; ?>" >
   <br><br>
   <input class="rid" name="review_id" type="hidden">

   <input class="bid" name="fld_booking_id" value="<?php echo $service['fld_booking_id']; ?>" type="hidden">
   <input class="cust_id"  name="fld_user_id" value="<?php echo $service['fld_user_id']; ?>" type="hidden">
   <input class="cust_name"  name="fld_cust_name" value="<?php echo $service['fld_cust_name']; ?>" type="hidden">




   <div class="container">
      <div class="title">How was your experience?</div>

      <div class="star-widget" name="rating">
         <input type="radio" name="rating" id="rate-5" value="5">
         <label for="rate-5" class="fas fa-star"></label>
         <input type="radio" name="rating" id="rate-4" value="4">
         <label for="rate-4" class="fas fa-star"></label>
         <input type="radio" name="rating" id="rate-3" value="3">
         <label for="rate-3" class="fas fa-star"></label>
         <input type="radio" name="rating" id="rate-2" value="2">
         <label for="rate-2" class="fas fa-star"></label>
         <input type="radio" name="rating" id="rate-1" value="1">
         <label for="rate-1" class="fas fa-star"></label>
         
      </div>
      <div class="review">
            <header class="komen"></header>
            <div class="textarea">
               <textarea cols="30" rows="8" placeholder="Describe your experience.." name="comment" id="review"></textarea>
            </div>
            <div class="btn">
               <button type="submit" name="create" class="btn btn-primary btn-block">Send Feedback</button>
            </div>
         </form>
      </div>
   </div>

</section>

</section>

<!-- footer section starts  -->

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
