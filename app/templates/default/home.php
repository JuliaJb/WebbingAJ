<?php $this->layout('layout', ['title' => 'Home']) ?>

<?php $this->start('css') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('/css/main.css') ?>">

<?php $this->stop('css') ?>

<?php 

$this->start('nav');

	include '../app/templates/partials/nav.php';

$this->stop('nav');

?>


<?php $this->start('main') ?>

	<div class="container_header">
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
	
	<?php if (isset($profil) && $profil['invitFr'] == "1") : ?>
		<div class="row bloc_home">
	  		<div class="container bloc_white">
		  		<div class="col-md-6">
		  			<h2><a href="/info_france">Mariage Civil à Saint Germain En Laye</a></h2>
			  		<p>24 Juin 2017 - 15h</p>
			  		<a class="btn_lien_infos" href="/info_france">Plus d'infos</a>
			  		<form class="form_home" method="POST">
		                <p>Serez-vous présent le jour de notre mariage en France ?</p>
		                <input type="radio" name="rsvpFr" value="1" <?= (isset($profil['rsvpFr']) && $profil['rsvpFr'] == "1")? "checked": " " ?>> Oui
	                    <input type="radio" name="rsvpFr" value="0" <?= (isset($profil['rsvpFr']) && $profil['rsvpFr'] == "0")? "checked": " " ?>> Non
		                <button name="valid_home_Fr" class="btn btn_form_darkBlue">Valider</button>
		            </form>
		        </div>
	  			<div class="col-md-6 align_right">
		  			<a href="/info_france"><img src="/assets/img/stgermain3.jpg" alt="saint germain" width="400px"></a>
		        </div>
	  		</div>
		</div>		
	<?php endif ?>
	

	<?php if (isset($profil) && $profil['invitMa'] == "1") : ?>
		<div class="row bloc_home">
	  		<div class="container bloc_white">
	  			<div class="col-md-6 align_left">
		  			<a href="/info_maurice"><img src="/assets/img/maurice5.jpg" alt="maurice" width="400px"></a>
		        </div>		       
		  		<div class="col-md-6">			  				
		  			<a href="/info_maurice">
		  				<h2>Mariage Religieux à L'île Maurice</h2>
		  			</a>
			  		<p>24 Octobre 2017</p>
			  		<a class="btn_lien_infos" href="/info_maurice">Plus d'infos</a>
			  		<form class="form_home" method="POST">
		                <p>Serez-vous présent le jour de notre mariage à l'ile Maurice ? *</p>
		                <input type="radio" name="rsvpMa" value="1" <?= (isset($profil['rsvpMa']) && $profil['rsvpMa'] == "1")? "checked": " " ?>> Oui
	                    <input type="radio" name="rsvpMa" value="0" <?= (isset($profil['rsvpMa']) && $profil['rsvpMa'] == "0")? "checked": " " ?>> Non
		                <button name="valid_home_Ma" class="btn btn_form_darkBlue">Valider</button>
		            </form>
		        </div>
	  		</div>
		</div>
	<?php endif ?>

	<?php if (isset($profil) && $profil['invitVin'] == "1") : ?>
		<div class="row bloc_home">
	  		<div class="container bloc_white">
		  		<div class="col-md-6">
		  			<h2><a href="/info_france">Vin d'honneur à Saint Germain En Laye</a></h2>
			  		<p>24 Juin 2017 - 18h</p>
			  		<a class="btn_lien_infos" href="/info_france">Plus d'infos</a>
			  		<form class="form_home" method="POST">
		                <p>Serez-vous présent pour le vin d'honneur à Saint Germain En Laye ?</p>
		                <input type="radio" name="rsvpVin" value="1" <?= (isset($profil['rsvpVin']) && $profil['rsvpVin'] == "1")? "checked": " " ?>> Oui
	                    <input type="radio" name="rsvpVin" value="0" <?= (isset($profil['rsvpVin']) && $profil['rsvpVin'] == "0")? "checked": " " ?>> Non
		                <button name="valid_home_Vin" class="btn btn_form_darkBlue">Valider</button>
		            </form>
		        </div>
	  			<div class="col-md-6 align_right">
		  			<a href="/info_france"><img src="/assets/img/vinshonneur.png" alt="vin d'honneur" width="400px"></a>
		        </div>
	  		</div>
		</div>
	<?php endif ?>


	<?php if (isset($profil) && $profil['bachelor'] == "1") : ?>
		<div class="row bloc_home">
	  		<div class="container bloc_white">
		  		<div class="col-md-6">
		  			<h2>L'enterrement de vie de garçon</h2>
			  		<p>XX xxxx 2017</p>
			  		<p>Proposez des idées d'activité sur le forum</p>
		        </div>
	  			<div class="col-md-6 align_right">
		  			<img src="/assets/img/evg.jpg" alt="saint germain" width="400px">
		        </div>
	  		</div>
		</div>	
	<?php endif ?>

	<?php if (isset($profil) && $profil['bachelorette'] == "1") : ?>
		<div class="row bloc_home">
	  		<div class="container bloc_white">
	  			<div class="col-md-6 align_left">
		  			<img src="/assets/img/evjf.jpg" alt="saint germain" width="400px">
		        </div>
		  		<div class="col-md-6">
		  			<h2>L'enterrement de vie de jeune fille</h2>
			  		<p>XX xxxx 2017</p>
			  		<p>Proposez des idées d'activité sur le forum</p>
		        </div>
	  		</div>
		</div>	
	<?php endif ?>



<?php $this->stop('main') ?>

<?php 
$this->start('footer');

	include '../app/templates/partials/footer.php';

$this->stop('footer');
?>

	
	
<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>


