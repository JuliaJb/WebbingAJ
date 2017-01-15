$( document ).ready(function() {
		
	// Dans la modification d'un invité on chaine le nom et le prénom pour faciliter la sélection
	$("#lastname").chained("#firstname");


	// Liste des invités, au clic on affiche les caractéristiques de chaque invité
	$('.blue').click(function(){

		$(this).next().toggle( "slow", function() {
    		$(this).next().css("display", "table-row");
  		});

  	});

  	$(function() {
    	$( "#tabs" ).tabs();
  	});

});