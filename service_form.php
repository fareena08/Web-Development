<?php

$servername = "lrgs.ftsm.ukm.my";
$username = "a181538";
$password = "cutewhiteturtle";
$dbname = "a181538";

$con = mysqli_connect($servername,$username,$password);

include_once 'service_form_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">

  body {font-family: Arial, Helvetica, sans-serif;}
  *{box-sizing: border-box;}

  .input-container{display: -ms-flexbox;
  width: 100%;
        padding: 0px 8px;
        margin: 5px 0px 5px 0px;
        box-sizing: border-box;
        border-radius: 5px;
        font: 100% Lucida Sans, Verdana;

}

  .input-field{
    width: 100%;
    padding: 5px;
    outline: none;

  }

  .input-field:focus {
    border: 2px solid dodgerblue;
  }

  

  
</style>

</head>
<body>
<br>
	<h4  align="center" style="color:black">Service</h4>
<br>
<div class="class-body">
	<div class="table-responsive">

		<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Service ID</th>
      <th scope="col">Service Name</th>
      <th scope="col"></th>


    </tr>
  </thead>
  <tbody>
  	<?php
  	$per_page = 40;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
  	try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("select * from tbl_service");
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
      }
    foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_service_id']; ?></td>
        <td><?php echo $readrow['fld_service_name']; ?></td>
        
        <td>
        	<a href="service_form.php?edit=<?php echo $readrow['fld_service_id']; ?>" class="btn btn-outline-primary" role="button"> Edit </a>
          
          <a href="service_form.php?delete=<?php echo $readrow['fld_service_id']; ?>" name="delete" onclick="return confirm('Are you sure to delete?');" class="btn btn-outline-danger" role="button">Delete</a>

        </td>
      </tr>
      <?php
    }
      $conn = null;
      ?>
   
  </tbody>
</table>

	</div>

</div>

 <form style="max-height: 500px;margin: auto; width: 600px;" method="post" >
 	<h6 align="center" style="color:black"><strong> Add Service </strong></h6>
  <div class="input-container">
    <input class="input-field" type="text" name="fld_service_id" placeholder="Enter Service ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_service_id']; ?>">
    <p class="text-danger"><?php if(isset($errors['fld_service_id'])) echo $errors['fld_service_id']; ?></p>

  </div>
  <div class="input-container">
    <input class="input-field" type="text" name="fld_service_name" placeholder="Enter Service Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_service_name']; ?>">
    <p class="text-danger"><?php if(isset($errors['fld_service_name'])) echo $errors['fld_service_name']; ?></p>
  </div>
   <br>

   <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_service_id']; ?>">
      <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
    <?php } else { ?>
    <input type="submit" name="create" class="btn btn-primary btn-block" value="Add" align="middle" >

    <?php } ?>
  </form>
  

</body>
</html>