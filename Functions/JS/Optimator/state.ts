/// A class to maintain the current position, angle and size of a part.
/// 
/// Author Jodie Muller

class State 
{
    X: number = 0;
    Y: number = 0;
    R: number = 0;
    T: number = 0;
    S: number = 0;
    SM: number = 1;


    constructor(x?: number, y?: number, r?: number, t?: number, s?: number, sm?: number)
    {
        if (typeof x !== 'undefined')
        {
            this.X = x;
        }
        if (typeof y !== 'undefined')
        {
            this.Y = y;
        }
        if (typeof r !== 'undefined')
        {
            this.R = r;
        }
        if (typeof t !== 'undefined')
        {
            this.T = t;
        }
        if (typeof s !== 'undefined')
        {
            this.S = s;
        }
        if (typeof sm !== 'undefined')
        {
            this.SM = sm;
        }
    }



    // ----- FUNCTIONS -----

    /// <summary>
    /// Sets the middle of the piece to the centre of its
    /// display window.
    /// </summary>
    /// <param name="board">The board to centre on</param>
    SetCoordsBasedOnBoard(width: number, height: number)
    {
        this.X = width / 2.0;
        this.Y = height / 2.0;
    }
}