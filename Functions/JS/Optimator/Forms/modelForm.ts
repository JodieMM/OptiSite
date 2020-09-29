/// Layout for Building Models
/// 
/// Author Jodie Muller

var pieces: Piece[] = [];
//var WIP: Set;

var selectedSpots: Spot[] = [];
var selectedPieces: Piece[] = [];

// Interactables/ UI Elements
let topMenuBar: string[] = ["b1", "b2", "b3"];
let topMenuSelected: string = "";

// Canvas Sizing
let dpr = window.devicePixelRatio || 1;
let canvas = <HTMLCanvasElement>document.getElementById("drawingBoard");
let ctx = canvas.getContext("2d");
let scrollOffset: number[] = [0, 0, 1];
let resizeOffset: number[] = [0, 0];
let canvasSize: number[];
let panelWidth: number;
let panelMoving: number = -1;
let originalPanelWidth: number;

// Actions
$(document).on('keydown', KeyPress);
$(document).on('mousemove', SidePanelDrag);
$(document).on('mouseup', SidePanelRelease);
$('#undoZoom').on('click', UndoZoomClick);
canvas.addEventListener('click', CanvasClick, false);
canvas.addEventListener('DOMMouseScroll', HandleScroll, false);
canvas.addEventListener('mousewheel', HandleScroll, false);
$('.panel').on('mousemove', SidePanelHover);
$('.panel').on('mousedown', SidePanelClick);
$(".optionMenuBtn").on('click', TopMenuSelect);



// ----- I/O -----

// Key Pressed
function KeyPress(action)
{
    var keycode: number = action.keyCode || action.which;
    switch (keycode)
    {
        // Tab
        case 9:
            // Selects the next or first option in the top menu bar
            // The reverse is true if the shift key is pressed, starting at the end option
            if (action.shiftKey && (topMenuSelected == "" || topMenuSelected == topMenuBar[0]))
            {
                $('#' + topMenuBar[topMenuBar.length - 1]).trigger('click');
            }
            else if (!action.shiftKey && (topMenuSelected == "" || topMenuSelected == topMenuBar[topMenuBar.length - 1]))
            {
                $('#' + topMenuBar[0]).trigger('click');
            }
            else
            {
                for (var i = 0; i < topMenuBar.length; i++)
                {
                    if (topMenuBar[i] == topMenuSelected)
                    {
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

// Undo Zoom Click
function UndoZoomClick(action)
{
    ctx.translate(scrollOffset[0], scrollOffset[1]);
    ctx.scale(1/scrollOffset[2], 1/scrollOffset[2]);
    resizeOffset[0] *= scrollOffset[2];
    resizeOffset[1] *= scrollOffset[2];    
    scrollOffset = [0, 0, 1];

    Redraw();
    $(this).css('display', 'none');
}

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
    
    $('#undoZoom').removeClass('fas fa-search-minus');
    $('#undoZoom').removeClass('fas fa-search-plus');
    scrollOffset[2] > 1 ? $('#undoZoom').addClass('fas fa-search-minus') : 
        $('#undoZoom').addClass('fas fa-search-plus');
    $('#undoZoom').css('display', 'block');
    Redraw();    
    return action.preventDefault() && false;
};

// Top Menu Button/Toggle Click
function TopMenuSelect(action)
{
    // Deselect old selected, if any
    if (topMenuSelected != "")
    {
        $('#' + topMenuSelected).removeClass('active');
        $('#' + topMenuSelected.replace("b", "p")).css('display','none');
    }
    // Select new if not already selected
    if (topMenuSelected != $(this).attr('id'))
    {
        $(this).addClass('active')
        topMenuSelected = $(this).attr('id');
        $('.canvas').css('width', $(window).width() * (1 - panelWidth));
        $('.panel').css('width', $(window).width() * panelWidth);
        $('.panel').css('display', 'block');
        $('#' + topMenuSelected.replace("b", "p")).css('display','block');
        $(window).trigger('resize');
    }    
    // Hide Side Panel
    else
    {
        topMenuSelected = "";
        $('.panel').css('display', 'none');
        $('.canvas').css('width', '100%');
        $(window).trigger('resize');
    }
}

// Side Panel Resize
function SidePanelHover(action)
{
    if (action.offsetX <= 3)
    {
        $(this).css('cursor', 'col-resize');
    }
    else
    {
        $(this).css('cursor', 'default');
    }
}

// Side Panel Resize
function SidePanelClick(action)
{
    if (action.offsetX <= 3)
    {
        originalPanelWidth = panelWidth;
        panelMoving = action.pageX;
    }
}

// Side Panel Resize Drag
function SidePanelDrag(action)
{
    if (panelMoving > 0)
    {
        panelWidth = originalPanelWidth - (action.pageX - panelMoving);
        $(window).trigger('resize');
    }
}

// Side Panel Release
function SidePanelRelease(action)
{
    panelMoving = -1;
}



// ----- FUNCTIONS -----

// Resize the panels
window.onresize = function()
{
    var currentTransform = ctx.getTransform();

    // Panel Resize
    if ($('.panel').css('display') != 'none')
    {
        $('.canvas').css('width', $(window).width() - panelWidth);
        $('.panel').css('width', panelWidth);
    }

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
panelWidth = $(window).width() * 0.2;
$('.panel').css('width', panelWidth);
Redraw();