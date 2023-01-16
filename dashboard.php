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

$sql21= mysqli_query($conn, "SELECT * FROM tbl_sp where postdate > now() - INTERVAL 1 month AND fld_service_name='Lawn and Garden Cleaning';");
$countLAGC3 = mysqli_num_rows($sql21);

$sql22= mysqli_query($conn, "SELECT * FROM tbl_sp where postdate > now() - INTERVAL 1 month AND fld_service_name='One Day Maid';");
$countODM3 = mysqli_num_rows($sql22);

$sql23= mysqli_query($conn, "SELECT * FROM tbl_sp where postdate > now() - INTERVAL 1 month AND fld_service_name='Pond Cleaning';");
$countPC3 = mysqli_num_rows($sql23);

$sql24= mysqli_query($conn, "SELECT * FROM tbl_sp where postdate > now() - INTERVAL 1 month AND fld_service_name='Sofa and Mattress Cleaning';");
$countSAMC3 = mysqli_num_rows($sql24);

$sql25= mysqli_query($conn, "SELECT * FROM tbl_sp where postdate > now() - INTERVAL 1 month AND fld_service_name='Basic House Cleaning';");
$countBHC3 = mysqli_num_rows($sql25);

$sql26= mysqli_query($conn, "SELECT * FROM tbl_sp where postdate > now() - INTERVAL 1 month AND fld_service_name='Premium House Cleaning';");
$countPHC3 = mysqli_num_rows($sql26);
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="styleDashboard.css">
	<title>Admin Dashboard</title>
	<link href="assets/img/logoo.png" rel="icon" type="image/png">

	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

		<style type="text/css">
			.dashboard {
				width:1000px;
				padding: 20px;
			}
		</style>

	<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

          // Load the Visualization API and the piechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create the data table.
      var data = new google.visualization.arrayToDataTable([
      ['Service Category', 'Number of Service Provider'],
      ['Lawn and Garden Cleaning', <?php echo $countLAGC?>],
      ['One Day Maid', <?php echo $countODM?>],
      ['Pond Cleaning', <?php echo $countPC?>],
      ['Sofa and Mattress Cleaning', <?php echo $countSAMC?>],
      ['Basic House Cleaning', <?php echo $countBHC?>],
      ['Premium House Cleaning', <?php echo $countPHC?>]
      ]);

// Set chart options
      var options = {'title':'Number of Service Providers based on Service',
                     'width':500,
                     'height':400
                 };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>

    <!-- bar chart -->
       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Service", "Num Of Booking", { role: "style" } ],
        ["Lawn and Garden Cleaning",<?php echo $countLAGC2?>, "#0066cc"],
        ["One Day Maid", <?php echo $countODM2?>, "#cc0000"],
        ["Pond Cleaning",<?php echo $countPC2?>, "#ff9900"],
        ["Sofa and Mattress Cleaning", <?php echo $countSAMC2?>, "color: #009933"],
        ["Basic House Cleaning", <?php echo $countBHC2?>, "#993399"],
        ["Premium House Cleaning", <?php echo $countPHC2?>, "#30A89C"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]); 

      var options = {
        title: "Total Booking for Each Service Category",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

  
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="margin-left: 30px;">HSS</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li><a href="service_form.php"><i class='bx bxs-chart icon' ></i> Establish Service</a></li>
			<li><a href="admin_validateRegister.php"><i class='bx bxs-widget icon' ></i> Validate Account</a></li>
			<!-- <li class="divider" data-text="table and forms">Table and forms</li> -->
			<!-- <li><a href="#"><i class='bx bx-table icon' ></i> Report</a></li> -->
			<li><a href="logout.php"><i class='bx bx-log-out icon' ></i> Logout</a></li>
			
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card" style="background-color: #D98880;">
					<div class="head">
						<div>
							<h2><?php echo $countCust ?></h2>
							<p>Total Registered Customers</p>
						</div>
						<i class='las la-users la-4x icon' style="margin-top: 10px;"></i>
					</div>
					<!-- <span class="progress" data-value="80%"></span>
					<span class="label">80%</span> -->
				</div>
				
				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $countSP?></h2>
							<p>Total Registered Service Providers</p>
						</div>
						<i class="las la-users-cog la-3x icon" style="margin-top: 10px;"></i>
					</div>
					<!-- <span class="progress" data-value="30%"></span>
					<span class="label">30%</span> -->
				</div>
				
				<div class="card" style="background-color:#80B7D9;">
					<div class="head">
						<div>
							<h2><?php echo $countService?></h2>
							<p>Service Category</p>
						</div>
						<i class="las la-tools la-3x icon" style="margin-top: 10px;"></i>
					</div>
					<!-- <span class="progress" data-value="80%"></span>
					<span class="label">80%</span> -->
				</div>
				<div class="card" style="background-color:#80D9A9;">
					<div class="head">
						<div>
							<h2><?php echo $countBooking?></h2>
							<p>Total Booking</p>
							
						</div>
						<i class="las la-clipboard-list la-3x icon" style="margin-top: 10px;"></i>
					</div>
					<!-- <span class="progress" data-value="80%"></span>
					<span class="label">80%</span> -->
				</div>
				
				
			</div>
			<div class="dashboard">
			<div class="select-container">
				<label for="chart-select" style="font-size: 18px;">Registered Service Provider:</label>
				<select id="chart-select">
					<option value="last1month">Last 1 month</option>
					<option value="last6month">Last 6 month</option>
					<option value="last12month">Last 12 month</option>
				</select>
			</div>
			<canvas id="myChart"></canvas>
			<script>

				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ['Lawn and Garden Cleaning','One Day Maid', 'Pond Cleaning', 'Sofa and Mattress Cleaning', 'Basic Cleaning', 'Premium Cleaning' ],
						datasets: [{
							label: 'Service Providers',
							data: [<?php echo $countLAGC3?>,
							       <?php echo $countODM3?>, 
							       <?php echo $countPC3?>, 
							       <?php echo $countSAMC3?>, 
							       <?php echo $countBHC3?>,
							       <?php echo $countPHC3?>],
							backgroundColor: [ 'rgba(255, 99, 132, 0.2)',
										      'rgba(255, 159, 64, 0.2)',
										      'rgba(255, 205, 86, 0.2)',
										      'rgba(75, 192, 192, 0.2)',
										      'rgba(54, 162, 235, 0.2)',
										      'rgba(153, 102, 255, 0.2)'],
							borderColor: ['rgb(255, 99, 132)',
									      'rgb(255, 159, 64)',
									      'rgb(255, 205, 86)',
									      'rgb(75, 192, 192)',
									      'rgb(54, 162, 235)',
									      'rgb(153, 102, 255)'],
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							y: {
								beginAtZero: true
							} 
						}
					}
				});

				var select = document.getElementById('chart-select');
				select.addEventListener('change', function() {
					var selectedOption = this.value;
					if (selectedOption === 'last1month') {
						chart.data.datasets[0].data = [
								   <?php echo $countLAGC3?>,
							       <?php echo $countODM3?>, 
							       <?php echo $countPC3?>, 
							       <?php echo $countSAMC3?>, 
							       <?php echo $countBHC3?>,
							       <?php echo $countPHC3?>];
						chart.data.datasets[0].label = 'Users';
					} else if (selectedOption === 'last6month') {
						chart.data.datasets[0].data = [5000, 6000, 7000, 8000, 9000, 10000, 11000];
						chart.data.datasets[0].label = 'Revenue';
					} else if (selectedOption === 'last12month') {
						chart.data.datasets[0].data = [30, 35, 40, 45, 50, 55, 60];
						chart.data.datasets[0].label = 'Orders';
					}
					chart.update();
				});

			</script>
			<!-- <div class="data">
				<div class="content-data">
					<div class="head">
						<h3>Analytics</h3>
					</div>
					<div id="chart_div" style="width: 200px; height: 450px;"></div>
					
				</div>
				<div class="content-data">
					<div class="head">
						<h3>Analytics</h3>
					</div>
					<div id="columnchart_values" style="width: 150px; height: 450px;"></div>
					
				</div>
			</div> -->
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/scriptDashboard.js"></script>
</body>
</html>
