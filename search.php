<?php
if(isset($_GET['pnr']) && $_GET['pnr']=='yes'){
$pnrNo=$_POST['pnrNo'];
$data= file_get_contents("http://pnrapi.alagu.net/api/v1.0/pnr/$pnrNo");
          $obj= json_decode($data,true);
          $result= array();
          if($obj['data']['train_number']){
			  echo 'OK';
		  } else {
			  echo 'NotOk';
}} else {
require_once("connectvars.php");
$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(isset($_GET['term']) && !empty($_GET['term'])){
	$search_term=mysqli_real_escape_string($dbc,trim($_GET['term']));
	$query="SELECT station_code,station_name FROM stations WHERE station_name LIKE '$search_term%' OR station_code LIKE '$search_term%' ORDER BY station_name LIMIT 6";
	$data=mysqli_query($dbc,$query);
	while($row=mysqli_fetch_array($data)){
		//$response['label']=$row['station_name'].'   ('.$row['station_code'].')';
		$response['value']=$row['station_name'].'   ('.$row['station_code'].')';
	$row_set[]=$response;
	}
	echo json_encode($row_set);
}}
?>