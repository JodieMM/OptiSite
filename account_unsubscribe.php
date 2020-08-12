<html>
<head>
    <title>Opti Technology | Unsubscribe</title>
<?php
	session_start();
	if (!isset($_GET['email']))
	{
		header("location: index");
	}	
	include 'Design/SectorConstants/header.php';
	
	
	// Get Notification Settings
	global $link;
	$notinewsoft = $notigeneral = false;
	$sql = "SELECT newSoftwareEmails, generalEmails FROM ebdb.accounts WHERE email = ? AND confirmed = 1";
	
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "s", $email);
		$email = cleanEmail($_GET["email"]);
		
		// Attempt to execute the prepared statement
		if(mysqli_stmt_execute($stmt))
		{
			mysqli_stmt_store_result($stmt);
			
			if(mysqli_stmt_num_rows($stmt) == 1)
			{                    
				mysqli_stmt_bind_result($stmt, $notinewsoft, $notigeneral);
				mysqli_stmt_fetch($stmt);
				$notinewsoft = boolval($notinewsoft);
				$notigeneral = boolval($notigeneral);
			} 
			else
			{
				header("location: index");
			}
		} 
		mysqli_stmt_close($stmt);
	}
	
?>
<body>	
	<section class="content">
		<div class="head">
			<h1> Unsubscribe </h1>
			<p> Use the checkboxes below to unsubscribe from notifications. </p>
		</div>
		
		<div class="full middle">		
			<?php include 'Design/SectorConstants/notification_update.php'; ?>
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>