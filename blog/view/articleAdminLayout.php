<html>

<body>
<h2>Edition d'article</h2>
<p>Edition de l'article <?php  echo $billet->getTitre() .' de '. $billet->getAuteur() .', portant le numéro '. $billet->getId();  ?> </p>
<form action="articleModification.php" method="post">
	<p>
		<label for="Auteur">Auteur</label><br/>
		<input type="text" name="auteur" value="<?php echo $billet->getAuteur();?>" >
	</p>
	<p>
		<label for="Titre">Titre</label><br/>
		<input type="text" name="titre" value="<?php echo $billet->getTitre();?>" >
	</p>	
	<p>	
		<label for="Contenu">Contenu</label><br/>
		<textarea type="text" name="contenu"><?php echo $billet->getContenu();?></textarea>
	</p>
	<p>
		<label for="Date">Date de Création</label><br/>		
		<input type="date" name="dateCreation" value="<?php echo $billet->getDateReform();?>" >
	</p>
		<input type="hidden" name="id" value="<?php echo $billet->getId();?>">
	<p>
		<button type="submit">Modifier l'article</button>
	</p>

	
<p><a href="<?= PATH; ?>/admin">Retour à la liste des articles</a></p>



</form>
</body>
</html>