<?php $this->layout('layout', ['title' => 'Profil Invités']) ?>

<?php $this->start('css') ?>

    <link rel="stylesheet" href="<?= $this->assetUrl('/css/main.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('/css/forum.css') ?>">

<?php $this->stop('css') ?>

<?php 

$this->start('nav');

    include '../app/templates/partials/nav.php';

$this->stop('nav');

?>


<?php $this->start('main') ?>
    

<?php include '../app/templates/partials/categorie_admin.php'; ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="forum_list">
                    <h2>Quel profil souhaitez-vous modifier ?</h2>
                    <form id="adminNames" method="POST">
                        <label>Nom</label>
                        <select id="lastname" name="lastname">
                            <option value="" disabled selected>-- selectionnez le nom --</option>
                            <?php foreach ($invites as $key => $value) { ?>

                                <option value="<?= $invites[$key]['lastname']; ?>"><?= $invites[$key]['lastname']; ?>

                            <?php  } ?>
                        </select>
                        <label>Prénom</label>
                        <select id="firstname" name="firstname">
                            <option value="" disabled selected>-- selectionnez le prénom --</option>
                            <?php foreach ($invites as $key => $value) { ?>

                                <option class="<?= $invites[$key]['lastname']; ?>" value="<?= $invites[$key]['firstname']; ?>"><?= $invites[$key]['firstname']; ?>

                            <?php  } ?>
                        </select>
                        <button name="btnAdminNames" id="btnAdminNames" class="btn">OK !</button>
                    </form>

                    <p><?= (isset($message))? $message:"" ?></p>
                        
                    <form class="<?= $isvisible ?>" id="adminProfile" method="POST">
                        
                        <div class=<?php if ( isset($errors['prenom']) || isset($errors['nom']) ) { echo "errorsProfil";} ?>>

                            <p><?php if(isset($errors['prenom'])) { echo $errors['prenom'];} ?></p>
                            <p><?php if(isset($errors['nom'])) { echo $errors['nom'];} ?></p>
                        </div>
                        

                        <input type="hidden" name="id" value="<?php if(isset($profilGuest['id'])) { echo $profilGuest['id'];} ?>">

                        <input type="text" name="firstname" placeholder="Prénom *" value="<?php if(isset($profilGuest['firstname'])) { echo $profilGuest['firstname'];} ?>">

                        <input type="text" name="lastname" placeholder="Nom *" value="<?php if(isset($profilGuest['lastname'])) { echo $profilGuest['lastname'];} ?>">

                        <input type="email" name="email" placeholder="Email *" value="<?php if(isset($profilGuest['email'])) { echo $profilGuest['email'];} ?>">

                        <input type="password" name="password" placeholder="Mot de Passe">

                        <div class=<?php if ( isset($errors['password']) || isset($errors['email']) ) { echo "errorsProfil";} ?>>

                            <p><?php if(isset($errors['password'])) { echo $errors['password'];} ?></p>
                            <p><?php if(isset($errors['email'])) { echo $errors['email'];} ?></p>
                        </div>

                      
                        <p>Sera t-il(elle) présent le 24 juin en France ? *</p>
                        <input type="radio" name="rsvpFr" value="1" <?= (isset($profilGuest['rsvpFr']) && $profilGuest['rsvpFr'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="rsvpFr" value="0" <?= (isset($profilGuest['rsvpFr']) && $profilGuest['rsvpFr'] == "0")? "checked": " " ?>> Non

                        <div class=<?php if (isset($errors['rsvpFr'])) { echo "errorsProfil";} ?>>
                            <p><?php if(isset($errors['rsvpFr'])) { echo $errors['rsvpFr'];} ?></p>
                        </div>

                        <p>Sera t-il(elle) présent le 24 octobre à L'île Maurice ? *</p>
                        <input type="radio" name="rsvpMa" value="1" <?= (isset($profilGuest['rsvpMa']) && $profilGuest['rsvpMa'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="rsvpMa" value="0" <?= (isset($profilGuest['rsvpMa']) && $profilGuest['rsvpMa'] == "0")? "checked": " " ?>> Non

                        <div class=<?php if (isset($errors['rsvpMa'])) { echo "errorsProfil";} ?>>
                            <p><?php if(isset($errors['rsvpMa'])) { echo $errors['rsvpMa'];} ?></p>
                        </div>
       
                      
                        <p>A-t-il(elle) des allergies ou restrictions alimentaires ? *</p>
                        <input type="radio" name="regime" value="1" <?= (isset($profilGuest['diet']) && $profilGuest['diet'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="regime" value="0" <?= (isset($profilGuest['diet']) && $profilGuest['diet'] == "0")? "checked": " " ?>> Non

                        <div class=<?php if (isset($errors['regime'])) { echo "errorsProfil";} ?>>
                            <p><?php if(isset($errors['regime'])) { echo $errors['regime'];} ?></p>
                        </div>

                        <textarea name="aliment_specs" id="" cols="100" placeholder="Si oui, de quel type ?"><?= (isset($profilGuest['aliments']))? $profilGuest['aliments']:"" ?></textarea>

                        <div class=<?php if (isset($errors['aliment_specs'])) { echo "errorsProfil";} ?>>
                            <p><?php if(isset($errors['aliment_specs'])) { echo $errors['aliment_specs'];} ?></p>
                        </div>

                        <p>Est-il(elle) invité(e) au mariage en France ? *</p>
                        <input type="radio" name="invitFr" value="1" <?= (isset($profilGuest['invitFr']) && $profilGuest['invitFr'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="invitFr" value="0" <?= (isset($profilGuest['invitFr']) && $profilGuest['invitFr'] == "0")? "checked": " " ?>> Non

                        <p>Est-il(elle) invité(e) au mariage à Maurice ? *</p>
                        <input type="radio" name="invitMa" value="1" <?= (isset($profilGuest['invitMa']) && $profilGuest['invitMa'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="invitMa" value="0" <?= (isset($profilGuest['invitMa']) && $profilGuest['invitMa'] == "0")? "checked": " " ?>> Non

                        <p>Fait-il(elle) partie des bachelor ? *</p>
                        <input type="radio" name="bachelor" value="1" <?= (isset($profilGuest['bachelor']) && $profilGuest['bachelor'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="bachelor" value="0" <?= (isset($profilGuest['bachelor']) && $profilGuest['bachelor'] == "0")? "checked": " " ?>> Non

                        <p>Fait-il(elle) partie des bachelorette ? *</p>
                        <input type="radio" name="bachelorette" value="1" <?= (isset($profilGuest['bachelorette']) && $profilGuest['bachelorette'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="bachelorette" value="0" <?= (isset($profilGuest['bachelorette']) && $profilGuest['bachelorette'] == "0")? "checked": " " ?>> Non

                        <p>Fait-il(elle) partie des Admin ? *</p>
                        <input type="radio" name="admin" value="1" <?= (isset($profilGuest['admin']) && $profilGuest['admin'] == "1")? "checked": " " ?>> Oui
                        <input type="radio" name="admin" value="0" <?= (isset($profilGuest['admin']) && $profilGuest['admin'] == "0")? "checked": " " ?>> Non

                        <br>

                        <button name="btnAdminProfile" id="btnChangeId" class="btn">Enregistrer les modifications</button>

                    </form>
                </div>   <!-- end of forum_list -->     
                          
            </div>
        </div> 
    </div> 



<?php $this->stop('main') ?>

<?php $this->start('script') ?>


    <script src="<?= $this->assetUrl('/js/admin.js') ?>"></script>


<?php $this->stop('script') ?>

