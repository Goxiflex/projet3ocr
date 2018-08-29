<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
		<p><?php echo $message ?></p> 

		<p><a href="<?= PATH.'/'.$params['0']; ?>"> Revenir à l'article</a></p>
		<p><a href="<?= PATH; ?>"> Revenir à la page d'accueil</a></p>
	<?php
	require 'Adds/footer.php';
?>
