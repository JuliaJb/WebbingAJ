<?php $this->layout('layout', ['title' => 'Alexandra & Joan']) ?>

<?php $this->start('css') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('/css/connect.css') ?>">

<style>

	html {
		height: 100%;
	}

</style>


<?php $this->stop('css') ?>

<?php $this->start('main') ?>

	<div class="container">
        <div class="row vertical_align coming_soon">
	        <div class="square">
				<img class="img_square" src="/assets/img/save_the_date.png" alt="RSVP">
			</div>
            <h1>Coming Soon</h1>
        </div> <!-- end row -->
    </div> <!-- end container -->

<?php $this->stop('main') ?>

<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/connect.js') ?>"></script>


<?php $this->stop('script') ?>






