<?php
require_once('connectvars.php');
header("Content-type: application/json");
$data = file_get_contents('railwaystations.json');
$results= json_decode($data,true);
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
foreach($results['data'] as $result){
	$query= "INSERT INTO stations(station_name,station_code) VALUES('".$result['name']."','".$result['code']."')";
	mysqli_query($dbc,$query) or die(mysqli_error()) ;
}
echo 'Yes';
?>