<?php

include('database.php');

//Insert

if (isset($_POST['create'])) {

  $fld_cust_id=$_SESSION['fld_user_id'];
 
  try {
     
    $stmt = $connect->prepare("INSERT INTO tbl_review(review_id, booking_id, cust_id, cust_name, rating, comment) VALUES(:review_id, :fld_booking_id, :fld_user_id, :fld_cust_name, :rating, :comment)");

    $stmt->bindParam(':review_id', $review_id, PDO::PARAM_STR);
    $stmt->bindParam(':fld_booking_id', $fld_booking_id, PDO::PARAM_STR);
    $stmt->bindParam(':fld_user_id', $fld_user_id, PDO::PARAM_STR);
    $stmt->bindParam(':fld_cust_name', $fld_cust_name, PDO::PARAM_STR);
    $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
   

    $review_id = uniqid();
    $fld_booking_id = $_POST['fld_booking_id'];
    $fld_user_id = $_POST['fld_user_id'];
    $fld_cust_name = $_POST['fld_cust_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
  
    $stmt->execute();
    //$id = $connect -> lastInsertId(); 

    echo '<script>alert("Thanks for the rating!")</script>';

    header("Location:homeCust.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

?>