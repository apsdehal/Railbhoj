$(document).ready(function(){
	$("#trainid").autocomplete({source: function(request, response) {
	
		        var results = $.ui.autocomplete.filter(keyTrains, request.term);

        response(results.slice(0, 7));
    }
	
})

	$("#leavingstation").autocomplete({
		  source: "search.php",
		  minLength: 1,//search after two characters
		  select: function(event,ui){
			  //do something
			  }
	});
	$("#tostation").autocomplete({
		  source: "search.php",
		  minLength: 1,//search after two characters
		  select: function(event,ui){
			  //do something
			  }
	});

});
