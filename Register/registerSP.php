<?php 
include_once 'registerSp_crud.php';
include_once 'validateRegisterSp.php';
include_once 'database.php';
$sql= "SELECT fld_service_name FROM tbl_service";

try{
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $results=$stmt->fetchAll();
}
catch(Exception $ex){
    $echo($ex -> getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home Service System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="BootstrapBay">

    <link href="assets/img/favicon.ico" rel="icon" type="image/png">
    
    <link rel="stylesheet" href="./assets/vendor/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="./assets/css/lazy.css">
		<link rel="stylesheet" href="./assets/css/demo.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
  </head>
  <body class="register">
    <nav class="navbar navbar-expand-md navbar-transparent navbar-light">
    <div class="container-fluid">
	    <div class="row">
		    <div class="col-md-2 offset-md-1 d-flex justify-content-between">
	        <a class="navbar-brand text-dark d-flex align-items-center" href="./"><img src="assets/img/logo.svg" alt="Example Navbar 1" height="25" class="mr-2">Home Service System</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-7" aria-controls="navbarNavDropdown-7"
	          aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
		    </div>
	    </div>
    </div>
  </nav>
<div class="container-fluid">
  <div class="row">
	  <div class="col-12 col-md-4 offset-md-1">
				  <div class="register-form">
					  <div class="mb-5">
						  <h1>Register</h1>
						  <p class="lead">Create an account to start playing.</p>
					  </div>
					  <form action="registerSP.php" method="post" class="form-horizontal">
              <div class="form-group">
                <label class="mb-2 text-muted" for="spName">Company Name</label>
                <input name="spName" type="text" class="form-control" id="spName" required autofocus>
              </div>

              <div class="form-group">
						 			<label for="exampleInputrole">Role</label>
									<input name="spRole" class="form-control" id="spRole" value="Service Provider" readonly>
							</div>

             	<div class="form-group">
               	<label class="mb-2 text-muted" for="servID">Service ID</label>
               		<select name="servName" class="form-control" required>
               			<option>-- Please select a service --</option>
        						<?php foreach ($results as $output){?>
        						<option><?php echo $output["fld_service_name"];?></option>
        						<?php } ?>
        					</select>
        				
                <!-- <input name="servID" type="text" class="form-control" id="servID" required> -->
               </div>

               <div class="form-group">
                 <label class="mb-2 text-muted" for="spPhone">Phone Number</label>
                 <input name="spPhone" type="text" class="form-control" id="spPhone" value="" required>
               </div>

						     <div class="form-group">
						       <label class="mb-2 text-muted" for="spAddr">Address</label>
						       <input name="spAddr" type="text" class="form-control" id="spAddr" value="" required>
						     </div>

						      <div class="form-group">
						         <label class="mb-2 text-muted" for="spSSM">SSM Number</label>
						         <input name="spSSM" type="text" class="form-control" id="spSSM" value="" required>
						      </div>

						      <div class="form-group">
									<label for="spEmail">Email address</label>
									<input name="spEmail" type="email" class="form-control" id="spEmail" aria-describedby="emailHelp" value="" placeholder="Enter email" required>
									<small id="emailHelp" class="form-text text-info">We'll never share your email with anyone else.</small>
								</div>

									<div class="form-group">
										 <label for="spPass">Password</label>
										 <input name="spPass" type="password" class="form-control" id="spPass" placeholder="Password" required>
									</div>

						      <div class="custom-control custom-checkbox my-4">
						          <input type="checkbox" class="custom-control-input" id="customCheck2">
						          <label class="custom-control-label" for="customCheck2">Remember me</label>
						      </div>
										
										<button class="btn btn-block btn-primary" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Register</button>
							</form>

						<p class="small my-4 text-center">Already have an account? <a href="#a">Log in</a>.</p>
		  		</div>
	  </div>
	  <div class="col-12 col-md-6 offset-md-1 d-flex">
		  <img src="img/cleaning2.jpg" class="full-picture flex-grow-1">
	  </div>
  </div>
</div>

    
<footer class="footer-1 bg-light text-dark">
<div class="container">
<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	<div class="links">
		<ul class="footer-menu list-unstyled d-flex flex-row text-center text-md-left">
			<li><a href=# target="_blank">About Us</a></li>
			<li><a href=# target="_blank">Blog</a></li>
			<li><a href=# target="_blank">Terms & Conditions</a></li>
		</ul>
	</div>
	<div class="social mt-4 mt-md-0">
    <a class="twitter btn btn-outline-primary btn-icon" href="https://twitter.com" target="_blank">
      <i class="fab fa-twitter"></i>
      <span class="sr-only">View our Twitter Profile</span>
    </a>
    <a class="facebook btn btn-outline-primary btn-icon" href="https://www.facebook.com" target="_blank">
      <i class="fab fa-facebook"></i>
      <span class="sr-only">View our Facebook Profile
        <span>
    </a>
  </div>
</div>
<div class="copyright text-center">
	<hr />
	<p class="small">&copy; 2022, made with <span class="text-danger"><i class="fas fa-heart"></i></span> by CyberFox</p>
</div>
</div>
</footer>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/popper/popper.min.js"></script>
    <script src="./assets/vendor/bootstrap/bootstrap.min.js" ></script>

    <!-- optional plugins -->
    <script src="./assets/vendor/nouislider/js/nouislider.min.js"></script>

    <!--   lazy javascript -->
    <script src="./assets/js/lazy.js"></script>
  </body>
</html>
