<?php
$headerContent = "
<head>
	<title>Opti Email</title>
	<link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet'/>
	<link href='https://fonts.googleapis.com/css?family=Montserrat&display=swap' rel='stylesheet'>
	
	<style>	
		body{
			text-align: center;
			font-family: 'Montserrat', 'Actor', 'Tahoma', sans-serif;
			font-size: 20px;
			color: black;
			margin: 0;
			background-color: white;
		}
	
		h1{
			text-align: center;
			font-family: 'Montserrat', 'Actor', 'Tahoma', sans-serif;
			font-size: 30px;
			color: white;
			padding: 1.5em;
			font-weight: unset;
		}
		  
		.header{
			background: linear-gradient(to bottom right, #9a61b2, #d147a3);
			border-top: 2px solid #adadad;
			border-bottom: 2px solid #adadad;
			max-height: 300px;
		}
		
		.content{
			padding: 0em 2em;
			text-align: center;
			font-family: 'Montserrat', 'Actor', 'Tahoma', sans-serif;
			font-size: 20px;
			color: black;
		}
		
		.footer{
			background-color: #9a61b2;
			margin-top: 1.5em;
			padding: 2em;
			border-top: 2px solid #adadad;
			border-bottom: 2px solid #adadad;
		}
		
		.footer p{
			text-align: center;
			font-family: 'Montserrat', 'Actor', 'Tahoma', sans-serif;
			border: none;
			font-size: 20px;
			color: black;
		}
		
		.footer a{
			color: white;
			text-decoration: none;
		}
		
		.content a{
			color: #d147a3;
			text-decoration: none;
			transition: color 0.5s ease;
		}

		content a:hover{
			color: #993399;
		}
		
		.content a:active{
			color: #653b78;
		}
		
		a.button {
			display: block;
			width: 15em;
			margin: 1.5em auto;
			padding: 0.5em;
			text-align: center;
			border: none;
			border-bottom: 0.5em solid #824c9a;
			border-radius: 3em;
			background-color: #9a61b2;
			font: inherit;
			text-decoration: none;
			color: white;
			cursor: pointer;
			transition: transform 0.3s;
		}

		a.button:hover{
			background-color: #824c9a;
			border-color: #653b78;
			transform: scale(1.05, 1.05);
		}

		a.button:focus{
			outline: none;
		}
	</style>
</head>";
?>