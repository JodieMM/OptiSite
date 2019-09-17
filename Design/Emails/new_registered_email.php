<?php
	include 'email_head.php';
	
	$new_registered_email_msg = "
	<html>"
	. $headerContent . "
		<body>
		<div class='header'>
			<img src='https://www.opti.technology/Design/Images/coverbg3.png' alt='Waterfall'>
		</div>
		<div class='content'>
			<h1> A new email has been registered for your Opti account </h1>
			<p> A confirmation email has been sent to " . $email . ". Once that email has been confirmed, 
			this email address will no longer be registered with your Opti account and you will not be able to use it to
			log in or make changes.</p>
			<p>If you did not register this change, please contact <a href='mailto:jodie@opti.technology'>jodie@opti.technology</a>
			to ensure you maintain access to your account. If you can still access your account, it is recommended you change 
			your password to prevent unauthorised access.</p>
			</br>
			<p style='font-weight: bold'> Visit <a href='https://www.opti.technology/' target='_blank'>Opti</a></p>
		</div>
		<div class='footer'>
			<p> You can change your notification settings 
			<a href='https://www.opti.technology/account_unsubscribe.php?email=". $emailcurr ."' target='_blank'>here</a>. </p>
		</div>
		</body>
	</html>	
	";
?>