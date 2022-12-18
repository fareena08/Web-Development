 <?php 

include_once 'database.php';

  // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['cEmail'])) {

    try {

    $cEmail = $_POST['cEmail'];
    $stmt = $conn->prepare("SELECT * from tbl_customer WHERE fld_cust_email = :cEmail");
    $stmt->bindParam(':cEmail', $cEmail, PDO::PARAM_STR);
     
    $stmt->execute();

    $count = $stmt->rowCount();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($count > 1) {
      echo "<script>alert('Sorry, email has already exist. Please use a different email.');</script>";
    }

    else if($count == 0 ) {
      echo "<script>alert('Welcome! You have successfully registered!');document.location='registerUser.php'</script>";
      if(!session_id()) 
        session_start();
    }
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>