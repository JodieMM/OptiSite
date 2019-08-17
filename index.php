<?php
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<img class="big" src="Design/Images/coverbg2.png">
		
		<div class="middle full">
			<h1> Welcome to Opti! </h1>
			<p> Opti is dedicated to providing great software at accessible prices. </p>
			<p> There is currently no software or demos available for download. Check the timeline
			to see when releases are coming, or subscribe to updates below! </p>
		</div>
		
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
				I understand and agree to the <a target="_blank", href="privacy_policy">Privacy Policy</a> and Opti <a target="_blank", href="terms_and_conditions">Terms and Conditions.</a>
			</div>
			<p class="error" id="signuperror"></p>
			<div class="inputline">
				<button id="signupbtn">Sign Up</button>
			</div>
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>