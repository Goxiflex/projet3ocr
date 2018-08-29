<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<section class="container">
		<h2><?php echo $message ?></h2> 

		<a href="<?= PATH.'/'.$params['0']; ?>"><button class="btn btn-secondary"> Revenir à l'article</button></a>
		<a href="<?= PATH; ?>"><button class="btn btn-warning"> Revenir à la page d'accueil</button></a>
</section>		
	<?php
	require 'Adds/footer.php';
?>
