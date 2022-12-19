 <?php 

 include_once 'database.php';

  // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 if(isset($_POST['create'])) {

  try {

    // $cEmail = $_POST['create'];
    $stmt = $conn->prepare("SELECT * from tbl_customer WHERE fld_cust_email = :cEmail");
    $stmt->bindParam(':cEmail', $_POST['cEmail'], PDO::PARAM_STR);
    
    $stmt->execute();

    $count = $stmt->rowCount();
    //echo $count; die();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($count > 0) {
      echo "<script>alert('Sorry, email has already exist. Please use a different email.');</script>";
    }

    else if($count == 0 ) {
      $stmt = $conn->prepare("INSERT INTO tbl_customer (fld_cust_name, fld_cust_username, fld_role, fld_cust_phone, fld_cust_addr, fld_cust_email, fld_cust_pass) VALUES(:cName,:cUsername, :role, :cPhone, :cAddr, :cEmail, :cPass)");

      $cName = $_POST['cName'];
      $cUsername = $_POST['cUsername'];
      $role = $_POST['role'];
      $cPhone = $_POST['cPhone'];
      $cAddr = $_POST['cAddr'];
      $cEmail = $_POST['cEmail']; 
      $cPass = $_POST['cPass'];

      $stmt->bindParam(':cName', $cName, PDO::PARAM_STR);
      $stmt->bindParam(':cUsername', $cUsername, PDO::PARAM_STR);
      $stmt->bindParam(':role', $role, PDO::PARAM_STR);
      $stmt->bindParam(':cPhone', $cPhone, PDO::PARAM_STR);
      $stmt->bindParam(':cAddr', $cAddr, PDO::PARAM_STR);
      $stmt->bindParam(':cEmail', $cEmail, PDO::PARAM_STR);
      $stmt->bindParam(':cPass', $cPass, PDO::PARAM_STR);

      $stmt->execute();

      $stmt2 = $conn->prepare("INSERT INTO tbl_user (fld_role,fld_email, fld_pass) VALUES(:role,:cEmail, :cPass)");

      $stmt2->bindParam(':role', $role, PDO::PARAM_STR);
      $stmt2->bindParam(':cEmail', $cEmail, PDO::PARAM_STR);
      $stmt2->bindParam(':cPass', $cPass, PDO::PARAM_STR);
      
      $stmt2->execute();
      echo "<script>alert('Welcome! You have successfully registered!');document.location='loginUser.php'</script>";
      if(!session_id()) 
        session_start();
    }
    
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

?>
