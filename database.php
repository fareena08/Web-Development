<?php
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a181538";
$password = "cutewhiteturtle";
$dbname = "a181538";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
