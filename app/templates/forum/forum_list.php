<?php $this->layout('layout', ['title' => 'Forum']) ?>

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

	
	<!-- Forum Searchbar -->
	<?php  include '../app/templates/partials/search_forum.php'; ?>

	<!-- Forum Breadcrumb -->
	<?php  include '../app/templates/partials/breadcrumb.php'; ?>

	<!-- Forum Nav - Dynamic according to Roles -->
	<?php  include '../app/templates/partials/nav_forum.php'; ?>

	<!-- Posts Filtered by Category -->
	<?php if (!empty($filtered)) : ?>
	<div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              	
					<?php foreach ($filtered as $key => $value) : ?>
						<div class="forum_list">
							<a href="/forum/detail/<?= $value['id']?>"><h2 class="profile_head"> <?= $value['titre'] ?> </h2></a>
							<p> <?= $value['message'] ?> </p>
							<p> <?= $value['date_publication'] ?> </p>
							<p> <strong>Publié par : </strong> <?= $value['firstname']." ".$value['lastname'] ?> </p>
							<p> <strong>Categorie : </strong> <?= $value['category'] ?> </p>
							
							<!-- Access to Update and Delete if Logged user is author -->
							<div class="button">
								<a class="btn btn-primary rl-margin-buffer" href="/forum/detail/<?= $value['id']?>">Répondre</a>
								<?php if ($value['id_user'] == $_SESSION['id']) : ?>
									<a class="btn btn-default rl-margin-buffer" href="/forum/update/<?= $value['id'] ?>">Éditer</a>
									<a class="btn btn-danger rl-margin-buffer" href="/forum/delete/<?= $value['id'] ?>">Supprimer</a>
							<?php endif ?>
							</div>
							
		              	</div>
					<?php endforeach ; ?>
	                      
            </div> <!-- end col md 12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->
	<?php endif; ?>


<?php $this->stop('main') ?>


<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>


