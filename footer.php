        </div><!-- Body div ends here -->
       
        <link rel="stylesheet" href="css/footerstyle.css"/>
                 <div id="imageBanner">
        <ul>
        <li><img src="images/trainimg1.jpg" title="Indian Rail" width="250px" class="trainimage"/></li>
       <li><img src="images/trainimg2.jpg" title="Indian Rail" width="250px" class="trainimage"/></li>
 
        <li><img src="images/trainimg3.jpg" title="Indian Rail" width="250px" class="trainimage"/></li>
 
        </div><!-- Image Banner div ends here -->
        <script>
		$(".trainimage").hover(function(){
		$(this).attr('position','absolute');	
		$(this).attr('z-index','100');
		$(this).attr('width','260px');
		$(this).attr('height','200px');
		$(this).attr('border','2px outset #000');
		},
		function(){
		
		$(this).attr('z-index','0');
		$(this).attr('width','250px');
		$(this).attr('height','190px');
		$(this).attr('border','2px solid #000');

			
        });
        </script>
        <div id="footer">
        </div><!-- footer div ends here -->
      </div><!-- Wrap Div ends here -->
    </div><!-- Main Div ends here -->
  </body>
</html>
