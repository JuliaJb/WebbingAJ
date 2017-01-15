<?php $this->layout('layout', ['title' => 'login']) ?>

<?php $this->start('css') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('/css/main.css') ?>">

<?php $this->stop('css') ?>

<?php 

$this->start('nav');

	include '../app/templates/partials/nav.php';

$this->stop('nav');

?>



<?php $this->start('main') ?>


<h1>This is test</h1>



<h2>This is updated</h2>
<?php if (isset($updated)) : ?>
	<pre>
		<?php print_r($updated) ?>
	</pre>
<?php else : ?>
	<h2>There is no Updated</h2>
<?php endif ?>


<h2>This is new user</h2>
<pre>
	<?php print_r($new_user) ?>
</pre>


<h2>This is _SESSION with Roles</h2>
<pre>
	<?php print_r($_SESSION) ?>
</pre>








<?php $this->stop('main') ?>


<?php $this->start('script') ?>


	<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>
