<?php

require 'Model/model.php';

require 'View/Adds/header.php';

require 'View/category.php';
 
while ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
{ 
	$article = new billet;

	$article->hydrate($donnees);
	
	
	echo '<div>article ID : <strong>'. $article->getId()  .'</strong> de l\'auteur <strong>'. $article->getAuteur() .'</strong> ayant pour titre <strong>'. $article->getTitre() .' </strong></div> ' ; // à passer dans la view
	
}

require 'View/Adds/footer.php';