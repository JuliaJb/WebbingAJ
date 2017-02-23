
	// ************************************ //
	//										//
	// 				fonctions				//
	//										//
	// ************************************ //

var verticalAlignCenter = function(element) {

	$(element).each(function() {
		var $elem = $(this);
		var elemHeight = $(element).height();
		if (elemHeight == 0) { return; }

		var marginTop = Math.floor(($(window).height() - elemHeight) / 2);

		if (marginTop > 0) {
			$(element).css("margin-top", marginTop);
		}
	});

}



var textareaDisplay = function(inputName1, inputName2, textarea) {


	$(inputName1).click(function(){

		$(textarea).removeClass('novisible');
		$(textarea).addClass('visible');

	});

	$(inputName2).click(function(){

		$(textarea).removeClass('visible');
		$(textarea).addClass('novisible');

	});

}

var reloadResize = function() {
	$(window).resize(function(){location.reload();});
}


	// ************************************ //
	//										//
	// 			fin de fonctions			//
	//										//
	// ************************************ //




	// ************************************ //
	//										//
	// 			appel de fonction			//
	//										//
	// ************************************ //

	verticalAlignCenter(".vertical_align");
	reloadResize();
	textareaDisplay('input[name="diet"]:eq(0)', 'input[name="diet"]:eq(1)', 'textarea[name="aliment_specs"]');

	textareaDisplay('input[name="enfants"]:eq(0)', 'input[name="enfants"]:eq(1)', '#bloc_child');


	// ************************************ //
	//										//
	// 		fin d'appel de fonction			//
	//										//
	// ************************************ //









