<html>
<head>
    <title>Opti Technology | Optimator</title>
<?php
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<div class="head">
			<h1> Optimator </h1>
			<p> Simple 2D Animation Software </p>
		</div>
		<div class="middle full">
			<h1> Optimator </h1>
			
			<iframe class="yt" src="https://www.youtube.com/embed/a9-X-TDy3ZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
			<p> Optimator is animation software that uses orthographic projection to
			create a full 2D model of a shape. This means it's faster and easier than traditional
			2D animation.</p>
			
			<div class="break"></div>
			<h1> Downloads </h1>
			<p> Whoo! Check out the free open beta!</p>
			
			<?php
				if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false)
				{
					echo "
					<p>To download the beta, you must log in. Don't have an account? Sign up for free today!</p>
					";
				}
				else
				{
					echo "					
					<p><form method=\"get\" action=\"Software/OptimatorBeta.zip\"><button class=\"button\">
						Beta Download
					</button></form></p>
					<p>To use the beta, unzip the file and run setup. Note that the files you create in the beta
					may not be compatible with the full version.</p>
					<p>If you encounter any issues, please contact <a href=\"mailto:jodie@opti.technology\">jodie@opti.technology</a>. 
					We'd also love to see the awesome things you create! Get started using our tutorials below.</p>
					";
				}
			?>
			
			<div class="break"></div>
			<h1> Tutorials </h1>
			<p> See Optimator in work and learn new techniques with the official video tutorials! </p>
			<button class="button" rel="noopener noreferrer" onclick=" window.open('https://www.youtube.com/playlist?list=PLPa90e_a9ym09_D2TicBnUTZm3aCdsAPb','_blank')">Tutorial Playlist</button>
			
			<!--
			<div class="break"></div>
			<h1> Backlog and Bugfixing </h1>
			
			<div class="list">Working Sets</div>
			<div class="list">I/O for SetsForm rotation and turn boards</div>
			<div class="list">(Successfully) Bring back Turn!</div>
			<div class="list">TabIndex Updating</div>
			<div class="list">Speed Increase (Gotta Go Fast!)</div>
			<div class="list">(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧ Undo!</div>
			
			<div class="break"></div>
			<p> If you find a bug not mentioned here when running the latest version of Optimator, please email us at <a href="mailto:jodie@opti.technology">jodie@opti.technology</a>.</p>
			-->
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>