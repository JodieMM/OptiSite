<?php
	session_start();
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<div class="head">
			<img src="Design/Images/account_bg.png" alt="Green Padlock">
			<div class="headtext">
				<h1> Account Deletion </h1>
				<div class="separater"></div>
				<p> Permanently delete your account. </p>
			</div>
		</div>
		
		<div class="full middle">	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateDelete()" method="post">
			<h1> Delete your Account </h1>
			<p> Permanently delete your account. All of your credentials will be removed from our system. </p>
			<p style="font-weight: bold"> Once you delete your account your licenses will also be deleted. This means you will be unable to 
			update any software you have currently downloaded and will be unable to use any software you have not verified.</p>
			<p style="font-weight: bold"> This action cannot be undone.</p>
			
			<p> To verify you are the correct user, please confirm your details. </p>
			<div class="inputline fourty">
				<input type="textbox" id="deleteemail" name="deleteemail" placeholder="Email" <?php if (isset($_POST['deleteemail'])) {echo 'value = '.cleanEmail($_POST['deleteemail']);}?>>
				<input type="password" id="deletepass" name="deletepass" placeholder="Password">
			</div>
			<div class="inputline">
				<input type="checkbox" id="delcheckbox" name="delcheckbox"> 
				I understand that deleting my account includes permanently deleting my licenses, including those I have paid for.
			</div>
			<p class="error" id="empasserror" <?php if (isset($_POST['deleteemail']) && $error != '') {echo 'style="display:block;"';}?>>
				<?php if (isset($_POST['deleteemail']) && $error != '') {echo $error;}?>
			</p>
			<button class="button" id="deleteaccconfbtn">
				Delete Account
			</button>
		</form>
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>