<?php 
session_start();
if(isset($_COOKIE['name'])){
	$_SESSION['name']=$_COOKIE['name'];
	$_SESSION['phoneno']=$_COOKIE['phoneno'];
}
$page_title='Contact Us';
require_once('head.php');?>
<body>
<div id="main">
<div id="wrap">
<?php
require_once('header.php');
?>
<link rel="stylesheet" href="css/feedbackstyle.css"/>
<?php if(isset($_POST['submit']))
echo '<span class="blue"><span>Thank You for Your valuable feedback</span></span>'; else {
?>
<div id="body">
<div id="form">
<form action="" method="post">
<fieldset>
<legend>Contact Us</legend>
<table>
<tr><td>
<label for="name">Name</label>
</td></tr>
<tr><td>
<input type="text" id="name" name="name" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>"/>
</td></tr>
<tr><td>
<label for="email">Email</label>
</td></tr>
<tr><td>
<input type="email" id="email" name="email"/>
</td></tr>
</table>
<div id="category_div">
<label id="category_row" for="category">Category</label>
<select id="category" name="category">
<option value="General Feedback" selected="selected">General Feedback</option>
<option value="Technical/Customer Support Query">Technical/Customer Support Query</option>
<option value="Jobs and Hiring">Jobs and Hiring</option>
<option value="Praise for Railbhoj">Praise for Railbhoj</option>
<option value="Ideas for us">Ideas for us</option>
<option value="User Interface/Usability Related Info">User Interface/Usability Related Info</option>
<option value"Sales/Pricing Related">Sales/Pricing Related</option>
<option value="Billing Inquiries">Billing Inquiries</option>
</select>
</div>
<p id="category_div" style="color:#084ba8; font-size:14px;">Tell us how happy/unhappy you are w/ us: </p>
<div id="happy">
<label for="radio1">Extremely Happy</label>
<input type="radio" id="radio1" name="happy" />
<label for="radio2">Satisfied</label>
<input type="radio" id="radio2" name="happy" />
<label for="radio3">Not Satisfied</label>
<input type="radio" id="radio3" name="happy" />
<label for="radio4">Planning to Sue</label>
<input type="radio" id="radio4" name="happy" />
</div>
<br/>
<table>
<tr><td>
<label for="message">
Message
</label>
</td></tr>
</table>
<div>
<textarea width="150px" height="100px"></textarea></div>
<input type="submit" value="Submit" name="submit" />
<input type="reset" value="Reset"/>

</fieldset>
</form>
</div>
</div>
</div>
</div>

<?php } ?>
<script> $(document).ready(function(){$("#happy").buttonset();
$("#happy").css("font-size","0.67em");}
)
</script>
</body>
</html>