<?php

include('database.php');

//Insert

if (isset($_POST['create'])) {

  $fld_cust_id=$_SESSION['fld_user_id'];
  $current_date = date("d-m-Y");
 
  try {
     
    $stmt = $connect->prepare("INSERT INTO tbl_booking(fld_booking_id, fld_user_id, fld_cust_name, fld_sp_name, fld_service_name, fld_cust_address, fld_date, fld_time, fld_price, postdate, fld_booking_status) VALUES(:bid, :fld_user_id, :fld_cust_name, :fld_sp_name, :fld_service_name, :fld_cust_address, :fld_date, :fld_time, :fld_price, '$current_date', 'Pending' )");

    $stmt->bindParam(':bid', $bid, PDO::PARAM_STR);
    $stmt->bindParam(':fld_user_id', $fld_user_id, PDO::PARAM_STR);
    $stmt->bindParam(':fld_cust_name', $fld_cust_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_name', $fld_sp_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_service_name', $fld_service_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_cust_address', $fld_cust_address, PDO::PARAM_STR);
    $stmt->bindParam(':fld_date', $fld_date, PDO::PARAM_STR);
    $stmt->bindParam(':fld_time', $fld_time, PDO::PARAM_STR);
    $stmt->bindParam(':fld_price', $fld_price, PDO::PARAM_STR);
    //$stmt->bindParam(':postdate', $postdate, PDO::PARAM_STR);

    //$stmt->bindParam(':fld_booking_status', $fld_booking_status, PDO::PARAM_STR);

    $bid = uniqid();
    $fld_user_id = $_POST['fld_user_id'];
    $fld_cust_name = $_POST['fld_cust_name'];
    $fld_sp_name = $_POST['fld_sp_name'];
    $fld_service_name = $_POST['fld_service_name'];
    $fld_cust_address = $_POST['fld_cust_address'];
    $fld_date = $_POST['fld_date'];
    $fld_time = $_POST['fld_time'];
    $fld_price = $_POST['fld_price'];
   // $postdate = $_POST['postdate'];
    $stmt->execute();
    //$id = $connect -> lastInsertId(); 

    header("Location:booking_details_cust.php?bid=".$bid);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}


?>
