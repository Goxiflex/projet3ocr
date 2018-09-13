
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<body>
	<?php require 'Adds/header.php';?>
<section class="container mb-5 bg-light opacity">
<h1>Administration des articles du blog</h1>
<div>Vous pouvez ici créer, modifier ou supprimer des articles</div>
<div class="table-responsive">
	<table class="table">
	<thead class="thead-light">
			<tr>
				<th scope="col">Titre</th>
				<th scope="col">Auteur</th>
				<th scope="col">Date de Création</th>
				<th scope="col" class="text-center">Actions</th>
			</tr>	
	</thead>	
<?php
foreach($articles as $article)
	{ 
?>
		<tr>
			<td><?php echo $article->getTitre() ?></td>
			<td><?php echo $article->getAuteur() ?></td>
			<td><?php echo date('d/m/Y à H:i', $article->getDateCreation()) ?></td>
			<td class="text-center">
				<a href="admin/<?php echo $article->getId() ?>/edit"><button class="btn btn-info">Editer</button></a>
				<a href="admin/<?php echo $article->getId() ?>/delete"><button class="btn btn-secondary">Supprimer</button></a>
				<a href="admin/<?php echo $article->getId() ?>/comments"><button class="btn btn-warning">Modérer les commentaires</button></a>
			</td>	
		</tr>
<?php 
	}
?>
	</table>
</div>
<p><a href="<?= PATH; ?>/admin/create"><button class="btn btn-success">Créer un article </button></a></p>
</section>
	<?php require 'Adds/footer.php';?>
	</body>
</html>
