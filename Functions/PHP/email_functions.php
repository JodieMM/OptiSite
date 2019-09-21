<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	/* EMAIL FUNCTIONS */
	
	// Send Email
	function sendEmail($to, $subject, $message)
	{
		// Local
		//require 'C:\Users\jodie\vendor\autoload.php';
		
		// Server
		if ((include 'vendor/autoload.php') != TRUE) {
			echo 'An error occurred. Please try again later.';
			return false;
		}
		
		$from = 'jodie@opti.technology';
		$fromName = 'Opti Jodie';
		
		$usernameSmtp = 'AKIATPFSF56B67H6HL4W';
		$passwordSmtp = 'BJpYHEjpoScVK7G5I1ezvS87iUPL26IUoe5oePAVrm1A';
		$host = 'email-smtp.us-west-2.amazonaws.com';
		$port = 587;
		
		$mail = new PHPMailer(true);
		try {
			// Specify the SMTP settings.
			$mail->isSMTP();
			$mail->setFrom($from, $fromName);
			$mail->Username   = $usernameSmtp;
			$mail->Password   = $passwordSmtp;
			$mail->Host       = $host;
			$mail->Port       = $port;
			$mail->SMTPAuth   = true;
			$mail->SMTPSecure = 'tls';
			$mail->addAddress($to);

			// Specify the content of the message.
			$mail->isHTML(true);
			$mail->Subject    = $subject;
			$mail->Body       = $message;
			//$mail->AltBody    = $bodyText;
			$mail->Send();
			//echo "Email sent!" , PHP_EOL;
		} catch (phpmailerException $e) {
			echo "An error occurred.";
			//echo "An error occurred {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
			return false;
		} catch (Exception $e) {
			echo "An error occurred."; 
			//echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
			return false;
		}
		return true;
	}	
	
	
	/* EMAIL VERIFICATIONS */
	
	function emailVerification($email, $vericode)
	{
		global $link;
		global $error;
		
		// Try Verifying New Account
		if (!checkEmailUnused($email))
		{
			$sql = "SELECT email, vericode FROM opti_db.verification_codes WHERE email = ? AND vericode = ? AND use_code = 'R'";
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
						$sql2 = "UPDATE opti_db.accounts SET confirmed = 1 WHERE email = ?";
						if ($stmt2 = mysqli_prepare($link, $sql2))
						{
							mysqli_stmt_bind_param($stmt2, "s", $email);
							if (mysqli_stmt_execute($stmt2))
							{
								// Clean DB
								$sql3 = "DELETE FROM opti_db.verification_codes WHERE email = ?";
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
			$sql = "SELECT email, vericode, replacement FROM opti_db.verification_codes WHERE replacement = ? AND vericode = ? AND use_code = 'U'";
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
						
						$sql2 = "UPDATE opti_db.accounts SET email = ? WHERE email = ?";
						if ($stmt2 = mysqli_prepare($link, $sql2))
						{
							mysqli_stmt_bind_param($stmt2, "ss", $replacement, $currem);
							if (mysqli_stmt_execute($stmt2))
							{
								// Clean DB
								$sql3 = "DELETE FROM opti_db.verification_codes WHERE email = ? OR email = ?";
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
		global $link;
		global $error;
		
		$sql = "SELECT email, vericode FROM opti_db.verification_codes WHERE email = ? AND vericode = ? AND use_code = 'P'";
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
					$sql2 = "UPDATE opti_db.accounts SET pass = ? WHERE email = ?";
					if ($stmt2 = mysqli_prepare($link, $sql2))
					{
						mysqli_stmt_bind_param($stmt2, "ss", $pass, $email);
						$pass = password_hash(cleanInput($pass), PASSWORD_DEFAULT);
						
						if (mysqli_stmt_execute($stmt2))
						{
							// Clean DB
							$sql3 = "DELETE FROM opti_db.verification_codes WHERE email = ? AND use_code = 'P'";
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