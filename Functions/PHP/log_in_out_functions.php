<?php
	/* LOGGED IN FUNCTIONS */
	
	// Login
	function loginSession($email)
	{
		session_start();
		$_SESSION["loggedin"] = true;
		$_SESSION["email"] = $email;  
	}
	
	// Log Out
	function logoutSession()
	{
		session_start();
		$_SESSION = array();
		session_destroy();
	}	
	
	// Confirm Logged In
	function confirmLoggedIn($email)
	{
		global $error;
		global $link;
		$email = cleanEmail($email);
	}
?>