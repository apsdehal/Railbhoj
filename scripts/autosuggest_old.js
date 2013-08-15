$(document).ready(function(){
	$('.autosuggest1').keyup(function(){
		var search_term = $(this).val();
		$.post("search.php",{search_term:search_term},function(data){
			$('.result1').html(data);
			$('.result1 li').click(function(){
				var result = $(this).text();
				$('.autosuggest1').val(result);	
				$('.result1').html(''); 
			});
		});
		});
		$('.autosuggest2').keyup(function(){
		var search_term = $(this).val();
		$.post("search.php",{search_term:search_term},function(data){
			$('.result2').html(data);
			$('.result2 li').click(function(){
				var result = $(this).text();
				$('.autosuggest2').val(result);
				$('.result2').html(''); 
			});
		});
		});
		$('#datepicker').datepicker({
changeMonth:true,
changeYear:true,
dateFormat:'dd/mm/yy',
//fontsize: 8 px
});
$(".ui-widget").css("fontSize", "0.67em");
});
