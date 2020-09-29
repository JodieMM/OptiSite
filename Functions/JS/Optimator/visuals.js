/// All of the drawing functions.
/// 
/// Author Jodie Muller
/// Draws a + at the given coordinate
function DrawCross(ctx, xcoord, ycoord, colour) {
    if (typeof colour === 'undefined') {
        colour = blackShade;
    }
    ctx.strokeStyle = colour.Use();
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(xcoord - 4, ycoord);
    ctx.lineTo(xcoord + 4, ycoord);
    ctx.moveTo(xcoord, ycoord - 4);
    ctx.lineTo(xcoord, ycoord + 4);
    ctx.stroke();
}
/// Draws a x at the given coordinate
function DrawX(ctx, xcoord, ycoord, colour) {
    if (typeof colour === 'undefined') {
        colour = blackShade;
    }
    ctx.strokeStyle = colour.Use();
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(xcoord - 4, ycoord - 4);
    ctx.lineTo(xcoord + 4, ycoord + 4);
    ctx.moveTo(xcoord + 4, ycoord - 4);
    ctx.lineTo(xcoord - 4, ycoord + 4);
    ctx.stroke();
}
/// Draws a piece with outline and fill
function DrawPiece(ctx, piece, colourState) {
    var currentPoints = piece.GetPoints();
    if (currentPoints.length < 2) {
        return;
    }
    // Prepare for Drawing
    if (colourState == null) {
        colourState = piece.Colours;
    }
    //var pen = new Pen(colourState.Outline, (float)piece.OutlineWidth);
    var fill = colourState.GetFillStyles();
    // Draw
    if (currentPoints.length > 1) {
        DrawShape(ctx, currentPoints, fill);
    }
    //DrawOutline(g, currentPoints);
}
/// Draws the constant colour section of a piece.
function DrawShape(ctx, currentPoints, fill) {
    ctx.beginPath();
    ctx.moveTo(currentPoints[0].GetPoints()[0], currentPoints[0].GetPoints()[1]);
    for (var index = 0; index < currentPoints.length; index++) {
        var nextIndex = NextIndex(currentPoints, index);
        var start = currentPoints[index].GetPoints();
        var end = currentPoints[nextIndex].GetPoints();
        // Connected by Line
        if (currentPoints[index].Connection == Connector.Corner &&
            currentPoints[nextIndex].Connection == Connector.Corner) {
            ctx.lineTo(end[0], end[1]);
        }
        // Starts with Curve
        else if (currentPoints[index].Connection == Connector.Curve) {
            var count = 0;
            var foundNonCurve = false;
            while (count < currentPoints.length && !foundNonCurve) {
                if (currentPoints[count].Connection != Connector.Curve) {
                    foundNonCurve = true;
                }
                count++;
            }
            // All Curve - ClosedCurve Required
            if (!foundNonCurve) {
                // TODO
                // var curvePoints = new PointF[currentPoints.length];
                // for (int currentPoint = 0; currentPoint < currentPoints.length; currentPoint++)
                // {
                //     curvePoints[currentPoint] = Utils.ConvertSpotToPoint(currentPoints[currentPoint]);
                // }
                // path.AddClosedCurve(curvePoints, currentPoints[0].Tension);
                // index = currentPoints.length;
            }
            // Else skip- will be drawn in a curve loop
        }
        // Start of Curve
        else if (currentPoints[index].Connection == Connector.Corner &&
            currentPoints[nextIndex].Connection == Connector.Curve) {
            // var curvePoints = new List<PointF>() { start, end };
            // var newIndex = nextIndex;
            // while (currentPoints[newIndex].Connection == Connector.Curve)
            // {
            //     newIndex = Utils.NextIndex(currentPoints, newIndex);
            //     curvePoints.Add(Utils.ConvertSpotToPoint(currentPoints[newIndex]));
            // }
            // path.AddCurve(Utils.ConvertPointListToArray(curvePoints), currentPoints[nextIndex].Tension);
            // index = newIndex <= index ? currentPoints.length : newIndex - 1;
        }
    }
    for (var _i = 0, fill_1 = fill; _i < fill_1.length; _i++) {
        var brush = fill_1[_i];
        ctx.fillStyle = brush;
        ctx.fill();
        ctx.closePath();
    }
}
// /// <summary>
// /// Draws the outline of the piece.
// /// </summary>
// /// <param name="piece">Piece holding spot coordinates to draw</param>
// /// <param name="connected">False if shape is a line</param>
// function DrawOutline(ctx: CanvasRenderingContext2D, currentPoints: Spot[], connected?: boolean)
// {
//     connected = connected || true;
//     // Draw Outline
//     var maxIndex = connected ? currentPoints.length : currentPoints.length - 1;
//     for (var index = 0; index < maxIndex; index++)
//     {
//         var nextIndex = NextIndex(currentPoints, index);
//         var start = currentPoints[index].GetPoints();
//         var end = currentPoints[nextIndex].GetPoints();
//         var pen = new Pen(currentPoints[index].Line.Colour[0], currentPoints[index].Line.Width[0]);
//         // TODO: GRADIENT LINE COLOUR AND WIDTH ^^
//         // Line is Visible
//         if (currentPoints[index].Line.IsVisible())
//         {
//             // Connected by Line
//             if (currentPoints[index].Connection == Connector.Corner &&
//                 currentPoints[nextIndex].Connection == Connector.Corner)
//             {
//                 g.DrawLine(pen, start, end);
//             }
//             // Starts with Curve
//             else if (currentPoints[index].Connection == Connector.Curve)
//             {
//                 var count = 0;
//                 var foundNonCurve = false;
//                 while (count < currentPoints.length && !foundNonCurve)
//                 {
//                     if (currentPoints[count].Connection != Connector.Curve)
//                     {
//                         foundNonCurve = true;
//                     }
//                     count++;
//                 }
//                 // All Curve - ClosedCurve Required
//                 if (!foundNonCurve)
//                 {
//                     var curvePoints = new PointF[currentPoints.length];
//                     for (int currentPoint = 0; currentPoint < currentPoints.length; currentPoint++)
//                     {
//                         curvePoints[currentPoint] = Utils.ConvertSpotToPoint(currentPoints[currentPoint]);
//                     }
//                     g.DrawClosedCurve(pen, curvePoints, currentPoints[0].Tension, FillMode.Alternate);
//                     index = maxIndex;
//                 }
//                 // Else skip- will be drawn in a curve loop
//             }
//             // Start of Curve
//             else if (currentPoints[index].Connection == Connector.Corner &&
//                 currentPoints[nextIndex].Connection == Connector.Curve)
//             {
//                 var curvePoints = new List<PointF>() { start, end };
//                 var newIndex = nextIndex;
//                 while (currentPoints[newIndex].Connection == Connector.Curve)
//                 {
//                     newIndex = Utils.NextIndex(currentPoints, newIndex);
//                     curvePoints.Add(Utils.ConvertSpotToPoint(currentPoints[newIndex]));
//                 }
//                 index = newIndex <= index ? maxIndex : newIndex - 1;
//                 g.DrawCurve(pen, Utils.ConvertPointListToArray(curvePoints), currentPoints[nextIndex].Tension);
//             }
//             // Smooth Corner
//             g.FillEllipse(new SolidBrush(pen.Color), end.X - (pen.Width / 2), end.Y - (pen.Width / 2), pen.Width, pen.Width);
//         }
//     }
//     // Smooth Start for Lines
//     if (!connected && currentPoints[0].Line.Visible)
//     {
//         var penWidth = currentPoints[0].Line.Width[0];
//         g.FillEllipse(new SolidBrush(currentPoints[0].Line.Colour[0]), currentPoints[0].X - (penWidth / 2),
//             currentPoints[0].Y - (penWidth / 2), penWidth, penWidth);
//     }
// }
// /// <summary>
// /// Draws all parts in a list.
// /// </summary>
// /// <param name="partsList">Parts to be drawn</param>
// /// <param name="g">Graphics to draw</param>
// function DrawParts(ctx: CanvasRenderingContext2D, piecesList: Piece[])
// {
//     for(var part in piecesList)
//     {
//         part.Draw(ctx);
//     }
// }
//# sourceMappingURL=visuals.js.map