<?php
	session_start();
	include 'Design/SectorConstants/header.php';
	
	if (!isset($_GET['vericode']) || !isset($_GET['email']))
	{
		// Unverified GET, send to home page
		header("location: index.php");
	}	
?>
<body>	
	<section class="content">
		<img class="big" src="Design/Images/coverbg2.png" alt="Lily Welcomes You">
		
		<div class="full middle">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?email=" . cleanEmail($_GET['email']) . "&vericode=" . cleanInput($_GET['vericode']) ?>" onsubmit="return validateResetPass()" method="post">
			<h1> Password Reset </h1>
			<p> Please enter a new password for your email account <?php echo cleanEmail($_GET['email'])?>.</p>
			<div class="inputline">
				<input type="password" id="resetpass" name="resetpass" placeholder="New Password">
				<input type="password" id="resetpassconfirm" name="resetpassconfirm" placeholder="Confirm New Password">
			</div>
			<p class="error" id="resetpasserror" <?php if (isset($_POST['resetpass']) && $error != '') {echo 'style="display:block;"';}?>>
				<?php if (isset($_POST['resetpass']) && $error != '') {echo $error;}?>
			</p>
			<button class="button" id="resetnewpassbtn">Reset Password</button>
		</form>
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>