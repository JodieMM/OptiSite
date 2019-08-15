// ----- VISUAL FUNCTIONS ----- //

// Burger Bar
function burgerBarToggle(el, bar, list){
	if (list.css('display') == 'none'){
		$('.header ul').css('display', 'inline-block');
	}
	else{
		$('.header ul').css('display', 'none');
	}
}