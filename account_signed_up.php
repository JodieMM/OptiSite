<html>
<head>
    <title>Opti Technology | Signed Up</title>
<?php
	session_start();
	include 'Design/SectorConstants/header.php';
	
	if (!isset($_GET['vericode']) || !isset($_GET['email']) || !emailVerification($_GET['email'], $_GET['vericode']))
	{
		// Unverified get, send to home page
		header("location: index.php");
	}	
?>
<body>	
	<section class="content">
		<div class="head">
			<h1> Account Signed Up </h1>
			<p> Successful </p>
		</div>
		
		<div class="full middle">
			<h1> Account Verified </h1>
			<p> Your email has been verified! You can now access all of the features on the Opti site and access downloads by logging in with this email. </p>
			<form method="get" action="account_in"><button class="button">
				Login Now!
			</button></form></p>
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>