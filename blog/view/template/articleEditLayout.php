
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<body>
	<?php require 'Adds/header.php';?>
<section class="container bg-light opacity">
	<h1>Edition d'article</h1>
	<p>Edition de l'article <span class="font-weight-bold"><?php  echo $article->getTitre() .'</span>  de <span class="font-weight-bold">'. $article->getAuteur() .'</span>, portant le numéro <span class="font-weight-bold">'. $article->getId();  ?>.</span></p>
	<form action="articleModification.php" method="post">
		<p class="form-group col-6">
			<label for="Auteur">Auteur</label><br/>
			<input type="text" name="auteur" class="form-control" value="<?php echo $article->getAuteur();?>" >
		</p>
		<p class="form-group col-6">
			<label for="Titre">Titre</label><br/>
			<input type="text" name="titre" class="form-control" value="<?php echo $article->getTitre();?>" >
		</p>	
		<p class="form-group col-10">	
			<label for="Contenu">Contenu</label><br/>
			<textarea type="text" class="form-control" id="article-content" name="contenu"><?php echo $article->getContenu();?></textarea>
		</p>
		<p class="form-group col-4">
			<label for="Date">Modifier la date de Création</label><br/>		
			<input type="date" name="dateCreation" class="form-control" value="<?php echo date('Y-m-d', $article->getDateCreation());?>" >
		</p>
			<input type="hidden" name="id" value="<?php echo $article->getId();?>">
		<p class="form-group col-12">
			<button class="btn btn-success" type="submit">Modifier l'article</button>
		</p>
	</form>
		
	<p><a href="<?= PATH; ?>/admin">Retour à la liste des articles</a></p>
</section>
	<?php require 'Adds/footer.php';?>
	</body>
</html>
