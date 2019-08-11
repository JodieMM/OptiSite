// ----- FLOW FUNCTIONS ----- //

// --- Prepare Elements ---

var signupbtn = $('#signupbtn');
var email = $('#email');
var pass1 = $('#password');
var pass2 = $('#passwordconfirm');
var loginemail = $('#loginemail');
var loginpass = $('#loginpassword');
var loginbtn = $('#loginbtn');



// --- Functions ---

signupbtn.click(function(){ validateSignUp(email.val(), pass1.val(), pass2.val());});
email.click(function(){ email.attr('style', 'box-shadow: ')});
pass1.click(function(){ pass1.attr('style', 'box-shadow: ')});
pass2.click(function(){ pass2.attr('style', 'box-shadow: ')});
loginemail.click(function(){ loginemail.attr('style', 'box-shadow: ')});
loginpass.click(function(){ loginpass.attr('style', 'box-shadow: ')});
loginbtn.click(function(){ validateLogIn(loginemail.val(), loginpass.val());});
