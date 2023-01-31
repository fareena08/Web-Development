<?php

session_start();
include('database.php');

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
  $stmt = $conn->prepare("SELECT * FROM tbl_customer WHERE fld_cust_email = '".$_SESSION['email']."'");
  $stmt->execute();

  $result = $stmt->fetchAll();
}
catch(PDOException $e)
{
        echo "Error: " . $e->getMessage();
    }
 
$conn = null;
if (isset($_GET['fld_sp_id'])) {

//$uid=$_GET['fld_sp_id'];

$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $connect -> prepare("SELECT * FROM tbl_sp WHERE fld_sp_id = ?");
   $stmt -> execute([$_GET['fld_sp_id']]);

   $service = $stmt->fetch(PDO::FETCH_ASSOC);
   if(!$service) {
      exit('Service Provider is not found');
   } 

} else {
   //exit('Service Provider does not exist');
}



$connect = null;

include_once 'booking_crud.php'; 

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
   <link rel="stylesheet" href="css/styleBooking.css"/>

   

</head>
<body>

<!-- header section starts  -->

   <section class="header">

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

<section>
 <h3 class="heading-title">Booking</h3>
<div class= "container">
   <img src="images/<?php echo $service['fld_image']; ?>" name="fld_image" alt="<?php echo $service['fld_sp_name']; ?>" width="500" height="500">
      <h1 class="spname" ><?php echo $service['fld_sp_name']; ?></h1>
      <h3 class="sername"><?php echo $service['fld_service_name']; ?></h3>
   <form action="booking.php" method="POST">
      <div class="customer-details">

         <input class="input-field" name="bid" type="hidden">
         <input class="input-field2" name="fld_user_id" value="<?php echo "{$_SESSION['fld_user_id']}" ?>" type="hidden">
         <input class="input-field3" name="postdate" value="<?php echo "{$_SESSION['postdate']}" ?>" type="hidden">


         <div class="input-box">
            <span class="details">Full Name</span>
            <input class="input-field" name="fld_cust_name" type="text" placeholder="Enter Your Full Name" required value="<?php echo "{$_SESSION['name']}" ?>">
         </div>
      
         <div class="input-box">
            <span class="details">Address</span>
            <input class="input-field" name="fld_cust_address" type="text" placeholder="Enter Your Full Address" required value="<?php echo "{$_SESSION['Address']}" ?>">
         </div>

         <div class="input-box">
            <span class="details">Service Provider Name</span>
            <input class="input-field" name="fld_sp_name" type="text" value="<?php echo $service['fld_sp_name']; ?>" readonly>
         </div>

         <div class="input-box">
            <span class="details">Service</span>
            <input class="input-field" name="fld_service_name" type="text" value="<?php echo $service['fld_service_name']; ?>" readonly>
         </div>

         <div class="input-box">
            <span class="details">Price</span>
            <input class="input-field" name="fld_price" type="text" value="<?php echo $service['fld_price']; ?>" readonly>
         </div>
         
         
         <div class="input-box">
            <span class="details">Date</span>
            <div class="input-group date" id="datepicker" inline="true">
            <input type="date" name="fld_date" class="form-control" placeholder="Choose The Date" required>
            <span class="input-group-append">
               <span class="input-group-text bg-white">
               
            </span>
         </span>
      </div>

   
         </div>
        <div class="input-box">
          <label>Time</label>
          <div class="custom_select" >
            <select name="fld_time">
              <option value="">Select</option>
              <option value="8.00 AM">8.00 AM</option>
              <option value="9.00 AM">9.00 AM</option>
              <option value="10.00 AM">10.00 AM</option>
              <option value="11.00 AM">11.00 AM</option>
              <option value="12.00 PM">12.00 PM</option>
              <option value="13.00 PM">13.00 PM</option>
              <option value="14.00 PM">14.00 PM</option>
              <option value="15.00 PM">15.00 PM</option>
              <option value="16.00 PM">16.00 PM</option>
              <option value="17.00 PM">17.00 PM</option>
            </select>
          </div>
       </div> 
      </div>
      
         <button type="submit" name="create" class="btn btn-primary btn-block">Request Booking</button>
      
   </form>


</div>
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

<script type="text/javascript">
        $('.datepicker').datepicker({
  inline: true
});
    </script>

</body>
</html>

