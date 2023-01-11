<?php

include('database.php');
if (isset($_GET['fld_sp_id'])) {

$uid=$_GET['fld_sp_id'];

$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert

if (isset($_POST['create'])) {
 
  try {
     
    $stmt = $connect->prepare("INSERT INTO tbl_booking(fld_booking_id, fld_cust_name, fld_sp_name, fld_service_name, fld_cust_address, fld_date, fld_price) VALUES(:oid, :fld_cust_name, :fld_sp_name, :fld_service_name, :fld_cust_address, :fld_date, :fld_price )");

    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $stmt->bindParam(':fld_cust_name', $fld_cust_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_name', $fld_sp_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_service_name', $fld_service_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_cust_address', $fld_cust_address, PDO::PARAM_STR);
    $stmt->bindParam(':fld_date', $fld_date, PDO::PARAM_STR);
    $stmt->bindParam(':fld_price', $fld_price, PDO::PARAM_STR);

    $oid = uniqid('O', true);
    $fld_cust_name = $_POST['fld_cust_name'];
    $fld_sp_name = $_POST['fld_sp_name'];
    $fld_service_name = $_POST['fld_service_name'];
    $fld_cust_address = $_POST['fld_cust_address'];
    $fld_date = $_POST['fld_date'];
    $fld_time = $_POST['fld_time'];
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

?>