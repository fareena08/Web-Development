<?php
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
<html>
<center>
<h1>TRY</h1>
<label>Service:
    <select>
        <option>-- Select Service --</option>
        <?php foreach ($results as $output){?>
        <option><?php echo $output["fld_service_name"];?></option>
            
        <?php } ?>
    </select>
</label>
</center>
</html>