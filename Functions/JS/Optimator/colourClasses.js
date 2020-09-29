/// A class to hold a colour's argb values.
/// 
/// Author Jodie Muller
var Colour = /** @class */ (function () {
    function Colour(r, g, b, a) {
        this.R = r;
        this.G = g;
        this.B = b;
        this.A = a || 1;
    }
    /// Converts the colour into saveable string format.
    Colour.prototype.ToString = function () {
        return this.A + "," + this.R + "," + this.G + "," + this.B;
    };
    /// Converts the colour into a string used in HTML
    Colour.prototype.Use = function () {
        return "rgba(" + this.R + ", " + this.G + ", " + this.B + ", " + this.A + ")";
    };
    return Colour;
}());
/// A class to hold a single colour layer
///
/// Author Jodie Muller
var ColourLayer = /** @class */ (function () {
    function ColourLayer(fillOption, colours, direction, details) {
        this.FillOption = fillOption || FillOption.Fill;
        this.Colours = colours || [defaultFill];
        this.Direction = direction || [0];
        this.Details = details || "";
    }
    /// Converts the colour layer into saveable string format.
    ColourLayer.prototype.ToString = function () {
        var saveData = this.FillOption + ":";
        for (var _i = 0, _a = this.Colours; _i < _a.length; _i++) {
            var i = _a[_i];
            saveData += i.ToString() + (i == this.Colours[this.Colours.length - 1] ? ":" : ",");
        }
        for (var _b = 0, _c = this.Direction; _b < _c.length; _b++) {
            var i = _c[_b];
            saveData += i + (i == this.Direction[this.Direction.length - 1] ? ":" : ",");
        }
        return saveData + this.Details + ";";
    };
    /// Returns the fillStyle to draw this ColourLayer
    ColourLayer.prototype.GetFillStyle = function () {
        switch (this.FillOption) {
            case FillOption.None:
                {
                    return this.Colours[0].Use();
                }
            case FillOption.Fill:
                {
                    return this.Colours[0].Use();
                }
            case FillOption.LinearGradient:
                {
                    return this.Colours[0].Use();
                }
            case FillOption.CenterGradient:
                {
                    return this.Colours[0].Use();
                }
        }
    };
    return ColourLayer;
}());
/// A class to hold the dynamic fill colouring of a piece.
/// 
/// Author Jodie Muller
var ColourState = /** @class */ (function () {
    function ColourState(layers) {
        this.Layers = layers || [new ColourLayer()];
    }
    /// Converts the colour state into saveable string format.
    ColourState.prototype.ToString = function () {
        var saveData = "";
        for (var _i = 0, _a = this.Layers; _i < _a.length; _i++) {
            var i = _a[_i];
            saveData += i.ToString();
        }
        return saveData;
    };
    /// Returns an array of fillStyles to use when drawing this ColourState
    ColourState.prototype.GetFillStyles = function () {
        var fillStyles = [];
        for (var _i = 0, _a = this.Layers; _i < _a.length; _i++) {
            var i = _a[_i];
            fillStyles.push(i.GetFillStyle());
        }
        return fillStyles;
    };
    return ColourState;
}());
//# sourceMappingURL=colourClasses.js.map