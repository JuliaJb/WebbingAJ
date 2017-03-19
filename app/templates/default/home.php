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
		  			<h2><a href="/info_france">Mariage Civil à Saint-Germain-En-Laye</a></h2>
			  		<p>24 Juin 2017 - 15h</p>
			  		<a class="btn_lien_infos" href="/info_france">Plus d'infos</a>
			  		<form class="form_home" method="POST">
		                <h4>Serez-vous présent le jour de notre mariage en France ?</h4>
		                <input type="radio" name="rsvpFr" value="1" <?= (isset($profil['rsvpFr']) && $profil['rsvpFr'] == "1")? "checked": " " ?>> 
		                <?php if(isset($profil['rsvpFr']) && $profil['rsvpFr'] == "1") : ?> 
		                	<p class="home_answer">Oui oui oui, je l'ai déjà dit !</p>
		                <?php endif ?>
		                <?php if(isset($profil['rsvpFr']) && $profil['rsvpFr'] == "0") : ?>
		                	<p class="home_answer"> Oui ! Finalement je suis disponible !</p>
		                <?php endif ?>
		                <br>
	                    <input type="radio" name="rsvpFr" value="0" <?= (isset($profil['rsvpFr']) && $profil['rsvpFr'] == "0")? "checked": " " ?>>
	                    <?php if(isset($profil['rsvpFr']) && $profil['rsvpFr'] == "1") : ?> 
		                	<p class="home_answer">Non, finalement je ne suis pas disponible</p>
		                <?php endif ?>
		                <?php if(isset($profil['rsvpFr']) && $profil['rsvpFr'] == "0") : ?>
		                	<p class="home_answer"> Non, toujours pas...</p>
		                <?php endif ?>
		                <button name="valid_home_Fr" class="btn btn_form_darkBlue btn_home">Valider</button>
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
			  		<p>24 Octobre 2017 - 15h</p>
			  		<a class="btn_lien_infos" href="/info_maurice">Plus d'infos</a>
			  		<form class="form_home" method="POST">

		                <h4>Serez-vous présent le jour de notre mariage à l'ile Maurice ?</h4>
		                <input type="radio" name="rsvpMa" value="1" <?= (isset($profil['rsvpMa']) && $profil['rsvpMa'] == "1")? "checked": " " ?>> 
		                <?php if(isset($profil['rsvpMa']) && $profil['rsvpMa'] == "1") : ?> 
		                	<p class="home_answer">Oui oui oui, je l'ai déjà dit !</p>
		                <?php endif ?>
		                <?php if(isset($profil['rsvpMa']) && $profil['rsvpMa'] == "0") : ?>
		                	<p class="home_answer"> Oui ! Finalement je suis disponible !</p>
		                <?php endif ?>
		                <br>
	                    <input type="radio" name="rsvpMa" value="0" <?= (isset($profil['rsvpMa']) && $profil['rsvpMa'] == "0")? "checked": " " ?>> 
	                    <?php if(isset($profil['rsvpMa']) && $profil['rsvpMa'] == "1") : ?> 
		                	<p class="home_answer">Non, finalement je ne suis pas disponible</p>
		                <?php endif ?>
		                <?php if(isset($profil['rsvpMa']) && $profil['rsvpMa'] == "0") : ?>
		                	<p class="home_answer"> Non, toujours pas...</p>
		                <?php endif ?>
		                <button name="valid_home_Ma" class="btn btn_form_darkBlue btn_home">Valider</button>
		            </form>
		        </div>
	  		</div>
		</div>
	<?php endif ?>

	<?php if (isset($profil) && $profil['bachelor'] == "1") : ?>
		<div class="row bloc_home">
	  		<div class="container bloc_white">
		  		<div class="col-md-6">
		  			<h2>L'enterrement de vie de garçon</h2>
			  		<h3>XX xxxx 2017</h3>
			  		<h4>Vous faites partie des heureux élus invités pour partager ce moment avec Joan Dercy ! </h4>
			  		<h5>Pour toute question concernant cet évènement vous pouvez contacter : 
			  		<h5>Maxime Balmont (06 89 13 61 93), Adrien Dupetitpré (06 79 86 15 22),<br> Ronan Le Gall (06 22 37 16 35)</h5>
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
			  		<h3>XX xxxx 2017</h3>
			  		<h4>Vous faites partie des heureuses élues invitées pour partager ce moment avec Alexandra Barse ! </h4>
			  		<h5>Pour toute question concernant cet évènement vous pouvez contacter :
			  		<h5>Florence Dabas (06 83 87 60 24), Florence Aupée (06 82 32 03 84), Sandy Desnoyers (07 50 34 72 94) ou Julia Jacob (06 85 39 93 04)</h5>
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


