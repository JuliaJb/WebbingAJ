$(document).ready(function(){

	var planTable = [];
	

	function addNewGuest(nom, prenom, seat){
		$('#guestList').append(''+
			'<article class="draggable" data-seat="'+seat+'">'+
			'<p class="nom">' +nom + '<p>'+
			'<p class="prenom">' + prenom + '</p>'+
			'<p>' + seat + '</p>'+
			'</article>'
			)
	}

	var list = new Array();

	$( ".droppable" ).droppable({
		drop: function( event, ui ) {

			var userName = $('.ui-draggable-dragging .nom').text();
			var userFirstName = $('.ui-draggable-dragging .prenom').text();
			var userPlace = $(this).find('.placeNumber').text();



			count = 0;
			stock = 0;

			for (var i=0; i<planTable.length; i++) { 
		   		if(count = 1) {
		   			stock = i;
		   		}
			   	if (planTable[i].guestL == userName && planTable[i].guestF == userFirstName) {
		
			   		count++;

			   		if(count > 1) {
			   			planTable[stock].guestL = 0;
			   			planTable[stock].guestF = 0;
			   		}

			   	}

			   
			}

			planTable[userPlace].guestF = userFirstName;
			planTable[userPlace].guestL = userName;
			console.log(planTable);


			console.log(count);
			
		}
	});


	$.ajax({
		type: 'GET',
		url: 'assets/json/data.json',
		dataType: 'json',

		success: function(data){

			for (var j = 0; j <= 64; j++) {

				planTable.push({place:j, guestF:0, guestL:0});

			}

			for(var i=0; i<data.length; i++){
	
				addNewGuest(data[i].lastname, data[i].firstname, data[i].seat);
			}
		},
		error: function(){
			console.log('Bad Request...');
		},
		complete: function(){
			$( ".draggable" ).draggable();
		}
	})


	// placement


	$('#actualiser').click(function(){

		for (var i = 1; i <= 64; i++) {
			
			$('.draggable').css('position', 'absolute');

			$($('.droppable[data-value="'+i+'"]').parent()).append($('*[data-seat="'+i+'"]'));

			$topElem = $('*[data-value="'+i+'"]').css("top")
			$bottomElem = $('*[data-value="'+i+'"]').css("bottom")
			$rightElem = $('*[data-value="'+i+'"]').css("right")
			$leftElem = $('*[data-value="'+i+'"]').css("left")

			$('*[data-seat="'+i+'"]').css("top", $topElem)
			$('*[data-seat="'+i+'"]').css("bottom", $bottomElem)
			$('*[data-seat="'+i+'"]').css("right", $rightElem)
			$('*[data-seat="'+i+'"]').css("left", $leftElem)


			
		}


	});



	$('#valider').click(function(){


		$.ajax({
			url:'http://localhost:8888/plan',
			type:'POST',
			data:({planTable:planTable}),

			success:function(data){
				alert("Le plan de table est validé. Bravo !")
			},
			error: function(){
				console.log('Bad Request...');
			},
			complete: function(){
				console.log('complete');
			}
		
		});

	});

	$('#refresh').click(function(){
		location.reload();
		console.log('ok');
	});





})