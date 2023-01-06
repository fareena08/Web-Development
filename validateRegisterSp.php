  <?php 

 include_once 'database.php';

 if(empty($_SESSION)) {
  session_start();
}

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['create'])) {

  try {

    $stmt = $conn->prepare("SELECT * from tbl_sp WHERE fld_sp_email = :spEmail");
    $stmt->bindParam(':spEmail', $_POST['spEmail'], PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    //echo $count; die(); //to check  masuk ke tak
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT * from tbl_sp WHERE fld_sp_name = :spName");
    $stmt->bindParam(':spName', $_POST['spName'], PDO::PARAM_STR);
    $stmt->execute();
    $count1 = $stmt->rowCount();
    //echo $count; die(); //to check  masuk ke tak
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($count1 > 0) {
      echo "<script>alert('Sorry, Company Name has already exist. Please use a different name.');</script>";
    }
    
    if ($count > 0) {
      echo "<script>alert('Sorry, email has already exist. Please use a different email.');</script>";
    }

    else if($count == 0 && $count1 == 0) {

      $stmt = $conn->prepare("INSERT INTO tbl_sp (fld_sp_name, fld_sp_role, fld_service_name, fld_sp_phone, fld_sp_addr, fld_sp_ssm, fld_sp_email, fld_sp_pass, fld_location, fld_sp_status, postdate) VALUES(:spName, :spRole, :servName, :spPhone, :spAddr, :spSSM,:spEmail, :spPass, :location, :pdate, 'Pending')");

      $spName = $_POST['spName'];
      $spRole = $_POST['spRole'];
      $servName = $_POST['servName'];
      $spPhone = $_POST['spPhone'];
      $spAddr = $_POST['spAddr'];
      $spSSM = $_POST['spSSM'];
      $spEmail = $_POST['spEmail']; 
      $spPass = $_POST['spPass'];
      $location = $_POST['location'];
      $postdate = date("Y-m-d", time());

      $stmt->bindParam(':spName', $spName, PDO::PARAM_STR);
      $stmt->bindParam(':spRole', $spRole, PDO::PARAM_STR);
      $stmt->bindParam(':servName', $servName, PDO::PARAM_STR);
      $stmt->bindParam(':spPhone', $spPhone, PDO::PARAM_STR);
      $stmt->bindParam(':spAddr', $spAddr, PDO::PARAM_STR);
      $stmt->bindParam(':spSSM', $spSSM, PDO::PARAM_STR);
      $stmt->bindParam(':spEmail', $spEmail, PDO::PARAM_STR);
      $stmt->bindParam(':spPass', $spPass, PDO::PARAM_STR);
      $stmt->bindParam(':location', $location, PDO::PARAM_STR);
      $stmt->bindParam(':pdate', $postdate, PDO::PARAM_STR);

      $stmt->execute();
      
      echo "<script>alert('Welcome! You have successfully registered!');document.location='loginSP.php'</script>";
      if(!session_id()) 
        session_start();
      //header("Location: loginSP.php");
    }
    
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

?>
