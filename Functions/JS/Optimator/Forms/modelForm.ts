/// Layout for Building Models
/// 
/// Author Jodie Muller

var pieces: Piece[] = [];
//var WIP: Set;

var selectedSpots: Spot[] = [];
var selectedPieces: Piece[] = [];

let dpr = window.devicePixelRatio || 1;
let canvas = <HTMLCanvasElement>document.getElementById("drawingBoard");
let ctx = canvas.getContext("2d");
let scrollOffset: number[] = [0, 0, 1];
let resizeOffset: number[] = [0, 0];
let canvasSize: number[];

// Actions
canvas.addEventListener('click', CanvasClick, false);
canvas.addEventListener('DOMMouseScroll', HandleScroll, false);
canvas.addEventListener('mousewheel', HandleScroll, false);



// ----- I/O -----

// Canvas Click
function CanvasClick(action)
{
    var x = action.offsetX / scrollOffset[2] + scrollOffset[0] - resizeOffset[0];
    var y = action.offsetY / scrollOffset[2] + scrollOffset[1] - resizeOffset[1];

    // Take Action

    // New Spot
    if (pieces.length == 0)
    {
        pieces.push(new Piece());
        selectedPieces.push(pieces[0]);
    }
    selectedPieces[0].Data.push(new Spot(x, y));
    Redraw();
}

// Canvas Scroll
function HandleScroll(action)
{
    var scrollIn = action.deltaY < 0 ? 1 : -1;
    var zoom = Math.exp(scrollIn * 0.2);

    // X/Y Offset
    ctx.translate(scrollOffset[0], scrollOffset[1]);

    // Zoom
    ctx.scale(zoom, zoom);

    // X/Y Realign Offset
    var mouseX = action.offsetX;
    var mouseY = action.offsetY;      
    scrollOffset[0] -= (mouseX / (scrollOffset[2] * zoom) - resizeOffset[0] / zoom) - (mouseX / scrollOffset[2] - resizeOffset[0]);
    scrollOffset[1] -= (mouseY / (scrollOffset[2] * zoom) - resizeOffset[1] / zoom) - (mouseY / scrollOffset[2] - resizeOffset[1]);    
    ctx.translate(-scrollOffset[0], -scrollOffset[1]);

    // Update Zoom
    scrollOffset[2] *= zoom;
    resizeOffset[0] /= zoom;
    resizeOffset[1] /= zoom;
    
    Redraw();    
    return action.preventDefault() && false;
};



// ----- FUNCTIONS -----

// Resize the panels
window.onresize = function()
{
    var currentTransform = ctx.getTransform();

    // DPR Offset
    let rect = $(".canvas")[0].getBoundingClientRect();
    canvas.width = Math.round(rect.width * dpr);
    canvas.height = Math.round(rect.height * dpr);
    ctx.resetTransform();
    ctx.setTransform(currentTransform);

    // Zoom Offset
    var xAdjust = ((canvasSize[0] - canvas.width) / 2) / currentTransform.a;
    var yAdjust = ((canvasSize[1] - canvas.height) / 2) / currentTransform.d;
    resizeOffset[0] -= xAdjust;
    resizeOffset[1] -= yAdjust;
    ctx.translate(-xAdjust, -yAdjust);
    canvasSize = [canvas.width, canvas.height];

    Redraw();
}

// Canvas Redraw
function Redraw()
{
    ctx.clearRect(scrollOffset[0] - resizeOffset[0], scrollOffset[1] - resizeOffset[1],
         canvas.width / scrollOffset[2], canvas.height / scrollOffset[2]);

    // Pieces
    for (let piece of pieces)
    {
        piece.Draw(ctx);
    }

    // Spots				(Separate from above to ensure points are drawn above lines)
    for (let piece of selectedPieces)
    {
        for (let spot of piece.Data)
        {
            spot.Draw(ctx);
        }
    }
    // Selected Spots
    for (let spot of selectedSpots)
    {
        spot.Draw(ctx, highlightShade);
    }
}

//// Display Slider Value
//function updateSlider(id, value)
//{
//    document.getElementById(id).innerHTML = value;
//}



// ----- After Function Load Actions -----

let rect = $(".canvas")[0].getBoundingClientRect();
canvas.width = Math.round(rect.width * dpr);
canvas.height = Math.round(rect.height * dpr);
canvasSize = [canvas.width, canvas.height];
ctx = canvas.getContext("2d");
ctx.scale(dpr, dpr);
Redraw();