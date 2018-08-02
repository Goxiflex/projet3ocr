<?php

autoloader::register();

$billet = new Billet;
$billet->hydrateArray($_POST);

$database = new Database('billet');

if($database->insertPost($billet->getAuteur(), $billet->getTitre(), $billet->getContenu()))
{
	echo 'article inséré avec succés';
}
else
{
	echo 'erreur';
}

/* Double erreur, c'est très bizarre */