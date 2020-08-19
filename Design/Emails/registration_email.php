<?php
	include 'email_head.php';
	
	$registration_email_msg = "
	<html>"
	. $headerContent . "
		<body>
		<div class='header'>
			<h1> Please Confirm your Email </h1>
		</div>
		<div class='content'>
			<p> Please confirm your email using the button below.</p>
			<a class='button' target='_blank' href='https://www.opti.technology/account_signed_up.php?email=" . $email . "&vericode=" . $vericode . "'>
				Verify Account
			</a>
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