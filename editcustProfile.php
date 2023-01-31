<?php 
session_start();

include "database.php";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
  $stmt = $conn->prepare("SELECT * FROM tbl_customer WHERE fld_cust_email = '".$_SESSION['email']."'");
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <!-- <img src="" 
        alt="user" width="100"> -->

        <!-- <img src="img/harrypic.jpeg" width="20%" height="20%" class="img-responsive img-circle margin" style="display:inline">
 -->
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

            <form action="updatecustProfile.php" method="post" >
              
            <div class="info_data">
                 <div class="data">
                    <h2>Username</h2>
                    <input type="text" name="name" class="form-control" size="100" required value="<?php echo "{$_SESSION['custusername']}" ?>">
  <br>
                 </div>
            </div><br>
            <div class="info_data">
                 <div class="data">
                    <h2>Email</h2>
                    <p><?php echo "{$_SESSION['email']}" ?></p>
  
                 </div> 
               </div>
               <div class="info_data">
                 <div class="data">
                    <h2>Phone</h2>
                     <input type="text" name="Phone" size="100" required value="<?php echo "{$_SESSION['Phone']}" ?>">
  <br>
                 </div>
            </div><br>
            <div class="info_data">
                 <div class="data">
                    <h2>Address</h2>
                    <input type="text" name="Address" size="100" required value="<?php echo "{$_SESSION['Address']}" ?>">
  <br>
                 </div> 
               </div><br>
           <div class="info_data">
                 </div>
             <center>
      <button class="btn btn-block btn-primary" type="submit" name="updateprofile" onclick="window.location.href='editcustProfile.php';"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Update Profile</button></center>

               </form>

        </div>
      
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
