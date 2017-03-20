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


	<div class="container_header infos_france">
		<div class="bloc_prez_header">
			<div class="triangle">
				
				<div class="header_title">
					<h1>Alexandra &amp; Joan</h1>
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
	  			<img class="img_row" src="/assets/img/stgermain3.jpg" alt="maurice" width="400px">
	        </div>
	  		<div class="col-md-6">	
	  			<h2>Mariage civil à Saint germain En Laye</h2>
		  		<h3>24 Juin 2017</h3>
		  		<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Planning <span class="glyphicon glyphicon-grain" aria-hidden="true"></span></h2>
		  		<br>
		  		<h4>16h - Mairie de Saint-Germain-En-Laye</h4>
		  		<h4>18h30 - Vin d'honneur au Pavillon Henri IV</h4>
		  		<h4>20h - Réception au Pavillon Henri IV</h4>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Mairie</h2>
	  			<br>
	  			<h4>Nous vous donnons RDV à la Mairie de Saint-Germain-En-Laye à 16h pour notre cérémonie civile. Souriez, vous serez peut-être dans le journal officiel de la ville !</h4>
	  			<br>
		  		<h4>16 rue de Pontoise</h4>
		  		<h4>78100 Saint-Germain-en-Laye</h4>
	        </div>
	        <div class="col-md-6 align_right">
	  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.8637887955497!2d2.0919929155936154!3d48.8989330058054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6882c8a50e06b%3A0x8fd4833165965a2a!2s16+Rue+de+Pontoise%2C+78100+Saint-Germain-en-Laye!5e0!3m2!1sfr!2sfr!4v1486830247346" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	        </div>
  		</div>
	</div>


	<div class="row bloc_home">
  		<div class="container bloc_white">
  			<div class="col-md-6 align_left">
	  			<img class="img_row" src="/assets/img/champagne.jpg" alt="vin d'honneur">
	        </div>
	  		<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Vin d'honneur</h2>
	  			<br>
	  			<h4>Vous n'aurez qu'une seule coupe mais vous pourrez la remplir !</h4>
	  			<br>
		  		<h4>19-21 Rue Thiers</h4>
		  		<h4>78100 Saint-Germain-en-Laye</h4>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Réception</h2>
	  			<br>
	  			<h4>Profitez du diner sans crainte, Alex n'a rien préparé et vous pourrez vous défouler sur la piste de danse !</h4>
		  		<h4>19-21 Rue Thiers</h4>
		  		<h4>78100 Saint-Germain-en-Laye</h4>
	        </div>
  			<div class="col-md-6 align_right">
	  			<img class="img_row" src="/assets/img/reception.jpg" alt="vin d'honneur">
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
  			<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Hébergement</h2>
	  			<br>
	  			<h4>Veuillez nous contacter si vous souhaitez loger au Pavillon. Sinon de nombreux hôtels sont accessibles dans le centre ville.</h4>

	        </div>
	  		<div class="col-md-6">
	  			<h2><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>Accès</h2>
	  			<br>
	  			<h4>@Pied : En face du Parc du Chateau, marchez 2 minutes</h4>
				<h4>@Vélo, Transports : Rer A, utilisez Citymapper</h4>
				<h4>@Voiture : Waze est très pratique</h4>
				<h4>@Avion : Aéroport Roissy CDG et demandez à quelqu'un de venir vous chercher</h4>
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


