<?php
	include 'Design/SectorConstants/header.php';
	logoutSession();
?>
<body>	
	<section class="content">
		<div class="head">
			<img src="Design/Images/account_bg.png" alt="Green Padlock">
			<div class="headtext">
				<h1> Logout </h1>
				<div class="separater"></div>
				<p> Successful </p>
			</div>
		</div>
		
		<div class="full middle">
			<h1> Logged Out </h1>
			<p> You have successfully logged out of your account. </p>
		</div>
		
		<div class="signup">
			<h1> Bye bye! </h1>
			<p> We look forward to seeing you again sometime soon!</p>
		</div>	
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>