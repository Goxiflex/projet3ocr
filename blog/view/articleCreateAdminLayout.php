<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>

<section class="container">
	<h1>Création de l'article</h1>
	<form action="articleCreated.php" method="post">
		<p>
			<label for="Auteur">Auteur</label><br/>
			<input type="text" name="auteur" value="" >
		</p>
		<p>
			<label for="Titre">Titre</label><br/>
			<input type="text" name="titre" value="" >
		</p>	
		<p>	
			<label for="Contenu">Contenu</label><br/>
			<textarea type="text" name="contenu"></textarea>
		</p>
		<p>
			<button type="submit">Créer l'article</button>
		</p>

		
		<p><a href="<?= PATH; ?>/admin">Retour à la liste des articles</a></p>
	</form>
</section>

<?php
	require 'Adds/footer.php';
?>
