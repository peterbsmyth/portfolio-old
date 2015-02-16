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
					<li><a href="index.php">GITHUB</a></li>
					<li><a href="index.php">CONTACT</a></li>
				</ul>
			</nav>
		</header>
		<div class="wrapper">
			<section class="content-container">
				<div class="project-title">
					<p>KChat+MBTI</p>
				</div>
				<div class="project-photo">
					<img src="img/portfolio-01.png" alt="KCHAT+MBTI Screenshot">
				</div>
				<div class="project-info group">
					<div class="project-description">
						<h3>Description</h3>
						<p>I was in a chatroom and one day and the topic of MBTI types came up. Soon enough everyone in the room was taking a online test to determine their type. As the results came in it became clear that many in the room had types that were rare in the general population. I independently began collecting the data. Wanting to learn more about databases, I built a small MySQL database to house the data. Wanting to learn more about web development, I built this small site in PHP to display the results.</p>
					</div>
					<div class="info-box" id="project-plan">
						<p><a href="project-plan.png">Project Plan</a></p>
					</div>
					<div class="info-box" id="sfd">
						<p><a href="sfd.png">Screen Flow Diagram</a></p>
					</div>
					<div class="info-box" id="github">
						<p><a href="http://github.com">Repo: GitHub</a></p>
					</div>
					<div class="info-box" id="project-link">
						<p><a href="http://www.kchatmbti.com/">Link to Site</a></p>
					</div>
					<div class="info-box" id="project-type">
						<p>Type: Personal</p>
					</div>
					<div class="info-box" id="project-size">
						<p>Size: Small</p>
					</div>
				</div>
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