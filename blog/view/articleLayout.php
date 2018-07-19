<html>
<head>
	<title><?=  $post->titre  ?></title>
</head>
	<body>
		<body>
		<h1><?=  $post->titre ?></h1>
		<div>Ecrit par <?=  $post->auteur ?>' le <?= $post->dateCreation ?> </div> 
		<p>Contenu : <?= $post->contenu ?>
		</p>
		
		<div><a href="<?= PATH; ?>/cat"> Revenir dans la liste des articles</a></div>
		<div><a href="<?= PATH; ?>"> Revenir à la page d'accueil</a></div>
	<body>
<html>