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
	

	<div class="container vertical_align">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              	<div class="bloc_profile">

	                <h2 class="profile_head">Editez Votre Publication</h2>
	                
	                <form method="POST">
	                         
						<div class=<?php if (!empty($errors)) { echo "errors";} ?>>

		                    <p><?php if(isset($errors['title'])) { echo $errors['title'];} ?></p>
		                    <p><?php if(isset($errors['content'])) { echo $errors['content'];} ?></p>
		                </div>

	                    <label for="inp_title">Titre</label>
	                    <input type="text" class="form-control" name="inp_title" value="<?= $post[0]['titre'] ?>" id="inp_title">
	                    <p></p>
	                    <label for="inp_content">Contenu</label>
	                    <input type="text" class="form-control" name="inp_content" value="<?= $post[0]['message'] ?>" id="inp_content">
						<p></p>
                    	<p class="form-control yellow">Nous vous informons que vous ne pouvez pas changer la catégorie de votre post.</p>


	                    <button name="btn_f_update" id="btn_f_update" class="btn tb-margin-buffer">Éditer</button>


	                </form>
                
              	</div> <!-- end bloc_profile -->
            </div> <!-- end col md 12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->






<?php $this->stop('main') ?>


<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>


