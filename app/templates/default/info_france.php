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
		  		<p>24 Juin 2017</p>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2>Planning</h2>
		  		<p>15h - Mairie de Saint Germain En Laye</p>
		  		<p>18h - Vin d'honneur au pavillon Henri IV</p>
		  		<p>20h - Réception au pavillon Henri IV</p>
	        </div>
  			<div class="col-md-6 align_right">
	  			<img src="/assets/img/stgermain2.jpg" alt="saint germain" width="400px">
	        </div>
  		</div>
	</div>


	<div class="row bloc_home">
  		<div class="container bloc_white">
  			<div class="col-md-6 align_left">
	  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.8417857897393!2d2.0952630352994994!3d48.899352317912594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6882cf5a4a827%3A0x5662340012b826ca!2sMairie!5e0!3m2!1sfr!2sfr!4v1464272106698" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
	        </div>
	  		<div class="col-md-6">	
	  			<h2>Où se trouve la mairie ?</h2>
		  		<p>86 Rue Léon Désoyer</p>
		  		<p>78100 Saint-Germain-en-Laye</p>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2>Où se déroulera le vin d'honneur et la réception ?</h2>
		  		<p>19-21 Rue Thiers</p>
		  		<p>78100 Saint-Germain-en-Laye</p>
	        </div>
  			<div class="col-md-6 align_right">
	  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.9024842129083!2d2.098333615695002!3d48.898195579291425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6882a7a3226d9%3A0xf5fea8aedf921b02!2s21+Rue+Thiers%2C+78100+Saint-Germain-en-Laye!5e0!3m2!1sfr!2sfr!4v1464272339605" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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


