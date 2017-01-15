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

	
	<!-- Results from Search -->
	<?php if(empty($search_result)) : ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3>Résultat Recherche : 0</h3>
					<p>Nous sommes désolés. Il n'y a pas de publication dans le forum concernant votre recherche.</p>
				</div>
			</div>
		</div>
	<?php endif ?>


	<?php if (!empty($search_result)) : ?>
	<div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              	
					<?php foreach ($search_result as $key => $value) : ?>
						<div class="forum_list">
							<a href="/forum/detail/<?= $value['id']?>"><h2 class="profile_head"> <?= $value['titre'] ?> </h2></a>
							<p> <?= $value['message'] ?> </p>
							<p> <?= $value['date_publication'] ?> </p>
							<p> <strong>Categorie : </strong> <?= $value['category'] ?> </p>
							
							<!-- Access to Update and Delete if Logged user is author -->
							<?php if ($value['id_user'] == $_SESSION['id']) : ?>
							<div class="button">
								<a class="btn btn-default rl-margin-buffer" href="/forum/update/<?= $value['id'] ?>">Éditer</a>
								<a class="btn btn-danger rl-margin-buffer" href="/forum/delete/<?= $value['id'] ?>">Supprimer</a>
							</div>
							<?php endif ?>
							
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


