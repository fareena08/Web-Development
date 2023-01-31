<?php 
session_start();
include "database.php";

// include_once 'editcustProfile.php';
// include_once 'updatecustProfile.php';
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
   <link rel="stylesheet" href="css/styleHome.css">

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
            <a style="color:black"><?php echo "Hi, {$_SESSION['name']}!" ?></a>
            <a href="logout.php" class='fas fa-sign-out-alt'></a>
         </nav>

     <div id="menu-btn" class="fas fa-bars"></div>
   </section>
<section>
<div class="wrapper">
    <div class="left">
      
     <?php if ($_SESSION['custimage'] == "" ) { 
        echo '<img src="img/noprofile.jpeg">';
      }
      else { ?>
      <img src="img/<?php echo $_SESSION['custimage'] ?>" >
      <?php } ?> 
    

        <br><br>
        <h1><a style="color:white;text-transform: uppercase;font-family: 'Josefin Sans', sans-serif;"><?php echo "{$_SESSION['name']}" ?></a> </h1>
         <!-- <p>Customer</p> -->
    </div>

    <div class="right">
        <div class="info">
          <center>
            <h1>CUSTOMER PROFILE</h1></center>
            <br>
            <div class="info_data">
                 <div class="data">
                    <h2>Username</h2>
                    <p><?php echo "{$_SESSION['custusername']}" ?></p>
                 </div>
            </div><br>
            <div class="info_data">
                 <div class="data">
                    <h2>Email</h2>
                    <p><?php echo "{$_SESSION['email']}" ?></p>
                 </div> 
               </div><br>
               <div class="info_data">
                 <div class="data">
                    <h2>Phone</h2>
                    <p><?php echo "{$_SESSION['Phone']}" ?></p>
                 </div>
            </div><br>
            <div class="info_data">
                 <div class="data">
                    <h2>Address</h2>
                    <p><?php echo "{$_SESSION['Address']}" ?></p>
                 </div> 
               </div>

<div class="data">
                  <h2>Profile Picture</h2>
                  <?php 
 
    echo '<form action="uploadcust.php" method="post" enctype="multipart/form-data">';
    echo "<input type='file' name='fileToUpload' id='fileToUpload' required>";
    echo "<input type='submit' value='Upload Image' name='submit'> ";
    echo "";
    echo "</form>";
  
  ?></div>
        </div>
        <center>
      <button class="btn btn-block btn-primary" type="submit" name="editform" onclick="window.location.href='editcustProfile.php';"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Edit Profile</button></center>
    </div>
</div>
</section>



<!-- footer section ends -->


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
