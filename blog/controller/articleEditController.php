<?php

require_once 'controller/Classes/autoloader.php';
autoloader::register();

$database = new Database ('billet');
$post = $database->getPost($params['1']);
if ($post == true){
	$billet = new Billet;
	$billet->hydrate($post);
	
	$article = New Article();
	$article->layoutAdmin($billet);
}
else {
	require 'View/404.php';
}




