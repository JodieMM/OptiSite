/// A class to hold information about an individual coordinate.
/// 
/// Author Jodie Muller
var Spot = /** @class */ (function () {
    function Spot(x, y, xr, yd, connection, tension, lineWidth, lineColour, visible) {
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
    Spot.prototype.ToString = function () {
        var saveData = this.X + ":" + this.Y + ":" + this.XRight + ":" + this.YDown + ";" + this.Tension + ";";
        for (var _i = 0, _a = this.LineWidth; _i < _a.length; _i++) {
            var i = _a[_i];
            saveData += i + ((i == this.LineWidth[this.LineWidth.length - 1]) ? ";" : ",");
        }
        for (var _b = 0, _c = this.LineColour; _b < _c.length; _b++) {
            var i = _c[_b];
            saveData += i.ToString() + ((i == this.LineColour[this.LineColour.length - 1]) ? ";" : ",");
        }
        return saveData + this.LineVisible;
    };
    /// Draws the spot to the screen.
    Spot.prototype.Draw = function (ctx, colour) {
        if (typeof colour === 'undefined') {
            colour = blackShade;
        }
        DrawCross(ctx, this.X, this.Y, colour);
    };
    /// Returns the x/y coordinates of the spot
    Spot.prototype.GetPoints = function () {
        return [this.X, this.Y];
    };
    return Spot;
}());
//# sourceMappingURL=spot.js.map