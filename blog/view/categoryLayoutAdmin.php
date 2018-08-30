<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<section class="container">
<h1>Administration des articles du blog</h1>
<div>Vous pouvez ici créer, modifier ou supprimer des articles</div>

<table class="table">
<thead>
		<tr>
			<th scope="col">Titre</th>
			<th scope="col">Auteur</th>
			<th scope="col">Date Création</th>
			<th scope="col">Actions</th>
		</tr>	
</thead>	
<?php
foreach($billetList as $post)
	{ 
?>
		<tr>
			<td><?php echo $post->titre ?></td>
			<td><?php echo $post->auteur ?></td>
			<td><?php echo $post->dateCreation ?></td>
			<td>
				<a href="admin/<?php echo $post->id ?>/edit"><button class="btn btn-info">Editer</button></a>
				<a href="admin/<?php echo $post->id ?>/delete"><button class="btn btn-secondary">Supprimer</button></a>
				<a href="admin/<?php echo $post->id ?>/comments"><button class="btn btn-warning">Modérer les commentaires</button></a>
			</td>	
		</tr>
<?php 
	}
?>
</table>

<p><a href="<?= PATH; ?>/admin/create"><button class="btn btn-success">Créer un article </button></a></p>
</section>
<?php
	require 'Adds/footer.php';
?>
