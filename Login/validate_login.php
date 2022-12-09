<?php 

include_once 'database.php';

if(empty($_SESSION)) {
    session_start();
  }

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['sid'])) {

    try {
 
    $stmt = $conn->prepare("SELECT * from tbl_login WHERE fld_username = :sid");

   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
         
    $stmt->execute();

    $count = $stmt->rowCount();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($count < 1) {
      echo "<script>alert('Sorry, user does not exist');</script>";
    }
    else if($pass != $readrow["fld_password"]) {
      echo "<script>alert('Incorrect password. Please try again');</script>";
    }
    else if($role != $readrow["fld_role"]) {
      echo "<script>alert('Incorrect role. Please try again');</script>";
    }
    else if($count == 1) {
      $_SESSION['role'] = $readrow["fld_role"];
      // $_SESSION['sid'] = $readrow["fld_username"];
      echo "<script>alert('Welcome ! You are logged in as {$_SESSION['role']}');document.location='testlogin.php'</script>";
      if(!session_id()) 
        session_start();
    }
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>