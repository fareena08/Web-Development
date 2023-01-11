
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
 
    $stmt = $conn->prepare("SELECT * from tbl_sp WHERE fld_sp_email = :username AND fld_sp_pass = :password ");
   
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
      $_SESSION['fld_sp_email'] = $readrow["fld_sp_email"];
      $_SESSION['fld_sp_name'] = $readrow["fld_sp_name"];
      $_SESSION['fld_sp_phone'] = $readrow["fld_sp_phone"];
      $_SESSION['fld_sp_addr'] = $readrow["fld_sp_addr"];
      $_SESSION['fld_service_name'] = $readrow['fld_service_name'];
      $_SESSION['fld_sp_ssm'] = $readrow["fld_sp_ssm"];
      $_SESSION['fld_price'] = $readrow["fld_price"];
      //$_SESSION['custusername'] = $readrow["fld_cust_username"];
      $_SESSION['fld_image'] = $readrow["fld_image"];
      
      echo "<script>alert('Welcome {$_SESSION['fld_sp_email']}! You have successfully registered!');document.location='homeSP.php'</script>";
      

    }
    
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>
