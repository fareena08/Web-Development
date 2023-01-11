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
    
    $email=$_SESSION['email'];   
    $name = $_POST['name'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    
    $select= "SELECT * from tbl_customer WHERE fld_cust_email = '".$_SESSION['email']."'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
 
    $res= $row['fld_cust_email'];
    if($res === $email)
    {
   
       $update = "UPDATE tbl_customer SET fld_cust_username='$name',fld_cust_phone='$Phone',fld_cust_addr='$Address' WHERE fld_cust_email='$email'";
     $sql2=mysqli_query($conn,$update);

 }

}

?>

