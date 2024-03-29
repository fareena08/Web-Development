<?php

$servername = "lrgs.ftsm.ukm.my";
$username = "a181538";
$password = "cutewhiteturtle";
$dbname = "a181538";

$con = mysqli_connect($servername,$username,$password);

include_once 'admin_validateRegister_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>HSS Validate Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="BootstrapBay">

    <link href="assets/img/logoo.png" rel="icon" type="image/png">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleService.css"/>


</head>
<body>

<!-- header section starts  -->

   <section class="header">

      <a href="dashboard.php" class="logo">HSS</a>

      <nav class="navbar">
         <a href="dashboard.php">home</a>
         <a href="service_form.php">Establish services</a>
         <a href="#">Validate Account</a>
         <a style="color:black"></a>
         <a href="logout.php" class='fas fa-sign-out-alt'></a>
      </nav>

  <div id="menu-btn" class="fas fa-bars"></div>
</section>


<!--SERVICE section start-->

<section id="service" class="services">
   
   <h3 class="heading-title" style="margin-bottom: auto;">New Request</h3>
   

   

</section>


<!-- about section starts  -->

<!-- <div class="class-body">
  <div class="table-responsive"> -->

      
    <table class="center" >
    <thead class="thead-dark">
    <tr>
      <th scope="col">Service Provider Name</th>
      <th scope="col">SSM Number</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
    </thead>
  <tbody>
   <?php
   $per_page = 40;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
   try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "select * from tbl_sp WHERE fld_sp_status='pending'";
           $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
      }
    foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_sp_name']; ?></td>
        <td><?php echo $readrow['fld_sp_ssm']; ?></td>
        <td><?php echo $readrow['fld_sp_status']; ?></td>
        
        <td>
          <form action="admin_validateRegister.php" method="POST">
            <input type="hidden" name="id" value ="<?php echo $readrow['fld_sp_id']; ?>"></>
            <input type="submit" class="btn btn-outline-primary" name="approve" value="Approve" role="button" style="background-color: limegreen"></>
            <input type="submit" class="btn btn-outline-danger" name="reject"  value="Reject" role="button" style="background-color: red" onclick="return confirm('Are you sure to reject account registration?');"></>
          </form>
        </td>
      </tr>

      <?php
    }
      $conn = null;
      ?>
   
  </tbody>
</table>

   <<!-- /div>

</div>
</div> -->


<section></section>

<!-- home about section ends -->




<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

<!--       <div class="box">
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
