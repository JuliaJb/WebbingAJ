<?php $this->layout('layout', ['title' => 'login']) ?>

<?php $this->start('css') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('/css/main.css') ?>">

<?php $this->stop('css') ?>

<?php 

$this->start('nav');

	include '../app/templates/partials/nav.php';

$this->stop('nav');

?>



<?php $this->start('main') ?>


	<div class="container_header infos_maurice">
		<div class="bloc_prez_header">
			<div class="triangle">
				
				<div class="header_title">
					<h1>Marcus &amp; Ginette</h1>
					<h2>Leur mariage</h2>
				</div>

			</div>
		</div>

		<div class="square">
			
			<img class="img_square" src="/assets/img/save_the_date.png" alt="RSVP">

		</div>
	</div> <!-- Fin container_header -->


	<div class="row bloc_home">
  		<div class="container bloc_white">
  			<div class="col-md-6 align_left">
	  			<img src="/assets/img/maurice6.jpg" alt="maurice" width="400px">
	        </div>
	  		<div class="col-md-6">	
	  			<h2>Mariage religieux à l'île Maurice</h2>
		  		<h3>24 octobre 2017</h3>
		  		<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Planning <span class="glyphicon glyphicon-grain" aria-hidden="true"></span></h2>
		  		<br>
		  		<h4>15h - Eglise de Cap Malheureux</h4>
		  		<h4>18h30 - Vin d'honneur au Domaine Saint-Aubin</h4>
		  		<h4>20h - Réception au Domaine Saint-Aubin</h4>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Eglise</h2>
	  			<br>
	  			<h4>Venez célébrer notre union religieuse à 15h les pieds dans l'eau, tongs non autorisés !</h4>
	  			<br>
		  		<h4>Royal Road</h4>
		  		<h4>Cap Malheureux</h4>
		  		<h4>Ile Maurice</h4>
	        </div>
  			<div class="col-md-6 align_right">
	  			<img src="/assets/img/maurice4.jpg" alt="saint germain" width="400px">
	        </div>
  		</div>
	</div>


	<div class="row bloc_home">
  		<div class="container bloc_white">
  			<div class="col-md-6 align_left">
	  			<img src="/assets/img/saintaubin.jpeg" alt="saint germain" width="400px">
	        </div>
	  		<div class="col-md-6">	
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Réception</h2>
	  			<br>
	  			<h4>Phrase sur réception, blablablba</h4>
	  			<h4>Domaine de Saint-Aubin</h4>
	  			<h4>Rivière des anguilles</h4>
	  			<h4>Ile Maurice</h4>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Hébergement</h2>
	  			<br>
	  			<h4>Si vous souhaitez dormir au Pavillon merci de nous contacter. D'autres hôtel sont disponibles aux alentours.</h4>
	        </div>
  			<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Accès</h2>
	  			<br>
	  			<h4>A pied : à deux pas du RER A</h4>
	  			<h4>En voiture : autouroute A13</h4>
	  			<h4>En avion : aéroport</h4>
	        </div>
  		</div>
	</div>






<?php $this->stop('main') ?>

<?php 
$this->start('footer');

	include '../app/templates/partials/footer.php';

$this->stop('footer');
?>

<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>


