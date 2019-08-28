<?php
	session_start();
	include 'Design/SectorConstants/header.php';
	
	if (!isset($_GET['vericode']) || !isset($_GET['email']))
	{
		// Unverified get, send to home page
		header("location: index.php");
	}	
	else if (isset($_POST['resetpass']))
	{
		$email = cleanEmail($_GET['email']);
		$p1 = cleanInput($_POST['resetpass']);
		$p2 = cleanInput($_POST['resetpassconfirm']);
		$vericode = cleanInput($_GET['vericode']);
		
		if (checkEmail($email) && checkPass($pass) && checkSamePass($p1, $p2))
		{
			emailVerificationPassReset($email, $vericode, $p1);
		}
	}
?>
<body>	
	<section class="content">
		<img class="big" src="Design/Images/coverbg2.png" alt="Lily Welcomes You">
		
		<div class="full middle">
			<h1> Account Verified </h1>
			<p> Your email has been verified! You can now access all of the features on the Opti site and access downloads by logging in with this email. </p>
			<form method="get" action="account_in"><button class="button">
				Login Now!
			</button></form></p>
			<!-- INCLUDE ERROR -->
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>