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