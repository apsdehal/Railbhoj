$(function(){
	    var pickerOpts = {
	        showOn: "button",
			 buttonImage: "images/button.png",
	        buttonText: "Show Datepicker",
			float:"left"
	    }; 
	    $("#datepicker").datepicker(pickerOpts);
		 $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
		 	$('#datepicker').datepicker("option","changeMonth",true);
			$(".ui-widget").css("fontSize", "0.67em");
			$('#datepicker').datepicker("option","changeYear",true);	}).next(".ui-datepicker-trigger").addClass("trigger");
			