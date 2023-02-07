<?php 

// include_once 'database2.php';
include_once 'database.php';

if(empty($_SESSION)) {
    session_start();
  }

  // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['create'])) {

    try {
      $username = $_POST['username'];
      $password = $_POST['password'];
    
      $stmt = mysqli_query($conn, "SELECT * from tbl_sp WHERE fld_sp_email = '$username' AND fld_sp_pass = '$password' ");
      $row = mysqli_fetch_array($stmt);
      
      $stmt2 = mysqli_query($conn, "SELECT * from tbl_sp WHERE fld_sp_email = '$username' AND fld_sp_pass = '$password' ");
      $count = mysqli_num_rows($stmt2);

      if($count==0){
         echo "<script>alert('Sorry, Your email or password not match. Please try again.');</script>";
      }
      elseif($count==1){
        $status = $row['fld_sp_status'];
        $_SESSION["status"]=$row['fld_sp_status'];
        $_SESSION["username"]=$row['fld_sp_email'];
        $_SESSION["password"]=$row['fld_sp_pass'];
        $_SESSION['username'] = $row["fld_sp_name"];

        if($status=="Approved"){
          
          echo "<script>alert('Welcome {$_SESSION['username']}! You have successfully logged in!');document.location='homeSP.php'</script>";
        }
        elseif ($status=="Pending") {
          echo "<script>alert('Your account is still pending for approval!');document.location='loginSP.php'</script>";
        }
        elseif ($status=="Rejected") {
          echo "<script>alert('Your account registration is rejected. Please register again with correct SSM Number!');document.location='loginSP.php'</script>";
        }
       
      }
      
     
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>
