<?php
	include 'email_head.php';

	$reset_pass_email_msg = "
	<html>"
	. $headerContent . "
		<body>
		<div class='header'>
			<img src='https://www.opti.technology/Design/Images/coverbg3.png' alt='Waterfall'>
		</div>
		<div class='content'>
			<h1> Reset your Password </h1>
			<p> Please reset your password using the button below.</p>
			<form target='_blank' action='https://opti.technology/account_pass_reset.php?email=" . $email . "?vericode=" . $vericode . "'>
				<button class='button'> Reset Password </button>
			</form>
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