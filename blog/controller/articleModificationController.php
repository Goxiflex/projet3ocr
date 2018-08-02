<?php

require_once 'controller/Classes/autoloader.php';
autoloader::register();
var_dump($_POST);

$billet = new Billet;
$billet->hydrateArray($_POST);

$database = new Database('billet');

if ($database->getPost($params['1']) == true)
{
	$database->updatePost($billet->getId(), $billet->getAuteur(), $billet->getTitre(), $billet->getContenu(), $billet->getDateCreation());
}
else {
	echo 'erreur';
}

