<?php $this->layout('layout', ['title' => 'Contacter Invités']) ?>

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
    
            <pre>
                <?php (isset($emailMaurice)) ? var_dump($emailMaurice) : "" ?>
            </pre>
            <div class="forum_list">
                <h2>Contactez vos invités par email</h2>

                <h3><?= (isset($message))? $message:""; ?></h3>

                <form class="form-horizontal" method="POST">

                    <div class="form-group">
                        <label for="emailId" class="col-sm-2 control-label">Objet</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emailId" placeholder="Objet de l'email" name="objet">
                            <p><?php if(isset($emailErrors['objet'])){ echo $emailErrors['objet']; } ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contenuId" class="col-sm-2 control-label">Contenu de votre email</label>
                        <div class="col-sm-10">
                            <textarea id="contenuId" class="form-control" rows="3" name="contenu"></textarea>
                            <p><?php if(isset($emailErrors['contenu'])){ echo $emailErrors['contenu']; } ?></p>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="groupeId" class="col-sm-2 control-label">Quel groupe ?</label>
                        <div class="col-sm-offset-2 col-sm-10">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="groupeId" name="groupeMa" value="3"> Maurice
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="groupeId" name="groupeFr" value="2"> France
                            </label>
                            <p><?php if(isset($emailErrors['checkbox'])){ echo $emailErrors['checkbox']; } ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-default" name="envoyer">Envoyer</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end of forum_list -->

        </div>
    </div>
</div>





<?php $this->stop('main') ?>


<?php $this->start('script') ?>


    <script src="<?= $this->assetUrl('/js/admin.js') ?>"></script>


<?php $this->stop('script') ?>

