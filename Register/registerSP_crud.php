<?php
 
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_sp (fld_sp_name, fld_service_name, fld_sp_phone, fld_sp_addr, fld_sp_ssm, fld_sp_email, fld_sp_pass) VALUES(:spName, :servName, :spPhone, :spAddr, :spSSM,:spEmail, :spPass)");

    $stmt->bindParam(':spName', $spName, PDO::PARAM_STR);
    $stmt->bindParam(':servName', $servName, PDO::PARAM_STR);
    $stmt->bindParam(':spPhone', $spPhone, PDO::PARAM_STR);
    $stmt->bindParam(':spAddr', $spAddr, PDO::PARAM_STR);
    $stmt->bindParam(':spSSM', $spSSM, PDO::PARAM_STR);
    $stmt->bindParam(':spEmail', $spEmail, PDO::PARAM_STR);
    $stmt->bindParam(':spPass', $spPass, PDO::PARAM_STR);
       
    $spName = $_POST['spName'];
    $servName = $_POST['servName'];
    $spPhone = $_POST['spPhone'];
    $spAddr = $_POST['spAddr'];
    $spSSM = $_POST['spSSM'];
    $spEmail = $_POST['spEmail'];
    $spPass = $_POST['spPass'];
         
    $stmt->execute();
     
      echo "You have registered successfully";
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
?>