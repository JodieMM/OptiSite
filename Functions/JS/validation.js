// ----- VALIDATION FUNCTIONS ----- //

// Email
function validateEmail(email){
	var regexcode = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/;
	if (!regexcode.test(email.val())){
		return false;
	}
	else {
		return true;
	}
}

// Password
function validatePassword(p1){
	if (p1.val().length < 6){
		return false;
	}
	else {
		return true;
	}
}

function validatePasswordMatch(p1, p2){
	if (p1.val() != p2.val()){
		return false;
	}
	else {
		return true;
	}
}

// Checkbox
function validateCb(cb){
	if (cb.prop('checked') == false){
		return false;
	}
	else {
		return true;
	}
}


// ----- VISUAL RESULTS ----- //

// Glow
function glow(el, col){
	el.attr('style', 'box-shadow: 0 0 4px ' + col +';');
}

function stopGlow(el){
	el.attr('style', 'box-shadow: ');
}

// Visibility
function hideEl(el){
	el.attr('style', 'display: none;');
}

function showEl(el){
	el.attr('style', 'display: block;');
}


// ----- CHECKING VALIDATION ----- //

// Sign Up
function validateSignUp(em, p1, p2, pp){
	var validated = true;
	signuperror.html("");
	showEl(signuperror);
	stopGlow(p2);
	
	if (!validateEmail(em)){
		glow(em, '#ff4d4d');
		validated = false;
		signuperror.html("Please enter a valid email address.");
	}
	
	if (!validatePassword(p1)){
		glow(p1, '#ff4d4d');
		glow(p2, '#ff4d4d');
		validated = false;
		if (signuperror.html() == ""){
			signuperror.html("Your password must be at least 6 characters.");
		}
	}
	else if (!validatePasswordMatch(p1, p2)){
		glow(p2, '#ff4d4d');
		validated = false;
		if (signuperror.html() == ""){
			signuperror.html("Passwords must match.");
		}
	}
	
	if (!validateCb(pp)){
		validated = false;
		if (signuperror.html() == ""){
			signuperror.html("You must accept the Privacy Policy and Terms and Conditions to make an account.");
		}
	}
	
	if (signuperror.html() == ""){
		hideEl(signuperror);
	}
	return validated;
}

// Log In
function validateLogin(em, pass){
	var validated = true;
	empasserror.html("");
	showEl(empasserror);
	
	if (!validateEmail(em)){
		glow(em, '#ff4d4d');
		validated = false;
		empasserror.html("Please enter a valid email address.");
	}
	
	if (!validatePassword(pass)){
		glow(pass, '#ff4d4d');
		validated = false;
		if (empasserror.html() == ""){
			empasserror.html("Your password must be at least 6 characters.");
		}
	}
	
	if (empasserror.html() == ""){
		hideEl(empasserror);
	}
	return validated;
}

// Update Details
function validateUpdate(em, pass)
{
	var validated = true;
	empasserror.html("");
	showEl(empasserror);
	
	if (em.val() != "" && !validateEmail(em)){
		glow(em, '#ff4d4d');
		validated = false;
		empasserror.html("Please enter a valid email address.");
	}
	
	if (pass.val() != "" && !validatePassword(pass)){
		glow(pass, '#ff4d4d');
		validated = false;
		if (empasserror.html() == ""){
			empasserror.html("Your password must be at least 6 characters.");
		}
	}
	
	if (empasserror.html() == ""){
		hideEl(empasserror);
	}
	return validated;
}

// Account Deletion
function validateDelete(em, pass, check){
	var validated = true;
	empasserror.html("");
	showEl(empasserror);
	
	if (!validateEmail(em)){
		glow(em, '#ff4d4d');
		validated = false;
		empasserror.html("Please enter a valid email address.");
	}
	
	if (!validatePassword(pass)){
		glow(pass, '#ff4d4d');
		validated = false;
		if (empasserror.html() == ""){
			empasserror.html("Your password must be at least 6 characters.");
		}
	}
	
	if(!validateCb(check)){
		validated = false;
		if (empasserror.html() == ""){
			empasserror.html("You must accept the terms to delete your account.");
		}
	}
	
	if (empasserror.html() == ""){
		hideEl(empasserror);
	}
	return validated;
}













