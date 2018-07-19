<?php

require_once 'controller/Classes/autoloader.php';
autoloader::register();


$database = new Database ('billet');

$category = New Category ();

foreach($database->query('SELECT * FROM billet') as $post){
	echo '<a href="cat/'. $post->id .'"> '. $post->titre .' de l\'auteur '. $post->auteur .' créé le '. $post->dateCreation .'</a><br/>';
}
