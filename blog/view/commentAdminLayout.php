<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<section class="container">
	<h1>Edition du commentaire</h1>
	<p>Edition du commentaire de <span class="font-weight-bold"><?php $comment->getAuteur(); ?></span>, portant le numéro <span class="font-weight-bold"> <?php $comment->getId();?> </span> et posté le <span class="font-weight-bold"><?php echo $comment->getDateCreation();?></span></p>
	
	<form action="articleModification.php" method="post">
		<p class="form-group col-6">
			<label for="Auteur">Auteur</label><br/>
			<input type="text" name="auteur" class="form-control" value="<?php echo $comment->getAuteur();?>" >
		</p>
		<p class="form-group col-10">	
			<label for="Contenu">Contenu</label><br/>
			<textarea type="text" class="form-control" name="contenu"><?php echo $comment->getContenu();?></textarea>
		</p>
		<p class="form-group col-4">
			<label for="Date">Date de Création</label><br/>		
			<input type="date" name="dateCreation" class="form-control" value="<?php echo $billet->getDateReform();?>" >
		</p>
			<input type="hidden" name="id" value="<?php echo $comment->getId();?>">
		<p class="form-group col-12">
			<button class="btn btn-success" type="submit">Modifier le commentaire</button>
		</p>
	</form>
		
	<p><a href="<?= PATH; ?>/admin">Retour à la liste des articles</a></p>
</section>
<?php
	require 'Adds/footer.php';
?>
