<?php
	include 'email_head.php';
	
	$registration_email_msg = "
	<html>"
	. $headerContent . "
		<body>
		<div class='header'>
			<img src='https://www.opti.technology/Design/Images/coverbg3.png' alt='Waterfall'>
		</div>
		<div class='content'>
			<h1> Please Confirm your Email </h1>
			<p> Please confirm your email using the button below.</p>
			<form target='_blank' action='https://opti.technology/account_signed_up.php?email=" . $email . "?vericode=" . $vericode . "'>
				<button class='button'> Verify Account </button>
			</form>
			<p> This link will expire in 10 days </p>
			<p>If you did not sign up with Opti, you can ignore this email and nothing will happen. 
			If you continue to receive this email, please contact <a href='mailto:jodie@opti.technology'>jodie@opti.technology</a>.</p>
			</br>
			<p style='font-weight: bold'> Visit <a href='https://www.opti.technology/' target='_blank'>Opti</a></p>
		</div>
		<div class='footer'>
			<p> You can change your notification settings once your account has been registered
			<a href='https://www.opti.technology/account_unsubscribe.php?email=". $email ."' target='_blank'>here</a>. </p>
		</div>
		</body>		
		</html>	
	";
?>