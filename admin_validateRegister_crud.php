<?php

include_once 'database.php';

// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (isset($_POST['approve'])) {
    $fld_sp_id= $_POST['id'];
    
    $select = "UPDATE tbl_sp SET fld_sp_status='Approved' WHERE fld_sp_id ='$fld_sp_id'";
    $result = mysqli_query($conn, $select);

    echo "<script>alert('Service Provider Account had been Approved!');document.location='admin_validateRegister.php'</script>";
    
}

if (isset($_POST['reject'])) {
    $fld_sp_id= $_POST['id'];
 
    $select = "UPDATE tbl_sp SET fld_sp_status='Rejected' WHERE fld_sp_id ='$fld_sp_id'";
    $result = mysqli_query($conn, $select);

    echo "<script>alert('Service Provider Account had been Rejected!');document.location='admin_validateRegister.php'</script>";
    
}
?>
