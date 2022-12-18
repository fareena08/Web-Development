<?php
 
include_once 'database.php';
include 'validateRegisterCust.php';

  session_start();

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
//Create
if (isset($_POST['create'])) {

  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_customer (fld_cust_name, fld_cust_username, fld_role, fld_cust_phone, fld_cust_addr, fld_cust_email, fld_cust_pass) VALUES(:cName,:cUsername, :role, :cPhone, :cAddr, :cEmail, :cPass)");

    $stmt2 = $conn->prepare("INSERT INTO tbl_user (fld_role,fld_email, fld_pass) VALUES(:role,:cEmail, :cPass)");

    $stmt->bindParam(':cName', $cName, PDO::PARAM_STR);
    $stmt->bindParam(':cUsername', $cUsername, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':cPhone', $cPhone, PDO::PARAM_STR);
    $stmt->bindParam(':cAddr', $cAddr, PDO::PARAM_STR);
    $stmt->bindParam(':cEmail', $cEmail, PDO::PARAM_STR);
    $stmt->bindParam(':cPass', $cPass, PDO::PARAM_STR);

    $stmt2->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt2->bindParam(':cEmail', $cEmail, PDO::PARAM_STR);
    $stmt2->bindParam(':cPass', $cPass, PDO::PARAM_STR);
       
    $cName = $_POST['cName'];
    $cUsername = $_POST['cUsername'];
    $role = $_POST['role'];
    $cPhone = $_POST['cPhone'];
    $cAddr = $_POST['cAddr'];
    $cEmail = $_POST['cEmail']; 
    $cPass = $_POST['cPass'];
         
    $stmt->execute();
    $stmt2->execute();

    header("Location: registerCustomer.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
?>