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

	<?php include '../app/templates/partials/search_forum.php'; 
		  include '../app/templates/partials/breadcrumb.php';
	?>	
	

	<div class="container">
		<div class="col-lg-10 forum_list">
			<div class="forum_title">
				<h1>Suppression de votre Publication</h1>			
			</div>
		</div>
	</div>

	<pre>
		<?php print_r($post) ?>
	</pre>

	<?php if(!empty($post)) : ?>
	<div class="container">
		<div class="col-lg-10 forum_list">
			<div class="forum_title">
				<h1><?= $post[0]['titre'] ?></h1>
			</div>

			<div class="row">
				<div class="col-lg-7 col-md-7 border-right">
					<p> <?= $post[0]['message'] ?> </p>
				</div>
				<div class="col-lg-5 col-md-5">
					<p>Message publié par : <?= $post[0]['firstname']." ".$post[0]['lastname'] ?></p> 
					<p>Le : <?= $post[0]['date_publication'] ?> </p>
				</div>
			</div>						
		</div>		
	</div>

	<?php endif ?>


	<div class="container">
		<div class="col-lg-10 forum_list">
			<form action="" method="POST">
				<p>Êtes vous sur de vouloir supprimer votre publication? </p>
				
				<div class="radio">
					<label><input type="radio" name="delete" value="1">Oui</label>
				</div>
				
				<div class="radio">
					<label><input type="radio" name="delete" value="0">Non</label>
				</div>

				<button name="btn_f_delete" class="btn btn-danger">Effacer</button>
			</form>
		</div>
	</div>




<?php $this->stop('main') ?>


<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>


