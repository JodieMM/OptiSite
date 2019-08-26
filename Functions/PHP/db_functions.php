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
	function createAccount($email, $pass)
	{
		global $link;
		global $error;
		
		// Email Check
        $sql = "SELECT email FROM accounts WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "s", $email);
			$email = cleanInput($email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
				{
                    $error = 'This email is already in use.';
				}
            } 
			else
			{
                $error = 'An error occurred. Please try again later.';
            }
        }
        mysqli_stmt_close($stmt);
		
		// Make Account
		if ($error == '')
		{
			$sql = "INSERT INTO accounts (email, pass) VALUES (?, ?)";
			 
			if ($stmt = mysqli_prepare($link, $sql))
			{
				mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
				$email = cleanInput($email);
				$pass = password_hash(cleanInput($pass), PASSWORD_DEFAULT);

				if (mysqli_stmt_execute($stmt))
				{
					// TO DO Send registration email
					header("location: account_sign_up.php");
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
		
        $sql = "SELECT email, pass FROM accounts WHERE email = ?"; // AND confirmed = 1";
        
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "s", $email);
			$email = cleanInput($email);
            
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
							session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"] = $email;                            
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
		
		if ($email != "")
		{
			
		}
		if ($pass != "")
		{
			
		}
	}
	
	function updateNotifications($newSoft, $general)
	{
		global $link;
	}
	
	
	/* DELETE */
	function deleteAccount($email, $pass)
	{
		global $link;
		global $error;
		
		if (login($email, $pass))
		{
			
		}
	}
	
	
	/* LICENSE FUNCTIONS */
	
	// Generate Optimator LICENSE
	function generateOptimator()
	{
		global $link;
		global $error;
	}
	
?>