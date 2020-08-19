<?php
	include 'email_head.php';

	$welcome_email_msg = "
	<html>"
	. $headerContent . "
		<body>
		<div class='header'>
			<h1> Welcome to Opti! </h1>
		</div>
		<div class='content'>
			<p> Thank you for signing up to Opti! You can now access software downloads and subscribe to updates.</p>
			<p>If you need any assistance, please contact <a href='mailto:jodie@opti.technology'>jodie@opti.technology</a>.</p>
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