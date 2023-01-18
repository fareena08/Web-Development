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

//Total Registered Customer
// check for a form submission
if (isset($_POST['submit'])) {
    // get the selected month and year
	$month = $_POST['month'];
	$year = $_POST['year'];

    // create the query to get the number of registered customers
	$query = "SELECT COUNT(*) as total FROM tbl_customer WHERE MONTH(postdate) = '$month' AND YEAR(postdate) = '$year'";

    // execute the query
	$result = mysqli_query($conn, $query);

    // get the number of registered customers
	$data = mysqli_fetch_assoc($result);
	$total = $data['total'];
}
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
		table {
			border-collapse: collapse;
			width: 300px;
		}
		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}
		th {
			background-color: #f2f2f2;
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

					<div class="card" style="background-color: #CBC3E3;">
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

				
				<div class="data" style="width: 900px;">
					<div class="content-data" >
						<div class="head">
							<h3>Number of Booking for Each Service Category in the last 1/6/12 months</h3>
						</div>
						<div class="dashboard">
							<div class="select-container">
								<label for="chart-select" style="font-size: 18px;">Num of Booking:</label>
								<select id="chart-select" style="font-size: 16px;">
									<option value="last1month">Last 1 month</option>
									<option value="last6month">Last 6 month</option>
									<option value="last12month">Last 12 month</option>
								</select>
							</div>
							<canvas id="myChart"></canvas>
							<script>
				// Set the tick size of the y-axis to 1
				Chart.scaleService.updateScaleDefaults('linear', {
					ticks: {
						min: 0,
						max: 10,
						stepSize: 1
					}
				});

				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ['Lawn and Garden Cleaning','One Day Maid', 'Pond Cleaning', 'Sofa and Mattress Cleaning', 'Basic Cleaning', 'Premium Cleaning' ],
						datasets: [{
							label: 'Booking by Category',
							fill: false,
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
						chart.data.datasets[0].label = 'Booking by Category';
					} else if (selectedOption === 'last6month') {
						chart.data.datasets[0].data = [
						<?php echo $countLAGC4?>,
						<?php echo $countODM4?>, 
						<?php echo $countPC4?>, 
						<?php echo $countSAMC4?>, 
						<?php echo $countBHC4?>,
						<?php echo $countPHC4?>];
						chart.data.datasets[0].label = 'Booking by Category';
					} else if (selectedOption === 'last12month') {
						chart.data.datasets[0].data = [
						<?php echo $countLAGC5?>,
						<?php echo $countODM5?>, 
						<?php echo $countPC5?>, 
						<?php echo $countSAMC5?>, 
						<?php echo $countBHC5?>,
						<?php echo $countPHC5?>];
						chart.data.datasets[0].label = 'Booking by Category';
					}
					chart.update();
				});

			</script>

		</div>

	</div>

			<!-- <div class="content-data">
					<div class="head">
						<h3>Analytics</h3>
					</div>
					<div id="columnchart_values" style="width: 50px; height: 450px;"></div>
					
				</div> -->

				<div class="content-data" >
					<div class="head">
						<h3>Number of Registered Customers by Month</h3>
					</div>
					<div class="chartMenu">

					</div>
					<div class="chartCard" >
						<div class="chartBox" >
							<canvas id="lineChart" style="width:600px; height: 300px;"></canvas>
							<input type="month" onchange="filterChart(this)">
						</div>
					</div>

					
					<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
					<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>
					<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
					<script>
    // setup 
    const data = {
    	labels: ['2022-01-01', '2022-01-05','2022-01-31'],
    	datasets: [{
    		label: 'Weekly Sales',
    		data: [<?php echo $countLAGC3?>,
    		<?php echo $countODM3?>, 
    		<?php echo $countPC3?>, 
    		<?php echo $countSAMC3?>, 
    		<?php echo $countBHC3?>,
    		<?php echo $countPHC3?>],
    		backgroundColor: 'rgba(255, 99, 132, 0.2)',
    		borderColor: 'rgba(255, 99, 132, 1)',
    		borderWidth: 1
    	}]
    };

    // config 
    const config = {
    	type: 'line',
    	data,
    	options: {
    		scales: {
    			x: {
    				min: '2022-01-01',
    				max: '2022-01-31',
    				type: 'time',
    				time: {
    					unit: 'day'
    				}
    			},
    			y: {
    				beginAtZero: true
    			}
    		}
    	}
    };

    // render init block
    const lineChart = new Chart(
    	document.getElementById('lineChart'),
    	config
    	);

    function filterChart(date){
    	console.log(date.value);
    	const year = date.value.substring(0, 4);
    	const month = date.value.substring(5, 7);
    	console.log(month);

    	const lastDay = (y, m) => {
    		return new Date(y, m, 0).getDate()
    	}

    	lastDay(year, month);


    	const startDate = `${date.value}-01`;
    	const endDate = `${date.value}-${lastDay(year, month)}`;

    	lineChart.config.options.scales.x.min = startDate;
    	lineChart.config.options.scales.x.max = endDate;
    	lineChart.update();
    }

</script>

</div>
<div class="content-data">
	<div class="head">
		<h3>Number Of Registered Customer</h3>
	</div>
	<form method="post" action="">
		<label for="month">Select Month:</label>
		<select name="month">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>


			<!-- add options for the remaining months -->
		</select>

		<label for="year">Select Year:</label>
		<select name="year">
			<option value="">Please Select Year</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<!-- add options for the remaining years -->
		</select>

		<input type="submit" name="submit" value="Submit">
	</form>

	<?php if (isset($total)) : ?>
		<input type="text" value="<?php echo $total; ?>" disabled>
	<?php endif; ?>

</div>
<div class="content-data">
	<div class="head">
		<h3>Analytics</h3>
	</div>
	<table>
		<tr>
			<th>Rank</th>
			<th>Provider</th>
		</tr>
		<?php
		include 'database.php';
		$query = "SELECT fld_sp_name, count(fld_sp_name) as num FROM tbl_booking GROUP BY fld_sp_name ORDER BY num DESC LIMIT 3";
		$result = mysqli_query($conn, $query);
		$rank = 1;
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $rank . "</td>";
			echo "<td>" . $row['fld_sp_name'] . "</td>";
			echo "</tr>";
			$rank++;
		}
		mysqli_close($conn);
		?>
	</table>
<!-- 
				<div class="content-data">
					<div class="head">
						<h3>Analytics</h3>
					</div>
					<div id="columnchart_values" style="width: 150px; height: 450px;"></div>
					
				</div>
			-->


		</div>
		

	</main>
	<!-- MAIN -->
</section>
<!-- NAVBAR -->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/scriptDashboard.js"></script>
</body>
</html>
