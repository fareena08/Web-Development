<?php 

// include_once 'database2.php';
include_once 'database.php';

if(empty($_SESSION)) {
    session_start();
  }

  // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['create'])) {

    try {
 
    $stmt = $conn->prepare("SELECT * from tbl_customer WHERE fld_cust_email = :username AND fld_cust_pass = :password ");


   
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
       
    $username = $_POST['username'];
    $password = $_POST['password'];
         
    $stmt->execute();

    $count = $stmt->rowCount();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($count == 0) {
      echo "<script>alert('Sorry, Your email or password not match. Please try again.');</script>";
    }

    else if($count == 1 ) {
      $_SESSION['username'] = $readrow["fld_cust_name"];
      
      
      echo "<script>alert('Welcome {$_SESSION['username']}! You have successfully registered!');document.location='homeCust.php'</script>";
      

    }
    
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>
