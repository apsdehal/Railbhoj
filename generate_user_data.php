<?php 
session_start();
if(isset($_COOKIE['name'])){
	$_SESSION['name']=$_COOKIE['name'];
	$_SESSION['phoneno']=$_COOKIE['phoneno'];
}
$page_title='Complete the Order';
require_once('head.php');
?>
<link rel="stylesheet" href="css/confirmstyle.css" type="text/css"/>
<body>
<div id="main">
  <div id="wrap">
	  <?php 
      require_once('header.php');
      ?>
  <div id="body">

	  <?php 
	  if(!isset($_SESSION['error'])){
	  //Check if both options are empty
	  if((!empty($_POST['depdate']) && !empty($_POST['trainid']) && !empty($_POST['tostation']) && !empty($_POST['leavingstation'])) || !empty($_POST['pnr'])){
      if(!empty($_POST['pnr'])){
          
          
      $pnr= $_POST['pnr'];
	  $_SESSION['pnr']=$pnr;
      
      //Using json api to extract info based on pnr
      //Check http://pnrapi.alagu.net for more info
         // header("Content-Type:application/json");
		 $_SESSION['pnr']=$pnr;
          $data= file_get_contents("http://pnrapi.alagu.net/api/v1.0/pnr/$pnr");
          $obj= json_decode($data,true);
          $result= array();
          if($obj['status']=='OK'){
			  $result['seatno']=$obj['data']['passenger'][0]['seat_number'];
          $result['train_name']= $obj['data']['train_name'];
          $result['train_id']=$obj['data']['train_number'];
          $result['from']=$obj['data']['from']['code'].'/'.$obj['data']['from']['name'];
          $result['to']=$obj['data']['to']['code'].'/'.$obj['data']['to']['name'];         
		  $result['depdate']=$obj['data']['travel_date']['date'];
          $result['alight']=$obj['data']['alight']['code'].'/'.$obj['data']['alight']['name'];
          $result['board']=$obj['data']['board']['code'].'/'.$obj['data']['board']['name'];
          } else {$_SESSION['error']='Please enter a valid PNR no.';
		  //show error at generate user data to false
		  $_SESSION['showerroratgud']=false;
              echo '<p class="error">Please enter a valid PNR no.</p><br/>';
              echo '<p>Redirecting you back to main page</p>';
			   sleep(5);
              //Stop then redirect
              $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
          header('Location: '.$home_url);
      }} else {
		  $depdate=$_POST['depdate'];
          $train=explode("/",$_POST['trainid']);
		  $train_id=$train[0];
		  $result['train_name']=$train[1];
		  $to=$_POST['tostation'];
		  $from=$_POST['leavingstation'];
		  $result=array();
		  $result['train_id']=$train_id;
		  $result['from']=$from;
		  $result['to']=$to;
		  $result['depdate']=$depdate;
		  $result['train_name']=$train[1];
		  }} else {
		  $_SESSION['error']='Please enter the form completely';
		  //show error at generate user data to false
		  $_SESSION['showerroratgud']=false;

		  echo '<p class="error">Please enter the form completely</p>';
          echo '<p>Redirecting back in 5 sec.</p>';
		  sleep(3);
          //Stop then redirect
		                $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
          header('Location: '.$home_url);}
      //Store everything in session
      if(isset($result['train_name']))
          $_SESSION['train_name']= $result['train_name'];
          $_SESSION['train_id']=$result['train_id'];
          $_SESSION['from']=$result['from'];
          $_SESSION['to']=$result['to'];
          $_SESSION['depdate']=$result['depdate'];
      if(isset($_SESSION['pnr'])){	
          $_SESSION['alight']=$result['alight'];
          $_SESSION['board']=$result['board'];
		  $_SESSION['seatno']=$result['seatno'];
	  }
	  }?>
        <div id="form">
          <form action="endorder.php" method="post">
          <fieldset>
            <legend>Complete to Enter</legend>
              <table>
                <tr>
                  <td>
                    <label for="name">Full Name</label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" name="name" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?>"required/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="phoneno">Phone No</label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" maxlength="10" name="phoneno" value="<?php if(isset($_SESSION['phoneno'])) echo $_SESSION['phoneno'];?>" required />
                  </td>
                </tr>
              <?php if(!isset($_SESSION['pnr'])){ ?>
              <tr>
                <td>
                  <label for="seatno">Seat No.</label>
                </td>
                <td>
                  <label for="coachno">Coach No.</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="seatno" />
                </td>
                <td>
                  <input type="text" name="coachno"/>
                </td>
              </tr>
          <?php } ?>
                <tr>
                  <td>
                    <label for="email">Email: </label>
                  
                    <input type="email" name="email" required/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>No. of Dinner and Lunch:</label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="Dinner">Dinner</label>
                  
                    <select id="Dinner" name="Dinner">
                       <option value="0">0</option> 
                      <option value="1" selected="selected">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </td>
                  <td>
                    <label for="Lunch">Lunch</label>
                                      <select id="Lunch" name="Lunch">
                      <option value="0">0</option> 
                      <option value="1" selected="selected">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </td>
                </tr>
                </table>                    
                <input type="submit" name="submit" value="Confirm"/>
                  
                <input type="reset" name="reset" value="Reset"/>
            </fieldset>
          </form>
         </div> <!--form div end her -->
         
         <?php
		 echo '<div id="preferences">';
		 echo '<p>Your current preferences are as given below:</p>';
		 echo '<ul>';
		 echo '<li>Train Details<ul><li> ';
		 if(isset($_SESSION['train_name'])){
		 echo "<span class='blue'>".$_SESSION['train_name'].'</span></li><li>';}
		 echo "<span class='blue'>".$_SESSION['train_id'].'</span></li></ul></li>';
		 echo '<li>Train From: '."<span class='blue'>".$_SESSION['from'].'</span></li>';
		 echo '<li>Train To: '."<span class='blue'>".$_SESSION['to'].'</span></li>';
		 if(isset($_SESSION['seatno']))
		 echo '<li>Seat No.: '."<span class='blue'>".$_SESSION['seatno'].'</span></li>';
		 echo '</ul>';
		 echo '<p>If these aren\'t correct. <a href="index.php">Fill Again</a></p>';
		 echo '</div>';
		 ?>
         <!-- preferences div ends here -->
         <?php if(isset($_SESSION['showerroratgud']))
				   if($_SESSION['showerroratgud'])
					   if(isset($_SESSION['error'])){
						  echo "<script> alert('".$_SESSION['error']."'); </script>"; } ?>
         
    <?php 
	  require_once('footer.php') 
	?>
    