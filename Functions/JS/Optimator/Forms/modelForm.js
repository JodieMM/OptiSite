/// Layout for Building Models
/// 
/// Author Jodie Muller
var pieces = [];
//var WIP: Set;
var selectedSpots = [];
var selectedPieces = [];
// Interactables
var topMenuBar = ["b1", "b2", "b3"];
var topMenuSelected = "";
// Canvas Sizing
var dpr = window.devicePixelRatio || 1;
var canvas = document.getElementById("drawingBoard");
var ctx = canvas.getContext("2d");
var scrollOffset = [0, 0, 1];
var resizeOffset = [0, 0];
var canvasSize;
// Actions
$(document).on('keydown', KeyPress);
canvas.addEventListener('click', CanvasClick, false);
canvas.addEventListener('DOMMouseScroll', HandleScroll, false);
canvas.addEventListener('mousewheel', HandleScroll, false);
$(".optionMenuBtn").on('click', TopMenuSelect);
// ----- I/O -----
// Key Pressed
function KeyPress(action) {
    var keycode = action.keyCode || action.which;
    switch (keycode) {
        // Tab
        case 9:
            // Selects the next or first option in the top menu bar
            // The reverse is true if the shift key is pressed, starting at the end option
            if (action.shiftKey && (topMenuSelected == "" || topMenuSelected == topMenuBar[0])) {
                $('#' + topMenuBar[topMenuBar.length - 1]).trigger('click');
            }
            else if (!action.shiftKey && (topMenuSelected == "" || topMenuSelected == topMenuBar[topMenuBar.length - 1])) {
                $('#' + topMenuBar[0]).trigger('click');
            }
            else {
                for (var i = 0; i < topMenuBar.length; i++) {
                    if (topMenuBar[i] == topMenuSelected) {
                        $('#' + topMenuBar[i + (action.shiftKey ? -1 : 1)]).trigger('click');
                        i = topMenuBar.length;
                    }
                }
            }
            return action.preventDefault() && false;
        // Enter
        case 13:
            break;
        // Shift
        case 16:
            break;
        // Delete
        case 46:
            break;
    }
}
// Canvas Click
function CanvasClick(action) {
    var x = action.offsetX / scrollOffset[2] + scrollOffset[0] - resizeOffset[0];
    var y = action.offsetY / scrollOffset[2] + scrollOffset[1] - resizeOffset[1];
    // Take Action
    // New Spot
    if (pieces.length == 0) {
        pieces.push(new Piece());
        selectedPieces.push(pieces[0]);
    }
    selectedPieces[0].Data.push(new Spot(x, y));
    Redraw();
}
// Canvas Scroll
function HandleScroll(action) {
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
}
;
// Top Menu Button/Toggle Click
function TopMenuSelect(action) {
    if (topMenuSelected != "") {
        $('#' + topMenuSelected).css('background', '#b70727');
    }
    $(this).css('background', '#a51010');
    topMenuSelected = $(this).attr('id');
}
// ----- FUNCTIONS -----
// Resize the panels
window.onresize = function () {
    var currentTransform = ctx.getTransform();
    // DPR Offset
    var rect = $(".canvas")[0].getBoundingClientRect();
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
};
// Canvas Redraw
function Redraw() {
    ctx.clearRect(scrollOffset[0] - resizeOffset[0], scrollOffset[1] - resizeOffset[1], canvas.width / scrollOffset[2], canvas.height / scrollOffset[2]);
    // Pieces
    for (var _i = 0, pieces_1 = pieces; _i < pieces_1.length; _i++) {
        var piece = pieces_1[_i];
        piece.Draw(ctx);
    }
    // Spots				(Separate from above to ensure points are drawn above lines)
    for (var _a = 0, selectedPieces_1 = selectedPieces; _a < selectedPieces_1.length; _a++) {
        var piece = selectedPieces_1[_a];
        for (var _b = 0, _c = piece.Data; _b < _c.length; _b++) {
            var spot = _c[_b];
            spot.Draw(ctx);
        }
    }
    // Selected Spots
    for (var _d = 0, selectedSpots_1 = selectedSpots; _d < selectedSpots_1.length; _d++) {
        var spot = selectedSpots_1[_d];
        spot.Draw(ctx, highlightShade);
    }
}
//// Display Slider Value
//function updateSlider(id, value)
//{
//    document.getElementById(id).innerHTML = value;
//}
// ----- After Function Load Actions -----
var rect = $(".canvas")[0].getBoundingClientRect();
canvas.width = Math.round(rect.width * dpr);
canvas.height = Math.round(rect.height * dpr);
canvasSize = [canvas.width, canvas.height];
ctx = canvas.getContext("2d");
ctx.scale(dpr, dpr);
Redraw();
//# sourceMappingURL=modelForm.js.map