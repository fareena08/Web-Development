<?php

include('database.php');

if(isset($_POST["action"]))
{ 

	$query = " SELECT * FROM tbl_sp WHERE fld_sp_status = 'Approved'";
	if(isset($_POST["service"]))
	{
		$service_filter = implode("','", $_POST["service"]);
		$query .= "
		AND fld_service_name IN('".$service_filter."')
		"; 
	}
	if(isset($_POST["location"]))
	{
		$locate_filter = implode("','", $_POST["location"]);
		$query .= "
		AND fld_location IN('".$locate_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
			<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
			<img src="images/'. $row['fld_image'] .'" alt="" class="img-fluid" >
			<p align="center"><strong><a href="#">'. $row['fld_sp_name'] .'</a></strong></p>
			<h4 style="text-align:center;" class="text-danger" >'. $row['fld_price'] .'</h4>
			<p>Location : '. $row['fld_location'].'<br />
			Address : '. $row['fld_sp_addr'] .'</p>
			</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>

