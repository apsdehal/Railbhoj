<?php
session_start();
$page_title='Order Booked';
require_once('head.php');

require_once('connectvars.php'); ?>
<link rel="stylesheet" type="text/css" href="css/endorderstyle.css"/>
<body>
<div id="main">
<div id="wrap">


<?php 
require_once('header.php');?>

<div id="body">
<?php
if(!isset($_POST['submit'])){
	$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
	header('Location: '.$home_url);
}
if(!empty($_POST['name']) && !empty($_POST['phoneno']) && !empty($_POST['email']) && !empty($_POST['Dinner']) && !empty($_POST['Lunch'])){
	$_SESSION['name']=$_POST['name'];
	$_SESSION['phoneno']=$_POST['phoneno'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['dinner']=$_POST['Dinner'];
	$_SESSION['lunch']=$_POST['Lunch'];
	if(!isset($_SESSION['pnr'])){
		if(!empty($_POST['seatno']) && !empty($_POST['coachno']))$_SESSION['seatno']= $_POST['seatno'].'/ '.$_POST['coachno'];
	 else {
		$_SESSION['error']='Please enter the seatno and coachno.';
		//show error at generate user data to true
		$_SESSION['showerroratgud']=true;
	
	sleep(3);
	$home_url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/generate_user_data.php';
	header('Location: '.$home_url);
	} }} else { $_SESSION['error']='Please enter the form completely';
	//show error at generate user data to true
		$_SESSION['showerroratgud']=true;
		
			sleep(3);
	$home_url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/generate_user_data.php';
	header('Location: '.$home_url);
	}
	$name=$_SESSION['name'];
	$phoneno=$_SESSION['phoneno'];
	setcookie('name',$name,time()+(60*60*24*60));
	setcookie('phoneno',$phoneno,time()+(60*60*34*60));
	echo '<div id="finalresult">';
	echo 'Your order has been successfully completed';
	$msg1="Name: <span class='blue'> ".$_SESSION['name']."</span><br/><br/>PhoneNo: <span class='blue'> ".$_SESSION['phoneno']."</span><br/><br/>SeatNo.: <span class='blue'> ".$_SESSION['seatno']."</span><br/><br/>No. of Lunch(s): <span class='blue'>".$_SESSION['lunch']."</span>&nbsp; &nbsp;No of dinner(s): <span class='blue'>".$_SESSION['dinner']."</span><br/><br/>";
	$msg2="Train: <span class='blue'>".$_SESSION['train_id']."</span><br/><br/>Train From<span class='blue'>: ".$_SESSION['from']."</span>&nbsp; &nbsp;Train to: <span class='blue'>".$_SESSION['to']."</span><br/><br/>Departure Date:<span class='blue'> ".$_SESSION['depdate'].'</span>';
	echo '<p>'.$msg1.$msg2.'</p>';
	echo '<p>An email has been sent to <span class="blue">'.$_SESSION['email'].'</span> with all the order related information</p>';
require_once('footer.php');
?>		
	