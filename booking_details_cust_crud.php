<?php
 
include_once 'database.php';

if (isset($_POST['cancel'])) {
    $fld_booking_id= $_POST['bid'];
 
    $select = "UPDATE tbl_booking SET fld_booking_status='Cancelled' WHERE fld_booking_id ='$fld_booking_id'";
    $result = mysqli_query($conn, $select);

    echo "<script>alert('Booking had been Cancelled!');document.location='booking_list_cust.php'</script>";
    
}
 
 
?>