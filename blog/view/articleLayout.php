<html>
<head>
		<title><?php  echo $billet->getTitre() .'de '. $billet->getAuteur();  ?> </title>
</head>
	<body>
		<body>
		<h1><?php  echo $billet->getTitre()  ?></h1>
		<div>Ecrit par <?php  echo $billet->getAuteur()  ?> le <?php  echo $billet->getDateCreation()  ?> </div> 
		<p>Contenu : <?php  echo $billet->getContenu()  ?>
		</p>
		
		<div><a href="<?= PATH; ?>/cat"> Revenir dans la liste des articles</a></div>
		<div><a href="<?= PATH; ?>"> Revenir à la page d'accueil</a></div>
	<body>
<html>