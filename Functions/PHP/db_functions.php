<?php
	/* GENERAL FUNCTIONS */
	
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'opti_db');
	
	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$error = '';
	
	// Check connection
	if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	
	
	/* CREATE ACCOUNT */
	function checkEmailUnused($email)
	{
		global $link;
		global $error;
		
		// Email Check
        $sql = "SELECT email FROM accounts WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "s", $email);
			$email = cleanEmail($email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1)
				{
                    $error = 'This email is already in use.';
				}
				else
				{
					mysqli_stmt_close($stmt);
					return true;
				}
            } 
			else
			{
                $error = 'An error occurred. Please try again later.';
            }
			mysqli_stmt_close($stmt);
        }
		return false;
	}
	
	function createAccount($email, $pass)
	{
		global $link;
		global $error;
		
		if (checkEmailUnused($email))
		{
			$sql = "INSERT INTO accounts (email, pass) VALUES (?, ?)";
			 
			if ($stmt = mysqli_prepare($link, $sql))
			{
				mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
				$email = cleanEmail($email);
				$pass = password_hash(cleanInput($pass), PASSWORD_DEFAULT);

				if (mysqli_stmt_execute($stmt))
				{
					// Add verification code to DB
					$sql2 = "INSERT INTO verification_codes (email, vericode, use) VALUES (?, ?, 'R')";
			 
					if ($stmt2 = mysqli_prepare($link, $sql2))
					{
						mysqli_stmt_bind_param($stmt2, "ss", $email, $vericode);
						$vericode = bin2hex(random_bytes(50));

						if (mysqli_stmt_execute($stmt2))
						{
							// Send registration email
							include 'Design/Emails/registration_email.php';
							sendEmail($email, 'Opti Email Registration', $registration_email_msg);
						}
						else
						{
							$error = 'An error occurred. Please try again later.';
						}
						mysqli_stmt_close($stmt2);
					}
					else
					{
						$error = 'An error occurred. Please try again later.';
					}
				} 
				else
				{
					$error = 'An error occurred. Please try again later.';
				}
				mysqli_stmt_close($stmt);
			}
		}
    }
	
	
	/* LOGIN */
	function login($email, $pass)
	{
		global $link;
		global $error;
		
        $sql = "SELECT email, pass FROM accounts WHERE email = ? AND confirmed = 1";
        
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "s", $email);
			$email = cleanEmail($email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                mysqli_stmt_store_result($stmt);
				
                if(mysqli_stmt_num_rows($stmt) == 1)
				{                    
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
					{
                        if(password_verify($pass, $hashed_password))
						{
							loginSession(cleanEmail($email));                          
                            header("location: account_settings.php");
                        } 
						else
						{
                            $error = "Invalid email or password.";
                        }
                    }
                } 
				else
				{
                    $error = "Invalid email or password.";
                }
            } 
			else
			{
                $error = "An error occurred. Please try again later.";
            }
			mysqli_stmt_close($stmt);
        }
	}
	
	
	/* UPDATE */
	function update($email, $pass)
	{
		global $link;
		global $error;
		
		if ($email != "" && checkEmailUnused($email))
		{
			$sql = "INSERT INTO verification_codes (email, vericode, replacement, use) VALUES (?, ?, ?, 'U')";
			 
			if ($stmt = mysqli_prepare($link, $sql))
			{
				mysqli_stmt_bind_param($stmt, "sss", $emailcurr, $vericode, $email);
				$email = cleanEmail($email);
				$emailcurr = cleanEmail($_SESSION["email"]);
				$vericode = bin2hex(random_bytes(50));

				if (mysqli_stmt_execute($stmt))
				{
					// Send registration email
					include 'Design/Emails/registration_email.php';
					if (sendEmail($email, 'Your New Email Address', $registration_email_msg))
					{
						// Send warning to old address
						include 'Design/Emails/new_registered_email.php';
						sendEmail($emailcurr, 'Updated Email Address', $new_registered_email_msg);
					}
					else
					{
						$error = 'An error occurred. Please try again later.';
					}
				} 
				else
				{
					$error = 'An error occurred. Please try again later.';
				}
				mysqli_stmt_close($stmt);
			}
		}
		
		if ($pass != "")
		{
			$sql2 = "UPDATE accounts SET pass = ? WHERE email = ?";
        
			if($stmt2 = mysqli_prepare($link, $sql2))
			{
				mysqli_stmt_bind_param($stmt2, "ss", $pass, $emailcurr);
				$emailcurr = cleanEmail($_SESSION["email"]);
				$pass = password_hash(cleanInput($pass), PASSWORD_DEFAULT);
				
				// Attempt to execute the prepared statement
				if (!mysqli_stmt_execute($stmt2))
				{
					$error = 'An error occurred. Please try again later.';
				};
				mysqli_stmt_close($stmt2);
			}
			else
			{
				$error = 'An error occurred. Please try again later.';
			}
		}
	}
	
	function updateNotifications($newSoft, $general)
	{
		global $link;
		
        $sql = "UPDATE accounts SET newSoftwareEmails = ?, generalEmails = ? WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "iis", $newSoft, $general, $email);
			$email = cleanEmail($_SESSION["email"]);
			$newSoft = intval($newSoft);
			$general = intval($general);
            
            // Attempt to execute the prepared statement
            mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
        }
	}
	
	
	/* DELETE */
	function deleteAccount($email, $pass)
	{
		global $link;
		global $error;
		
        $sql = "SELECT email, pass FROM accounts WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "s", $email);
			$email = cleanEmail($email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                mysqli_stmt_store_result($stmt);
				
                if(mysqli_stmt_num_rows($stmt) >= 1)
				{                    
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
					{
                        if(password_verify($pass, $hashed_password) && cleanEmail($_SESSION["email"]) == $email)
						{
							$sql2 = "DELETE FROM accounts WHERE email = ?";
							if($stmt2 = mysqli_prepare($link, $sql2))
							{
								mysqli_stmt_bind_param($stmt2, "s", $email);
								
								// Attempt to execute the prepared statement
								mysqli_stmt_execute($stmt2);
								mysqli_stmt_close($stmt2);
							}
							
							// Log Out User
							$_SESSION = array();
							session_destroy();
							
                            header("location: account_deleted.php");
                        } 
						else
						{
                            $error = "Invalid email or password.";
                        }
                    }
                } 
				else
				{
                    $error = "Invalid email or password.";
                }
            } 
			else
			{
                $error = "An error occurred. Please try again later.";
            }
			mysqli_stmt_close($stmt);
        }
	}
	
	
	/* RESET PASSWORD */
	function resetPassword($email)
	{
		global $link;
		global $error;
		
		$email = cleanEmail($email);
		if (!checkEmailUnused($email))
		{
			// Check Email Confirmed
			$sql0 = "SELECT email, confirmed FROM accounts WHERE email = ? AND confirmed = 1";
			if ($stmt0 = mysqli_prepare($link, $sql0))
			{	
				mysqli_stmt_bind_param($stmt0, "s", $email);
				if (mysqli_stmt_execute($stmt0))
				{
					mysqli_stmt_store_result($stmt0);
					if(mysqli_stmt_num_rows($stmt0) >= 1)
					{
						$sql = "INSERT INTO verification_codes (email, vericode, use) VALUES (?, ?, 'P')";
						 
						if ($stmt = mysqli_prepare($link, $sql))
						{
							mysqli_stmt_bind_param($stmt, "ss", $email, $vericode);
							$vericode = bin2hex(random_bytes(50));

							if (mysqli_stmt_execute($stmt))
							{
								// Send email
								include 'Design/Emails/reset_pass_email.php';
								if (!sendEmail($email, 'Reset Your Password', $reset_pass_email_msg))
								{
									$error = 'An error occurred. Please try again later.';
								}
							} 
							else
							{
								$error = 'An error occurred. Please try again later.';
							}
							mysqli_stmt_close($stmt);
						}
						else
						{
							$error = 'An error occurred. Please try again later.';
						}
					}
					else
					{
						$error = "This email is not currently verified with Opti.";
					}
				}
				else
				{
					$error = 'An error occurred. Please try again later.';
				}
			}
			else
			{
				$error = 'An error occurred. Please try again later.';
			}
		}
		else
		{
			$error = "This email is not currently registered with Opti.";
		}
	}
	
	
	/* LICENSE FUNCTIONS */
	
	// Generate Optimator License
	function generateOptimator()
	{
		global $link;
		global $error;
	}
	
?>