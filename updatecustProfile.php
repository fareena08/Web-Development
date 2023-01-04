<?php
 
if (isset($_POST['create'])) {
 
  include "database.php";
 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $stmt = $conn->prepare("UPDATE tbl_customer SET user = :name, phone = :phone, addr = :address WHERE email = :email");
 
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':address', $addr, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
       
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $email = $_POST['email'];
    
 
    $stmt->execute();
     
    header("Location:custProfile.php");
    }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
?>