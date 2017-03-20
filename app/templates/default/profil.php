<?php $this->layout('layout', ['title' => 'login']) ?>

<?php $this->start('css') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('/css/connect.css') ?>">

<style type="text/css">

	body {
		background-size: cover;
	}

</style>

<?php $this->stop('css') ?>

<?php $this->start('main') ?>

	<div class="container">
        <div class="row vertical_align">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom">
              	<div class="bloc_profile">

	                <h2 class="profile_head">Votre profil invité</h2>
	                
	                <form id="changeProfile" method="POST">
	                    
	                    <p>Toutes les informations suivantes pourront être modifiées ultèrieurement.</p>
	                  
	                    <input class="radius_top" type="text" name="prenom" value="<?php echo $_SESSION["firstname"];?>" placeholder="Prénom">
	                    
	                    <input class="radius_bottom" type="text" name="nom" value="<?php echo $_SESSION["lastname"]; ?>" placeholder="Nom">

	                    <div class=<?php if ( isset($errors['prenom']) || isset($errors['nom']) ) { echo "errorsProfil";} ?>>

		                    <p><?php if(isset($errors['prenom'])) { echo $errors['prenom'];} ?></p>
		                    <p><?php if(isset($errors['nom'])) { echo $errors['nom'];} ?></p>
		                </div>

	                    <input class="radius_top" type="email" name="email" value="<?php if(isset($profil['email'])) { echo $profil['email'];} ?>" placeholder="Email *">

	                    <input class="radius_bottom" type="password" name="password" value="" placeholder="Mot de Passe *">

	                    <div class=<?php if ( isset($errors['password']) || isset($errors['email']) ) { echo "errorsProfil";} ?>>

		                    <p><?php if(isset($errors['password'])) { echo $errors['password'];} ?></p>
		                    <p><?php if(isset($errors['email'])) { echo $errors['email'];} ?></p>
		                </div>
	           			
	           			<?php if (isset($profil) && $profil['invitFr'] == "1") : ?>
		                    <p>Seriez vous présent le jour de notre mariage en France le 24 Juin ? *</p>
		                    <input type="radio" name="rsvpFr" value="1" <?= (isset($profil['rsvpFr']) && $profil['rsvpFr'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="rsvpFr" value="0" <?= (isset($profil['rsvpFr']) && $profil['rsvpFr'] == "0")? "checked": " " ?>> Non

		                    <div class=<?php if (isset($errors['rsvpFr'])) { echo "errorsProfil";} ?>>
			                    <p><?php if(isset($errors['rsvpFr'])) { echo $errors['rsvpFr'];} ?></p>
			                </div>
			            <?php endif ?>

			            <?php if (isset($profil) && $profil['invitMa'] == "1") : ?>
		                    <p>Seriez vous présent le jour de notre mariage à l'ile Maurice le 24 Octobre ? *</p>
    	                    <input type="radio" name="rsvpMa" value="1" <?= (isset($profil['rsvpMa']) && $profil['rsvpMa'] == "1")? "checked": " " ?>> Oui
                        	<input type="radio" name="rsvpMa" value="0" <?= (isset($profil['rsvpMa']) && $profil['rsvpMa'] == "0")? "checked": " " ?>> Non

		                    <div class=<?php if (isset($errors['rsvpMa'])) { echo "errorsProfil";} ?>>
			                    <p><?php if(isset($errors['rsvpMa'])) { echo $errors['rsvpMa'];} ?></p>
			                </div>
			            <?php endif ?>
	   
	                  
	                    <p>Avez-vous ou votre(vos) enfant(s), des allergies alimentaires ou un régime alimentaire spécifique ? *</p>
	                    <input type="radio" name="diet" value="1" <?= (isset($profil['diet']) && $profil['diet'] == "1")? "checked": " " ?>> Oui
	                    <input type="radio" name="diet" value="0" <?= (isset($profil['diet']) && $profil['diet'] == "0")? "checked": " " ?>> Non

	                    <div class=<?php if (isset($errors['diet'])) { echo "errorsProfil";} ?>>
		                    <p><?php if(isset($errors['diet'])) { echo $errors['diet'];} ?></p>
		                </div>

	                    <textarea name="aliment_specs" class="<?= (isset($profil['diet']) && $profil['diet'] == "1")? "visible": "novisible" ?>" cols="100" placeholder="Si oui, de quel type ?"><?= (isset($profil['aliments']))? $profil['aliments']:"" ?></textarea>

	                    <div class=<?php if (isset($errors['aliment_specs'])) { echo "errorsProfil";} ?>>
		                    <p><?php if(isset($errors['aliment_specs'])) { echo $errors['aliment_specs'];} ?></p>
		                </div>


	                   <p>Venez-vous accompagné d'enfant(s) ? *</p>
	                    <input type="radio" name="enfants" value="1" <?= (isset($profil['children']) && $profil['children'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="enfants" value="0" <?= (isset($profil['children']) && $profil['children'] == "0")? "checked": " " ?>> Non

	                    <div class=<?php if (isset($errors['enfants'])) { echo "errorsProfil";} ?>>
		                    <p><?php if(isset($errors['enfants'])) { echo $errors['enfants'];} ?></p>
		                </div>

		                <div id="bloc_child" class="<?= (isset($profil['children']) && $profil['children'] == "1")? "visible": "novisible" ?>">

			                <label class="childLabel">1er Enfant</label>
			                <input type="text" name="child1Prenom" class="childInput" placeholder="Prénom" value="<?php if(isset($profil['ChildFirstname1'])) { echo $profil['ChildFirstname1'];} ?>">
			                <input type="text" name="child1Nom" class="childInput" placeholder="Nom" value="<?php if(isset($profil['ChildLastname1'])) { echo $profil['ChildLastname1'];} ?>">
			                <input type="text" name="child1Age" class="childInput" placeholder="Age" value="<?php if(isset($profil['ChildAge1'])) { echo $profil['ChildAge1'];} ?>">
		             
		                    <label class="childLabel">2ème Enfant</label>
		                   	<input type="text" name="child2Prenom" class="childInput" placeholder="Prénom" value="<?php if(isset($profil['ChildFirstname2'])) { echo $profil['ChildFirstname2'];} ?>">
			                <input type="text" name="child2Nom" class="childInput" placeholder="Nom" value="<?php if(isset($profil['ChildLastname2'])) { echo $profil['ChildLastname2'];} ?>">
			                <input type="text" name="child2Age" class="childInput" placeholder="Age" value="<?php if(isset($profil['ChildAge2'])) { echo $profil['ChildAge2'];} ?>">

		                    <label class="childLabel">3ème Enfant</label>
		                    <input type="text" name="child3Prenom" class="childInput" placeholder="Prénom" value="<?php if(isset($profil['ChildFirstname3'])) { echo $profil['ChildFirstname3'];} ?>">
			                <input type="text" name="child3Nom" class="childInput" placeholder="Nom" value="<?php if(isset($profil['ChildLastname3'])) { echo $profil['ChildLastname3'];} ?>">
			                <input type="text" name="child3Age" class="childInput" placeholder="Age" value="<?php if(isset($profil['ChildAge3'])) { echo $profil['ChildAge3'];} ?>">

		                    <div class=<?php if (isset($errors['enfants_name'])) { echo "errorsProfil";} ?>>
			                    <p><?php if(isset($errors['enfants_name'])) { echo $errors['enfants_name'];} ?></p>
			                </div>

			            </div>

	                    <p><span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Aidez-nous à faire notre playlist en nous disant ce que vous aimez :</p>
	                    <textarea name="musique" cols="100" placeholder="Un artiste, un album, un titre, un genre, une année, tout ce qui vous vient :)"><?php if(isset($profil['musique'])) { echo $profil['musique']; } ?></textarea>

	                    <button name="btnCreateProfile" id="btnChangeId" class="btn btn_profile">Valider</button>


	                </form>
                
              	</div> <!-- end bloc_profile -->
            </div> <!-- end col md 12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->

<?php $this->stop('main') ?>


<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/connect.js') ?>"></script>


<?php $this->stop('script') ?>






