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
	  			<img src="/assets/img/stgermain3.jpg" alt="maurice" width="400px">
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
	  			<h4>Nous vous attendons avec impatience à 16h pour célébrer notre union à la mairie de Saint-Germain-En-Laye, soyez à l'heure !</h4>
	  			<br>
		  		<h4>16 rue de Pontoise</h4>
		  		<h4>78100 Saint-Germain-en-Laye</h4>
	        </div>
	        <div class="col-md-6 align_right">
	  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.8637887955497!2d2.0919929155936154!3d48.8989330058054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6882c8a50e06b%3A0x8fd4833165965a2a!2s16+Rue+de+Pontoise%2C+78100+Saint-Germain-en-Laye!5e0!3m2!1sfr!2sfr!4v1486830247346" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	        </div>
  		</div>
	</div>


	<div class="row bloc_home">
  		<div class="container bloc_white">
  			<div class="col-md-6 align_left">
	  			<img src="/assets/img/vinshonneur.png" alt="vin d'honneur" width="400px">
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
		  		<p>19-21 Rue Thiers</p>
		  		<p>78100 Saint-Germain-en-Laye</p>
	        </div>
  			<div class="col-md-6 align_right">
	  			<img src="/assets/img/reception.jpg" alt="vin d'honneur" width="400px">
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


