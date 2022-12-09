<?php
include_once 'validate_login.php';

if (!isset($_SESSION)) {
	session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="A new design system for developing with less effort.">
    <meta name="author" content="BootstrapBay">

    <link href="assets/img/logoo.png" rel="icon" type="image/png">
    
    <link rel="stylesheet" href="./assets/vendor/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="./assets/css/lazy.css">
		<link rel="stylesheet" href="./assets/css/demo.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
</head>

<body class="login">
	<nav class="navbar navbar-expand-md navbar-transparent navbar-light">
    <div class="container-fluid">
	    <div class="row">

	    										<!-- this is part yg ada logo 4 top of login detail -->
		    <div class="col-md-2 offset-md-1 d-flex justify-content-between">
	        <a class="navbar-brand text-dark d-flex align-items-center" href="./"><img src="assets/img/logoo.png" alt="Example Navbar 1" height="25" class="mr-2"> CyberFox</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-7" aria-controls="navbarNavDropdown-7"
	          aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
		    </div>
		    <div class="col-md-5 offset-md-3 d-flex justify-content-end text-center">
	       
		    </div>
	    </div>
    </div>
  </nav>

														<!-- this is part yg login punya detail ui -->
<div class="container-fluid" >

  <div class="row">
  	
	  <div class="col-12 col-md-4 offset-md-1" >
				  <div class="login-form" >
				  	<div class="mb-5">
						  <h1>Login</h1>
						  <p class="lead">Log into your account to start exploring.</p>
					  </div>

					  <form action="#" method="POST">
					  	<div class="form-group" data-validate="Username is required">
						    <label for="exampleInputusername1">Username</label>
						    <input type="username" class="form-control" id="exampleInputusername1"  placeholder="Enter Your Username">
						  </div>

						  <div class="form-group" data-validate="Password is required">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="passwordHelp" placeholder="Enter Your Password">
						    <small id="usernameHelp" class="form-text text-info">We'll never share your password with anyone else.</small>
						  </div>
						 
						 <!-- <div class="form-group">
						    <label for="exampleInputrole">Role</label>
						    <input type="role" class="form-control" id="exampleInputusername1"  placeholder="Enter Your Role">
						  </div> -->

						  <div class="form-group">
					<!-- 	<span class="symbol-input100">
							<i class="fa fa-bars"></i>
						</span>
						
						 --><label for="exampleInputrole">Role</label>
							<select name="Role" class="form-control" id="role" required>

								<option value="">Please select a role</option>
								<option value="Admin">Admin</option>
								<option value="Service Provider">Service Provider</option>
								<option value="Customer">Customer</option>
							</select>
								
					
					</div>

              <div class="custom-control custom-checkbox my-4">
                <input type="checkbox" class="custom-control-input" id="customCheck2">
                <label class="custom-control-label" for="customCheck2">Remember me</label>
              </div>
						  <button type="submit" class="btn btn-block btn-primary">Log In</button>
						</form>

						<p class="small my-4 text-center">Didn't have an account? <a href="#a">Sign Up</a>.</p>
		  		</div>

		  		</div>


		  										<!-- this is part for picture background yg left side -->
	  <div class="col-12 col-md-6 offset-md-1 d-flex">
		  <div class="full-picture flex-grow-1">
		  	<!-- <img src="assets/img/cleaning.jpg" align="right"> -->
		  </div>
	  </div>
  </div>
</div>

    														<!-- this is part yg bottom for the page -->
<footer class="footer-1 bg-light text-dark">
<div class="container">
<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	<div class="links">
		<ul class="footer-menu list-unstyled d-flex flex-row text-center text-md-left">
			<li><a href="" target="_blank">Service</a></li>
			<li><a href="" target="_blank">About Us</a></li>
			<li><a href="" target="_blank">Blog</a></li>
			<li><a href="" target="_blank">Terms & Conditions</a></li>
		</ul>
	</div>
	<div class="social mt-4 mt-md-0">
    <a class="twitter btn btn-outline-primary btn-icon" href="" target="_blank">
      <i class="fab fa-twitter"></i>
      <span class="sr-only">View our Twitter Profile</span>
    </a>
    <a class="facebook btn btn-outline-primary btn-icon" href="" target="_blank">
      <i class="fab fa-facebook"></i>
      <span class="sr-only">View our Facebook Profile
        <span>
    </a>
    <a class="github btn btn-outline-primary btn-icon" href="" target="_blank">
      <i class="fab fa-github"></i>
      <span class="sr-only">View our GitHub Profile</span>
    </a>
  </div>
</div>

													<!-- this is part yg ad tulis made by sape dekat bottom page-->
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