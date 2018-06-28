<?php

class Manager
{
	
	protected $bdd;
	protected $request;
	
	
	public function dbConnect()
	{
		try
			{
			$bdd = new PDO('mysql:host=localhost;dbname=blog_projet3;charset=utf8', 'root',  '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
			die('Erreur: ' .$e ->getMessage());
			}
			// Attention les exceptions doivent au final être passées dans le routeur.
	}
	
	public function billetRequest()
	{
		$request = $bdd->query('SELECT id, titre, auteur, metadesc, metakey, dateCreation, contenu FROM billet');
		
	}
	
	
	public function billetDisplay()
	{
			while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
			{ 
			$article = new billet;

			$article->hydrate($donnees);
			
			var_dump($donnees);
			var_dump($article);
			
			echo 'article ID : <strong>'. $article->getId()  .'</strong> de l\'auteur <strong>'. $article->getAuteur() .'</strong> ayant pour titre <strong>'. $article->getTitre() .' </strong> ' ;
			}
	}
	
	
}