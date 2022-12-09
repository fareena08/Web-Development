<?php
 
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_user (fld_cust_name, fld_cust_phone, fld_cust_addr, fld_cust_email, fld_cust_pass) VALUES(:cName, :cPhone, :cAddr, :cEmail,  :cPass)");

    $stmt->bindParam(':cName', $cName, PDO::PARAM_STR);
    $stmt->bindParam(':cPhone', $cPhone, PDO::PARAM_STR);
    $stmt->bindParam(':cAddr', $cAddr, PDO::PARAM_STR);
    $stmt->bindParam(':cEmail', $cEmail, PDO::PARAM_STR);
    $stmt->bindParam(':cPass', $cPass, PDO::PARAM_STR);
       
    $cName = $_POST['cName'];
    $cPhone = $_POST['cPhone'];
    $cAddr = $_POST['cAddr'];
    $cEmail = $_POST['cEmail']; 
    $cPass = $_POST['cPass'];
         
    $stmt->execute();
     
      echo "You have registered successfully";
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
?>