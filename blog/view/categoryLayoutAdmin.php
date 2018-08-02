<html>
<head>
<title>Catégorie du site</title>
</head>
<body>
<h1>Ceci est une catégorie du blog</h1>
<div>Vous trouverez ici les derniers articles de cette catégorie</div>
<ul>
	
<?php
foreach($articlesList as $post){
	echo '<li><a href="cat/'. $post->id .'"> '. $post->titre .' de l\'auteur '. $post->auteur .' créé le '. $post->dateCreation .'</a>
	<a href="cat/'. $post->id .'/edit"><button>Editer</button></a>
	<a href="cat/'. $post->id .'/delete"><button>Supprimer</button></a></li>';
}
?>
</ul>

<p><a href="<?= PATH; ?>/admin/create"><button>Créer un article </button></a></p>

<body>
<html>