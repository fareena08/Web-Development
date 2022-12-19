<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert

if (isset($_POST['create'])) {
 
  try {
     
    $stmt = $conn->prepare("INSERT INTO tbl_service(fld_service_id, fld_service_name) VALUES(:fld_service_id, :fld_service_name)");
   
    $stmt->bindParam(':fld_service_id', $fld_service_id, PDO::PARAM_STR);
    $stmt->bindParam(':fld_service_name', $fld_service_name, PDO::PARAM_STR);
       
    $fld_service_id = $_POST['fld_service_id'];
    $fld_service_name = $_POST['fld_service_name'];
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_service SET
      fld_service_id = :fld_service_id, fld_service_name = :fld_service_name
      WHERE fld_service_id = :oldsid");
   
    $stmt->bindParam(':fld_service_id', $fld_service_id, PDO::PARAM_STR);
    $stmt->bindParam(':fld_service_name', $fld_service_name, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $fld_service_id = $_POST['fld_service_id'];
    $fld_service_name = $_POST['fld_service_name'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: service.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_service where fld_service_id = :fld_service_id");
   
    $stmt->bindParam(':fld_service_id', $fld_service_id, PDO::PARAM_STR);
       
    $fld_service_id = $_GET['delete'];
     
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
 
    $stmt = $conn->prepare("SELECT * FROM tbl_service where fld_service_id = :fld_service_id");
   
    $stmt->bindParam(':fld_service_id', $fld_service_id, PDO::PARAM_STR);
       
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
 
