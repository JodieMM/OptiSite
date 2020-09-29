/// A class to hold a colour's argb values.
/// 
/// Author Jodie Muller

class Colour
{
    R: number;
    G: number;
    B: number;
    A: number;

    constructor(r: number, g: number, b: number, a?: number)
    {
        this.R = r;
        this.G = g;
        this.B = b;
        this.A = a || 1;
    }

    /// Converts the colour into saveable string format.
    ToString(): string
    {
        return this.A + "," + this.R + "," + this.G + "," + this.B;
    }

    /// Converts the colour into a string used in HTML
    Use(): string
    {
        return "rgba(" + this.R + ", " + this.G + ", " + this.B + ", " + this.A + ")";
    }
}



/// A class to hold a single colour layer
///
/// Author Jodie Muller
class ColourLayer
{
    FillOption: FillOption;
    Colours: Colour[];
    Direction: number[];
    Details: string;

    constructor(fillOption?: FillOption, colours?: Colour[], direction?: number[], details?: string)
    {
        this.FillOption = fillOption || FillOption.Fill;
        this.Colours = colours || [defaultFill];
        this.Direction = direction || [0];
        this.Details = details || "";
    }

    /// Converts the colour layer into saveable string format.
    ToString(): string
    {
        let saveData: string = this.FillOption + ":";
        for (let i of this.Colours)
        {
            saveData += i.ToString() + (i == this.Colours[this.Colours.length - 1] ? ":" : ",");
        }
        for (let i of this.Direction)
        {
            saveData += i + (i == this.Direction[this.Direction.length - 1] ? ":" : ",");
        }
        return saveData + this.Details + ";";
    }

    /// Returns the fillStyle to draw this ColourLayer
    GetFillStyle()
    {
        switch (this.FillOption)
        {
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
    }
}



/// A class to hold the dynamic fill colouring of a piece.
/// 
/// Author Jodie Muller

class ColourState
{
    Layers: ColourLayer[];

    constructor(layers?: ColourLayer[])
    {
        this.Layers = layers || [new ColourLayer()];
    }

    /// Converts the colour state into saveable string format.
    ToString(): string
    {
        let saveData: string = "";
        for (let i of this.Layers)
        {
            saveData += i.ToString();
        }
        return saveData;
    }

    /// Returns an array of fillStyles to use when drawing this ColourState
    GetFillStyles()
    {
        var fillStyles = [];
        for (let i of this.Layers)
        {
            fillStyles.push(i.GetFillStyle());
        }
        return fillStyles;
    }
}