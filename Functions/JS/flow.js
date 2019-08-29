// ----- FLOW FUNCTIONS ----- //

// --- Prepare Elements ---

var email = $('#email');
var pass1 = $('#password');
var pass2 = $('#passwordconfirm');
var privacy = $('#ppcheckbox');
var signuperror = $('#signuperror');

var loginemail = $('#loginemail');
var loginpass = $('#loginpassword');
var empasserror = $('#empasserror');

var detemail = $('#detemail');
var detpass = $('#detpass');
var detpassconfirm = $('#detpassconfirm');

var deleteemail = $('#deleteemail');
var deletepass = $('#deletepass');
var deletecheckbox = $('#delcheckbox');

var resetemail = $('#resetemail');
var reseterror = $('#reseterror');

var resetpass = $('#resetpass');
var resetpassconfirm = $('#resetpassconfirm');
var resetpasserror = $('#resetpasserror');

var burgerbar = $('#burgerbar');
var burger = $('.burger');
var headerul = $('#headerul');



// --- Functions ---

email.click(function(){ stopGlow(email)});
pass1.click(function(){ stopGlow(pass1)});
pass2.click(function(){ stopGlow(pass2)});

loginemail.click(function(){ stopGlow(loginemail)});
loginpass.click(function(){ stopGlow(loginpass)});

detemail.click(function(){ stopGlow(detemail)});
detpass.click(function(){ stopGlow(detpass)});

deleteemail.click(function(){ stopGlow(deleteemail)});
deletepass.click(function(){ stopGlow(deletepass)});

resetemail.click(function(){ stopGlow(resetemail)});

resetpass.click(function(){ stopGlow(resetpass)});
resetpassconfirm.click(function(){ stopGlow(resetpassconfirm)});

burgerbar.click(function(){ burgerBarToggle(burgerbar, burger, headerul);});
