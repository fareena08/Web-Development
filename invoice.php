 <?php
 session_start();
  include_once 'database.php';
?>
<?php
try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_booking, tbl_sp WHERE tbl_sp.fld_sp_name=tbl_booking.fld_sp_name AND tbl_booking.fld_cust_name= '".$_SESSION['name']."'");
     $stmt->execute();
$readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Invoice</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="assets/img/logoo.png" rel="icon" type="image/png">
   
</head>
<body style="background-color: #white;">
<br>

<div class="row">

 

 <?php
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_booking, tbl_sp WHERE tbl_sp.fld_sp_name=tbl_booking.fld_sp_name AND tbl_booking.fld_booking_id= :bid");
        $stmt->bindParam(':bid', $bid, PDO::PARAM_STR);
          $bid = $_GET['bid'];
        $stmt->execute();
        $result = $stmt->fetchAll();  }
  catch(PDOException $e){
        echo "Error: " . $e->getMessage();
  }
  foreach($result as $detailrow) {
  ?> 

  <div class="col-xs-6 text-right" align="right">
  <br>
    <img src="images/<?php echo $detailrow['fld_image'] ?>" width="20%" height="20%">
</div>

  <div >
  <h1>INVOICE</h1>
  <h5>Order ID: <?php echo $detailrow['fld_booking_id'] ?></h5>
  <h5>Date: <?php echo $detailrow['postdate'] ?></h5>
</div>
</div>
<hr>
<div class="row">
  <div class="col-sm-5">
    <div class="panel panel-default" >
      <div class="panel-heading" style="background-color:#8e44ad; color: white;">
        <h4>From: <?php echo $detailrow['fld_sp_name'] ?></h4>
      </div>
      <div class="panel-body" style="background-color: whitesmoke;">
        <p>
        <?php echo $detailrow['fld_sp_addr'] ?> </p>
      </div>
    </div>
  </div>
    <div class="col-xs-5 col-xs-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#8e44ad; color: white;">
              <h4>To : <?php echo $detailrow['fld_cust_name'] ?></h4>
            </div>
            <div class="panel-body" style="background-color: whitesmoke;">
        <p>
       <?php echo $detailrow['fld_cust_address'] ?>
        </p>

            </div>
        </div>
    </div>
</div>
 <center>
<table class="table table-bordered" style="background-color:whitesmoke ;  width:100%;">
  <tr style="background-color:#8e44ad; color: white;" >
    <th>Booking ID</th>
    <th>Service Name</th>
    <!-- <th class="text-right">Quantity</th> -->
    <th class="text-right">Total(RM)</th>
  </tr>
 
  <tr>
    <td><?php echo $detailrow['fld_booking_id']; ?></td>
    <td><?php echo $detailrow['fld_service_name']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_price']; ?></td>
  </tr>
  
</table></center>
 
<div class="row">
  <div class="col-sm-5">
    <div class="panel panel-default">
      <div class="panel-heading" style="background-color:#8e44ad;color: white;">
        <h4 >Bank Details</h4>
      </div>
      <div class="panel-body" style="background-color: whitesmoke;">
        <p>Your Name</p>
        <p>Bank Name</p>
        <p>Account Number : </p>
       <p> <br></p>
      </div>
    </div>
    </div>
  <div class="col-xs-5 col-xs-offset-2 ">
    <div class="span7">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#8e44ad; color: white;">
          <h4>Contact Details</h4>
        </div>
        <div class="panel-body" style="background-color: whitesmoke;">
          <p> Staff: <?php echo $detailrow['fld_sp_name']?> </p>
          <p> Email: <?php echo $detailrow['fld_sp_email'] ?> </p>
          <p><br></p>
          <p>Computer-generated invoice. No signature is required.</p>
        </div><?php
  } 
  ?> 
      </div>
    </div>
  </div>
</div><center>
<div><a href="booking_list_cust.php" class="btn btn-outline-secondary" align="left" style="background-color: #8e44ad; color: white;" role="button">Previous</a>
  <input type="button" class="btn btn-outline-secondary" style="background-color: #8e44ad; color: white;" value="Print Invoice" onclick="window.print()"/>
  <!-- <input type="button" class="btn btn-outline-secondary" style="background-color: #8e44ad; color: white;" value="Download Invoice" onclick="window.jspdf()"/> -->
  </center></div>

  <!-- <a href="invoice.php?file=pdffilename" download>Download Invoice</a> -->
</body>
</html>