<?php

session_start();
include('database.php');


$connect = null;

//include_once 'booking_crud.php';
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
  <!-- Bootstrap -->
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleService.css"/>

<style >
  body{
    background-color: whitesmoke;
  }
</style>
</head>
<body>

<!-- header section starts  -->

   <section class="header">

      <a href="home.php" class="logo">HSS</a>

      <nav class="navbar">
            <a href="homeSP.php">home</a>
            <a href="sp_profile.php">Profile</a>
            <a href="booking.php">Booking List</a>
            <a href="logout.php" class='fas fa-sign-out-alt'></a>
         </nav>

  <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- <section id="service" class="services">
   
   <h3 class="heading-title" style="margin-bottom: auto;">Booking Details</h3>

</section> -->

  <?php
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_booking, tbl_customer,tbl_sp WHERE
      tbl_booking.fld_sp_name = tbl_sp.fld_sp_name AND
      tbl_booking.fld_cust_name = tbl_customer.fld_cust_name AND
      fld_booking_id = :bid");
    $stmt->bindParam(':bid', $bid, PDO::PARAM_STR);
    $bid = $_GET['bid'];
    $stmt->execute();
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <div class="panel panel-default"><center>
          <div class="panel-heading"><strong>Booking Details</strong></div>
          <div class="panel-body">
            Below are the booking details.
          </div>
          <table class="table">
            <tr>
              <td class="col-xs-4 col-sm-4 col-md-4"><strong>Booking ID</strong></td>
              <td><?php echo $readrow['fld_booking_id'] ?></td>
            </tr>
            <tr>
              <td><strong>Customer Name</strong></td>
              <td><?php echo $readrow['fld_cust_name'] ?></td>
            </tr>
            <tr>
              <td><strong>Service Provider</strong></td>
              <td><?php echo $readrow['fld_sp_name'] ?></td>
            </tr>
            <tr>
              <td><strong>Service</strong></td>
              <td><?php echo $readrow['fld_service_name']?></td>
            </tr>
            <tr>
              <td><strong>Address</strong></td>
              <td><?php echo $readrow['fld_cust_address'] ?></td>
            </tr>
            <tr>
              <td><strong>Date</strong></td>
              <td><?php echo $readrow['fld_date'] ?></td>
            </tr>
            <tr>
              <td><strong>Time</strong></td>
              <td><?php echo $readrow['fld_time']?></td>
            </tr>
            <tr>
              <td><strong>Status</strong></td>
              <td><?php echo $readrow['fld_booking_status']?></td>
            </tr>
          </table>
          <form action="#">
            <input type="hidden" name="bid" value ="<?php echo $readrow['fld_booking_id']; ?>">
            <input type="submit" class="btn btn-outline-danger" name="reject"  value="Cancel Request" role="button" style="background-color: red" onclick="return confirm('Are you sure to reject this booking?');">
            <button class="btn btn-outline-danger" onclick="window.location.href='review.php?bid=<?php echo $readrow['fld_booking_id'] ?>'">Give Review</button>

          </form>
        </td>
        </div>
        </center>
      </div>
    </div>

<script type="text/javascript">

  function validateForm() {

    var x = document.forms["frmorder"]["pid"].value;
    var y = document.forms["frmorder"]["quantity"].value;
      //var x = document.getElementById("prd").value;
      //var y = document.getElementById("qty").value;
    if (x == null || x == "") {
      alert("Product must be selected");
      document.forms["frmorder"]["pid"].focus();
          //document.getElementById("prd").focus();
      return false;
    }
    if (y == null || y == "") {
      alert("Quantity must be filled out");
      document.forms["frmorder"]["quantity"].focus();
          //document.getElementById("qty").focus();
      return false;
    }

    return true;
  }

</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
