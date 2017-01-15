<?php 
$manager = new \Manager\UserManager();
$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);
?>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home">Alexandra &amp; Joan</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/home"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <?php if (isset($profil) && $profil['invitFr'] == "1" && $profil['invitMa'] == "1" ) : ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Infos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/info_maurice">Infos Maurice</a></li>
                                <li><a href="/info_france">Infos France</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                  
                    <?php if (isset($profil) && $profil['invitFr'] == "1" && $profil['invitMa'] == "0" ) : ?>
                        <li><a href="/info_france">Infos</a></li>
                    <?php endif ?>
                  
                    <?php if (isset($profil) && $profil['invitFr'] == "0" && $profil['invitMa'] == "1" ) : ?>
                        <li><a href="/info_maurice">Infos</a></li>
                    <?php endif ?>
                </ul>
                  
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bonjour <?php echo $_SESSION['firstname'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/mon_profil">Mon profil</a></li>
                            <li><a href="/deconnexion">Deconnexion</a></li>
                            <?php if (isset($profil) && ( $profil['admin'] == "1" || $profil['marie'] == "1" ) ) : ?>
                                <li role="separator" class="divider"></li>
                                <li><a href="/admin">Admin</a></li>
                                <li><a href="/plan">Plan de table</a></li>
                            <?php endif ?>
                        </ul>
                    </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>