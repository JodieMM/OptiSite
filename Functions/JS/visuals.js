// ----- VISUAL FUNCTIONS ----- //

// Burger Bar
function burgerBarToggle(el, bar, list){
	if (list.css('display') == 'none'){
		bar.addClass('clicked');
		list.attr('style', 'display: inline-block; animation: burgerrightslide 1s');
	}
	else{
		bar.removeClass('clicked');
		list.attr('style', 'display: inline-block; animation: burgerleftslide 1s');
		setTimeout(function() { list.attr('style', 'opacity: 0; display:none');}, 1000);
	}
}