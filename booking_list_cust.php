<?php
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/styleService.css"/>


</head>
<body>

  <!-- header section starts  -->

  <section class="header">

    <a href="home.php" class="logo">HSS</a>

    <nav class="navbar">
      <a href="homeCust.php">home</a>
      <a href="custProfile.php">Profile</a>
      <a href="search.php">Search</a>
      <a href="#">Booking List</a>
      <a href="logout.php" class='fas fa-sign-out-alt'></a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
  </section>


  <!--SERVICE section start-->

  <section id="service" class="services">
   
   <h3 class="heading-title" style="margin-bottom: auto;">Booking List</h3>

 </section>
 <div class="container-fluid">

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

      <table class="table table-bordered" style="background-color: whitesmoke; margin-left: auto; margin-right: auto; margin-bottom: auto;">
        <tr style="background-color: #254E58;">
          <th>
            <center style="color:whitesmoke">Booking ID</center>
          </th>
          <th>
            <center style="color:whitesmoke">Customer Name</center>
          </th>
          <th>
            <center style="color:whitesmoke">Service Provider</center>
          </th>
          <th>
            <center style="color:whitesmoke">Service</center>
          </th>
          <th>
            <center style="color:whitesmoke">Service Date</center>
          </th>
          <th>
            <center style="color:whitesmoke">Time</center>
          </th>
          <th>
            <center style="color:whitesmoke">Status</center>
          </th>
          <th>
            <center style="color:whitesmoke"></center>
          </th>
        </tr> 
        
        <?php
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT * FROM tbl_booking WHERE fld_cust_name = '".$_SESSION['name']."'";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $result = $stmt->fetchAll();
        }
        catch(PDOException $e){
          echo "Error: " . $e->getMessage();
        }
        foreach($result as $orderrow) {
          ?>
          <tr>
            <td><center><?php echo $orderrow['fld_booking_id']; ?></center></td>
            <td><center><?php echo $orderrow['fld_cust_name']; ?></center></td>
            <td><center><?php echo $orderrow['fld_sp_name']; ?></center></td>
            <td><center><?php echo $orderrow['fld_service_name']?></center></td>
            <td><center><?php echo $orderrow['fld_date']; ?></center></td>
            <td><center><?php echo $orderrow['fld_time'] ?></center></td>
            <td><center><?php echo $orderrow['fld_price'] ?></center></td>
            <td><center><?php echo $orderrow['fld_booking_status']?></center></td>

            <td>  <center>
              
                  <a href="booking_details_cust.php?bid=<?php echo $orderrow['fld_booking_id']; ?>" class="btn btn-outline-secondary" style="background-color: #F89F58;" role="button">Details</a>
                  <td>
                  <a href="invoice.php?bid=<?php echo $orderrow['fld_booking_id']; ?>" class="btn btn-outline-secondary" style="background-color: #F89F58;" role="button">Invoice</a></td>

                <?php } ?>
              </center> </td>
            </tr>
          </table>
        </div>
      </div>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
