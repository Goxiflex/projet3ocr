
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<body>
	<?php require 'Adds/header.php';?>
<section class="container">
	<h1>Edition du commentaire</h1>
	<p>Edition du commentaire de <span class="font-weight-bold"><?php echo $comment->getAuteur(); ?></span>, portant le numéro <span class="font-weight-bold"> <?php echo $comment->getId();?> </span> et posté le <span class="font-weight-bold"><?php echo date('d/m/Y', $comment->getDateCreation());?></span></p>
	
	<form action="commentModification.php" method="post">
		<p class="form-group col-6">
			<label for="auteur">Auteur</label><br/>
			<input type="text" name="auteur" class="form-control" value="<?php echo $comment->getAuteur();?>" >
		</p>
		<p class="form-group col-10">	
			<label for="contenu">Contenu</label><br/>
			<textarea type="text" class="form-control" name="contenu"><?php echo $comment->getContenu();?></textarea>
		</p>
		<p class="form-group col-4">
			<label for="dateCreation">Date de Création</label><br/>		
			<input type="date" name="dateCreation" class="form-control" value="<?php echo date('Y-m-d', $comment->getDateCreation());?>" >
		</p>
			<input type="hidden" name="reported" value="0">
			<input type="hidden" name="id" value="<?php echo $params ?>">
		<p class="form-group col-12">
			<p><span class="badge badge-info">En modifiant ce commentaire, celui-ci sera considéré comme modéré.</span></p>
			<button class="btn btn-success" type="submit">Modifier le commentaire</button>
		</p>
	</form>
		
	<p><a href="<?= PATH; ?>/admin">Retour à la liste des articles</a></p>
</section>
	<?php require 'Adds/footer.php';?>
	</body>
</html>

