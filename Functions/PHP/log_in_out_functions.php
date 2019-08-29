<?php
	/* LOGGED IN FUNCTIONS */
	
	// Login
	function loginSession($email)
	{
		$cookieKey = uniqid(rand(0, 1000000));
		$key = hash('sha512', $random_string);
		
		global $link;
		global $error;
		
		// Clean any old sessions
		$sql0 = "DELETE FROM logged_in WHERE email = ?";
		if($stmt0 = mysqli_prepare($link, $sql0))
		{
			mysqli_stmt_bind_param($stmt0, "s", $email);
			$email = cleanEmail($email);
			if(mysqli_stmt_execute($stmt0))
			{
				$sql = "INSERT INTO logged_in (email, key) VALUES (?, ?)";
        
				if($stmt = mysqli_prepare($link, $sql))
				{
					mysqli_stmt_bind_param($stmt, "ss", $email, $key);
					$email = cleanEmail($email);
					
					// Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmt))
					{
						// Login
						setcookie('validuser', $cookieKey, time()+3600*30, '/');
						session_start();
						$_SESSION["loggedin"] = true;
						$_SESSION["email"] = $email;  
					} 
					mysqli_stmt_close($stmt);
				}
			}
		}
	}
	
	// Log Out
	function logoutSession()
	{
		session_start();
		$_SESSION = array();
		session_destroy();
		
		setcookie('validuser', '', time()-3600);
		unset($_COOKIE['validuser']);
	}	
	
	// Confirm Logged In
	function confirmLoggedIn($email)
	{
		global $error;
		global $link;

		$sql = "SELECT email, key FROM logged_in WHERE email = ? AND key = ?";
		if (isset($_COOKIE['validuser']) && $stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "ss", $email, $key);
			$email = cleanEmail($email);
			$key = hash('sha512', cleanInput($_COOKIE['validuser']));
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
				{                    
					return true;
				}
			}
		}
		return false;
	}
?>