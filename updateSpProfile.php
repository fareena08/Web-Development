<?php
 
 session_start();
 include "database.php";
if (isset($_POST['updateprofile'])) {
 
  // try {
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    // $stmt = $conn->prepare("SELECT tbl_customer WHERE fld_cust_email = '".$_SESSION['email']."'");
 
    // $stmt->bindParam('".$_SESSION['name']."', $name, PDO::PARAM_STR);
    // $stmt->bindParam('".$_SESSION['Phone']."', $Phone, PDO::PARAM_STR);
    // $stmt->bindParam('".$_SESSION['Address']."', $Address, PDO::PARAM_STR);
    // $stmt->bindParam('".$_SESSION['email']."', $email, PDO::PARAM_STR);
    
    $fld_sp_email=$_SESSION['fld_sp_email'];   
    $fld_sp_name = $_POST['fld_sp_name'];
    $fld_service_name = $_POST['fld_service_name'];
    $fld_sp_phone = $_POST['fld_sp_phone'];
    $fld_sp_addr = $_POST['fld_sp_addr'];
    $fld_sp_ssm = $_POST['fld_sp_ssm'];
    $fld_price = $_POST['fld_price'];
    $fld_image = $_POST['fld_image'];

    
    $select= "SELECT * from tbl_sp WHERE fld_sp_email = '".$_SESSION['fld_sp_email']."'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
 
    $res= $row['fld_sp_email'];
    if($res === $fld_sp_email)
    {
   
       $update = "UPDATE tbl_sp SET fld_sp_name='$fld_sp_name',fld_sp_phone='$fld_sp_phone',fld_sp_addr='$fld_sp_addr', fld_service_name='$fld_service_name', fld_sp_ssm='$fld_sp_ssm', fld_price='$fld_price', fld_image ='$fld_image'  WHERE fld_sp_email='$fld_sp_email'";
     $sql2=mysqli_query($conn,$update);

     

 }

if($res= $row['fld_sp_email']){
    $_SESSION['fld_sp_name'] = $_POST['fld_sp_name'];
    $_SESSION['fld_service_name'] = $_POST['fld_service_name'];
    $_SESSION['fld_sp_phone'] = $_POST['fld_sp_phone'];
    $_SESSION['fld_sp_addr'] = $_POST['fld_sp_addr'];
    $_SESSION['fld_sp_ssm'] = $_POST['fld_sp_ssm'];
    $_SESSION['fld_price'] = $_POST['fld_price'];
    $_SESSION['fld_image'] = $_POST['fld_image'];


 header("Location: sp_profile.php");

}
}

?>

