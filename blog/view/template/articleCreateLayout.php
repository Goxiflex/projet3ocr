
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<body>
	<?php require 'Adds/header.php';?>

<section class="container bg-light opacity">
	<h1>Création de l'article</h1>
	<form action="articleCreated.php" method="post">
		<p class="form-group col-6">
			<label for="Auteur">Auteur</label><br/>
			<input type="text" class="form-control" name="auteur" value="" >
		</p>
		<p class="form-group col-6">
			<label for="Titre">Titre</label><br/>
			<input type="text" class="form-control" name="titre" value="" >
		</p>	
		<p class="form-group col-10">
			<label for="Contenu">Contenu</label><br/>
			<textarea type="text" id="article-content" class="form-control" name="contenu"></textarea>
		</p>
		<p>
			<button class="btn btn-success" type="submit">Créer l'article</button>
		</p>

		
		<p><a href="<?= PATH; ?>/admin">Retour à la liste des articles</a></p>
	</form>
</section>

<?php require 'Adds/footer.php';?>
	</body>
</html>

