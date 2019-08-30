<?php
	/* ON RUN FUNCTIONS */
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Log In
		if (isset($_POST['loginemail']))
		{
			if (checkLogIn($_POST['loginemail'], $_POST['loginpassword']))
			{
				login($_POST['loginemail'], $_POST['loginpassword']);
			}
		}
		
		// Sign Up
		else if (isset($_POST['email']))
		{
			if (checkSignUp($_POST['email'], $_POST['password'], $_POST['passwordconfirm'], 'ppcheckbox'))
			{
				createAccount($_POST['email'], $_POST['password']);
			}
		}
		
		// Update Details
		else if (isset($_POST['detemail']))
		{
			if (checkUpdate($_POST['detemail'], $_POST['detpass'], $_POST['detpassconfirm']))
			{
				if (confirmLoggedIn($_SESSION['email']))
				{
					update($_POST['detemail'], $_POST['detpass']);
				}
			}
		}
		else if (isset($_POST['nofiupdate']))
		{
			if (isset($_GET['email']))
			{
				updateNotifications(isset($_POST['detnotinew']), isset($_POST['detnotigen']), $_GET['email']);
			}
			else if (confirmLoggedIn($_SESSION['email']))
			{
				updateNotifications(isset($_POST['detnotinew']), isset($_POST['detnotigen']), $_SESSION['email']);
			}
		}
		
		// Delete Account
		else if (isset($_POST['deleteemail']))
		{
			if (checkDelete($_POST['deleteemail'], $_POST['deletepass'], 'delcheckbox'))
			{
				if (confirmLoggedIn($_SESSION['email']))
				{
					deleteAccount($_POST['deleteemail'], $_POST['deletepass']);
				}
			}
		}
		
		// Reset Password
		else if (isset($_POST['resetemail']))
		{
			if (checkReset($_POST['resetemail']))
			{
				resetPassword($_POST['resetemail']);
			}
		}
		else if (isset($_POST['resetpass']))
		{
			if (checkResetPass($_POST['resetpass'], $_POST['resetpassconfirm']))
			{
				emailVerificationPassReset($_GET['email'], $_GET['vericode'], $_POST['resetpass']);
			}
		}
	}
	
	// Close Connection
	if($link === true)
	{
		mysqli_close($link);
	}
?>