/// Holds all of the unchanging values.
/// 
/// Author Jodie Muller
// Version
var ThisVersion = "1.0.0W";
// File Extensions
var PieceExt = ".optrp";
var SetExt = ".optrs";
var SceneExt = ".optrc";
var VideoExt = ".optrv";
var PngExt = ".png";
var Mp4Ext = ".mp4";
var AviExt = ".avi";
var GifExt = ".gif";
// File Filters
var PieceFilter = "Piece Files (*" + PieceExt + ")|*" + PieceExt;
var SetFilter = "Set Files (*" + SetExt + ")|*" + SetExt;
var SceneFilter = "Scene Files (*" + SceneExt + ")|*" + SceneExt;
var VideoFilter = "Video Files (*" + VideoExt + ")|*" + VideoExt;
var AviFilter = "Avi File (*" + AviExt + ")|*" + AviExt;
var PartFilter = "Part Files (*" + PieceExt + ";*" + SetExt + ")|*" + PieceExt + ";*" + SetExt;
var OptiFilter = "Optimator Files (*" + PieceExt + ";*" + SetExt + ";*" + SceneExt + ";*" + VideoExt +
    ")|*" + PieceExt + ";*" + SetExt + ";*" + SceneExt + ";*" + VideoExt;
// UI Precision
var ClickPrecisions = [0, 3, 5, 7, 9];
var DragPrecision = 5;
// Piece Defaults
var defaultFill = new Colour(255, 204, 240, 255);
var defaultOutline = new Colour(255, 204, 204, 255);
var defaultOutlineWidth = 2;
// Piece Options
var FillOption;
(function (FillOption) {
    FillOption[FillOption["None"] = 0] = "None";
    FillOption[FillOption["Fill"] = 1] = "Fill";
    FillOption[FillOption["LinearGradient"] = 2] = "LinearGradient";
    FillOption[FillOption["CenterGradient"] = 3] = "CenterGradient";
})(FillOption || (FillOption = {}));
var Connector;
(function (Connector) {
    Connector[Connector["Corner"] = 0] = "Corner";
    Connector[Connector["Curve"] = 1] = "Curve";
})(Connector || (Connector = {}));
var PieceOption;
(function (PieceOption) {
    PieceOption[PieceOption["Moveable"] = 0] = "Moveable";
    PieceOption[PieceOption["Flat"] = 1] = "Flat";
    PieceOption[PieceOption["Constant"] = 2] = "Constant";
})(PieceOption || (PieceOption = {}));
// Colours
var blackShade = new Colour(0, 0, 0, 1);
var shadowShade = new Colour(169, 169, 169, 1);
var invisibleShade = new Colour(0, 0, 0, 0);
var highlightShade = new Colour(34, 139, 34, 1);
//const select: Colour = new Colour(255, 255, 0, 0);
//const lowlight: Colour = new Colour(255, 95, 158, 160);
//const option1: Colour = new Colour(255, 139, 69, 19);
//const option2: Colour = new Colour(255, 128, 0, 128);
//const activeAnimation: Colour = new Colour(255, 153, 204, 255);
//const finishedAnimation: Colour = new Colour(255, 77, 166, 255);
//const toDoAnimation: Colour = new Colour(255, 204, 230, 255);
// Maximum Values
var MaximumSize = 1000;
var MaximumXY = 6000;
// Scene Options
var Action;
(function (Action) {
    Action[Action["None"] = 0] = "None";
    Action[Action["X"] = 1] = "X";
    Action[Action["Y"] = 2] = "Y";
    Action[Action["Rotation"] = 3] = "Rotation";
    Action[Action["Turn"] = 4] = "Turn";
    Action[Action["Spin"] = 5] = "Spin";
    Action[Action["Size"] = 6] = "Size";
})(Action || (Action = {}));
//# sourceMappingURL=constants.js.map