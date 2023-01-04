<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_sp SET
      fld_sp_id = :fld_sp_id, fld_sp_name = :fld_sp_name, fld_service_name = :fld_service_name, fld_sp_phone = :fld_sp_phone, fld_sp_addr = :fld_sp_addr, fld_sp_ssm = :fld_sp_ssm, fld_sp_email = :fld_sp_email, fld_sp_pass = :fld_sp_pass, fld_location = :fld_location, fld_price = :fld_location, fld_price = :fld_price, fld_image = :fld_image 
      WHERE fld_sp_id = :oldsid");
   
    $stmt->bindParam(':fld_sp_id', $fld_sp_id, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_name', $fld_sp_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_service_name', $fld_service_name, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_phone', $fld_sp_phone, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_addr', $fld_sp_addr, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_ssm', $fld_sp_ssm, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_email', $fld_sp_email, PDO::PARAM_STR);
    $stmt->bindParam(':fld_sp_pass', $fld_sp_pass, PDO::PARAM_STR);
    $stmt->bindParam(':fld_location', $fld_location, PDO::PARAM_STR);
    $stmt->bindParam(':fld_price', $fld_price, PDO::PARAM_STR);
    $stmt->bindParam(':fld_image', $fld_image, PDO::PARAM_STR);

    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $fld_sp_id = $_POST['fld_sp_id'];
    $fld_sp_name = $_POST['fld_sp_name'];
    $fld_service_name = $_POST['fld_service_name'];
    $fld_sp_phone = $_POST['fld_sp_phone'];
    $fld_sp_addr = $_POST['fld_sp_addr'];
    $fld_sp_ssm = $_POST['fld_sp_ssm'];
    $fld_sp_email = $_POST['fld_sp_email'];
    $fld_sp_pass = $_POST['fld_sp_pass'];
    $fld_location = $_POST['fld_location'];
    $fld_price = $_POST['fld_price'];
    $fld_image = $_POST['fld_image'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: service.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_sp where fld_sp_id = :fld_sp_id");
   
    $stmt->bindParam(':fld_sp_id', $fld_sp_id, PDO::PARAM_STR);
       
    $fld_service_id = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
  $conn = null;
 
?>
