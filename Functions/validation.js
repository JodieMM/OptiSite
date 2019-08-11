// ----- VALIDATION FUNCTIONS ----- //

// Email
function validateEmail(email){
	var regexcode = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/;
	if (!regexcode.test(email)){
		return false;
	}
	else {
		return true;
	}
}

// Password
function validatePassword(p1){
	if (p1.length < 6){
		return false;
	}
	else {
		return true;
	}
}

function validatePasswordMatch(p1, p2)
{
	if (p1 != p2){
		return false;
	}
	else {
		return true;
	}
}

// ----- VISUAL RESULTS ----- //

// Glow
function glow(el, col){
	el.attr('style','box-shadow: 0 0 4px ' + col +';');
}


// ----- CHECKING VALIDATION ----- //

// Sign Up
function validateSignUp(em, p1, p2){
	var validated = true;
	
	if (!validateEmail(em)){
		glow(email, '#ff4d4d');
		validated = false;
	}
	
	if (!validatePassword(p1)){
		glow(pass1, '#ff4d4d');
		glow(pass2, '#ff4d4d');
		validated = false;
	}
	else if (!validatePasswordMatch(p2)){
		glow(pass2, '#ff4d4d');
		validated = false;
	}
	return validated;
}

// Log In
function validateLogIn(em, pass){
	var validated = true;
	
	if (!validateEmail(em)){
		glow(loginemail, '#ff4d4d');
		validated = false;
	}
	
	if (!validatePassword(pass)){
		glow(loginpass, '#ff4d4d');
		validated = false;
	}
	return validated;
}














