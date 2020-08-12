<html>
<head>
    <title>Opti Technology | Creative software that's easy and fun</title>
<?php
	session_start();
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<img class="big" src="Design/Images/coverbg2.png">
		
		<div class="middle full">
			<h1> Welcome to Opti! </h1>
			<p> Opti is dedicated to providing great software at accessible prices. </p>
			<div class="break"></div><div class="break"></div>
			<h1> Optimator </h1>
			<p> Animation is a painful, time-consuming and experience-requiring process. 
			Optimator automates the worst of it for you so you can get back to the fun part: creating! 
			Optimator is especially handy for creating sprite sheets or animations with complex movements. </p>
			<p><form method="get" action="optimator"><button class="button">
				Find out more!
			</button></form></p>
			<h1> Downloads and Demos </h1>
			<p> There is currently no software or demos available for download. Check the timeline
			to see when releases are coming<?php
			
			if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false)
			{
				echo ", or subscribe to updates below! </p></div>";
				include 'Design/SectorConstants/signup.php';
			}
			else
			{
				echo ".</p></div>";
			}
		?>		
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>