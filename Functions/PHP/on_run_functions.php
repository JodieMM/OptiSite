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
			if (checkUpdate($_POST['detemail'], $_POST['detpass']))
			{
				update($_POST['detemail'], $_POST['detpass']);
			}
		}
		else if (isset($_POST['nofiupdate']))
		{
			updateNotifications(isset($_POST['detnotinew']), isset($_POST['detnotigen']));
		}
		
		// Delete Account
		else if (isset($_POST['deleteemail']))
		{
			if (checkLogIn($_POST['deletemail'], $_POST['deletepass']))
			{
				deleteAccount($_POST['deletemail'], $_POST['deletepass']);
			}
		}
	}
	
	// Close Connection
	if($link === true)
	{
		mysqli_close($link);
	}
?>