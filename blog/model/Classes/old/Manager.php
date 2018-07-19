<?php

class Manager
{
	
	private $bdd;
	public $request;
	
	
	public function __construct()
	{
		try
			{
			this->bdd = new PDO('mysql:host=localhost;dbname=blog_projet3;charset=utf8', 'root',  '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
			die('Erreur: ' .$e ->getMessage());
			}
			// Attention les exceptions doivent au final être passées dans le routeur.
	}
	
	public function billetRequest()
	{
		$bdd = this->bdd;
		$request = $bdd->query('SELECT id, titre, auteur, metadesc, metakey, dateCreation, contenu FROM billet');

		return $request;
		
	}
	
	
}