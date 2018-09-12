<?php
	include '../Design/header.php';
?>
<section class="canvasContent">
	<canvas id="screen" width="1150" height="646.875"></canvas>
	<script>setupCanvas();</script>
	<!-- Canvas Option Buttons -->
	<div class="switchClick"><img id="switchClick" src="../Design/Images/switchClick.png" height="40px" width="40px" onclick="switchClickClick()"></div>
	
	
	<!-- Side Menu -->	
	<div class="piecesMenu">
		<h1>Menu</h1>
		Hi There
		<br>
		<button type="button" onclick="canvasClear()">Clear</button>
		<button type="button" onclick="redraw()">Redraw</button>
		<br><br>
		<button type="button" onclick="canvasRestart()">Restart Piece</button>
		<br>
		Rotate
		<input type="range" min="0" max="359" value="0" class="slider" id="rotate" oninput="updateSlider('rotationtext', this.value)">
		<p id="rotationtext">0</p>
		Turn
		<input type="range" min="0" max="359" value="0" class="slider" id="turn" oninput="updateSlider('turntext', this.value)">
		<p id="turntext">0</p>
	</div>
	
</section>
<?php
	include '../Design/footer.php';
?>

