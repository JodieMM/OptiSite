<?php
	/* VALIDATION PIECES */
	
	// Clean Input
	function cleanInput($in)
	{
		return trim($in);
	}
	
	// Email
	function checkEmail($em)
	{
		global $error;
		$correct = preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/", $em);
		if (!$correct && $error == '')
		{
			$error = 'Please enter a valid email address.';
		}
		return $correct;
	}
	
	// Password
	function checkPass($pass)
	{
		global $error;
		$correct = strlen($pass) >= 6;
		if (!$correct && $error == '')
		{
			$error = 'Your password must be at least 6 characters.';
		}
		return $correct;
	}
	
	function checkSamePass($p1, $p2)
	{
		global $error;
		$correct = ($p1 == $p2);
		if (!$correct && $error == '')
		{
			$error = 'Passwords must match.';
		}
		return $correct;
	}
	
	// Checkboxes
	function checkCheckbox($cb)
	{
		global $error;
		if (!isset($_POST[$cb]) && $error == '')
		{
			$error = 'You must accept the Privacy Policy and Terms and Conditions to make an account.';
		}
		return $cb;
	}
	
	
	/* VALIDATION FUNCTIONS */
	
	// Sign Up
	function checkSignUp($em, $p1, $p2, $cb)
	{
		$em = cleanInput($em);
		$p1 = cleanInput($p1);
		$p2 = cleanInput($p2);
		
		if (!checkEmail($em) || !checkPass($p1) || !checkSamePass($p1, $p2) || !checkCheckbox($cb))
		{
			return false;
		}
		return true;
	}
	
	// Log In
	function checkLogIn($em, $p1)
	{
		$em = cleanInput($em);
		$p1 = cleanInput($p1);
		
		if (!checkEmail($em) || !checkPass($p1))
		{
			return false;
		}
		return true;
	}
	
	// Update
	function checkUpdate($em, $p1)
	{
		$em = cleanInput($em);
		$p1 = cleanInput($p1);
		
		if (($em != "" && !checkEmail($em)) || ($p1 != "" && !checkPass($p1)))
		{
			return false;
		}
		else if ($em == "" && $p1 == "")
		{
			return false;
		}
		return true;
	}
	
?>