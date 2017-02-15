<?php $this->layout('layout', ['title' => 'Admin']) ?>

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

    <div id="tabs" class="container">

        <ul class="nav nav-tabs">
            <li class="active" role="presentation"><a href="#tabs-1">Statistiques</a></li>
            <li role="presentation"><a href="#tabs-2">Liste</a></li>
            <li role="presentation"><a href="#tabs-3">Maurice</a></li>
            <li role="presentation"><a href="#tabs-4">France</a></li>
            <li role="presentation"><a href="#tabs-5">La nourriture</a></li>
            <li role="presentation"><a href="#tabs-6">La musique !</a></li>
            <li role="presentation"><a href="#tabs-7">Les gosses</a></li>
        </ul>
    

        <div id="tabs-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="forum_list">
                        <h2>Quelques Stats sur le mariage à l'île Maurice</h2>
                        <div class="stats">
                                <div class="stat">
                                    <div class="circle">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>  
                                    <p><?= $nbInvites['count'] ?> invités</p>
                                </div>
                                <div class="stat">
                                    <div class="circle">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>  
                                    <p><?= $yesGuestCountMaurice['count'] ?> Oui</p>
                                </div>
                                <div class="stat">
                                    <div class="circle">
                                        <i class="fa fa-close" aria-hidden="true"></i>
                                    </div>  
                                    <p><?= $noGuestCountMaurice['count'] ?> Non</p>
                                </div>
                            </div>
                        </div>
                        <div class="forum_list">
                        <h2>Quelques Stats sur le mariage en France</h2>
                        <div class="stats">
                            <div class="stat">
                                <div class="circle">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>  
                                <p><?= $nbInvites['count'] ?> invités</p>
                            </div>
                            <div class="stat">
                                <div class="circle">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>  
                                <p><?= $yesGuestCountFrance['count'] ?> Oui</p>
                            </div>
                            <div class="stat">
                                <div class="circle">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </div>  
                                <p><?= $noGuestCountFrance['count'] ?> Non</p>
                            </div>
                        </div> 
                    </div> <!-- end of forum_list -->
                </div>
            </div> 
        </div> <!-- end of tabs-1 -->


        <div id="tabs-2">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">            
                    <div class="forum_list">
                        <h2>Liste de vos invités</h2>
                        <table class="table table-hover">
                            <tr class="grey">
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>

                            <?php foreach ($invites as $key => $value) { ?>

                            <tr class="blue">
                                <td><?= $invites[$key]['lastname']; ?></td>
                                <td><?= $invites[$key]['firstname']; ?></td>
                            </tr>
                            <tr class="infos_invite">
                                <td><?= $invites[$key]['email']; ?><br>Diet : <?= $invites[$key]['diet']; ?><br>France : <?= $invites[$key]['rsvpFr']; ?></td>
                                <td>enfant : <?= $invites[$key]['children']; ?><br>Aliments : <?= $invites[$key]['aliments']; ?><br>Maurice : <?= $invites[$key]['rsvpMa']; ?></td>
                            </tr>

                            <?php  } ?>

                        </table>
                    </div>   <!-- end of forum_list -->             
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of tabs-2 -->

        <div id="tabs-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="forum_list">
                        <h2>Liste des Ouis !</h2>
                        <table class="table table-hover">
                            <tr class="grey">
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                            <?php foreach ($invitesOuiMa as $key => $value) { ?>

                            <tr class="blue">
                                <td><?= $invitesOuiMa[$key]['lastname']; ?></td>
                                <td><?= $invitesOuiMa[$key]['firstname']; ?></td>
                            </tr>
                            <tr class="infos_invite">
                                <td><?= $invitesOuiMa[$key]['email']; ?><br>Diet : <?= $invitesOuiMa[$key]['diet']; ?><br>France : <?= $invitesOuiMa[$key]['rsvpFr']; ?></td>
                                <td>enfant : <?= $invitesOuiMa[$key]['children']; ?><br>Aliments : <?= $invitesOuiMa[$key]['aliments']; ?><br>Maurice : <?= $invitesOuiMa[$key]['rsvpMa']; ?></td>
                            </tr>

                            <?php  } ?>
                        </table>
                    </div>   <!-- end of forum_list -->      
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                    <div class="forum_list">
                        <h2>Liste des Nons !</h2>
                        <table class="table table-hover">

                            <tr class="grey">
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>

                            <?php foreach ($invitesNonMa as $key => $value) { ?>

                            <tr class="blue">
                                <td><?= $invitesNonMa[$key]['lastname']; ?></td>
                                <td><?= $invitesNonMa[$key]['firstname']; ?></td>
                            </tr>
                            <tr class="infos_invite">
                                <td><?= $invitesNonMa[$key]['email']; ?><br>Diet : <?= $invitesNonMa[$key]['diet']; ?><br>France : <?= $invitesNonMa[$key]['rsvpFr']; ?></td>
                                <td>enfant : <?= $invitesNonMa[$key]['children']; ?><br>Aliments : <?= $invitesNonMa[$key]['aliments']; ?><br>Maurice : <?= $invitesNonMa[$key]['rsvpMa']; ?></td>
                            </tr>

                            <?php  } ?>

                        </table>
                    </div>   <!-- end of forum_list -->            
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of tabs-3 -->

        <div id="tabs-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="forum_list">
                        <h2>Liste des Ouis !</h2>
                        <table class="table table-hover">

                            <tr class="grey">
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>

                            <?php foreach ($invitesOuiFr as $key => $value) { ?>

                            <tr class="blue">
                                <td><?= $invitesOuiFr[$key]['lastname']; ?></td>
                                <td><?= $invitesOuiFr[$key]['firstname']; ?></td>
                            </tr>
                            <tr class="infos_invite">
                                <td><?= $invitesOuiFr[$key]['email']; ?><br>Diet : <?= $invitesOuiFr[$key]['diet']; ?><br>France : <?= $invitesOuiFr[$key]['rsvpFr']; ?></td>
                                <td>enfant : <?= $invitesOuiFr[$key]['children']; ?><br>Aliments : <?= $invitesOuiFr[$key]['aliments']; ?><br>Maurice : <?= $invitesOuiFr[$key]['rsvpMa']; ?></td>
                            </tr>

                            <?php  } ?>

                        </table>
                    </div>   <!-- end of forum_list -->     
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="forum_list">
                        <h2>Liste des Nons !</h2>
                        <table class="table table-hover">
                            <tr class="grey">
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                            <?php foreach ($invitesNonFr as $key => $value) { ?>

                            <tr class="blue">
                                <td><?= $invitesNonFr[$key]['lastname']; ?></td>
                                <td><?= $invitesNonFr[$key]['firstname']; ?></td>
                            </tr>
                            <tr class="infos_invite">
                                <td><?= $invitesNonFr[$key]['email']; ?><br>Diet : <?= $invitesNonFr[$key]['diet']; ?><br>France : <?= $invitesNonFr[$key]['rsvpFr']; ?></td>
                                <td>enfant : <?= $invitesNonFr[$key]['children']; ?><br>Aliments : <?= $invitesNonFr[$key]['aliments']; ?><br>Maurice : <?= $invitesNonFr[$key]['rsvpMa']; ?></td>
                            </tr>

                            <?php  } ?>
                        </table>
                    </div>   <!-- end of forum_list -->          
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of tabs-4 -->

        <div id="tabs-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div>
                        <h2>Les exigences alimentaires de vos invités !</h2>
                        <table class="table">

                            <tr>
                                <th>Quoi ?</th>
                                <th>Qui ? </th>
                            </tr>

                            <?php foreach ($listFood as $key => $value) { ?>
                                <?php if(!empty($listFood[$key]['aliments'])) : ?>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-glass" aria-hidden="true"></span>
                                            <?= $listFood[$key]['aliments']; ?>
                                        </td>
                                        <td>
                                            <?= $listFood[$key]['firstname'].' '.$listFood[$key]['lastname']; ?> 
                                        </td>
                                    </tr>
                                <?php endif ?>

                            <?php  } ?>

                        </table>
                    </div>   <!-- end of forum_list -->     
                </div>
            </div> 
        </div> <!-- end of tabs-5 -->
        <div id="tabs-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div>
                        <h2>Les exigences musicales de vos invités :)</h2>
                        <table class="table">

                            <?php foreach ($listMusic as $key => $value) { ?>
                                <?php if(!empty($listMusic[$key]['musique'])) : ?>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                                            <?= $listMusic[$key]['musique']; ?>
                                        </td>
                                    </tr>
                                <?php endif ?>

                            <?php  } ?>

                        </table>
                    </div>   <!-- end of forum_list -->     
                </div>
            </div> 
        </div> <!-- end of tabs-6 -->

        <div id="tabs-7">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div>
                        <h2>Les enfants de vos invités</h2>
                        <table class="table">

                            <?php foreach ($listMusic as $key => $value) { ?>
                                <?php if(!empty($listMusic[$key]['musique'])) : ?>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                                            <?= $listMusic[$key]['musique']; ?>
                                        </td>
                                    </tr>
                                <?php endif ?>

                            <?php  } ?>

                        </table>
                    </div>   <!-- end of forum_list -->     
                </div>
            </div> 
        </div> <!-- end of tabs-7 -->


    </div> <!-- end of TABS -->


    


<?php $this->stop('main') ?>

<?php $this->start('script') ?>


    <script src="<?= $this->assetUrl('/js/admin.js') ?>"></script>


<?php $this->stop('script') ?>


