<?php

/* Chargement des classes */

/* require 'classes/connexionBdd.php';
require 'classes/billet.php'; */ 



require_once 'Controler/Classes/autoloader.php';
autoloader::register(); // Ne fonctionne pas
$test = new billet();
$bdd = new PDO();

/* Requête sur la BDD */

$requete = $bdd->query('SELECT id, titre, auteur, metadesc, metakey, dateCreation, contenu FROM billet');
/* A déplacer */
 
while ($donnees = $requete->fetch(PDO::FETCH_ASSOC))
{ 
	$article = new billet;

	$article->hydrate($donnees);
	
	var_dump($donnees);
	var_dump($article);
	
	echo 'article ID : <strong>'. $article->getId()  .'</strong> de l\'auteur <strong>'. $article->getAuteur() .'</strong> ayant pour titre <strong>'. $article->getTitre() .' </strong> ' ;
	
}


?>
