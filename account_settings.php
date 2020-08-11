<?php
	session_start();
	include 'Design/SectorConstants/header.php';
	
	// Get Notification Settings
	global $link;
	$notinewsoft = $notigeneral = false;
	$sql = "SELECT newSoftwareEmails, generalEmails FROM ebdb.accounts WHERE email = ?";
	
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "s", $email);
		$email = cleanEmail($_SESSION["email"]);
		
		// Attempt to execute the prepared statement
		if(mysqli_stmt_execute($stmt))
		{
			mysqli_stmt_store_result($stmt);
			
			if(mysqli_stmt_num_rows($stmt) == 1)
			{                    
				mysqli_stmt_bind_result($stmt, $notinewsoft, $notigeneral);
				mysqli_stmt_fetch($stmt);
				$notinewsoft = boolval($notinewsoft);
				$notigeneral = boolval($notigeneral);
			} 
		} 
		mysqli_stmt_close($stmt);
	}
	
?>
<body>	
	<section class="content">
		<div class="head">
			<h1> Your Account </h1>
			<p> Update your Settings </p>
		</div>
		
		<div class="full middle">	
			<h1> Log Out of Account </h1>
			<form method="get" action="logout"><button class="button">
				Log Out
			</button></form>
		
		<div class="break"></div>
		<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" onsubmit="return validateUpdate()" method="post">
			<h1> Account Settings </h1>
			<div class="inputline details">
				<p>Email</p><input type="email" id="detemail" name="detemail" <?php if (isset($_POST['detemail'])) {echo 'value = '.cleanEmail($_POST['detemail']);}?>></input>
			</div>
			<div class="inputline details">
				<p>Password</p><input type="password" id="detpass" name="detpass"></input>
			</div>
			<div class="inputline details">
				<p>Confirm Password</p><input type="password" id="detpassconfirm" name="detpassconfirm"></input>
			</div>
			<p class="error" id="empasserror"<?php if (isset($_POST['detemail']) && $error != '') {echo 'style="display:block;"';}?>>
				<?php if (isset($_POST['detemail']) && $error != '') {echo $error;}?>
			</p>
			<p style="padding-left: 15%"> Details left blank will not be updated.</p>
			<p style="padding-left: 15%"> You will need to confirm your new email address before it is changed. </p>
			<button class="button" id="updatebtn">
				Update Details
			</button>
		</form>
			
			<div class="break"></div>
			<?php include 'Design/SectorConstants/notification_update.php'; ?>
			
			<div class="break"></div>
			<h1> Licenses </h1>
			<p> You don't currently have any licenses. Register for a Beta or purchase a product to receive a license. </p>
			<p> If you believe there is an error in your licenses, please contact jodie@opti.technology for assistance. </p>
		
			<div class="break"></div><div class="break"></div>
			<h1> Delete Account </h1>
			<p> Permanently delete your account. All of your credentials will be removed from our system. </p>
			<p style="font-weight: bold"> Once you delete your account your licenses will also be deleted. This means you will be unable to 
			update any software you have currently downloaded and will be unable to use any software you have not verified.</p>
			
			<form method="get" action="account_delete"><button class="button" id="deleteaccbtn" href="account_delete">
				Delete Account
			</button></form>
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>