<!DOCTYPE html>
<html>
<head>
	<title>Total Income</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	</style>
</head>
<body>

	<form method="post" action="">
		<label for="year">Select Year:</label>
		<select name="year" id="year">
			<option value="">Select</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2019">2019</option>
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>
	
	<canvas id="lineChart2" ></canvas>
	<script>
		Chart.scaleService.updateScaleDefaults('linear', {
					ticks: {
						min: 0,
						max: 1000,
						stepSize: 100
					}
				});
		var ctx = document.getElementById('lineChart2').getContext('2d');
		var chart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: [],
		        datasets: [{
		            label: 'Total Income',
		            data: [],
		            backgroundColor: 'rgba(255, 99, 132, 0.2)',
		            borderColor: 'rgba(255, 99, 132, 1)',
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

</body>
</html>

