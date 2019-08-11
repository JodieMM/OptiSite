<?php
	include 'Design/SectorConstants/header.php';
?>
<body>	
	<section class="content">
		<div class="signup">
			<h1> Sign Up </h1>
			<p> Create an Opti account to download software or register for updates. </p>
			<div class="inputline">
				<input type="textbox" id="email" placeholder="Email"></input>
				<input type="password" id="password" placeholder="Password"></input>
				<input type="password" id="passwordconfirm" placeholder="Confirm Password"></input>
			</div>
			<div class="inputline">
				<button>Sign Up</button>
			</div>
		</div>
		
		<div class="full middle">
			<h1> Log In </h1>
			<p> Login to your existing account to update your details or download new software or updates. </p>
			<div class="inputline fourty">
				<input type="textbox" id="loginemail" placeholder="Email"></input>
				<input type="password" id="loginpassword" placeholder="Password"></input>
			</div>
			<a class="button lowbtn">
				Log In
			</a>
		</div>	
	
	
	<!--
		<div class="white">
			<div class="split left">
				<a href target="blank">
					<h1> Sign Up </h1>
					<p> Create an Opti account to download software or register for updates.</p>
				</a>
			</div>
			<div class="split right">
				<a href target="blank">
					<h1> Log In </h1>
					<p> Login to you existing account to update your details or download new software or updates.</p>
				</a>
			</div>
		</div>-->
	</section>
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
</body>