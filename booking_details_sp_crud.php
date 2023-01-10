<?php
 
include_once 'database.php';
 
// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['approve'])) {
    $fld_booking_id= $_POST['bid'];
    
    $select = "UPDATE tbl_booking SET fld_booking_status='Approved' WHERE fld_booking_id ='$fld_booking_id'";
    $result = mysqli_query($conn, $select);

    echo "<script>alert('Booking had been Approved!');document.location='booking_list.php'</script>";
    
}

if (isset($_POST['reject'])) {
    $fld_booking_id= $_POST['bid'];
 
    $select = "UPDATE tbl_booking SET fld_booking_status='Rejected' WHERE fld_booking_id ='$fld_booking_id'";
    $result = mysqli_query($conn, $select);

    echo "<script>alert('Booking had been Rejected!');document.location='booking_list.php'</script>";
    
}
 
 
?>