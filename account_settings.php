<?php
	include 'Design/SectorConstants/header.php';
	session_start();
?>
<body>	
	<section class="content">
		<div class="head">
			<img src="Design/Images/coverbg2.png" alt="TBD">
			<div class="headtext">
				<h1> Your Account </h1>
				<div class="separater"></div>
				<p> Update your Settings </p>
			</div>
		</div>
		
		<div class="full middle">	
			<h1> Logout of Account </h1>
			<form method="get" action="logout"><button class="button">
				Logout
			</button></form>
		
		<div class="break"></div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateUpdate()" method="post">
			<h1> Account Settings </h1>
			<div class="inputline details">
				<p>Email</p><input type="textbox" id="detemail" name="detemail" <?php if (isset($_POST['detemail'])) {echo 'value = '.trim($_POST['detemail']);}?>></input>
			</div>
			<div class="inputline details">
				<p>Password</p><input type="textbox" id="detpass" name="detpass"></input>
			</div>
			<p class="error" id="empasserror"<?php if (isset($_POST['detemail']) && $error != '') {echo 'style="display:block;"';}?>>
				<?php if (isset($_POST['detemail']) && $error != '') {echo $error;}?>
			</p>
			<p style="padding-left: 15%"> Details left blank will not be updated. </p>
			<button class="button" id="updatebtn">
				Update Details
			</button>
		</form>
			
		<div class="break"></div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="inputline details">
				<p>Receive Emails about New Software</p><input type="checkbox" id="detnotinew" name="detnotinew"></input>
			</div>
			<div class="inputline details">
				<p>Receive General Update Emails</p><input type="checkbox" id="detnotigen" name="detnotigen"></input>
			</div>
			<input type="hidden" name="nofiupdate">
			<button class="button" id="updatenotibtn">
				Update Notifications
			</button>
			
			<div class="break"></div>
			<h1> Licenses </h1>
			<p> You don't currently have any licenses. Register for a Beta or purchase a product to receive a license. </p>
			<p> If you believe there is an error in your licenses, please contact jodie@opti.technology for assistance. </p>
		</form>
		
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