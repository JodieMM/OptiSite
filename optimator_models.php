<html>
<head>
    <title>Optimator | Opti Technology</title>			
<?php
	session_start();
	include 'Design/SectorConstants/headerOptimator.php';
?>
<body>
	<div class="optionMenu">
		<div id="optiIcon">
			<a href="index" target="_blank"><img src="Design/Images/header_logo.png" alt="Optimator Logo"></a>
		</div>
		<div class="optionMenuBtn" id="b1">1</div>
		<div class="optionMenuBtn" id="b2">2</div>
		<div class="optionMenuBtn" id="b3">3</div>		
	</div>

	<div class="middleDisplay">
		<div class="canvas">
			<div id="undoZoom" class="fa-lg"></div>
			<canvas id="drawingBoard"></canvas>
		</div>	

		<div class="panel" id="sidePanel">
			<div id="p1" class="panelPane">
			</div>
			<div id="p2" class="panelPane">
			</div>
			<div id="p3" class="panelPane">
			</div>
		</div>
	</div>
	
	
	<?php
		include 'Design/SectorConstants/footer.php';
	?>
	<script type="text/javascript" src="Functions/JS/Optimator/Forms/modelForm.js"/></script>
</body>