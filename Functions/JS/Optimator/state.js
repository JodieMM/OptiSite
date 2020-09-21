/// A class to maintain the current position, angle and size of a part.
/// 
/// Author Jodie Muller
var State = /** @class */ (function () {
    function State(x, y, r, t, s, sm) {
        this.X = 0;
        this.Y = 0;
        this.R = 0;
        this.T = 0;
        this.S = 0;
        this.SM = 1;
        if (typeof x !== 'undefined') {
            this.X = x;
        }
        if (typeof y !== 'undefined') {
            this.Y = y;
        }
        if (typeof r !== 'undefined') {
            this.R = r;
        }
        if (typeof t !== 'undefined') {
            this.T = t;
        }
        if (typeof s !== 'undefined') {
            this.S = s;
        }
        if (typeof sm !== 'undefined') {
            this.SM = sm;
        }
    }
    // ----- FUNCTIONS -----
    /// <summary>
    /// Sets the middle of the piece to the centre of its
    /// display window.
    /// </summary>
    /// <param name="board">The board to centre on</param>
    State.prototype.SetCoordsBasedOnBoard = function (width, height) {
        this.X = width / 2.0;
        this.Y = height / 2.0;
    };
    return State;
}());
//# sourceMappingURL=state.js.map