<?php
session_start();
?>
<?php 
$page_title= 'Welcome to Rail Bhoj';
require_once('head.php');
?>
<link rel="stylesheet" href="css/indexstyle.css" type="text/css"/>
<body>

<script src="scripts/datepicker.js"></script>
<div id="main">
  <div id="wrap">
    <?php require_once('header.php') ?>
    <div id="body"> 
      <div id="form">
      <form action="generate_user_data.php" method="post">
      <fieldset>
      <legend><img src="images/book_your_food.png" width="250px" height="45px" alt="Book Your Food"></legend>
      <div id="forminside">
      <table>
        <tr>
          <td>
            <label for ="trainid">Train Name or No.</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="trainid" id="trainid" title="Enter train name or no">
          </td>
        </tr>
       
          <tr>
          <td>
            <label for="leavingstation">Leaving Station</label>
          </td>
          <td>
            <label for="tostation">Going To</label>
          </td>
        </tr>
        <tr>
          <td>      
            <input type="text" name="leavingstation" class="autosuggest1"  id="leavingstation">
              <div class="dropdown">
               <ul class="result1">
               </ul>
              </div>
          </td>
           <td>     
              <input name="tostation" type="text" class="autosuggest2" id="tostation">
              <div class="dropdown">
               <ul class="result2">
               
               </ul>
              </div>
          </td>
        </tr>
        <tr>
          <td id="calenderrow">
            <label for="depdate">Departure Date</label><br/>
          </td>
        </tr>
        <tr>
          <td>
              <input name="depdate" type="text" placeholder="DD/MM/YYYY" id="datepicker">
          </td>
      </tr>
      
    </table>
    <div id="orimg">
      <input name="or" type="image" src="images/or3.jpg" alt="OR" width="45" height="35" id="orimglogo">
      </div>
      <br/>
    <table>
      <tr>
        <td>
            <label for="pnr" >PNR</label><br/>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="pnr" value="" id="pnr" title="Enter the 10 Digit PNR No.">
        </td>
      </tr>
      
    </table>
    <div id="submit">
    <input type="hidden" name="set" value="yes">
    <input type="reset" name="reset" value="Reset">
    <input type="submit" name="submit" value="Book Order" >
    </div>
    </div>
    </fieldset>
      </form>
      <script src="scripts/autosuggest.js"></script>
      </div><!-- Form div ends here-->
      <div id="error">
      <p> <?php //Check for any errors
	  if(isset($_SESSION['error'])){
		  echo $_SESSION['error']; }
		  ?>

      <script src="scripts/disabled.js"></script>
      <?php //Check for any errors
	  if(isset($_SESSION['error'])){
		  echo '<script> $("#error").dialog({
			  title:"Error",
			  buttons: { "OK": function() { $(this).dialog("close"); }}}); </script>'; }
		  ?>

      </div>
      <script> $(document).tooltip({
	  items:'input',
	  show:500,
	  show:'bounce',
	  hide:500}); </script>
<?php
$_SESSION=array();
session_destroy();
 require_once('footer.php');?>
      