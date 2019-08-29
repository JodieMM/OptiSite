<?php
	/* LOGGED IN FUNCTIONS */
	
	// Login
	function login($email)
	{
		session_start();
		$_SESSION["loggedin"] = true;
		$_SESSION["email"] = $email;  
	}
	
	// Log Out
	function logout()
	{
		session_start();
		$_SESSION = array();
		session_destroy();
	}	
?>