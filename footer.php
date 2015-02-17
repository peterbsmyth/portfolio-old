			<footer>
				<h6 class="copyright">Designed + Developed by Peter B Smith &copy; 2015</h6>
			</footer>

		

			<script type="text/javascript">
			 
			$(document).ready(function(){


				$(".menu-button").on('click', function() {
			 		$("nav").slideToggle(300);
			 	});

			});
			 
			</script>

			<script>
				$(document).ready(function() {
				    // run test on initial page load
				    checkSize();

				    // run test on resize of the window
				    $(window).resize(checkSize);
			});

				//Function to the css rule
			function checkSize(){
			    if ($(".menu-button").css("display") == "none" ){
			        $("nav").show();
			    }

			    if ($(".menu-button").css("display") != "none" ){
			        $("nav").hide();
			    }
			}

			</script>

			<script src="contact_form.js"></script>
	</body>
</html>