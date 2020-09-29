/// A class to hold information about each piece. 
/// A piece is an object that cannot be seperated further.
/// 
/// Author Jodie Muller

class Piece 
{	
    Name: string;
    Location: string;
    Version: string;

    State: State;
    Type: PieceOption = PieceOption.Constant;
    Line: boolean = false;
    Colours: ColourState = new ColourState();
    Data: Spot[] = [];


    constructor(name?: string, location?: string, version?: string, line?: boolean, colours?: ColourState, data?: Spot[])
    {
        this.Name = name || "New Piece";
        this.Location = location || "";
        this.Version = version || ThisVersion;
        //this.State = state ? new State();
        //this.Type = type ? PieceOption.Constant;
        this.Line = line || false;
        this.Colours = colours || new ColourState();
        this.Data = data || [];
    }


    // ----- GENERAL FUNCTIONS -----

    /// Gets piece's current details in a string format.
    ToString() : string[]
    {
        let saveData: string[] = [this.Version, this.Name + ";" + this.Location + ";" + this.Type + ";" + this.Line, this.Colours.ToString()];
        this.Data.forEach(function (value) {
            saveData.push(value.ToString());
        });
        return saveData;
    }

    /// Draws the piece.
    Draw(ctx: CanvasRenderingContext2D)
    {
        if (this.Line)
        {
            //DrawOutline(g, GetPoints(state), new Pen(colours.Outline, (float)OutlineWidth), false);
        }
        else
        {
            DrawPiece(ctx, this);
        }
    }

    /// <summary>
    /// Finds the points to print based on the rotation, turn, spin and size of the piece.
    /// </summary>
    /// <param name="state">Current angles of piece</param>
    /// <returns>List of spots to draw</returns>
    GetPoints(state?: State): Spot[]
    {
        return this.Data;
    }
}