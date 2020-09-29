/// Additional functions relevant more broadly.
/// 
/// Author Jodie Muller

/// Goes to next item in array, overlapping if necessary
function NextIndex(array: Array<any>, index: number, forward?: boolean)
{
    forward = forward || true;
    if (forward)
    {
        index++;
        if (index >= array.length)
        {
            index = index % array.length;
        }
        return index;
    }
    else
    {
        index--;
        while (index < 0)
        {
            index += array.length;
        }
        return index;
    }
}