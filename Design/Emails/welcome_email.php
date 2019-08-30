<?php
	$headContent = file_get_contents('email_head.php');

	$welcome_email_msg = "
	<html>"
	. $headContent . "
		<body>
		<div class='header'>
			<img src='../Images/coverbg3.png' alt='Waterfall'>
		</div>
		<div class='content'>
			<h1> Welcome to Opti! </h1>
			<p> Thank you for signing up to Opti! You can now access software downloads and subscribe to updates.</p>
			<p>If you need any assistance, please contact <a href='mailto:jodie@opti.technology'>jodie@opti.technology</a>.</p>
			</br>
			<p style='font-weight: bold'> Visit <a href='https://www.opti.technology/' target='_blank'>Opti</a></p>
		</div>
		<div class='footer'>
			<p> You can change your notification settings 
			<a href='https://www.opti.technology/account_unsubscribe?email=". $email ."' target='_blank'>here</a>. </p>
		</div>
		</body>
	</html>	
	";
?>