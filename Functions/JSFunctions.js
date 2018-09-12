// --- JAVASCRIPT FUNCTIONS FOR OPTIMATOR ---



// -- VARIABLES --					(Initial values set with canvasRestart in setupCanvas)
var canvas, spaceLeft, spaceTop, ctx;
var clickType, selectedPoints, pointsOrdered;
var points = new Array( );
var pointsx90 = new Array( );
var pointsx180 = new Array( );
var pointsNum = 0;


// -- PREPARATION --

// Prepare Canvas
function setupCanvas(){
	canvas = document.getElementById("screen");
	
	spaceLeft = canvas.offsetLeft,
    spaceTop = canvas.offsetTop,
	
	ctx = canvas.getContext("2d");
	canvas.addEventListener('click', canvasClick, false);
	
	canvasRestart();
}


// Canvas Click
function canvasClick(action){
	x = action.pageX - spaceLeft;
	y = action.pageY - spaceTop;
	
	// Select Click Type
	switch(clickType){
		case "place":
			drawPoint("#FF0000", x, y);
			points.push([pointsNum, x, y]);
			pointsNum++;
			break;
		case "move":
			var found = false;

			// 1-off Leeway
			for (point = 0; point < points.length && !found; point++){
				if (points[point][1] > x - 1 && points[point][1] < x + 1){
					if (points[point][2] > y - 1 && points[point][2] < y + 1){
						selectPoint(points[point]);
						found = true;
					}
				}
			}
			
			// 3-off Leeway
			for (point = 0; point < points.length && !found; point++){
				if (points[point][1] > x - 3 && points[point][1] < x + 3){
					if (points[point][2] > y - 3 && points[point][2] < y + 3){
						selectPoint(points[point]);
						found = true;
					}
				}
			}
			
			// 6-off Leeway
			for (point = 0; point < points.length && !found; point++){
				if (points[point][1] > x - 6 && points[point][1] < x + 6){
					if (points[point][2] > y - 6 && points[point][2] < y + 6){
						selectPoint(points[point]);
						found = true;
					}
				}
			}

			// 10-off Leeway
			for (point = 0; point < points.length && !found; point++){
				if (points[point][1] > x - 10 && points[point][1] < x + 10){
					if (points[point][2] > y - 10 && points[point][2] < y + 10){
						selectPoint(points[point]);
						found = true;
					}
				}
			}
			
			
			//Nothing Clicked - Clear Selections			?? UI TESTING ??
			/*
			if (!found){
				clearSelected();
			}
			*/
			break;
	}		
}

// Canvas Clear
function canvasClear(){
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	drawingBoard();
}

// Canvas Redraw
function redraw(){
	drawingBoard();	
	
	// Lines
	for (point = 0; point < points.length; point++){
		
		// Draw Connecting Lines
		if (point != points.length-1){
			drawLine(points[point][1], points[point][2], points[point + 1][1], points[point + 1][2]);
		} else {
			drawLine(points[point][1], points[point][2], points[0][1], points[0][2]);
		}		
	}
	
	// Points				(Separate from above to ensure points are drawn above lines)
	for (point = 0; point < points.length; point++){

		// Draw Points
		drawPoint("#FF0000", points[point][1], points[point][2]);
		
	}
	
	// Selections
	for (point = 0; point < selectedPoints.length; point++){
		drawPoint("#66ff66", selectedPoints[point][1], selectedPoints[point][2]);
	}
}

// Canvas Restart
function canvasRestart(){
	points = [];
	selectedPoints = [];
	clickType = "place";
	canvasClear();
}

// Redraw 
function drawingBoard(){
	// Background
	ctx.lineWidth="0";
	ctx.fillStyle="#ffffff";
	ctx.fillRect(0, 0, canvas.width, canvas.height);
}

// Draw Point
function drawPoint(colour, x, y){
	ctx.fillStyle = colour;
	ctx.fillRect(x - 2, y - 2, 4, 4);
}

// Draw Line
function drawLine(fromx, fromy, tox, toy){
	ctx.beginPath();
	ctx.moveTo(fromx,fromy);
	ctx.lineTo(tox,toy);
	ctx.stroke();
}
	

// SwitchClick Click
function switchClickClick(){
	clickType = (clickType == "place" ? "move" : "place");
	//clearSelected();											?? UI TESTING ??
}

// Select Point, returns true if new point
function selectPoint(pointID){
	x = pointID[1];
	y = pointID[2];
	// UPDATE FIX ETC ?? !!
	// Check not already checked
	found = false;
	for (point = 0; point < selectedPoints.length && !found; point++){
		if (selectedPoints[point][1] == x){
			if (selectedPoints[point][2] == y){
				selectedPoints.splice(point, 1);
				found = true;
				redraw();
			}
		}
	}
	
	// Add to selected
	if (!found){
		selectedPoints.push([pointsNum, x, y]);
		// NEEDS FIXING ?? !!
		drawPoint("#66ff66", x, y);
	}
}

// Unselects all points
function clearSelected(){
	selectedPoints = [];
	redraw();
}

// Display Slider Value
function updateSlider(id, value){
	document.getElementById(id).innerHTML = value;
}
	
