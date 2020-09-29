/// A class to hold information about each piece. 
/// A piece is an object that cannot be seperated further.
/// 
/// Author Jodie Muller
var Piece = /** @class */ (function () {
    function Piece(name, location, version, line, colours, data) {
        this.Type = PieceOption.Constant;
        this.Line = false;
        this.Colours = new ColourState();
        this.Data = [];
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
    Piece.prototype.ToString = function () {
        var saveData = [this.Version, this.Name + ";" + this.Location + ";" + this.Type + ";" + this.Line, this.Colours.ToString()];
        this.Data.forEach(function (value) {
            saveData.push(value.ToString());
        });
        return saveData;
    };
    /// Draws the piece.
    Piece.prototype.Draw = function (ctx) {
        if (this.Line) {
            //DrawOutline(g, GetPoints(state), new Pen(colours.Outline, (float)OutlineWidth), false);
        }
        else {
            DrawPiece(ctx, this);
        }
    };
    /// <summary>
    /// Finds the points to print based on the rotation, turn, spin and size of the piece.
    /// </summary>
    /// <param name="state">Current angles of piece</param>
    /// <returns>List of spots to draw</returns>
    Piece.prototype.GetPoints = function (state) {
        return this.Data;
    };
    return Piece;
}());
//# sourceMappingURL=piece.js.map