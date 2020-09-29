/// A class to hold information about an individual coordinate.
/// 
/// Author Jodie Muller

class Spot {
    X: number;
    XRight: number;
    Y: number;
    YDown: number;

    Connection: Connector;
    Tension: number;
    LineWidth: number[];
    LineColour: Colour[];
    LineVisible: boolean;


    constructor(x?: number, y?: number, xr?: number, yd?: number, connection?: Connector, tension?: number,
        lineWidth?: number[], lineColour?: Colour[], visible?: boolean)
    {
        this.X = x || 0;
        this.Y = y || 0;
        this.XRight = xr || x || 0;
        this.YDown = yd || y || 0;

        this.Connection = connection || Connector.Corner;
        this.Tension = tension || 0;
        this.LineWidth = lineWidth || [defaultOutlineWidth];
        this.LineColour = lineColour || [defaultOutline];
        this.LineVisible = visible || true;
    }



    // ----- FUNCTIONS -----

    /// Converts the spot data into saveable string format.
    ToString(): string
    {
        let saveData: string = this.X + ":" + this.Y + ":" + this.XRight + ":" + this.YDown + ";" + this.Tension + ";";
        for (let i of this.LineWidth) 
        {
            saveData += i + ((i == this.LineWidth[this.LineWidth.length - 1]) ? ";" : ",");
        }
        for (let i of this.LineColour) 
        {
            saveData += i.ToString() + ((i == this.LineColour[this.LineColour.length - 1]) ? ";" : ",");
        }
        return saveData + this.LineVisible;
    }

    /// Draws the spot to the screen.
    Draw(ctx: CanvasRenderingContext2D, colour?: Colour)
    {
        if (typeof colour === 'undefined')
        {
            colour = blackShade;
        }
        DrawCross(ctx, this.X, this.Y, colour);
    }

    /// Returns the x/y coordinates of the spot
    GetPoints()
    {
        return [this.X, this.Y];
    }
}