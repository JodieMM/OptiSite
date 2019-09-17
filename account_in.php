<?php
	session_start();
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
	{
		header("location: account_settings.php");
		exit;
	}
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<?php
			include 'Design/SectorConstants/signup.php';
		?>
		
		<div class="full middle">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateLogin()" method="post">
			<h1> Log In </h1>
			<p> Login to your existing account to update your details or download new software. </p>
			<div class="inputline fourty">
				<input type="textbox" id="loginemail" name="loginemail" placeholder="Email" <?php if (isset($_POST['loginemail'])) {echo 'value = '.cleanEmail($_POST['loginemail']);}?>>
				<input type="password" id="loginpassword" name="loginpassword" placeholder="Password">
			</div>
			<p class="error" id="empasserror"<?php if (isset($_POST['loginemail']) && $error != '') {echo 'style="display:block;"';}?>>
				<?php if (isset($_POST['loginemail']) && $error != '') {echo $error;}?>
			</p>
			<button class="button lowbtn" id="loginbtn">
				Log In
			</button>
		</form>
		
		<div class="break"></div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateReset()" method="post">
			<h1> Forgotten your password? </h1>
			<div class="inputline fourty">
				<input type="textbox" id="resetemail" name="resetemail" placeholder="Email" <?php if (isset($_POST['resetemail'])) {echo 'value = '.cleanEmail($_POST['resetemail']);}?>>
			</div>
			<p class="error" id="reseterror"<?php if (isset($_POST['resetemail']) && $error != '') {echo 'style="display:block;"';}?>>
				<?php if (isset($_POST['resetemail']) && $error != '') {echo $error;}?>
			</p>
			<button class="button lowbtn" id="resetbtn">Reset Password</button>
		</form>
		</div>	
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>