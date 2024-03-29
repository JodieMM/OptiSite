<?php
	include 'email_head.php';

	$reset_pass_email_msg = "
	<html>"
	. $headerContent . "
		<body>
		<div class='header'>
			<h1> Reset your Password </h1>
		</div>
		<div class='content'>
			<p> Please reset your password using the button below.</p>
			<a class='button' target='_blank' href='https://www.opti.technology/account_pass_reset.php?email=" . $email . "&vericode=" . $vericode . "'>
				Reset Password
			</a>
			<p> This link will expire in 10 days </p>
			<p>If you did not ask to reset your password, you can ignore this email and nothing will happen. 
			If you require assistance, please contact <a href='mailto:jodie@opti.technology'>jodie@opti.technology</a>.</p>
			</br>
			<p style='font-weight: bold'> Visit <a href='https://www.opti.technology/' target='_blank'>Opti</a></p>
		</div>
		<div class='footer'>
			<p> You can change your notification settings
			<a href='https://www.opti.technology/account_unsubscribe.php?email=". $email ."' target='_blank'>here</a>. </p>
		</div>
		</body>		
		</html>	
	";
?>