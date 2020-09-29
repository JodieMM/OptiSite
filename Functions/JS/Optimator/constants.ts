/// Holds all of the unchanging values.
/// 
/// Author Jodie Muller

// Version
const ThisVersion: string = "1.0.0W";

// File Extensions
const PieceExt: string = ".optrp";
const SetExt: string = ".optrs";
const SceneExt: string = ".optrc";
const VideoExt: string = ".optrv";
const PngExt: string = ".png";
const Mp4Ext: string = ".mp4";
const AviExt: string = ".avi";
const GifExt: string = ".gif";

// File Filters
const PieceFilter: string = "Piece Files (*" + PieceExt + ")|*" + PieceExt;
const SetFilter: string = "Set Files (*" + SetExt + ")|*" + SetExt;
const SceneFilter: string = "Scene Files (*" + SceneExt + ")|*" + SceneExt;
const VideoFilter: string = "Video Files (*" + VideoExt + ")|*" + VideoExt;
const AviFilter: string = "Avi File (*" + AviExt + ")|*" + AviExt;
const PartFilter: string = "Part Files (*" + PieceExt + ";*" + SetExt + ")|*" + PieceExt + ";*" + SetExt;
const OptiFilter: string = "Optimator Files (*" + PieceExt + ";*" + SetExt + ";*" + SceneExt + ";*" + VideoExt +
	")|*" + PieceExt + ";*" + SetExt + ";*" + SceneExt + ";*" + VideoExt;

// UI Precision
const ClickPrecisions: number[] = [0, 3, 5, 7, 9];
const DragPrecision: number = 5;

// Piece Defaults
const defaultFill: Colour = new Colour(255, 204, 240, 1);
const defaultOutline: Colour = new Colour(255, 204, 204, 1);
const defaultOutlineWidth: number = 2;

// Piece Options
enum FillOption
{
	None,
	Fill,
    LinearGradient,
    CenterGradient
}
enum Connector
{
    Corner,
    Curve
}
enum PieceOption
{
	Moveable,
	Flat,
	Constant
}

// Colours
const blackShade: Colour = new Colour(0, 0, 0, 1);
const shadowShade: Colour = new Colour(169, 169, 169, 1);
const invisibleShade: Colour = new Colour(0, 0, 0, 0);
const highlightShade: Colour = new Colour(34, 139, 34, 1);
//const select: Colour = new Colour(255, 255, 0, 0);
//const lowlight: Colour = new Colour(255, 95, 158, 160);
//const option1: Colour = new Colour(255, 139, 69, 19);
//const option2: Colour = new Colour(255, 128, 0, 128);
//const activeAnimation: Colour = new Colour(255, 153, 204, 255);
//const finishedAnimation: Colour = new Colour(255, 77, 166, 255);
//const toDoAnimation: Colour = new Colour(255, 204, 230, 255);

// Maximum Values
const MaximumSize: number = 1000;
const MaximumXY: number = 6000;

// Scene Options
enum Action
{
	None,
	X,
	Y,
	Rotation,
	Turn,
	Spin,
	Size
}