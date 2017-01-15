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
	  			<img src="/assets/img/maurice4.jpg" alt="maurice" width="400px">
	        </div>
	  		<div class="col-md-6">	
	  			<h2>Mariage religieux à l'île Maurice</h2>
		  		<p>28 octobre 2017</p>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2>Planning</h2>
		  		<p>15h - Eglise du cap malheureux</p>
		  		<p>18h - Vin d'honneur a flic en flac</p>
		  		<p>20h - Réception au domaine des pamplemousses</p>
	        </div>
  			<div class="col-md-6 align_right">
	  			<img src="/assets/img/maurice6.jpg" alt="saint germain" width="400px">
	        </div>
  		</div>
	</div>


	<div class="row bloc_home">
  		<div class="container bloc_white">
  			<div class="col-md-6 align_left">
	  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14997.813996943178!2d57.59923392974492!3d-19.989472585125867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217daa373ba0c59d%3A0x950e4670f39a5680!2sCap+Malheureux%2C+Maurice!5e0!3m2!1sfr!2sfr!4v1464272717630" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
	        </div>
	  		<div class="col-md-6">	
	  			<h2>Où se trouve l'église du cap malheureux ?</h2>
		  		<p>Cap Malheureux</p> 
		  		<p>Maurice</p>
	        </div>
  		</div>
	</div>

	<div class="row bloc_home">
  		<div class="container bloc_white">
	  		<div class="col-md-6">
	  			<h2>Où se déroulera le vin d'honneur et la réception ?</h2>
		  		<p>Domaine des pamplemousses</p>
		  		<p>Maurice</p>
	        </div>
  			<div class="col-md-6 align_right">
	  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14997.813996943178!2d57.59923392974492!3d-19.989472585125867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217daa373ba0c59d%3A0x950e4670f39a5680!2sCap+Malheureux%2C+Maurice!5e0!3m2!1sfr!2sfr!4v1464272717630" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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


