 <?php 

include_once 'database.php';

if(empty($_SESSION)) {
    session_start();
  }

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['cEmail'])) {

    try {
 
    $stmt = $conn->prepare("SELECT * from tbl_user WHERE fld_cust_email = :cEmail");

   
    $stmt->bindParam(':cEmail', $email, PDO::PARAM_STR);
       
    $cEmail = $_POST['cEmail'];
         
    $stmt->execute();

    $count = $stmt->rowCount();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($count == 1) {
      echo "<script>alert('Sorry, email has already exist. Please use a different email.');</script>";
    }

    else if($count == 0 ) {
      $_SESSION['cName'] = $readrow["fld_cust_name"];
      echo "<script>alert('Welcome {$_SESSION['cName']}! You have successfully registered!');document.location='registerUser.php'</script>";
      if(!session_id()) 
        session_start();
    }
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>