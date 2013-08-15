<?php
require_once("connectvars.php");
$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(isset($_POST['search_term']) && !empty($_POST['search_term'])){
	$search_term=mysqli_real_escape_string($dbc,trim($_POST['search_term']));
	$query="SELECT station_code,station_name FROM stations WHERE station_name LIKE '$search_term%' OR station_code LIKE '$search_term%' ORDER BY station_name LIMIT 6";
	$data=mysqli_query($dbc,$query);
	while($row=mysqli_fetch_array($data)){
	echo '<li>'.$row['station_name'].'&nbsp;&nbsp;('.$row['station_code'].')</li>';	
	}
}
?>