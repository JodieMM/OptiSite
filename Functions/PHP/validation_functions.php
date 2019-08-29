<?php
	/* VALIDATION PIECES */
	
	// Clean Input
	function cleanInput($in)
	{
		return filter_var(trim($in), FILTER_SANITIZE_STRING);
	}
	
	function cleanEmail($em)
	{
		return filter_var(trim($em), FILTER_SANITIZE_EMAIL); 
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
	function checkCheckbox($cb, $errmsg)
	{
		global $error;
		if (!isset($_POST[$cb]))
		{
			if ($error == '')
			{
				$error = $errmsg;
			}
			return false;
		}
		return true;
	}
	
	
	/* VALIDATION FUNCTIONS */
	
	// Sign Up
	function checkSignUp($em, $p1, $p2, $cb)
	{
		$em = cleanEmail($em);
		$p1 = cleanInput($p1);
		$p2 = cleanInput($p2);
		
		if (!checkEmail($em) || !checkPass($p1) || !checkSamePass($p1, $p2) || !checkCheckbox($cb, 'You must accept the Privacy Policy and Terms and Conditions to make an account.'))
		{
			return false;
		}
		return true;
	}
	
	// Log In
	function checkLogIn($em, $p1)
	{
		$em = cleanEmail($em);
		$p1 = cleanInput($p1);
		
		if (!checkEmail($em) || !checkPass($p1))
		{
			return false;
		}
		return true;
	}
	
	// Update
	function checkUpdate($em, $p1, $p2)
	{
		$em = cleanEmail($em);
		$p1 = cleanInput($p1);
		
		if (($em != "" && !checkEmail($em)) || (($p1 != "" || $p2 != "") && (!checkPass($p1) || !checkSamePass($p1, $p2))))
		{
			return false;
		}
		else if ($em == "" && $p1 == "" && $p2 == "")
		{
			return false;
		}
		return true;
	}
	
	// Delete
	function checkDelete($em, $p1, $cb)
	{
		$em = cleanEmail($em);
		$p1 = cleanInput($p1);
		
		if (checkLogIn($em, $p1))
		{
			return checkCheckbox($cb, 'You must accept the terms to delete your account.');
		}
		return false;
	}
	
	// Reset
	function checkReset($em)
	{
		$em = cleanEmail($em);
		
		if (checkEmail($em))
		{
			return true;
		}
		return false;
	}
	
	function checkResetPass($p1, $p2)
	{
		$p1 = cleanInput($p1);
		$p2 = cleanInput($p2);
		
		if (checkPass($p1) && checkSamePass($p1, $p2))
		{
			return true;
		}
		return false;
	}
	
?>