<?php 

include_once 'database.php';
$sql= mysqli_query($conn, "SELECT * FROM tbl_customer");
$countCust = mysqli_num_rows($sql);

$sql2= mysqli_query($conn, "SELECT * FROM tbl_sp");
$countSP = mysqli_num_rows($sql2);

$sql3= mysqli_query($conn, "SELECT * FROM tbl_service");
$countService = mysqli_num_rows($sql3);

$sql4= mysqli_query($conn, "SELECT * FROM tbl_booking");
$countBooking = mysqli_num_rows($sql4);

$sql5= mysqli_query($conn, "SELECT * FROM tbl_customer where postdate > now() - INTERVAL 7 day;");
$countRegLast7day = mysqli_num_rows($sql5);

$sql6= mysqli_query($conn, "SELECT * FROM tbl_sp where postdate > now() - INTERVAL 1 month;");
$countSPLast1month = mysqli_num_rows($sql6);

$sql7= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 7 day;");
$countBookLast7day = mysqli_num_rows($sql7);

$sql8= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 2 week;");
$countBookLast2Week = mysqli_num_rows($sql8);

$sql9= mysqli_query($conn, "SELECT * FROM tbl_sp where fld_service_name='Lawn and Garden Cleaning';");
$countLAGC = mysqli_num_rows($sql9);

$sql10= mysqli_query($conn, "SELECT * FROM tbl_sp where fld_service_name='One Day Maid';");
$countODM = mysqli_num_rows($sql10);

$sql11= mysqli_query($conn, "SELECT * FROM tbl_sp where fld_service_name='Pond Cleaning';");
$countPC = mysqli_num_rows($sql11);

$sql12= mysqli_query($conn, "SELECT * FROM tbl_sp where fld_service_name='Sofa and Mattress Cleaning';");
$countSAMC = mysqli_num_rows($sql12);

$sql13= mysqli_query($conn, "SELECT * FROM tbl_sp where fld_service_name='Basic House Cleaning';");
$countBHC = mysqli_num_rows($sql13);

$sql14= mysqli_query($conn, "SELECT * FROM tbl_sp where fld_service_name='Premium House Cleaning';");
$countPHC = mysqli_num_rows($sql14);

$sql15= mysqli_query($conn, "SELECT * FROM tbl_booking where fld_service_name='Lawn and Garden Cleaning';");
$countLAGC2 = mysqli_num_rows($sql15);

$sql16= mysqli_query($conn, "SELECT * FROM tbl_booking where fld_service_name='One Day Maid';");
$countODM2 = mysqli_num_rows($sql16);

$sql17= mysqli_query($conn, "SELECT * FROM tbl_booking where fld_service_name='Pond Cleaning';");
$countPC2 = mysqli_num_rows($sql17);

$sql18= mysqli_query($conn, "SELECT * FROM tbl_booking where fld_service_name='Sofa and Mattress Cleaning';");
$countSAMC2 = mysqli_num_rows($sql18);

$sql19= mysqli_query($conn, "SELECT * FROM tbl_booking where fld_service_name='Basic House Cleaning';");
$countBHC2 = mysqli_num_rows($sql19);

$sql20= mysqli_query($conn, "SELECT * FROM tbl_booking where fld_service_name='Premium House Cleaning';");
$countPHC2 = mysqli_num_rows($sql20);

//chart.js
//booking last 1 month
$sql21= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 1 month AND fld_service_name='Lawn and Garden Cleaning';");
$countLAGC3 = mysqli_num_rows($sql21);

$sql22= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 1 month AND fld_service_name='One Day Maid';");
$countODM3 = mysqli_num_rows($sql22);

$sql23= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 1 month AND fld_service_name='Pond Cleaning';");
$countPC3 = mysqli_num_rows($sql23);

$sql24= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 1 month AND fld_service_name='Sofa and Mattress Cleaning';");
$countSAMC3 = mysqli_num_rows($sql24);

$sql25= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 1 month AND fld_service_name='Basic House Cleaning';");
$countBHC3 = mysqli_num_rows($sql25);

$sql26= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 1 month AND fld_service_name='Premium House Cleaning';");
$countPHC3 = mysqli_num_rows($sql26);

//booking last 6 month
$sql27= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 6 month AND fld_service_name='Lawn and Garden Cleaning';");
$countLAGC4 = mysqli_num_rows($sql27);

$sql28= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 6 month AND fld_service_name='One Day Maid';");
$countODM4 = mysqli_num_rows($sql28);

$sql29= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 6 month AND fld_service_name='Pond Cleaning';");
$countPC4 = mysqli_num_rows($sql29);

$sql30= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 6 month AND fld_service_name='Sofa and Mattress Cleaning';");
$countSAMC4 = mysqli_num_rows($sql30);

$sql31= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 6 month AND fld_service_name='Basic House Cleaning';");
$countBHC4 = mysqli_num_rows($sql31);

$sql32= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 6 month AND fld_service_name='Premium House Cleaning';");
$countPHC4 = mysqli_num_rows($sql32);

//booking last 12 month
$sql33= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 12 month AND fld_service_name='Lawn and Garden Cleaning';");
$countLAGC5 = mysqli_num_rows($sql33);

$sql34= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 12 month AND fld_service_name='One Day Maid';");
$countODM5 = mysqli_num_rows($sql34);

$sql35= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 12 month AND fld_service_name='Pond Cleaning';");
$countPC5 = mysqli_num_rows($sql35);

$sql36= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 12 month AND fld_service_name='Sofa and Mattress Cleaning';");
$countSAMC5 = mysqli_num_rows($sql36);

$sql37= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 12 month AND fld_service_name='Basic House Cleaning';");
$countBHC5 = mysqli_num_rows($sql37);

$sql38= mysqli_query($conn, "SELECT * FROM tbl_booking where postdate > now() - INTERVAL 12 month AND fld_service_name='Premium House Cleaning';");
$countPHC5 = mysqli_num_rows($sql38);

$sql40= mysqli_query($conn, "SELECT postdate FROM tbl_customer");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/img/logoo.png" rel="icon" type="image/png">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="styleDashboard.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

	<title>Dashboard Admin</title>

	<style >
		.dashboard {
			width:800px;
			padding: 10px;
		}
		* {
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}

		.chartCard {
			background: #ffffff;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.chartBox {
			width: 80%;
			padding: 20px;
			border-radius: 15px;
			border: solid 2px rgba(54, 162, 235, 1);
			background: white;
		}
		.btn{
			width:50%;
			border:2px solid #aaa;
			border-radius:4px;
			display: inline-block;
			background: var(--black);
			margin: 0px 0px 10px 10px;;
			color:var(--white);
			font-size: 15px;
			padding:12px 30px;
			cursor: pointer;
		}

		select{
			width:100%;
			border:2px solid #aaa;
			border-radius:4px;
			margin:8px 0;
			outline:none;
			padding:8px;
			box-sizing:border-box;
			transition:.3s;
		}
		@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		a {
			text-decoration: none;
		}

		li {
			list-style: none;
		}

		:root {
			--poppins: 'Poppins', sans-serif;
			--lato: 'Lato', sans-serif;

			--light: #F9F9F9;
			--blue: #3C91E6;
			--light-blue: #CFE8FF;
			--grey: #eee;
			--dark-grey: #AAAAAA;
			--dark: #342E37;
			--red: #DB504A;
			--yellow: #FFCE26;
			--light-yellow: #FFF2C6;
			--orange: #FD7238;
			--light-orange: #FFE0D3;
		}

		html {
			overflow-x: hidden;
		}

		body.dark {
			--light: #0C0C1E;
			--grey: #060714;
			--dark: #FBFBFB;
		}

		body {
			background: var(--grey);
			overflow-x: hidden;
		}





		/* SIDEBAR */
		#sidebar-dash {
			position: fixed;
			top: 0;
			left: 0;
			width: 280px;
			height: 100%;
			background: var(--light);
			z-index: 2000;
			font-family: var(--lato);
			transition: .3s ease;
			overflow-x: hidden;
			scrollbar-width: none;
		}
		#sidebar-dash::--webkit-scrollbar {
			display: none;
		}
		#sidebar-dash.hide {
			width: 60px;
		}
		#sidebar-dash .brand {
			font-size: 24px;
			font-weight: 700;
			height: 56px;
			display: flex;
			align-items: center;
			color: var(--blue);
			position: sticky;
			top: 0;
			left: 0;
			background: var(--light);
			z-index: 500;
			padding-bottom: 20px;
			box-sizing: content-box;
		}
		#sidebar-dash .brand .bx {
			min-width: 60px;
			display: flex;
			justify-content: center;
		}
		#sidebar-dash .side-menu {
			width: 100%;
			margin-top: 48px;
		}
		#sidebar-dash .side-menu li {
			height: 48px;
			background: transparent;
			margin-left: 6px;
			border-radius: 48px 0 0 48px;
			padding: 4px;
		}
		#sidebar-dash .side-menu li.active {
			background: var(--grey);
			position: relative;
		}
		#sidebar-dash .side-menu li.active::before {
			content: '';
			position: absolute;
			width: 40px;
			height: 40px;
			border-radius: 50%;
			top: -40px;
			right: 0;
			box-shadow: 20px 20px 0 var(--grey);
			z-index: -1;
		}
		#sidebar-dash .side-menu li.active::after {
			content: '';
			position: absolute;
			width: 40px;
			height: 40px;
			border-radius: 50%;
			bottom: -40px;
			right: 0;
			box-shadow: 20px -20px 0 var(--grey);
			z-index: -1;
		}
		#sidebar-dash .side-menu li a {
			width: 100%;
			height: 100%;
			background: var(--light);
			display: flex;
			align-items: center;
			border-radius: 48px;
			font-size: 16px;
			color: var(--dark);
			white-space: nowrap;
			overflow-x: hidden;
		}
		#sidebar-dash .side-menu.top li.active a {
			color: var(--blue);
		}
		#sidebar-dash.hide .side-menu li a {
			width: calc(48px - (4px * 2));
			transition: width .3s ease;
		}
		#sidebar-dash .side-menu li a.logout {
			color: var(--red);
		}
		#sidebar-dash .side-menu.top li a:hover {
			color: var(--blue);
		}
		#sidebar-dash .side-menu li a .bx {
			min-width: calc(60px  - ((4px + 6px) * 2));
			display: flex;
			justify-content: center;
		}
		/* SIDEBAR */





		/* CONTENT */
		#content {
			position: relative;
			width: calc(100% - 280px);
			left: 280px;
			transition: .3s ease;
		}
		#sidebar-dash.hide ~ #content {
			width: calc(100% - 60px);
			left: 60px;
		}




		/* NAVBAR */
		#content nav {
			height: 56px;
			background: var(--light);
			padding: 0 24px;
			display: flex;
			align-items: center;
			grid-gap: 24px;
			font-family: var(--lato);
			position: sticky;
			top: 0;
			left: 0;
			z-index: 1000;
		}
		#content nav::before {
			content: '';
			position: absolute;
			width: 40px;
			height: 40px;
			bottom: -40px;
			left: 0;
			border-radius: 50%;
			box-shadow: -20px -20px 0 var(--light);
		}
		#content nav a {
			color: var(--dark);
		}
		#content nav .bx.bx-menu {
			cursor: pointer;
			color: var(--dark);
		}
		#content nav .nav-link {
			font-size: 16px;
			transition: .3s ease;
		}
		#content nav .nav-link:hover {
			color: var(--blue);
		}
		#content nav form {
			max-width: 400px;
			width: 100%;
			margin-right: auto;
		}
		#content nav form .form-input {
			display: flex;
			align-items: center;
			height: 36px;
		}
		#content nav form .form-input input {
			flex-grow: 1;
			padding: 0 16px;
			height: 100%;
			border: none;
			background: var(--grey);
			border-radius: 36px 0 0 36px;
			outline: none;
			width: 100%;
			color: var(--dark);
		}
		#content nav form .form-input button {
			width: 36px;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			background: var(--blue);
			color: var(--light);
			font-size: 18px;
			border: none;
			outline: none;
			border-radius: 0 36px 36px 0;
			cursor: pointer;
		}
		#content nav .notification {
			font-size: 20px;
			position: relative;
		}
		#content nav .notification .num {
			position: absolute;
			top: -6px;
			right: -6px;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			border: 2px solid var(--light);
			background: var(--red);
			color: var(--light);
			font-weight: 700;
			font-size: 12px;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		#content nav .profile img {
			width: 36px;
			height: 36px;
			object-fit: cover;
			border-radius: 50%;
		}
		#content nav .switch-mode {
			display: block;
			min-width: 50px;
			height: 25px;
			border-radius: 25px;
			background: var(--grey);
			cursor: pointer;
			position: relative;
		}
		#content nav .switch-mode::before {
			content: '';
			position: absolute;
			top: 2px;
			left: 2px;
			bottom: 2px;
			width: calc(25px - 4px);
			background: var(--blue);
			border-radius: 50%;
			transition: all .3s ease;
		}
		#content nav #switch-mode:checked + .switch-mode::before {
			left: calc(100% - (25px - 4px) - 2px);
		}
		/* NAVBAR */


		/* MAIN */
		#content main {
			width: 100%;
			padding: 36px 24px;
			font-family: var(--poppins);
			max-height: calc(100vh - 56px);
			overflow-y: auto;
		}
		#content main .head-title {
			display: flex;
			align-items: center;
			justify-content: space-between;
			grid-gap: 16px;
			flex-wrap: wrap;
		}
		#content main .head-title .left h1 {
			font-size: 36px;
			font-weight: 600;
			margin-bottom: 10px;
			color: var(--dark);
		}
		#content main .head-title .left .breadcrumb {
			display: flex;
			align-items: center;
			grid-gap: 16px;
		}
		#content main .head-title .left .breadcrumb li {
			color: var(--dark);
		}
		#content main .head-title .left .breadcrumb li a {
			color: var(--dark-grey);
			pointer-events: none;
		}
		#content main .head-title .left .breadcrumb li a.active {
			color: var(--blue);
			pointer-events: unset;
		}
		#content main .head-title .btn-download {
			height: 36px;
			padding: 0 16px;
			border-radius: 36px;
			background: var(--blue);
			color: var(--light);
			display: flex;
			justify-content: center;
			align-items: center;
			grid-gap: 10px;
			font-weight: 500;
		}




		#content main .box2-info {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			grid-gap: 24px;
			margin-top: 36px;
		}
		#content main .box2-info li {
			padding: 24px;
			background: var(--light);
			border-radius: 20px;
			display: flex;
			align-items: center;
			grid-gap: 24px;
		}
		#content main .box2-info li .bx {
			width: 80px;
			height: 80px;
			border-radius: 10px;
			font-size: 36px;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		#content main .box2-info li:nth-child(1) .bx {
			background: var(--light-blue);
			color: var(--blue);
		}
		#content main .box2-info li:nth-child(2) .bx {
			background: var(--light-yellow);
			color: var(--yellow);
		}
		#content main .box2-info li:nth-child(3) .bx {
			background: var(--light-orange);
			color: var(--orange);
		}
		#content main .box2-info li .text h3 {
			font-size: 24px;
			font-weight: 600;
			color: var(--dark);
		}
		#content main .box2-info li .text p {
			color: var(--dark); 
		}



		#content main .table-data-dash {
			display: flex;
			flex-wrap: wrap;
			grid-gap: 24px;
			margin-top: 24px;
			width: 100%;
			color: var(--dark);
		}
		#content main .table-data-dash > div {
			border-radius: 20px;
			background: var(--light);
			padding: 24px;
			overflow-x: auto;
		}
		#content main .table-data-dash .head {
			display: flex;
			align-items: center;
			grid-gap: 16px;
			margin-bottom: 24px;
		}
		#content main .table-data-dash .head h3 {
			margin-right: auto;
			font-size: 24px;
			font-weight: 600;
		}
		#content main .table-data-dash .head .bx {
			cursor: pointer;
		}

		#content main .table-data-dash .order {
			flex-grow: 1;
			flex-basis: 500px;
		}
		#content main .table-data-dash .order table {
			width: 100%;
			border-collapse: collapse;
		}
		#content main .table-data .order table th {
			padding-bottom: 12px;
			font-size: 13px;
			text-align: left;
			border-bottom: 1px solid var(--grey);
		}
		#content main .table-data-dash .order table td {
			padding: 16px 0;
		}
		#content main .table-data-dash .order table tr td:first-child {
			display: flex;
			align-items: center;
			grid-gap: 12px;
			padding-left: 6px;
		}
		#content main .table-data-dash .order table td img {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			object-fit: cover;
		}
		#content main .table-data-dash .order table tbody tr:hover {
			background: var(--grey);
		}
		#content main .table-data-dash .order table tr td .status {
			font-size: 10px;
			padding: 6px 16px;
			color: var(--light);
			border-radius: 20px;
			font-weight: 700;
		}
		#content main .table-data-dash .order table tr td .status.completed {
			background: var(--blue);
		}
		#content main .table-data-dash .order table tr td .status.process {
			background: var(--yellow);
		}
		#content main .table-data-dash .order table tr td .status.pending {
			background: var(--orange);
		}


		#content main .table-data-dash .todo {
			flex-grow: 1;
			flex-basis: 300px;
		}
		#content main .table-data-dash .todo .todo-list {
			width: 100%;
		}
		#content main .table-data-dash .todo .todo-list li {
			width: 100%;
			margin-bottom: 16px;
			background: var(--grey);
			border-radius: 10px;
			padding: 14px 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		#content main .table-data-dash .todo .todo-list li .bx {
			cursor: pointer;
		}
		#content main .table-data-dash .todo .todo-list li.completed {
			border-left: 10px solid var(--blue);
		}
		#content main .table-data-dash .todo .todo-list li.not-completed {
			border-left: 10px solid var(--orange);
		}
		#content main .table-data-dash .todo .todo-list li:last-child {
			margin-bottom: 0;
		}
		/* MAIN */
		/* CONTENT */


		@media screen and (max-width: 768px) {
			#sidebar-dash {
				width: 200px;
			}

			#content {
				width: calc(100% - 60px);
				left: 200px;
			}

			#content nav .nav-link {
				display: none;
			}
		}






		@media screen and (max-width: 576px) {
			#content nav form .form-input input {
				display: none;
			}

			#content nav form .form-input button {
				width: auto;
				height: auto;
				background: transparent;
				border-radius: none;
				color: var(--dark);
			}

			#content nav form.show .form-input input {
				display: block;
				width: 100%;
			}
			#content nav form.show .form-input button {
				width: 36px;
				height: 100%;
				border-radius: 0 36px 36px 0;
				color: var(--light);
				background: var(--red);
			}

			#content nav form.show ~ .notification,
			#content nav form.show ~ .profile {
				display: none;
			}

			#content main .box2-info {
				grid-template-columns: 1fr;
			}

			#content main .table-data-dash .head {
				min-width: 420px;
			}
			#content main .table-data-dash .order table {
				min-width: 420px;
			}
			#content main .table-data-dash .todo .todo-list {
				min-width: 420px;
			}



    /*table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      font-size: 20px;
      background-color: #f2f2f2;
      }*/
  </style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar-dash">
		<a href="#" class="brand">
			<span class="text">Home Service System</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="service_form.php">
					<i class='bx bx-wrench' ></i>
					<span class="text">Establish Service</span>
				</a>
			</li>
			<li>
				<a href="admin_validateRegister.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Validate Account</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search..."> -->
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>

		</nav>
		<!-- NAVBAR -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Analytics</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Analytics</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="dashboard.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data-dash">
				<div class="order" >
					<h3 style="text-align: center; font-size: 24px;">Total Sales by Year</h3>
					<form method="post" action="">
						<label for="year">Select Year:</label>
						<select name="year" id="year">
							<option value="">Select</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
						</select>
						<center>
							<input type="submit" class="btn" style="width: 20%" name="submit" value="Submit">
						</center>
					</form>

					<canvas id="lineChart2"></canvas>
					<script>

						var ctx = document.getElementById('lineChart2').getContext('2d');
						var chart = new Chart(ctx, {
							type: 'line',
							data: {
								labels: [],
								datasets: [{
									label: 'Total Sales',
									data: [],
									backgroundColor: 'rgba(255, 99, 132, 0.2)',
									borderColor: 'rgba(255, 99, 132, 1)',
									borderWidth: 1
								}]
							},
							options: {
								maintainAspectRatio: false,
								scales: {
									y: {
										beginAtZero: true
									}
								}
							}
						});

						<?php
						if(isset($_POST['submit'])) {
							$year = $_POST['year'];
							$conn = mysqli_connect("lrgs.ftsm.ukm.my", "a181538", "cutewhiteturtle", "a181538");
							$query = "SELECT MONTH(postdate) as month, SUM(fld_price) as total FROM tbl_booking WHERE YEAR(postdate) = '$year' GROUP BY MONTH(postdate)";
							$result = mysqli_query($conn, $query);
							$data = array();
							while($row = mysqli_fetch_assoc($result)) {
								$monthNum  = $row['month'];
								$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
								$data[] = array('month' => $monthName, 'total' => $row['total']);
							}
							echo "chart.data.labels = " . json_encode(array_column($data, 'month')) . ";\n";
							echo "chart.data.datasets[0].data = " . json_encode(array_column($data, 'total')) . ";\n";
						}
						?>
					</script>
				</div>
			</div>

			<!-- second graph -->

			<div class="table-data-dash" style="height: 400px;">
				<div class="order" >
					<h3 style="text-align: center; font-size: 24px;">Total Registered User by Year</h3>
					<form method="post" action="">
						<label for="year2">Select Year:</label>
						<select name="year2" id="year2">
							<option value="">Select</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
						</select>
						<center>
							<input type="submit" class="btn" style="width: 20%" name="submit" value="Submit">
						</center>
					</form>

					<canvas id="myChart"></canvas>
					<script>

						var ctx = document.getElementById('myChart').getContext('2d');
						var chart = new Chart(ctx, {
							type: 'line',
							data: {
								labels: [],
								datasets: [{
									label: 'Customer',
									data: [],
									backgroundColor: 'rgba(255, 99, 132, 0.2)',
									borderColor: 'rgba(255, 99, 132, 1)',
									borderWidth: 1
								},
								{
									label: 'Service Provider',
									data2: [],
									backgroundColor: 'rgba(36, 88, 225, 0.2)',
									borderColor: 'rgba(36, 88, 225, 1)',
									borderWidth: 1

								}]
							},
							options: {
								maintainAspectRatio: false,
								scales: {
									y: {
										beginAtZero: true
									}
								},
								elements: {
									line: {
										fill: false
									}
									
								},
								title: {
									display: true,
									text: 'Total Registered User'
								}
							}
						});

						<?php
						if(isset($_POST['submit'])) {
							$year2 = $_POST['year2'];
							$conn = mysqli_connect("lrgs.ftsm.ukm.my", "a181538", "cutewhiteturtle", "a181538");
							//customer
							$query = "SELECT MONTH(postdate) as month, COUNT(fld_cust_name) as total FROM tbl_customer WHERE YEAR(postdate) = '$year2' GROUP BY MONTH(postdate)";
							$result = mysqli_query($conn, $query);
							$data = array();
							while($row = mysqli_fetch_assoc($result)) {
								$monthNum  = $row['month'];
								$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
								$data[] = array('month' => $monthName, 'total' => $row['total']);
							}
							echo "chart.data.labels = " . json_encode(array_column($data, 'month')) . ";\n";
							echo "chart.data.datasets[0].data = " . json_encode(array_column($data, 'total')) . ";\n";

							//sp
							$query2 = "SELECT MONTH(postdate) as month, COUNT(fld_sp_name) as total FROM tbl_sp WHERE YEAR(postdate) = '$year2' GROUP BY MONTH(postdate)";
							$result2 = mysqli_query($conn, $query2);
							$data2 = array();
							while($row2 = mysqli_fetch_assoc($result2)) {
								$monthNum2  = $row2['month'];
								$monthName2 = date('F', mktime(0, 0, 0, $monthNum2, 10));
								$data2[] = array('month' => $monthName2, 'total' => $row2['total']);
							}
							echo "chart.data.labels = " . json_encode(array_column($data2, 'month')) . ";\n";
							echo "chart.data.datasets[1].data = " . json_encode(array_column($data2, 'total')) . ";\n";
						}
						?>
					</script>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="scriptDashboard.js"></script>
</body>
</html>
