<?php

/* Insertion d'article */
class ModelArticle  {

	public function __construct () {
	$database = new Database ('billet');
	$post = $database->getPost('1');

	$billet = new Billet;
	$billet->hydrate($post);
	return $billet;

	}

}