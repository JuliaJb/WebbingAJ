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

	<?php include '../app/templates/partials/search_forum.php'; ?>	
	<?php  include '../app/templates/partials/breadcrumb.php'; ?>
	

	
	<div class="container">
		<div class="col-lg-12 forum_list bloc_question">

			<h1><?= $post[0]['titre'] ?></h1>
			<div class="row">
				<div class="col-lg-7 col-md-7 border-right">
					<p> <?= $post[0]['message'] ?> </p>
				</div>
				<div class="col-lg-5 col-md-5">
					<p>Message publié par : <?= $post[0]['firstname']." ".$post[0]['lastname'] ?></p> 
					<p>Le : <?= $post[0]['date_publication'] ?> </p>
				</div>
			</div>
			
			<a href="#reply_form" class="a_reply btn btn-primary">Répondre</a>
			
		</div>		
	</div>

	<div class="container">
		
		<?php if (!empty($reponses)) : ?>         	
			<?php foreach ($reponses as $key => $value) : ?>
				<div class="col-lg-12 col-md-12 reponses">
					<div class="row">
						<div class="col-lg-6 col-md-6 border-right">
							<p><?= $value['message'] ?></p>
						</div>
						<div class="col-lg-4 col-md-4">
							<p>Message publié par : <?= $value['firstname']." ".$value['lastname'] ?></p>
							<p>Le : <?= $value['date_pub'] ?></p>
						</div>
					</div>
				</div>
			<?php endforeach ; ?>                	                      
		<?php endif; ?>

	</div>

	<div class="container">
		<div class="col-lg-12 forum_list bloc_reponse">
			<h2 id="reply_form">Répondre : </h2>		
	
			<form method="POST">
	             
               <!-- Affichage Errors -->
				<div class=<?php if (!empty($r_errors)) { echo "errors";} ?>>
                    <p><?php if(isset($r_errors['content'])) { echo $r_errors['content'];} ?></p>
                </div>
                
                <label for="inp_content">Réponse</label>
                <input type="text" class="form-control" name="inp_content" placeholder="Rédigez votre réponse ici" id="inp_content">

                <button name="btn_f_reply" id="btn_f_reply" class="a_reply btn btn-primary">Poster ma réponse</button>

            </form>
		</div>
	</div>




<?php $this->stop('main') ?>



<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>
	<script src="<?= $this->assetUrl('/js/forum.js') ?>"></script>


<?php $this->stop('script') ?>


