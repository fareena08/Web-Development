<?php
 
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
 
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
 
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
 
  // Allow certain file formats
  if($imageFileType != "png" && $imageFileType != "jpg" ) {
    echo "Sorry, only PNG & JPG files are allowed.";
    $uploadOk = 0;
  }
 
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
      // Put your SQL UPDATE here
        include "database.php";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $stmt = $conn->prepare("UPDATE tbl_customer SET fld_cust_image =:fileToUpload WHERE fld_cust_email = '".$_SESSION['email']."'");

    $stmt->bindParam(':fileToUpload', $img, PDO::PARAM_STR);
       
       $img = ($_FILES["fileToUpload"]["name"]);
 
    $stmt->execute();
     

    // header("Location:custProfile.php");
   
     echo "<script>alert('You image has successfully been uploaded!');document.location='homeCust.php'</script>";
    }
 
      catch(PDOException $e)
      {
          echo "Error: " . $e->getMessage();
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

}
?>
