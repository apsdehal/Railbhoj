$("#datepicker").blur(function(){
	if(($("#trainid").val().length>0) && ($("#leavingstation").val().length>0) && ($("#tostation").val().length>0)){
		$("#pnr").attr("disabled",true);
		$("#pnr").attr("title","");
	}});
$("#datepicker").blur(function(){
	if(($("#trainid").val().length==0) || ($("#leavingstation").val().length==0) || ($("#tostation").val().length==0)){
		$("#pnr").attr("disabled",false);
		$("#pnr").attr("title","Enter the 10 digit PNR No.");
	}});
$(document).tooltip({
	  items:'input',
	  show:500,
	  show:'bounce',
	  hide:500}); 

 
  	  
$(document).ready(function(){var i=0;

$("#pnr").blur(function(){			  
		  var pnrNo= $(this).val();
			  $.post("search.php?pnr=yes",{pnrNo:pnrNo},function(data){
				  if(i==0)
				  var msg= $("<p id='pnrError'></p>");
				 else
				 var msg=$('#pnrError');
				  if(data=='OK'){
					  msg.html('');
				  msg.html("<img src='images/right.jpg' alt='right'> Valid PNR");
				  msg.css('color','#093');
				  
			  } else {
				  msg.html('');
				  msg.html("<img src='images/wrong.png' alt='wrong'> Invalid PNR.Please check it");
				  msg.css('color','#F00');
			  }
			  if(i==0)
			  $("form fieldset").append(msg);
			  
			  i++;
				  });});});
$("input[type=reset]").click(function(){
	$("#pnrError").html('');});			