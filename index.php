<html>
<head>
    <title>Opti Technology | Creative software that's easy and fun</title>
<?php
	session_start();
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<div class="notice">
			<h1> The Optimator Beta is now here! </h1>
			
			<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" onsubmit="return validateAcceptedTC()" method="post">
				<div class="inputline">
					<input type="hidden" name="tccheckboxsent" value="0">
					<input type="checkbox" id="tccheckbox" name="tccheckbox"> 
					I understand and agree to the <a target="_blank", href="privacy_policy">Privacy Policy</a> and Optimator <a target="_blank", href="terms_and_conditions">Terms and Conditions.</a>
				</div>
				<p class="error" id="betaerror" <?php if (isset($_POST['tccheckboxsent']) && $error != '') {echo 'style="display:block;"';}?>>
					<?php if (isset($_POST['tccheckboxsent']) && $error != '') {echo $error;}?>
				</p>
				<div class="inputline">
					<button id="betacheckbtn">Try it now!</button>
				</div>
				<p class='exp'>To use the beta, unzip the file and run setup.</p>
				<p class='exp'> After trying the software, please fill in the <a href="https://forms.gle/yYxjXxAJqsPCUKRW6" target='_blank'>beta survey</a>
				 so we can improve!</p>
				<br>
			</form>
			
		</div>
		
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
			<p> The Optimator free Beta is available to download! Check the timeline
			to see when new releases are coming<?php
			
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