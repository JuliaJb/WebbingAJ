<?php $this->layout('layout', ['title' => 'Ajouter Invité']) ?>

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
    
<ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    <li><a href="/forum">Admin</a></li>
    <li class="active">Ajouter Invité</li>
</ol>

<?php include '../app/templates/partials/categorie_admin.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         
            <div id="invite_div" class="forum_list">
                <div class="one-third">
                    <h2 class="inv-h2">Qui voulez-vous inviter?</h2>

                    <?php if(!empty($errors)) :  ?>
                        <div class="errors">
                            <?php foreach ($errors as $key => $value) : ?>
                                <p class="error"><?= $value ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <form action="" method="POST">
                        <fieldset id="fieldset_ajout">
                            <div class="form-group">
                                <label for="inp_firstname">Prénom</label>
                                <input type="text" id="inp_firstname" class="form-control" placeholder="" name="inp_firstname">
                            </div>
                            <div class="form-group">
                                <label for="inp_lastname">Nom</label>
                                <input type="text" id="inp_lastname" class="form-control" placeholder="" name="inp_lastname">
                            </div>
                            <button name="btn_ajouter" class="btn btn-blue">Inviter</button>
                        </fieldset>
                    </form>
                </div>


                <div class="two-thirds border-left <?= $visiclass ?>">
                    <h2 class="inv-h2">Complétez l'invitation</h2>
                    <form id="addGuest" class="tb-margin-buffer" method="POST">
                            
                            <?php if (!empty($new_user)) : ?>
                            <div class="inv-radio">
                                <p><strong><?= $new_user['firstname']." ".$new_user['lastname']?></strong></p>
                            </div>
                            <?php endif ?>
                    
                            <input type="hidden" name="upId" value="<?= $upId ?>">

                            <?= (!empty($c_errors['invitFr'])) ? "<div class='invit-error'><p>".$c_errors['invitFr']."</p></div>" : ""  ?>
                            <div class="inv-radio">
                                <p>Invité au mariage en France ? *</p>
                                <input type="radio" name="invitFr" value="1"> Oui
                                <input type="radio" name="invitFr" value="0"> Non
                            </div>
      
                            <?= (!empty($c_errors['invitVin'])) ? "<div class='invit-error'><p>".$c_errors['invitVin']."</p></div>" : ""  ?>                      
                            <div class="inv-radio">
                                <p>Invité uniquement au vin d'honneur ? *</p>
                                <input type="radio" name="invitVin" value="1"> Oui
                                <input type="radio" name="invitVin" value="0"> Non
                            </div>

                            <?= (!empty($c_errors['invitMa'])) ? "<div class='invit-error'><p>".$c_errors['invitMa']."</p></div>" : ""  ?>                      
                            <div class="inv-radio">
                                <p>Invité au mariage à l'ile Maurice ? *</p>
                                <input type="radio" name="invitMa" value="1"> Oui
                                <input type="radio" name="invitMa" value="0"> Non
                            </div>

                            <?= (!empty($c_errors['bachelor'])) ? "<div class='invit-error'><p>".$c_errors['bachelor']."</p></div>" : ""  ?>                      
                            <div class="inv-radio">
                                <p>Fera-t-il partie de l'EVG ? *</p>
                                <input type="radio" name="bachelor" value="1"> Oui
                                <input type="radio" name="bachelor" value="0"> Non
                            </div>

                            <?= (!empty($c_errors['bachelorette'])) ? "<div class='invit-error'><p>".$c_errors['bachelorette']."</p></div>" : ""  ?>                      
                            <div class="inv-radio">
                                <p>Fera-t-il partie de l'EVJF ? *</p>
                                <input type="radio" name="bachelorette" value="1"> Oui
                                <input type="radio" name="bachelorette" value="0"> Non
                            </div>

                            <br>
                            <button name="btnAddGuest" id="btnChangeId" class="btn btn-blue">Inviter</button>


                        </form>
                </div>
          </div>

        </div>
    </div>
</div>





<?php $this->stop('main') ?>


<?php $this->start('script') ?>


    <script src="<?= $this->assetUrl('/js/admin.js') ?>"></script>


<?php $this->stop('script') ?>

