<?php
	
	/* EMAIL FUNCTIONS */
	
	// Send Email
	function sendEmail($to, $subject, $message)
	{
		$from = 'jodie@opti.technology';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '. $from . "\r\n";
		$headers .= 'Reply-To: '. $from . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
        
        if(mail($to, $subject, $message, $headers))
		{
            return true;
        }
		return false;
	}	
	
	
	/* EMAIL VERIFICATIONS */
	
	function emailVerification($email, $vericode)
	{
		// Try Verifying New Account
		if (!checkEmailUnused($email))
		{
			$sql = "SELECT email, vericode FROM verification_codes WHERE email = ? AND vericode = ? AND use_code = 'R'";
			if ($stmt = mysqli_prepare($link, $sql))
			{
				mysqli_stmt_bind_param($stmt, "ss", $email, $vericode);
				$email = cleanEmail($email);
				$vericode = cleanInput($vericode);
				
				if (mysqli_stmt_execute($stmt))
				{
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) > 0)
					{
						$sql2 = "UPDATE accounts SET confirmed = 1 WHERE email = ?";
						if ($stmt2 = mysqli_prepare($link, $sql2))
						{
							mysqli_stmt_bind_param($stmt2, "s", $email);
							if (mysqli_stmt_execute($stmt2))
							{
								// Clean DB
								$sql3 = "DELETE FROM verification_codes WHERE email = ?";
								if ($stmt3 = mysqli_prepare($link, $sql3))
								{
									mysqli_stmt_bind_param($stmt3, "s", $email);
									mysqli_stmt_execute($stmt3);
									mysqli_stmt_close($stmt3);
								}	
								
								// Send welcome email
								include 'Design/Emails/welcome_email.php';
								sendEmail($email, 'Welcome to Opti!', $welcome_email_msg);						
								return true;
							}
							mysqli_stmt_close($stmt2);
						}
					}
				}
				mysqli_stmt_close($stmt);
			}
		}
		// Try Verifying Updated Email
		else
		{
			$sql = "SELECT email, vericode, replacement FROM verification_codes WHERE replacement = ? AND vericode = ? AND use_code = 'U'";
			if ($stmt = mysqli_prepare($link, $sql))
			{
				mysqli_stmt_bind_param($stmt, "ss", $replacement, $vericode);
				$replacement = cleanEmail($email);
				$vericode = cleanInput($vericode);
				
				if (mysqli_stmt_execute($stmt))
				{
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) > 0)
					{
						mysqli_stmt_bind_result($stmt, $currem, $vericode, $replacement);
						$currem = cleanEmail($currem);
						
						$sql2 = "UPDATE accounts SET email = ? WHERE email = ?";
						if ($stmt2 = mysqli_prepare($link, $sql2))
						{
							mysqli_stmt_bind_param($stmt2, "ss", $replacement, $currem);
							if (mysqli_stmt_execute($stmt2))
							{
								// Clean DB
								$sql3 = "DELETE FROM verification_codes WHERE email = ? OR email = ?";
								if ($stmt3 = mysqli_prepare($link, $sql3))
								{
									mysqli_stmt_bind_param($stmt3, "ss", $email, $currem);
									mysqli_stmt_execute($stmt3);
									mysqli_stmt_close($stmt3);
								}								
								return true;
							}
							mysqli_stmt_close($stmt2);
						}
					}
				}
				mysqli_stmt_close($stmt);
			}
		}
		return false;
	}
	
	function emailVerificationPassReset($email, $vericode, $pass)
	{
		$sql = "SELECT email, vericode FROM verification_codes WHERE email = ? AND vericode = ? AND use_code = 'P'";
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "ss", $email, $vericode);
			$email = cleanEmail($email);
			$vericode = cleanInput($vericode);
			
			if (mysqli_stmt_execute($stmt))
			{
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) >= 1)
				{
					$sql2 = "UPDATE accounts SET pass = ? WHERE email = ?";
					if ($stmt2 = mysqli_prepare($link, $sql2))
					{
						mysqli_stmt_bind_param($stmt2, "ss", $pass, $email);
						$pass = cleanInput($pass);
						if (mysqli_stmt_execute($stmt2))
						{
							// Clean DB
							$sql3 = "DELETE FROM verification_codes WHERE email = ? AND use_code = 'P'";
							if ($stmt3 = mysqli_prepare($link, $sql3))
							{
								mysqli_stmt_bind_param($stmt3, "s", $email);
								mysqli_stmt_execute($stmt3);
								mysqli_stmt_close($stmt3);
							}	
							header("location: account_pass_reset_success.php");
						}
						mysqli_stmt_close($stmt2);
					}
				}
			}
			mysqli_stmt_close($stmt);
		}
	}
?>