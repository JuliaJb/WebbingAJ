$(document).ready(function(){


// BOUTON DE SELECTION FICHIERS

  document.querySelector("html").classList.add('js');
   
  // initialisation des variables
  var fileInput  = document.querySelector( ".input-file" ),  
      button     = document.querySelector( ".input-file-trigger" ),
      the_return = document.querySelector(".file-return");
   
  // action lorsque la "barre d'espace" ou "Entrée" est pressée
  button.addEventListener( "keydown", function( event ) {
      if ( event.keyCode == 13 || event.keyCode == 32 ) {
          fileInput.focus();
      }
  });
   
  // action lorsque le label est cliqué
  button.addEventListener( "click", function( event ) {
     fileInput.focus();
     return false;
  });
   
  // affiche un retour visuel dès que input:file change
  fileInput.addEventListener( "change", function( event ) {  
      the_return.innerHTML = this.value;  
  });

// FIN BOUTON DE SELECTION FICHIERS


// MANSONRY POUR LA DISPOSITION DES PHOTOS

  var $grid = $('.grid').masonry({
    columnWidth: 100,
    itemSelector: '.grid-item',
    gutter: 10,
    percentPosition: true
  });
  
  // change size of item by toggling gigante class
  $grid.on( 'click', '.grid-item', function() {
    $(this).toggleClass('gigante');
    // trigger layout after item size changes
    $grid.masonry('layout');
  });

// FIN MANSONRY 


// CHAINED POUR CHAINER LE PRENOM AVEC LE NOM DE FAMILLE
  $("#lastname").chained("#firstname");
// FIN CHAINED



});