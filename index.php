<!DOCTYPE html>

<html>
	<head>
		<script src="bower_components/jquery/dist/jquery.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>	
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<title>Peter B Smith | Project Manager</title>
	</head>
	<body>
		<header>
			<div class="logo">
				<a href="index.php"><h1>Peter B Smith</h1></a>
				<h2>Project Manager</h2>
			</div>
			<img src="img/menu.png" alt="menu button" class="menu-button">
			<nav>
				<ul>
					<li><a href="index.php">ABOUT</a></li>
					<li><a href="index.php">RESUMÉ</a></li>
					<li><a href="http://www.github.com/peterbsmith2">GITHUB</a></li>
					<li><a href="index.php">CONTACT</a></li>
				</ul>
			</nav>
		</header>
		<div class="wrapper">
			<section>
				<ul class="portfolio">
					<li>
						<p class="year top-year">2015</p>
						<ul class="project-list">
						<a href="project.php">
							<li class="project">
								<p>KChat+MBTI</p>
								<img src="img/portfolio-01.png" alt="KCHAT+MBTI Screenshot">
							</li>
						</a>
						</ul>
					</li>
					<li>
						<p class="year">2013</p>
						<ul class="project-list">
							<li class="project">
								<p>Bear Games</p>
								<img src="img/portfolio-03-temp.png" alt="Bear Games Screenshot">
							</li>
						</ul>
					</li>
					<li>
						<p class="year">2012</p>
						<ul class="project-list">
							<li class="project">
								<p>Island Dogs</p>
								<img src="img/portfolio-02-temp.png" alt="Island Dogs Screenshot">
							</li>
						</ul>
					</li>
				</ul>
			</section>
			<footer>
				<h6 class="copyright">Designed + Developed by Peter B Smith &copy; 2015</h6>
			</footer>
		</div>

		

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
	</body>
</html>