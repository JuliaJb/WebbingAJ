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
    <li><a href="/admin">Admin</a></li>
    <li><a href="/admin/ajouter_invite">Ajouter Invité</a></li>
    <li class="active">Ajouter Invité</li>
</ol>

<?php include '../app/templates/partials/categorie_admin.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
                
            <div class="forum_list">
                <h2>Quels rôles voulez-vous attribuer à votre invité ? </h2>

                <?php if(!empty($new_user)) :  ?>
                    <h3>Votre Invité : <strong><?= $new_user['firstname']." ".$new_user['lastname'] ?></strong></h3>
                <?php endif ?>

                <form id="addGuest" method="POST">
                          
                    <p>Invité au mariage en France ? *</p>
                    <input type="radio" name="invitFr" value="1"> Oui
                    <input type="radio" name="invitFr" value="0"> Non

                    <p>Invité uniquement au vin d'honneur ? *</p>
                    <input type="radio" name="invitVin" value="1"> Oui
                    <input type="radio" name="invitVin" value="0"> Non

                    <p>Invité au mariage à l'ile Maurice ? *</p>
                    <input type="radio" name="invitMa" value="1"> Oui
                    <input type="radio" name="invitMa" value="0"> Non

                    <p>Fera-t-il partie des bachelors ? *</p>
                    <input type="radio" name="bachelor" value="1"> Oui
                    <input type="radio" name="bachelor" value="0"> Non

                    <p>Fera-t-il partie des bachelorettes ? *</p>
                    <input type="radio" name="bachelorette" value="1"> Oui
                    <input type="radio" name="bachelorette" value="0"> Non


                    <br>
                    <button name="btnAddGuest" id="btnChangeId" class="btn btn-primary">Ajouter l'invité</button>


                </form>

        </div>
    </div>
</div>





<?php $this->stop('main') ?>

<?php $this->start('script') ?>


    <script src="<?= $this->assetUrl('/js/admin.js') ?>"></script>


<?php $this->stop('script') ?>

