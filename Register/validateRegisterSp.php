 <?php 

include_once 'database.php';

if(empty($_SESSION)) {
    session_start();
  }

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['spEmail'])) {

    try {
 
    $stmt = $conn->prepare("SELECT * from tbl_sp WHERE fld_sp_email = :spEmail");

   
    $stmt->bindParam(':spEmail', $email, PDO::PARAM_STR);
       
    $cEmail = $_POST['spEmail'];
         
    $stmt->execute();

    $count = $stmt->rowCount();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($count == 1) {
      echo "<script>alert('Sorry, email has already exist. Please use a different email.');</script>";
    }

    else if($count == 0 ) {
      $_SESSION['spName'] = $readrow["fld_sp_name"];
      echo "<script>alert('Welcome {$_SESSION['spName']}! You have successfully registered!');document.location='registerUser.php'</script>";
      if(!session_id()) 
        session_start();
    }
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>