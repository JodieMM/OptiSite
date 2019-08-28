<?php
//!isset($_GET['vericode']) || !isset($_GET['email']) || !emailVerification($_GET['email'], $_GET['vericode']))

	$registration_email_msg = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body>
		<p>This email contains HTML Tags!</p>
		<p>This email should make sense for new or updated emails</p>
		<p> Let them know there's a time limit on registration </p>
		<button href=link?email=" . $email . "?vericode=" . $vericode . "
		<table>
		<tr>
		<th>Firstname</th>
		<th>Lastname</th>
		</tr>
		<tr>
		<td>John</td>
		<td>Doe</td>
		</tr>
		</table>
		</body>
		</html>	
	";
?>