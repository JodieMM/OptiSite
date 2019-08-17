<?php
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<div class="signup">
			<h1> Sign Up </h1>
			<p> Create an Opti account to download software or register for updates. </p>
			<div class="inputline">
				<input type="textbox" id="email" placeholder="Email">
				<input type="password" id="password" placeholder="Password">
				<input type="password" id="passwordconfirm" placeholder="Confirm Password">
			</div>
			<div class="inputline">
				<input type="checkbox" id="ppcheckbox"> 
				I understand and agree to the <a target="_blank", href="privacy_policy">Privacy Policy</a>
			</div>
			<p class="error" id="signuperror"></p>
			<div class="inputline">
				<button id="signupbtn">Sign Up</button>
			</div>
		</div>
		
		<div class="full middle">
			<h1> Log In </h1>
			<p> Login to your existing account to update your details or download new software. </p>
			<div class="inputline fourty">
				<input type="textbox" id="loginemail" placeholder="Email">
				<input type="password" id="loginpassword" placeholder="Password">
			</div>
			<p class="error" id="empasserror"></p>
			<a class="button lowbtn" id="loginbtn">
				Log In
			</a>
		</div>	
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>