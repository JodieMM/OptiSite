/// All of the drawing functions.
/// 
/// Author Jodie Muller

//var c = <HTMLCanvasElement>document.getElementById("drawingBoard");
//var ctx = c.getContext("2d");

    /// Draws a + at the given coordinate
    function DrawCross(ctx: CanvasRenderingContext2D, xcoord: number, ycoord: number, colour?: Colour)
    {
        if (typeof colour === 'undefined')
        {
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
    function DrawX(ctx: CanvasRenderingContext2D, xcoord: number, ycoord: number, colour?: Colour)
    {
        if (typeof colour === 'undefined')
        {
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

    ///// Draws a piece with outline and fill
    //function DrawPiece(ctx: CanvasRenderingContext2d, piece: Piece, colourState?: ColourState)
    //{
    //    var currentPoints = piece.GetPoints(state);
    //    if (currentPoints.Count < 2)
    //    {
    //        return;
    //    }

    //    // Prepare for Drawing
    //    if (colourState == null)
    //    {
    //        colourState = piece.ColourState;
    //    }
    //    //var pen = new Pen(colourState.Outline, (float)piece.OutlineWidth);
    //    var fill = colourState.DrawingTools();

    //    // Draw
    //    if (currentPoints.Count > 1 && piece.ColourState.IsVisible())
    //    {
    //        DrawShape(g, currentPoints, fill);
    //    }
    //    DrawOutline(g, currentPoints);
    //}

    ///// Draws the constant colour section of a piece.
    ///// </summary>
    ///// <param name="g">Graphics to draw on</param>
    ///// <param name="currentPoints">Shape outline</param>
    ///// <param name="fill">Brush to colour the section</param>
    //function DrawShape(Graphics g, List<Spot> currentPoints, Brush[] fill)
    //{
    //    var path = new GraphicsPath();
    //    path.StartFigure();
    //    for (var index = 0; index < currentPoints.Count; index++)
    //    {
    //        var nextIndex = Utils.NextIndex(currentPoints, index);
    //        var start = Utils.ConvertSpotToPoint(currentPoints[index]);
    //        var end = Utils.ConvertSpotToPoint(currentPoints[nextIndex]);

    //        // Connected by Line
    //        if (currentPoints[index].Connector == Consts.SpotOption.Corner &&
    //            currentPoints[nextIndex].Connector == Consts.SpotOption.Corner)
    //        {
    //            path.AddLine(start, end);
    //        }
    //        // Starts with Curve
    //        else if (currentPoints[index].Connector == Consts.SpotOption.Curve)
    //        {
    //            var count = 0;
    //            var foundNonCurve = false;
    //            while (count < currentPoints.Count && !foundNonCurve)
    //            {
    //                if (currentPoints[count].Connector != Consts.SpotOption.Curve)
    //                {
    //                    foundNonCurve = true;
    //                }
    //                count++;
    //            }
    //            // All Curve - ClosedCurve Required
    //            if (!foundNonCurve)
    //            {
    //                var curvePoints = new PointF[currentPoints.Count];
    //                for (int currentPoint = 0; currentPoint < currentPoints.Count; currentPoint++)
    //                {
    //                    curvePoints[currentPoint] = Utils.ConvertSpotToPoint(currentPoints[currentPoint]);
    //                }
    //                path.AddClosedCurve(curvePoints, currentPoints[0].Tension);
    //                index = currentPoints.Count;
    //            }
    //            // Else skip- will be drawn in a curve loop
    //        }
    //        // Start of Curve
    //        else if (currentPoints[index].Connector == Consts.SpotOption.Corner &&
    //            currentPoints[nextIndex].Connector == Consts.SpotOption.Curve)
    //        {
    //            var curvePoints = new List<PointF>() { start, end };
    //            var newIndex = nextIndex;
    //            while (currentPoints[newIndex].Connector == Consts.SpotOption.Curve)
    //            {
    //                newIndex = Utils.NextIndex(currentPoints, newIndex);
    //                curvePoints.Add(Utils.ConvertSpotToPoint(currentPoints[newIndex]));
    //            }
    //            path.AddCurve(Utils.ConvertPointListToArray(curvePoints), currentPoints[nextIndex].Tension);
    //            index = newIndex <= index ? currentPoints.Count : newIndex - 1;
    //        }
    //    }
    //    path.CloseFigure();
    //    foreach(var brush in fill)
    //    {
    //        g.FillPath(brush, path);
    //    }
    //}


    ///// <summary>
    ///// Draws the outline of the piece.
    ///// </summary>
    ///// <param name="piece">Piece holding spot coordinates to draw</param>
    ///// <param name="connected">False if shape is a line</param>
    //public static void DrawOutline(Graphics g, List < Spot > currentPoints, bool connected = true)
    //{
    //    // Draw Outline
    //    var maxIndex = connected ? currentPoints.Count : currentPoints.Count - 1;
    //    for (var index = 0; index < maxIndex; index++)
    //    {
    //        var nextIndex = Utils.NextIndex(currentPoints, index);
    //        var start = Utils.ConvertSpotToPoint(currentPoints[index]);
    //        var end = Utils.ConvertSpotToPoint(currentPoints[nextIndex]);
    //        var pen = new Pen(currentPoints[index].Line.Colour[0], currentPoints[index].Line.Width[0]);
    //        // TODO: GRADIENT LINE COLOUR AND WIDTH ^^

    //        // Line is Visible
    //        if (currentPoints[index].Line.IsVisible())
    //        {
    //            // Connected by Line
    //            if (currentPoints[index].Connector == Consts.SpotOption.Corner &&
    //                currentPoints[nextIndex].Connector == Consts.SpotOption.Corner)
    //            {
    //                g.DrawLine(pen, start, end);
    //            }
    //            // Starts with Curve
    //            else if (currentPoints[index].Connector == Consts.SpotOption.Curve)
    //            {
    //                var count = 0;
    //                var foundNonCurve = false;
    //                while (count < currentPoints.Count && !foundNonCurve)
    //                {
    //                    if (currentPoints[count].Connector != Consts.SpotOption.Curve)
    //                    {
    //                        foundNonCurve = true;
    //                    }
    //                    count++;
    //                }
    //                // All Curve - ClosedCurve Required
    //                if (!foundNonCurve)
    //                {
    //                    var curvePoints = new PointF[currentPoints.Count];
    //                    for (int currentPoint = 0; currentPoint < currentPoints.Count; currentPoint++)
    //                    {
    //                        curvePoints[currentPoint] = Utils.ConvertSpotToPoint(currentPoints[currentPoint]);
    //                    }
    //                    g.DrawClosedCurve(pen, curvePoints, currentPoints[0].Tension, FillMode.Alternate);
    //                    index = maxIndex;
    //                }
    //                // Else skip- will be drawn in a curve loop
    //            }
    //            // Start of Curve
    //            else if (currentPoints[index].Connector == Consts.SpotOption.Corner &&
    //                currentPoints[nextIndex].Connector == Consts.SpotOption.Curve)
    //            {
    //                var curvePoints = new List<PointF>() { start, end };
    //                var newIndex = nextIndex;
    //                while (currentPoints[newIndex].Connector == Consts.SpotOption.Curve)
    //                {
    //                    newIndex = Utils.NextIndex(currentPoints, newIndex);
    //                    curvePoints.Add(Utils.ConvertSpotToPoint(currentPoints[newIndex]));
    //                }
    //                index = newIndex <= index ? maxIndex : newIndex - 1;
    //                g.DrawCurve(pen, Utils.ConvertPointListToArray(curvePoints), currentPoints[nextIndex].Tension);
    //            }

    //            // Smooth Corner
    //            g.FillEllipse(new SolidBrush(pen.Color), end.X - (pen.Width / 2), end.Y - (pen.Width / 2), pen.Width, pen.Width);
    //        }
    //    }
    //    // Smooth Start for Lines
    //    if (!connected && currentPoints[0].Line.Visible)
    //    {
    //        var penWidth = currentPoints[0].Line.Width[0];
    //        g.FillEllipse(new SolidBrush(currentPoints[0].Line.Colour[0]), currentPoints[0].X - (penWidth / 2),
    //            currentPoints[0].Y - (penWidth / 2), penWidth, penWidth);
    //    }
    //}

    ///// <summary>
    ///// Draws all parts in a list.
    ///// </summary>
    ///// <param name="partsList">Parts to be drawn</param>
    ///// <param name="g">Graphics to draw</param>
    //public static void DrawParts(List < Part > partsList, Graphics g)
    //{
    //    foreach(var part in partsList)
    //    {
    //        part.Draw(g);
    //    }
    //}



    //// ----- VISUAL MANIPULATION -----

    ///// <summary>
    ///// Resize a bitmap.
    ///// </summary>
    ///// <param name="newWidth">Width of resized bitmap</param>
    ///// <param name="newHeight">Height of resized bitmap</param>
    ///// <param name="original">Original bitmap</param>
    ///// <param name="bg">The colour to fill excess space</param>
    ///// <returns>Re-scaled Bitmap</returns>
    //public static Bitmap ScaleBitmap(int newWidth, int newHeight, Bitmap original, Color bg)
    //{
    //    var brush = new SolidBrush(bg);

    //    float scale = Math.Min((float)newWidth / original.Width, (float)newHeight / original.Height);
    //    var newBitmap = new Bitmap(newWidth, newHeight);
    //    var g = Graphics.FromImage(newBitmap);

    //    g.InterpolationMode = InterpolationMode.High;
    //    g.CompositingQuality = CompositingQuality.HighQuality;
    //    g.SmoothingMode = SmoothingMode.AntiAlias;

    //    var scaleWidth = (int)(original.Width * scale);
    //    var scaleHeight = (int)(original.Height * scale);

    //    using(g)
    //    {
    //        g.FillRectangle(brush, new RectangleF(0, 0, newWidth, newHeight));
    //        g.DrawImage(original, (newWidth - scaleWidth) / 2, (newHeight - scaleHeight) / 2, scaleWidth, scaleHeight);
    //    }
    //    return newBitmap;
    //}
