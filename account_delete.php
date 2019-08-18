<?php
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<div class="head">
			<img src="Design/Images/coverbg2.png" alt="TBD">
			<div class="headtext">
				<h1> Account Deletion </h1>
				<div class="separater"></div>
				<p> Permanently delete your account. </p>
			</div>
		</div>
		
		<div class="full middle">	
			<h1> Delete your Account </h1>
			<p> Permanently delete your account. All of your credentials will be removed from our system. </p>
			<p style="font-weight: bold"> Once you delete your account your licenses will also be deleted. This means you will be unable to 
			update any software you have currently downloaded and will be unable to use any software you have not verified.</p>
			<p style="font-weight: bold"> This action cannot be undone.</p>
			
			<p> To verify you are the correct user, please confirm your details. </p>
			<div class="inputline fourty">
				<input type="textbox" id="deleteemail" placeholder="Email">
				<input type="password" id="deletepass" placeholder="Password">
			</div>
			<div class="inputline">
				<input type="checkbox" id="delcheckbox"> 
				I understand that deleting my account includes permanently deleting my licenses, including those I have paid for.
			</div>
			<p class="error" id="empasserror"></p>
			<a class="button" id="deleteaccconfbtn">
				Delete Account
			</a>
			
		</div>
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>