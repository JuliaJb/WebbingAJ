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
	
	<?php $adminkey = array_search('Admin', $_SESSION['roles']) ?>
	<?php if ($adminkey) : ?>
		<?php if (!empty($result)) : ?>
		<!-- List of all posts, all categories, only superadmin -->
		<div class="container">
	        <div class="row">
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	              	
						<?php foreach ($result as $key => $value) : ?>
							<div class="forum_list">
								<a href="/forum/detail/<?= $value['id']?>"><h2 class="profile_head"> <?= $value['titre'] ?> </h2></a>
								<p> <?= $value['titre'] ?> </p>
								<p> <?= $value['message'] ?> </p>
								<p> <?= $value['date_publication'] ?> </p>
								<p> <strong>Categorie : </strong> <?= $value['category'] ?> </p>
			              	</div> 
						<?php endforeach ; ?>  

	            </div> <!-- end col md 12 -->
	        </div> <!-- end row -->
	    </div> <!-- end container -->
		<?php endif; ?>
	<?php else : ?>
		<div class="container">
			<div class="row">
				<h2>Vous n'êtes pas autorisé à voir cette page.</h2>
				<p>Si vous souhaitez consulter le Forum, suivez ce lien : </p>
				<a class="btn btn-primary" href="/forum/<?= $_SESSION['roles'][0] ?>">FORUM</a>
			</div>
		</div>
	<?php endif ?>


<?php $this->stop('main') ?>


<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>


