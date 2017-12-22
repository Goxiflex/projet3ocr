<?php

require_once 'Controller/Classes/autoloader.php';
autoloader::register(); 


			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=blog_projet3;charset=utf8', 'root',  '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Erreur: ' .$e ->getMessage());
			}
			
			
			$requete = $bdd->query('SELECT id, titre, auteur, metadesc, metakey, dateCreation, contenu FROM billet');